@extends('adminlte::page')
@section('title', 'List User')
@section('content_header')
    <h1 class="m-0 text-dark">Detail Hasil Responden</h1>
@stop
@section('content')
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <p><span class="text-bold">Layanan :</span> {{ $data->layanan->layanan }}</p>
                    <p><span class="text-bold">Total Poin :</span> {{ $data->total_points }}</p>
                    <p><span class="text-bold">Nama :</span> {{ $profil->nama }}</p>
                    <p><span class="text-bold">Email :</span> {{ $profil->email }}</p>
                    <p><span class="text-bold">No HP :</span> {{ $profil->no_hp }}</p>
                    <p><span class="text-bold">Gender :</span> {{ $profil->gender }}</p>
                    <p><span class="text-bold">Kategori Responden :</span> {{ $profil->kategori_responden }}</p>
                    <p><span class="text-bold">Jabatan :</span> {{ $profil->jabatan }}</p>
                    <p><span class="text-bold">Pendidikan :</span> {{ $profil->pendidikan }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
