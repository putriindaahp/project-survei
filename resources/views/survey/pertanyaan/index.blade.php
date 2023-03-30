@extends('adminlte::page')
@section('title', 'List User')
@section('content_header')
    <h1 class="m-0 text-dark">List Pertanyaan</h1>
@stop
@section('content')
    @include('sweetalert::alert')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{url('/survey/pertanyaan/create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Pertanyaan</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pertanyaans as $pertanyaan)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $pertanyaan->pertanyaan }}</td>
                                    <td class="text-center">
                                        @if ($pertanyaan->is_active == 1)
                                            <button class="badge badge-success" disabled>Aktif</button>
                                        @else
                                            <button class="badge badge-danger" disabled>Tidak Aktif</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('/survey/pertanyaan/'.$pertanyaan->id.'/edit')}}"
                                            class="btn btn-primary btn-xs">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{url('/survey/pertanyaan/'.$pertanyaan->id)}}" class="btn btn-primary btn-xs">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{url('/survey/pertanyaan/'.$pertanyaan->id)}}"
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
        $('#example2').DataTable({
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
