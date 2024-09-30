@extends('layouts.dashboard.layout')

@section('title')
    Hasil Karya | Multimedia
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="p-5 profile-card bg-white border rounded-3">
                <div class="table-responsive">
                    <table id="mulmedTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nama Tim</th>
                                <th class="text-center">Orisinalitas Karya</th>
                                <th class="text-center">Hasil Karya</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $value->ref_team->nama_team }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-primary"
                                            href="{{ route('berkas.download', ['4', $value->orisinalitas_karya]) }}">
                                            <i class="nav-icon bi bi-eye"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-primary"
                                            href="{{ route('berkas.download', ['5', $value->hasil_karya]) }}">
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
        let table = new DataTable('#mulmedTable');
    </script>
@endpush
