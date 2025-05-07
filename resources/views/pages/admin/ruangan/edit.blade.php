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
                    Edit Ruangan
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
                    <li class="breadcrumb-item text-muted">ruangan</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">edit</li>
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
            <form action="{{ route('admin.ruang.update', $ruangan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h4>Edit Detail Area</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-content">
                            <div class="row">
                                <div class="col">
                                    <div class="col">
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-5">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2" for="area_name">
                                                <span class="required text-gray-700">Area Name</span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control" name="area_name" id="area_name" placeholder="masukkan nama area" value="{{ $ruangan->area_name}}">
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-lg-3">
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-5">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2" for="room_no">
                                            <span class="required text-gray-700">Room No</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="number" class="form-control" name="room_no" id="room_no" placeholder="masukkan no. ruangan" value="{{ $ruangan->room_no}}">
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-5">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2" for="no_alat">
                                            <span class="required text-gray-700">No. Alat</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control" name="no_alat" id="no_alat" placeholder="masukkan no. alat" value="{{ $ruangan->no_alat}}">
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-5">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2" for="manual_ems">
                                            <span class="required text-gray-700">Manual/EMS</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        <select name="manual_ems" id="manual_ems" class="form-select form-select">
                                            <option></option>
                                            <option value="manual" {{ $ruangan->manual_ems === 'manual' ? 'selected' : '' }}>Manual</option>
                                            <option value="ems" {{ $ruangan->manual_ems === 'ems' ? 'selected' : '' }}>EMS</option>
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-5">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2" for="sub_dept">
                                            <span class="required text-gray-700">Department</span>
                                        </label>
                                        <!--end::Label-->
                                        <select name="id_sub_department" id="sub_dept" class="form-select form-select">
                                            <option></option>
                                            @foreach ($department as $item)
                                                <option value="{{ $item->id }}" {{ $ruangan->id_sub_department === $item->id ? 'selected' : '' }}>{{ $item->name }} - {{ $item->departments->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-5">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2" for="jenis_ruangan">
                                            <span class="required text-gray-700">Jenis Ruangan</span>
                                        </label>
                                        <!--end::Label-->
                                        <select name="id_jenis_ruangan" id="jenis_ruangan" class="form-select form-select">
                                            <option></option>
                                            @foreach ($jenisRuang as $item)
                                                <option value="{{ $item->id }}" {{ $ruangan->id_jenis_ruangan === $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-5">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2" for="id_dp">
                                            <span class="required text-gray-700">Jenis DP</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        <select name="id_dp" id="id_dp" class="form-select form-select">
                                            <option></option>
                                            @foreach ($jenisDP as $item)
                                                <option value="{{ $item->id }}" {{ $ruangan->id_dp === $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                            <div class="row mt-10 mb-5">
                                <div class="col d-flex justify-content-end">
                                    <a href="{{ route('admin.ruang.index') }}">
                                        <button class="btn btn-secondary me-2">cancel</button>
                                    </a>
                                    <button type="submit" class="btn btn-success">Update</button>
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
        $('#manual_ems').select2({
            placeholder: 'Manual/EMS',
        });
        $('#sub_dept').select2({
            placeholder: 'Pilih Department',
        });
        $('#jenis_ruangan').select2({
            placeholder: 'Pilih Jenis Ruangan',
        });
        $('#id_dp').select2({
            placeholder: 'Pilih DP',
        });
    </script>
@endsection