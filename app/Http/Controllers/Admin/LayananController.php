<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\Models\Layanan;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all()->sortByDesc('id');
        return view('survey.layanan.index', compact('layanans'));
    }

    public function create()
    {
        $layanans = Layanan::all();
        return view('survey.layanan.create', compact('layanans'));
    }

    public function store(Request $request)
    {
        Layanan::create([
            'layanan' => $request->layanan,
        ]);

        Alert::success('Success', 'Data berhasil ditambahkan');
        return redirect('/survey/layanan');
    }

    public function show($id)
    {
        //$data = Layanan::findOrFail($id);
        //return view('survey.layanan.show')
    }

    public function edit($id)
    {
        $data = Layanan::findOrFail($id);
        return view('survey.layanan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Layanan::findOrFail($id);

        $data->update([
            'layanan' => $request->layanan
        ]);

        Alert::success('Success', 'Data berhasil diupdate');
        return redirect('/survey/layanan');
    }

    public function destroy($id)
    {
        $data = Layanan::findOrFail($id);
        $data->delete();

        Alert::success('Success', 'Data berhasil dihapus');
        return redirect('/survey/layanan');
    }
}
