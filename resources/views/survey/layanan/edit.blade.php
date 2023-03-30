@extends('adminlte::page')
@section('title', 'Tambah User')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Layanan</h1>
@stop
@section('content')
    <form action="{{url('/survey/layanan/'.$data->id)}}" method="post">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">Layanan</label>
                            <input type="text" class="form-control @error('layanan') is-invalid @enderror"
                                id="exampleInputName" placeholder="Masukkan Layanan" name="layanan" value="{{ $data->layanan }}">
                            @error('layanan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{url('/survey/layanan')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @stop
