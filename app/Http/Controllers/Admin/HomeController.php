<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jawabanresponden;
use App\Models\Layanan;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $layanan1 = Jawabanresponden::where('layanan_id', 1)->get();
        $pointslayanan1 = $layanan1->sum('total_points');
        $layanan2 = Jawabanresponden::where('layanan_id', 2)->get();
        $pointslayanan2 = $layanan2->sum('total_points');
        $layanan3 = Jawabanresponden::where('layanan_id', 3)->get();
        $pointslayanan3 = $layanan3->sum('total_points');
        $layanan4 = Jawabanresponden::where('layanan_id', 4)->get();
        $pointslayanan4 = $layanan4->sum('total_points');

        $layanans = Layanan::pluck('layanan');
        $responden1 = Jawabanresponden::whereJsonContains('profil->kategori_responden', 'Instansi (K/L) Pusat')->get();
        $pointsresponden1 = $responden1->count();
        $responden2 = Jawabanresponden::whereJsonContains('profil->kategori_responden', 'Provinsi Se-Indonesia')->get();
        $pointsresponden2 = $responden2->count();
        $responden3 = Jawabanresponden::whereJsonContains('profil->kategori_responden', 'Kab-Kota di Jawa Timur')->get();
        $pointsresponden3 = $responden3->count();
        $responden4 = Jawabanresponden::whereJsonContains('profil->kategori_responden', 'BUMN-BUMD')->get();
        $pointsresponden4 = $responden4->count();

        return view('home', compact(
            'pointslayanan1', 'pointslayanan2', 'pointslayanan3', 'pointslayanan4', 'layanans',
            'responden1', 'responden2', 'responden3', 'responden4',
            'pointsresponden1', 'pointsresponden2', 'pointsresponden3', 'pointsresponden4',
        ));
    }
}