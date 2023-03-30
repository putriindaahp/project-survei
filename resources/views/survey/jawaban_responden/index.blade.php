@extends('adminlte::page')
@section('title', 'List User')
@section('content_header')
    <h1 class="m-0 text-dark">List Hasil Responden</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Layanan</th>
                                <th>Total_poin</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jawabanrespondens as $jawabanresponden)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jawabanresponden->layanan->layanan }}</td>
                                    <td>{{ $jawabanresponden->total_points }}</td>

                                    <td class="text-center">
                                        <a href="{{url('/survey/responden/'.$jawabanresponden->id)}}"
                                            class="btn btn-primary btn-xs">
                                            <i class="fas fa-eye"></i>
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
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
    </script>
@endpush
