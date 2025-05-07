@extends('layout.master')
@section('main-content')
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Create Syarat DP
                </h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Employee</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">syarat</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">dp</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4>Add New Data</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.syarat.dp.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-5">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Nama</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name" class="form-control mb-3 mb-lg-0"
                                    placeholder="masukkan nama syarat" />
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="separator my-5"></div>
                        <div>
                            <div class="row row-cols-1 row-cols-md-3">
                                <div class="col mb-5">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Syarat DP</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="syarat" class="form-control mb-3 mb-lg-0"
                                        placeholder="masukkan syarat" />
                                    <!--end::Input-->
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-md-3">
                                <div class="col mb-5">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Alert</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" step="any" name="alert"
                                        class="form-control mb-3 mb-lg-0" placeholder="masukkan batas suhu" />
                                    <!--end::Input-->
                                </div>
                                <div class="col mb-5">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Action</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" step="any" name="action"
                                        class="form-control mb-3 mb-lg-0" placeholder="masukkan batas suhu" />
                                    <!--end::Input-->
                                </div>
                            </div>
                        </div>
                        <div class="separator my-5"></div>
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('admin.syarat.index') }}">
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
@endsection
@section('scripts')

@endsection