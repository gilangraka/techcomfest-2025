@extends('layouts.dashboard.layout')

@section('title')
    Manage Team
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="p-5 profile-card bg-white border rounded-3">
                <div class="table-responsive">
                    <table id="teamTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nama Tim</th>
                                <th class="text-center">Bidang Lomba</th>
                                <th class="text-center">Anggota</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $value->nama_team }}</td>
                                    <td class="text-center">{{ $value->ref_kategori->nama_kategori }}</td>
                                    <td>Gilang</td>
                                    <td class="text-center">
                                        @if ($value->is_verified == 0)
                                            <span class="fw-bold text-danger">Unverified</span>
                                        @else
                                            <span class="fw-bold text-success">Verified</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <button onclick="openTeamModal('{{ $value->id }}')" type="button"
                                            class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#teamModal">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('pages.manage-team.modal')
@endsection

@push('js')
    <script>
        let table = new DataTable('#teamTable');
    </script>
@endpush
