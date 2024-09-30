@extends('layouts.dashboard.layout')

@section('title')
    Hasil Karya | Software
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="p-5 profile-card bg-white border rounded-3">
                <div class="table-responsive">
                    <table id="softwareTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nama Tim</th>
                                <th class="text-center">Link Host</th>
                                <th class="text-center">Link Git</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $value->ref_team->nama_team }}</td>
                                    <td class="text-center"><a target="_blank"
                                            href="{{ $value->link_host }}">{{ $value->link_host }}</a>
                                    </td>
                                    <td class="text-center"><a target="_blank"
                                            href="{{ $value->link_git }}">{{ $value->link_git }}</a></td>
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
        let table = new DataTable('#softwareTable');
    </script>
@endpush
