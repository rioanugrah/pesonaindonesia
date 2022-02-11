@extends('layouts.backend_2.app')

@section('title')
    Beranda
@endsection

@section('content')
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">Dashboard</h6>
        </div>
        <div class="col-md-4">
            <div class="float-end d-none d-md-block">
                <div class="dropdown">
                    <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-cog me-2"></i> Settings
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-4 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <img src="assets/images/services-icon/01.png" alt="">
                    </div>
                    <h5 class="font-size-16 text-uppercase text-white-50">Balance</h5>
                    <h4 class="fw-medium font-size-24">Rp. {{ number_format($balances['balance'],0,',','.') }} <i
                            class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                    <div class="mini-stat-label bg-success">
                        <p class="mb-0">+ 12%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <img src="assets/images/services-icon/01.png" alt="">
                    </div>
                    <h5 class="font-size-16 text-uppercase text-white-50">Wisata</h5>
                    <h4 class="fw-medium font-size-24">{{ $wisata }}<i
                            class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                    <div class="mini-stat-label bg-success">
                        <p class="mb-0">+ 12%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <img src="assets/images/services-icon/01.png" alt="">
                    </div>
                    <h5 class="font-size-16 text-uppercase text-white-50">Hotel</h5>
                    <h4 class="fw-medium font-size-24">{{ $hotel }}<i
                            class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                    <div class="mini-stat-label bg-success">
                        <p class="mb-0">+ 12%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection