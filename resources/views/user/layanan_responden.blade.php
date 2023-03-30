@extends('user.index')

@section('content')
    @php
        // dd(Session::all());
    @endphp
    <div class="card-body">
        <p class="fw-bold" style="color: #3b4568">PILIH LAYANAN YANG AKAN DI SURVEY</p>
        <p class="fst-italic" style="font-size: 12px; color: #3b4568"><span class="text-danger">*</span>Anda dapat memilih
            lebih dari satu layanan</p>
        <div class="card p-2">
            <div class="card-body" style="color: #3b4568">
                {{-- <p><b>Check Layanan : </b>
                    @if (Session::has('layanan'))
                        @foreach ($sessLayanan as $l)
                            @foreach ($l as $ls)
                                {{ $ls }},
                            @endforeach
                        @endforeach
                    @endif
                </p> --}}
                <form action="{{ url('/layanan') }}" method="post">
                    @csrf

                    @foreach ($layanans as $layanan)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $layanan->id }}"
                                id="{{ $layanan->id }}" name="layanan[]"
                                {{ Session::has('layanan')
                                    ? (count(Session::get('layanan')) > 0
                                        ? (in_array($layanan->id, Session::get('layanan')['layanan'])
                                            ? 'checked'
                                            : '')
                                        : '')
                                    : '' }} />
                            <label class="form-check-label" for="{{ $layanan->id }}">
                                {{ $layanan->layanan }}
                            </label>
                        </div>
                    @endforeach
            </div>
        </div>
        <div class="mt-3">
            <a href="/">
                <button type="button" class="btn" style="background-color: #001a76; color: white">Kembali</button>
            </a>
            <button type="submit" class="btn float-end"
                style="background-color: #001a76; color: white">Selanjutnya</button>
        </div>
        </form>
    </div>
@endsection
