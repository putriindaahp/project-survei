<?php

namespace App\Http\Controllers\User;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Jawabanresponden;
use App\Models\Layanan;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{

    public function profileView()
    {
        if (Session::has('profile')) {
            $profiles = Session::get('profile');
        }

        $tmp = [];
        return view('user.profil_responden', compact(Session::has('profile') ? 'profiles' : 'tmp'));
    }

    public function profile(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_hp' => 'required|min:11|max:13',
            'gender' => 'required',
            'usia' => 'required',
            'kategori_responden' => 'required',
            'jabatan' => 'required',
            'pendidikan' => 'required'
        ]);
        session()->put('profile', $request->except('_token'));
        return $this->layananView();

    }

    public function layananView()
    {
        if (Session::has('layanan')) {
            $sessLayanan = Session::get('layanan');
        }
        $tmp = [];
        $profiles = Session::get('profile');
        $layanans = Layanan::all();
        return view('user.layanan_responden', compact('layanans', 'profiles', Session::has('layanan') ? 'sessLayanan' : 'tmp'));
    }

    public function layanan(Request $request)
    {
        session()->put('layanan', $request->except('_token'));
        return $this->pertanyaanView();
    }

    public function pertanyaanView()
    {
        $tmp = [];
        $layanan = [];
        $pertanyaans = [];

        if (Session::has('layanan')) {
            if (count(Session::get('layanan')) > 0) {
                $layanan = Session::get('layanan')['layanan'];
                $pertanyaans = Pertanyaan::query()->where('is_active', 1)
                    ->where(function ($query) use ($layanan) {
                        foreach ($layanan as $l) {
                            $query->orWhere('layanan_id', $l);
                        }
                    })
                    ->paginate(50);
                $sessJawaban = Session::get('jawaban');
                return view('user.jawaban_responden', compact('pertanyaans', 'layanan', Session::has('jawaban') ? 'sessJawaban' : 'tmp'));
            }
        }
        return view('user.jawaban_responden', compact('pertanyaans', 'layanan'));
    }

    public function jawaban(Request $request)
    {
        session()->put('jawaban', $request->except('_token'));

        $getPoint = Session::get('jawaban');
        $total_points = 0;

        foreach ($getPoint as $point) {
            $total_points += $point;
        }

        if (Session::has('layanan')) {
            $data = [];
            foreach (Session::get('layanan')['layanan'] as $layanan) {
                $tmp = [
                    'total_points' => $total_points,
                    'layanan_id' => $layanan,
                    'profil' => json_encode(Session::get('profile')),
                ];
                array_push($data, $tmp);
            }

            Jawabanresponden::insert($data);
            Session::flush();
        }

        Alert::success('Survey Selesai', 'Terima kasih sudah mengisi survey ini');
        return view('user.profil_responden');
    }
}
