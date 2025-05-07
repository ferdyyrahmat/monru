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
                    Edit Jenis Ruangan
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
                    <li class="breadcrumb-item text-muted">admin</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">jenis</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">ruangan</li>
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
        <div id="kt_app_content_container" class="app-container container-fluid d-flex flex-column flex-column-fluid">
            <form action="{{ route('admin.jenis.ruang.update', $jenisRuangan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"></div>
                        <div class="card-toolbar">
                            <a href="{{ route('admin.jenis.ruang.index') }}">
                                <button class="btn btn-secondary me-2">cancel</button>
                            </a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-content">
                            <div class="row">
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-5">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2" for="jenis_ruangan">
                                            <span class="required text-gray-700">Jenis Ruangan</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control" name="name" id="jenis_ruangan" placeholder="masukkan jenis ruangan" value="{{ $jenisRuangan->name }}">
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-5">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2" for="syarat">
                                            <span class="required text-gray-700">Syarat</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        <select name="id_syarat" id="syarat" class="form-select form-select">
                                            <option></option>
                                            @foreach ($syarat as $item)
                                                <option value="{{ $item->id }}" {{ $jenisRuangan->id_syarat == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
@endsection

@section('scripts')
    <script>
        $('#syarat').select2({
            placeholder: 'Pilih Syarat',
        });
    </script>
@endsection