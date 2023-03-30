<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\Models\Jawabanresponden;

class JawabanrespondenController extends Controller
{
    public function index()
    {
        $jawabanrespondens = Jawabanresponden::all();
        return view('survey.jawaban_responden.index', compact('jawabanrespondens'));
    }

    public function show($id)
    {
        $data   = Jawabanresponden::findOrFail($id);
        $profil = json_decode($data->profil);
        return view('survey.jawaban_responden.show', compact('data', 'profil'));
    }
}
