<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Alert;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use App\Models\Pilihanjawaban;

class PilihanjawabanController extends Controller
{
    public function index()
    {
        $pilihanjawabans = Pilihanjawaban::all()->sortByDesc('id');
        return view('survey.pilihan_jawaban.index', compact('pilihanjawabans'));
    }

    public function create()
    {
        $pertanyaans = Pertanyaan::all();
        return view('survey.pilihan_jawaban.create', compact('pertanyaans'));
    }

    public function store(Request $request)
    {
        Pilihanjawaban::create([
            'pertanyaan_id'   => $request->pertanyaan_id,
            'pilihan_jawaban' => $request->pilihan_jawaban,
            'poin'            => $request->poin
        ]);

        Alert::success('Success', 'Data berhasil ditambahkan');
        return redirect('/survey/pilihan');
    }

    public function show($id)
    {
        $data = Pilihanjawaban::findOrFail($id);
        return view('survey.pilihan_jawaban.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Pilihanjawaban::findOrFail($id);
        $pertanyaans = Pertanyaan::all();
        return view('survey.pilihan_jawaban.edit', compact('data', 'pertanyaans'));
    }

    public function update(Request $request, $id)
    {
        $data = Pilihanjawaban::findOrFail($id);

        $data->update([
            'pertanyaan_id'   => $request->pertanyaan_id,
            'pilihan_jawaban' => $request->pilihan_jawaban,
            'poin'            => $request->poin
        ]);

        Alert::success('Success', 'Data berhasil diupdate');
        return redirect('/survey/pilihan');
    }

    public function destroy($id)
    {
        $data = Pilihanjawaban::findOrFail($id);
        $data->delete();

        Alert::success('Success', 'Data berhasil dihapus');
        return redirect('/survey/pilihan');
    }
}
