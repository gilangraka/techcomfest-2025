@extends('layouts.dashboard.layout')

@section('title')
    Manage User
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
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
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
                                        <button onclick="openUserModal({{ $value->id }})" type="button"
                                            class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal">
                                            <i class="bi bi-eye"></i>
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

    @include('pages.manage-user.modal')
@endsection

@push('js')
    <script>
        let table = new DataTable('#teamTable');
    </script>
@endpush
