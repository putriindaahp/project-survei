@extends('adminlte::page')
@section('title', 'List Pilihan Jawaban')
@section('content_header')
    <h1 class="m-0 text-dark">List Pilihan Jawaban</h1>
@stop
@section('content')
    @include('sweetalert::alert')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{url('/survey/pilihan/create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="table">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Pilihan Jawaban</th>
                                <th>Poin</th>
                                <th>Pertanyaan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pilihanjawabans as $pilihanjawaban)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $pilihanjawaban->pilihan_jawaban }}</td>
                                    <td class="text-center">{{ $pilihanjawaban->poin }}</td>
                                    <td>{{ $pilihanjawaban->pertanyaan->pertanyaan }}</td>
                                    <td class="text-center">
                                        <a href="{{url('/survey/pilihan/'.$pilihanjawaban->id.'/edit')}}" class="btn btn-primary btn-xs">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{url('/survey/pilihan/'.$pilihanjawaban->id)}}" class="btn btn-primary btn-xs">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{url('/survey/pilihan/'.$pilihanjawaban->id)}}"
                                            onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#table').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
