@extends('layouts.dashboard.layout')

@section('title')
    Manage Independent
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="p-5 profile-card bg-white border rounded-3">
                <div class="mb-4">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#independentModal">
                        <i class="bi bi-plus-circle me-2"></i> Tambah Independent
                    </button>
                </div>
                <div class="table-responsive">
                    <table id="teamTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $value->name }}</td>
                                    <td class="text-center">{{ $value->email }}</td>
                                    <td class="text-center">
                                        @foreach ($value->roles as $role)
                                            {{ $role->name }}{{ !$loop->last ? ', ' : '' }}
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <button onclick="openIndependentModalDelete({{ $value->id }})" type="button"
                                            class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete">
                                            <i class="bi bi-trash"></i>
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

    @include('pages.manage-independent.modaladd')
    @include('pages.manage-independent.modaldelete')
@endsection

@push('js')
    <script>
        let table = new DataTable('#teamTable');
    </script>
@endpush
