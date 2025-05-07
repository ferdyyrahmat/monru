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
                    Manage Syarat
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
            {{-- begin Syarat Ruangan --}}
            <div class="card border">
                <div class="card-header">
                    <div class="card-title">
                        <h4>List Syarat Jenis Ruangan</h4>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.syarat.ruang.crate') }}">
                            <button class="btn btn-primary">
                                <i class="ki-duotone ki-plus fs-2"></i>
                                Add
                            </button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-content">
                        <div class="d-flex align-items-center position-relative my-5">
                            <span class="svg-icon position-absolute ms-4">
                                <i class="ki-duotone ki-magnifier fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <input type="text" id="search_dt" class="form-control border border-2 w-250px ps-14"
                                placeholder="Search Report" />
                        </div>
                        <table id="dt_syaratRuang" class="table table-bordered align-middle table-row-dashed fs-6 gy-5" style="width:100%">
                            <thead class="border border-2">
                                <tr class="text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th rowspan="3" style="align-content: center; text-align: center;">#</th>
                                    <th rowspan="3" style="align-content: center; text-align: center;">Name</th>
                                    <th colspan="5" style="align-content: center; text-align: center;">Suhu (degC)</th>
                                    <th colspan="5" style="align-content: center; text-align: center;">RH (%)</th>
                                    <th rowspan="3" style="align-content: center; text-align: center;">Action</th>
                                </tr>
                                <tr class="text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th rowspan="2" style="align-content: center; text-align: center;">Syarat</th>
                                    <th colspan="2" style="align-content: center; text-align: center;">Batas Bawah</th>
                                    <th colspan="2" style="align-content: center; text-align: center;">Batas Atas</th>
                                    <th rowspan="2" style="align-content: center; text-align: center;">Syarat</th>
                                    <th colspan="2" style="align-content: center; text-align: center;">Batas Bawah</th>
                                    <th colspan="2" style="align-content: center; text-align: center;">Batas Atas</th>
                                </tr>
                                <tr class="text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th style="align-content: center; text-align: center;">Alert Limit</th>
                                    <th style="align-content: center; text-align: center;">Action Limit</th>
                                    <th style="align-content: center; text-align: center;">Alert Limit</th>
                                    <th style="align-content: center; text-align: center;">Action Limit</th>
                                    <th style="align-content: center; text-align: center;">Alert Limit</th>
                                    <th style="align-content: center; text-align: center;">Action Limit</th>
                                    <th style="align-content: center; text-align: center;">Alert Limit</th>
                                    <th style="align-content: center; text-align: center;">Action Limit</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- end Syarat Ruangan --}}
            <div class="my-5"></div>
            {{-- begin Syarat Dp --}}
            <div class="card border">
                <div class="card-header">
                    <div class="card-title">
                        <h4>List Syarat Jenis Dp</h4>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.syarat.dp.crate') }}">
                            <button class="btn btn-primary">
                                <i class="ki-duotone ki-plus fs-2"></i>
                                Add
                            </button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-content">
                        <div class="d-flex align-items-center position-relative my-5">
                            <span class="svg-icon position-absolute ms-4">
                                <i class="ki-duotone ki-magnifier fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <input type="text" id="search_dt_2" class="form-control border border-2 w-250px ps-14"
                                placeholder="Search Report" />
                        </div>
                        <table id="dt_syaratDp" class="table table-bordered align-middle table-row-dashed fs-6 gy-5" style="width:100%">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th>#</th>
                                    <th>Ruangan</th>
                                    <th>Syarat</th>
                                    <th>Alert</th>
                                    <th>Action</th>
                                    <th style="width: 15%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th>#</th>
                                    <th>Ruangan</th>
                                    <th>Syarat</th>
                                    <th>Alert</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            {{-- end Syarat Dp --}}
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
@endsection
@section('scripts')
    <script src="{{asset("/assets/plugins/custom/datatables/datatables.bundle.js")}}"></script>
    <script>
        const URL_SYARAT_RUANG = "{{ route('admin.syarat.ruang.index') }}";
        const URL_SYARAT_DP = "{{ route('admin.syarat.dp.index') }}";

        $(document).ready(function () {
            $('.page-loading').fadeIn();
            setTimeout(function () {
                $('.page-loading').fadeOut();
            }, 1000); // Adjust the timeout duration as needed

            let dt_syaratRuang = $("#dt_syaratRuang").DataTable({
                processing: true,
                serverSide: true,
                order: [[1, 'desc']],
                ajax: {
                    url: URL_SYARAT_RUANG,
                },
                columns: [
                    { data: 0, orderable: true },
                    { data: "name" },
                    { data: "syarat_suhu" },
                    { data: "batas_bawah_suhu_alert" },
                    { data: "batas_bawah_suhu_action" },
                    { data: "batas_atas_suhu_alert" },
                    { data: "batas_atas_suhu_action" },
                    { data: "syarat_rh" },
                    { data: "batas_bawah_rh_alert" },
                    { data: "batas_bawah_rh_action" },
                    { data: "batas_atas_rh_alert" },
                    { data: "batas_atas_rh_action" },
                    {
                        data: "action",
                        orderable: false,
                        searchable: false,
                    },
                ],
                columnDefs: [
                    {
                        targets: 0,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1; // Calculate the row index
                        },
                    },
                ],
            });
            let dt_syaratDp = $("#dt_syaratDp").DataTable({
                processing: true,
                serverSide: true,
                order: [[1, 'desc']],
                ajax: {
                    url: URL_SYARAT_DP,
                },
                columns: [
                    { data: 0, orderable: true },
                    { data: "name" },
                    { data: "syarat" },
                    { data: "alert" },
                    { data: "action" },
                    {
                        data: "btn_action",
                        orderable: false,
                        searchable: false,
                    },
                ],
                columnDefs: [
                    {
                        targets: 0,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1; // Calculate the row index
                        },
                    },
                ],
            });


            $('#search_dt').on('keyup', function () {
                dt_syaratRuang.search(this.value).draw();
            });
            $('#search_dt_2').on('keyup', function () {
                dt_syaratDp.search(this.value).draw();
            });
        });
    </script>
    <script>
        function deleteSJR(id) {
            Swal.fire({
                text: "Are you sure you want to delete this Syarat Ruangan?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: "{{ route('admin.syarat.ruang.destroy') }}",
                        type: "POST",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            $("#dt_syaratRuang").DataTable().ajax.reload(null, false);
                            Swal.fire("Deleted!", response.message, "success");
                        },
                        error: function (xhr) {
                            Swal.fire("Error!", xhr.responseJSON.message, "error");
                        },
                    });
                } else if (result.dismiss === "cancel") {
                    Swal.fire("Cancelled", "Your data is safe :)", "error");
                }
            });
        }

        function deleteSJD(id) {
            Swal.fire({
                text: "Are you sure you want to delete this Syarat DP?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: "{{ route('admin.syarat.dp.destroy') }}",
                        type: "POST",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            $("#dt_syaratDp").DataTable().ajax.reload(null, false);
                            Swal.fire("Deleted!", response.message, "success");
                        },
                        error: function (xhr) {
                            Swal.fire("Error!", xhr.responseJSON.message, "error");
                        },
                    });
                } else if (result.dismiss === "cancel") {
                    Swal.fire("Cancelled", "Your data is safe :)", "error");
                }
            });
        }

    </script>
@endsection