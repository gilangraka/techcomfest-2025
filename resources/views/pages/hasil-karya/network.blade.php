@extends('layouts.dashboard.layout')

@section('title')
    Hasil Karya | Network
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="p-5 profile-card bg-white border rounded-3">
                <div class="table-responsive">
                    <table id="networkTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nama Tim</th>
                                <th class="text-center">File RAR</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $value->ref_team->nama_team }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-primary"
                                            href="{{ route('berkas.download', ['3', $value->file_rar]) }}">
                                            <i class="nav-icon bi bi-eye"></i>
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
@endsection

@push('js')
    <script>
        let table = new DataTable('#networkTable');
    </script>
@endpush
