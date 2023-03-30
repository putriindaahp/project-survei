@extends('user.index')

@section('content')
    <div class="card-body">
        {{-- <p><b>Check Layanan : </b>
            @if (Session::has('layanan'))
                @if (!is_null($layanan))
                    @foreach ($layanan as $l)
                        {{ $l }},
                    @endforeach
                @endif
            @endif
        </p>

        <p><b>Check Jawaban : </b>
            @if (Session::has('jawaban'))
                @foreach ($sessJawaban as $l)
                    {{ $l }}
                @endforeach
            @endif
        </p> --}}
        <p class="fw-bold">SURVEY KEPUASAN LAYANAN </p>
        <p class="fst-italic" style="font-size: 12px; color: #3b4568">
            <span class="text-danger">*</span>Mohon diisi dengan benar
        </p>
        @if (count($layanan) > 0)
            <form action="{{ url('/simpan') }}" method="post">
                @csrf

                @foreach ($pertanyaans as $pertanyaan)
                    <div class="card p-2 mt-2">
                        <div class="card-body">
                            <p>{{ $loop->iteration }}. {{ $pertanyaan->pertanyaan }}</p>
                            <div class="container">
                                @forelse ($pertanyaan->Pilihanjawabans as $jawaban)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="flexRadioDefault1"
                                            name="jawaban{{ $pertanyaan->id }}" value="{{ $jawaban->poin }}" />
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            {{ $jawaban->pilihan_jawaban }}
                                        </label>
                                    </div>
                                @empty
                                    <h5>Jawaban belum tersedia</h5>
                                @endforelse
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="mt-3">
                    <a href="/layanan">
                        <button type="button" class="btn"
                            style="background-color: #001a76; color: white">Kembali</button>
                    </a>
                    {{-- <button type="button" class="btn float-end"
                        style="background-color: #001a76; color: white">Selanjutnya</button> --}}
                    <button type="submit" class="btn float-end"
                        style="background-color: #001a76; color: white">Submit</button>
                </div>
            </form>
        @else
            <div class="card p-2 mt-2">
                <div class="card-body text-center">
                    <h4>Silahkan pilih layanan terlebih dahulu</h4>
                </div>
            </div>
            <div class="mt-3">
                <a href="/layanan">
                    <button type="button" class="btn" style="background-color: #001a76; color: white">Kembali</button>
                </a>
            </div>
        @endif
    </div>
@endsection
