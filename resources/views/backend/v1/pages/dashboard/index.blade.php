@extends('backend.v1.templates.index')

@section('content')

<div class="row mb-3">
<div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
        <div class="card-body">
            <div class="row align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">PROGRAM</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                <span><h2>{{ $programs }}</</h2></span>
                </div>
            </div>
            <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-primary"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">KEGIATAN</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
                <span><h2>{{ $kegiatans }}</h2></span>
                </div>
            </div>
            <div class="col-auto">
                <i class="fas fa-shopping-cart fa-2x text-success"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- New User Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">USER</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
                <span><h2>{{ $users }}</</h2></span>
                </div>
            </div>
            <div class="col-auto">
                <i class="fas fa-users fa-2x text-info"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">REALISASI</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
                <span><h2>{{ $realisasis }}</h2></span>
                </div>
            </div>
            <div class="col-auto">
                <i class="fas fa-comments fa-2x text-warning"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection