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
                    Manage Ruangan/Alat
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
                    <li class="breadcrumb-item text-muted">ruangan/alat</li>
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
            <div class="card">
                <div class="card-header">
                    <div class="card-title">asd</div>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.ruang.create') }}">
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
                        <table id="dt_ruangan" class="table table-bordered align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th style="width: 50px;">#</th>
                                    <th>Department</th>
                                    <th>Sub-Department</th>
                                    <th>Nama Ruangan</th>
                                    <th>Room No</th>
                                    <th>Manual/EMS</th>
                                    <th>Jenis Ruangan</th>
                                    <th>No. Alat</th>
                                    <th>Jenis DP</th>
                                    <th>Action</th>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th>#</th>
                                    <th>Department</th>
                                    <th>Sub-Department</th>
                                    <th>Nama Ruangan</th>
                                    <th>Room No</th>
                                    <th>Manual/EMS</th>
                                    <th>Jenis Ruangan</th>
                                    <th>No. Alat</th>
                                    <th>Jenis DP</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
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
        const _URL = "{{ route('admin.ruang.index') }}";

        $(document).ready(function () {
            $('.page-loading').fadeIn();
            setTimeout(function () {
                $('.page-loading').fadeOut();
            }, 1000); // Adjust the timeout duration as needed

            let deptTable = $("#dt_ruangan").DataTable({
                processing: true,
                serverSide: true,
                order: [[1, 'desc']],
                ajax: {
                    url: _URL,
                },
                columns: [
                    { data: 0, orderable: true },
                    { data: "department" },
                    { data: "id_sub_department" },
                    { data: "area_name" },
                    { data: "room_no" },
                    { data: "manual_ems" },
                    { data: "id_jenis_ruangan" },
                    { data: "no_alat" },
                    { data: "id_dp" },
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

            $('#dt_ruangan').on('keyup', function () {
                deptTable.search(this.value).draw();
            });
        });
    </script>
    <script>
        function deleteRuang(id) {
            Swal.fire({
                text: "Are you sure you want to delete this Area?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: "{{ route('admin.ruang.destroy') }}",
                        type: "POST",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            $("#dt_ruangan").DataTable().ajax.reload(null, false);
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
