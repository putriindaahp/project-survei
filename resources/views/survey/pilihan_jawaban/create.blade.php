@extends('adminlte::page')
@section('title', 'Tambah User')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Pilihan Jawaban</h1>
@stop
@section('content')
    <form action="{{url('/survey/pilihan')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="pertanyaan">Pertanyaan</label>
                            <select class="form-control select2" style="width: 100%;" name="pertanyaan_id">
                                @foreach ($pertanyaans as $pertanyaan)
                                    <option value="{{ $pertanyaan->id }}">{{ $pertanyaan->pertanyaan }}</option>
                                @endforeach
                            </select>
                            @error('pertanyaan_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pilihanjawaban">Pilihan Jawaban</label>
                            <input type="text" class="form-control @error('pilihan_jawaban') is-invalid @enderror"
                                id="pilihanjawaban" placeholder="Masukkan Pilihan Jawaban" name="pilihan_jawaban">
                            @error('pilihan_jawaban')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="poin">Poin</label>
                            <input type="number" class="form-control @error('poin') is-invalid @enderror" id="poin"
                                placeholder="Masukkan Poin" name="poin">
                            @error('poin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{url('/survey/pilihan')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @stop
