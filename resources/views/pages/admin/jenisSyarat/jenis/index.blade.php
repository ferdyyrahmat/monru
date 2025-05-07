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
                    Manage Jenis Ruangan & DP
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
            <ul class="nav nav-tabs nav-pills border-0 me-5 mb-3 mb-md-0 fs-6 mt-4">
                <li class="nav-item me-2 my-2">
                    <a class="nav-link active btn btn-flex btn-active-primary w-100 border border-2" data-bs-toggle="tab"
                        href="#tab1">
                        <span class="fw-semibold">Jenis Ruangan</span>
                    </a>
                </li>
                <li class="nav-item ms-2 my-2">
                    <a class="nav-link btn btn-flex btn-active-primary w-100 border border-2" data-bs-toggle="tab"
                        href="#tab2">
                        <span class="fw-semibold">Jenis Dp</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                    <div class="card border">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>List Jenis Ruangan</h4>
                            </div>
                            <div class="card-toolbar">
                                <a href="{{ route('admin.jenis.ruang.crate') }}">
                                    <!--begin::Button-->
                                    <button class="btn btn-primary">
                                        <i class="ki-duotone ki-plus fs-2"></i>
                                        Add
                                    </button>
                                    <!--end::Button-->
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                <table id="dt_jenisRuangan" class="table table-bordered align-middle table-row-dashed fs-6 gy-5"
                                    style="width:100%">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th style="width: 50px;">#</th>
                                            <th>Jenis Ruangan</th>
                                            <th>Syarat</th>
                                            <th style="width: 200px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th>#</th>
                                            <th>Jenis Ruangan</th>
                                            <th>Syarat</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab2" role="tabpanel">
                    <div class="card border">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>List Jenis Dp</h4>
                            </div>
                            <div class="card-toolbar">
                                <a href="{{ route('admin.jenis.dp.crate') }}">
                                    <!--begin::Button-->
                                    <button class="btn btn-primary">
                                        <i class="ki-duotone ki-plus fs-2"></i>
                                        Add
                                    </button>
                                    <!--end::Button-->
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                <table id="dt_jenisDp" class="table table-bordered align-middle table-row-dashed fs-6 gy-5"
                                    style="width:100%">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th style="width: 50px;">#</th>
                                            <th>Jenis Dp</th>
                                            <th>Syarat</th>
                                            <th style="width: 200px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th>#</th>
                                            <th>Jenis Dp</th>
                                            <th>Syarat</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
@endsection

@section('scripts')
    <script src="{{asset("/assets/plugins/custom/datatables/datatables.bundle.js")}}"></script>
    <script>
        const URL_JENISRUANGAN = "{{ route('admin.jenis.ruang.index') }}";
        const URL_JENISDP = "{{ route('admin.jenis.dp.index') }}";
        // const URL_SUBDEPT = "{{ route('admin.subdept.dt_subdept') }}";

        $(document).ready(function () {
            $('.page-loading').fadeIn();
            setTimeout(function () {
                $('.page-loading').fadeOut();
            }, 1000); // Adjust the timeout duration as needed

            let dt_jenisRuangan = $("#dt_jenisRuangan").DataTable({
                processing: true,
                serverSide: true,
                order: [[1, 'desc']],
                ajax: {
                    url: URL_JENISRUANGAN,
                },
                columns: [
                    { data: 0, orderable: true },
                    { data: "name" },
                    { data: "syarat" },
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

            let dt_jenisDp = $("#dt_jenisDp").DataTable({
                processing: true,
                serverSide: true,
                order: [[1, 'desc']],
                ajax: {
                    url: URL_JENISDP,
                },
                columns: [
                    { data: 0, orderable: true },
                    { data: "name" },
                    { data: "syarat" },
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
        });
    </script>
    <script>
        function deleteJR(id) {
            Swal.fire({
                text: "Are you sure you want to delete this jenisRuangan?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: "{{ route('admin.jenis.ruang.destroy') }}",
                        type: "POST",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            $("#dt_jenisRuangan").DataTable().ajax.reload(null, false);
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
        
        function deleteJDP(id) {
            Swal.fire({
                text: "Are you sure you want to delete this Dp?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: "{{ route('admin.jenis.dp.destroy') }}",
                        type: "POST",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            $("#dt_jenisDp").DataTable().ajax.reload(null, false);
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