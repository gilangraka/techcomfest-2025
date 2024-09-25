@extends('layouts.dashboard.layout')

@section('title')
    Kelola Team
@endsection

@section('content')
    @if ($data['team'] == null)
        @include('pages.team.team-empty')
    @else
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="p-2 profile-card bg-white border rounded-3">
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#team-overview">Overview</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#team-pengumpulan">Pengumpulan
                                Karya</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2 p-4">
                        <div class="tab-pane fade show active team-overview" id="team-overview">
                            @include('pages.team.overview')
                        </div>
                        <div class="tab-pane fade show team-overview" id="team-pengumpulan">
                            @include('pages.team.pengumpulan')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
