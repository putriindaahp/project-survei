<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\Models\Layanan;
use App\Models\Pertanyaan;

class PertanyaanController extends Controller
{
    public function index()
    {
        $pertanyaans = Pertanyaan::all()->sortByDesc('id');
        return view('survey.pertanyaan.index', compact('pertanyaans'));
    }

    public function create()
    {
        $layanans = Layanan::all();
        return view('survey.pertanyaan.create', compact('layanans'));
    }

    public function store(Request $request)
    {
        Pertanyaan::create([
            'pertanyaan' => $request->pertanyaan,
            'is_active' => $request->is_active ?? 0,
            'layanan_id' => $request->layanan_id,
        ]);
        Alert::success('Success', 'Data berhasil ditambahkan');
        return redirect('/survey/pertanyaan');

    }

    public function show($id)
    {
        $data = Pertanyaan::findOrFail($id);
        return view('survey.pertanyaan.show', compact('data'));

    }

    public function edit($id)
    {
        $data = Pertanyaan::findOrFail($id);
        $layanans = Layanan::all();
        return view('survey.pertanyaan.edit', compact('data', 'layanans'));

    }

    public function update(Request $request, $id)
    {
        $data = Pertanyaan::findOrFail($id);

        $data->update([
            'pertanyaan' => $request->pertanyaan,
            'is_active' => $request->is_active ?? 0,
            'layanan_id' => $request->layanan_id,
        ]);

        Alert::success('Success', 'Data berhasil diupdate');
        return redirect('/survey/pertanyaan');

    }

    public function destroy($id)
    {
        $data = Pertanyaan::findOrFail($id);
        $data->delete();

        Alert::success('Success', 'Data berhasil dihapus');
        return redirect('/survey/pertanyaan');
    }
}
