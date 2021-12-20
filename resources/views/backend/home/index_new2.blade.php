@extends('layouts.backend_3.app')

@section('title')
    Beranda
@endsection

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="row gy-5 g-xl-8">
                <div class="col-xl-4">
                    <div class="card card-xl-stretch">
                        <div class="card-header align-items-center border-0 mt-4">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="fw-bolder mb-2 text-dark">Activities</span>
                                <span class="text-muted fw-bold fs-7">890,344 Sales</span>
                            </h3>
                        </div>
                        <div class="card-body pt-5">
                            <div class="timeline-label">
                                <div class="timeline-item">
                                    <div class="timeline-label fw-bolder text-gray-800 fs-6">08:42</div>
                                    <div class="timeline-badge">
                                        <i class="fa fa-genderless text-warning fs-1"></i>
                                    </div>
                                    <div class="fw-mormal timeline-content text-muted ps-3">Outlines keep you honest. And
                                        keep structure</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
