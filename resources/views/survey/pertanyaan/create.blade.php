@extends('adminlte::page')
@section('title', 'Tambah User')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Pertanyaan</h1>
@endsection

@section('content')
    <form action="/survey/pertanyaan" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">Pertanyaan</label>
                            <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror"
                                id="exampleInputName" placeholder="Tuliskan pertanyaan" name="pertanyaan"
                                value="{{ old('pertanyaan') }}">
                            @error('pertanyaan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="layanan_id">Layanan</label>
                            <select class="form-control select2" style="width: 100%;" name="layanan_id">
                                <option value="">-- Pilih Layanan --</option>
                                @foreach ($layanans as $layanan)
                                    <option value="{{ $layanan->id }}">{{ $layanan->layanan }}</option>
                                @endforeach
                            </select>
                            @error('layanan_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input value="{{ old('is_active') ?? 1 }}" type="checkbox" checked
                                    class="custom-control-input" id="customSwitch3" name="is_active">
                                <label class="custom-control-label" for="customSwitch3">Status</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{url('/survey/pertanyaan')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('js')
    <script>
        $(document).on("change", "#customSwitch3", function() {
            if ($('#customSwitch3').is(":checked") == true) {
                $('#customSwitch3').val('1')
                console.log($('#customSwitch3').val())
            } else {
                $('#customSwitch3').val('0')
                console.log($('#customSwitch3').val())
            }
        })
    </script>
@endpush
