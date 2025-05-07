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
                    Manage Department & Sub-Departmen
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
                    <li class="breadcrumb-item text-muted">department</li>
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
                <li class="nav-item w-md-200px me-2 my-2">
                    <a class="nav-link active btn btn-flex btn-active-primary w-100 border border-2" data-bs-toggle="tab" href="#tab1">
                        <span class="fw-semibold">Department</span>
                    </a>
                </li>
                <li class="nav-item w-md-200px ms-2 my-2">
                    <a class="nav-link btn btn-flex btn-active-primary w-100 border border-2" data-bs-toggle="tab" href="#tab2">
                        <span class="fw-semibold">Sub Department</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                    <div class="card border">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>List Department</h4>
                            </div>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_dept_modal">
                                    <i class="ki-duotone ki-plus fs-2"></i>
                                    Add
                                </button>
                                <!--end::Button-->
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

                                <table id="dt_dept" class="table table-bordered align-middle table-row-dashed" style="width:100%">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th style="width: 50px;">#</th>
                                            <th>Departmen</th>
                                            <th style="width: 200px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th>#</th>
                                            <th>Departmen</th>
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
                                <h4>List Sub-Department</h4>
                            </div>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_subdept_modal">
                                    <i class="ki-duotone ki-plus fs-2"></i>
                                    Add
                                </button>
                                <!--end::Button-->
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
                                <table id="dt_subdept" class="table table-bordered align-middle table-row-dashed fs-6 gy-5"
                                    style="width:100%">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th>#</th>
                                            <th>Sub-Departmen</th>
                                            <th>Departmen</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th>#</th>
                                            <th>Sub-Departmen</th>
                                            <th>Departmen</th>
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

@section('modal')
    <!--begin::Modal - Add Department-->
    <div class="modal fade" id="add_dept_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="add_dept_modal_header">
                    <!--begin::Modal title-->
                    <h3 class="fw-bold">Add Departmen</h3>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body px-5">
                    <!--begin::Form-->
                    <form id="add_dept_modal_form" action="{{ route('admin.dept.store') }}" method="POST" class="form">
                        @csrf
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="add_dept_modal_scroll"
                            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#add_dept_modal_header"
                            data-kt-scroll-wrappers="#add_dept_modal_scroll" data-kt-scroll-offset="300px">
                            <div class="row">
                                <!--begin::Input group-->
                                <div class="col">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Nama Department</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="name" class="form-control mb-3 mb-lg-0"
                                        placeholder="masukkan nama department" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--begin::Actions-->
                            <div class="text-center pt-10">
                                <button type="reset" class="btn btn-light me-3"
                                    data-bs-dismiss="modal">Discard</button>
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Scroll-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Add Department-->
    <!--begin::Modal - Edit Department-->
    <div class="modal fade" id="edit_dept_modal" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="edit_dept_modal_header">
                    <!--begin::Modal title-->
                    <h3 class="fw-bold">Edit Departmen</h3>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body px-5">
                    <!--begin::Form-->
                    <form  action="{{route('admin.dept.update')}}" method="POST">
                        @csrf
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="edit_dept_modal_scroll"
                            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#edit_dept_modal_header"
                            data-kt-scroll-wrappers="#edit_dept_modal_scroll" data-kt-scroll-offset="300px">
                            <div class="row">
                                <!--begin::Input group-->
                                <div class="col">
                                    <input type="hidden" name="id_dept" id="id_dept" />
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Nama Departmen</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="name" id="name_edit" class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="masukkan nama departmen" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--begin::Actions-->
                            <div class="text-center pt-10">
                                <button type="reset" class="btn btn-light me-3"
                                    data-bs-dismiss="modal">Discard</button>
                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Scroll-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Edit User-->

    <!--begin::Modal - Add Department-->
    <div class="modal fade" id="add_subdept_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="add_subdept_modal_header">
                    <!--begin::Modal title-->
                    <h3 class="fw-bold">Add Sub Department</h3>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body px-5">
                    <!--begin::Form-->
                    <form id="add_subdept_modal_form" action="{{ route('admin.subdept.store') }}" method="POST" class="form">
                        @csrf
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="add_subdept_modal_scroll"
                            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#add_subdept_modal_header"
                            data-kt-scroll-wrappers="#add_subdept_modal_scroll" data-kt-scroll-offset="300px">
                            <div class="row row-cols-1">
                                <!--begin::Input group-->
                                <div class="col mb-5">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Nama SubDepartment</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="name" class="form-control mb-3 mb-lg-0"
                                        placeholder="masukkan nama department" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Departmen</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select name="id_department" class="form-select mb-3 mb-lg-0" data-control="select2"
                                        data-placeholder="Pilih Department" data-dropdown-parent="#add_subdept_modal" data-allow-clear="true">

                                    </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--begin::Actions-->
                            <div class="text-center pt-10">
                                <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Scroll-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Add Department-->
    <!--begin::Modal - Edit Sub Department-->
    <div class="modal fade" id="edit_subdept_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" id="edit_subdept_modal_header">
                    <h3 class="fw-bold">Edit Sub Departmen</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5">
                    <form id="edit_subdept_modal_form" action="{{ route('admin.subdept.update') }}" method="POST">
                        @csrf
                        <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="edit_subdept_modal_scroll"
                            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#edit_subdept_modal_header"
                            data-kt-scroll-wrappers="#edit_subdept_modal_scroll" data-kt-scroll-offset="300px">
                            <div class="row row-cols-1">
                                <div class="col">
                                    <input type="hidden" name="id_subdept" id="id_subdept" />
                                    <label class="required fw-semibold fs-6 mb-2">Nama Su-Departmen</label>
                                    <input type="text" name="name" id="name_edit_subdept"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="masukkan nama departmen" />
                                </div>
                                <div class="col">
                                    <label class="required fw-semibold fs-6 mb-2">Departmen</label>
                                    <select name="id_department" id="id_department_edit" class="form-select mb-3 mb-lg-0"
                                        data-control="select2" data-placeholder="Pilih Department" data-dropdown-parent="#edit_subdept_modal" data-allow-clear="true">
                                        <!-- Options will be populated via AJAX -->
                                    </select>
                                </div>
                            </div>
                            <div class="text-center pt-10">
                                <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal - Edit Sub Department-->

@endsection

@section('scripts')
    <script src="{{asset("/assets/plugins/custom/datatables/datatables.bundle.js")}}"></script>
    <script>
        const URL_DEPT = "{{ route('admin.dept.dt_dept') }}";
        const URL_SUBDEPT = "{{ route('admin.subdept.dt_subdept') }}";

        $(document).ready(function () {
            $('.page-loading').fadeIn();
            setTimeout(function () {
                $('.page-loading').fadeOut();
            }, 1000); // Adjust the timeout duration as needed

            let deptTable = $("#dt_dept").DataTable({
                processing: true,
                serverSide: true,
                order: [[1, 'desc']],
                ajax: {
                    url: URL_DEPT,
                },
                columns: [
                    { data: 0, orderable: true },
                    { data: "name" },
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
            let subdeptTable = $("#dt_subdept").DataTable({
                processing: true,
                serverSide: true,
                order: [[1, 'desc']],
                ajax: {
                    url: URL_SUBDEPT,
                },
                columns: [
                    { data: 0, orderable: true },
                    { data: "name" },
                    { data: "department" },
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
            $("#add_subdept_modal_form select[name='id_department']").select2({
                placeholder: "Pilih Department",
                ajax: {
                    url: "{{ route('admin.subdept.index') }}",
                    dataType: "json",
                    delay: 150,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page,
                        };
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: data.pagination.has_more,
                            },
                        };
                    },
                },
            });
            $("#edit_subdept_modal_form select[name='id_department']").select2({
                placeholder: "Pilih Department",
                ajax: {
                    url: "{{ route('admin.subdept.index') }}",
                    dataType: "json",
                    delay: 150,
                    data: function (params) {
                        return {
                            q: params.term,
                            page: params.page,
                        };
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: data.pagination.has_more,
                            },
                        };
                    },
                },
                minimumInputLength: 0
            });

            $('#search_dt').on('keyup', function () {
                deptTable.search(this.value).draw();
            });
            $('#search_dt_2').on('keyup', function () {
                subdeptTable.search(this.value).draw();
            });
        });
    </script>

    <script>
        function editDept(id) {
            $.ajax({
                url: "{{ route('admin.dept.edit') }}",
                type: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}",
                },
                success: function (response) {
                    $("#id_dept").val(response.data.id);
                    $("#name_edit").val(response.data.name);
                    $("#edit_dept_modal").modal("show");
                },
                error: function (xhr) {
                    Swal.fire("Error!", xhr.responseJSON.message, "error");
                },
            });
        }
        function deleteDept(id) {
            Swal.fire({
                text: "Are you sure you want to delete this department?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: "{{ route('admin.dept.destroy') }}",
                        type: "POST",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            $("#dt_dept").DataTable().ajax.reload(null, false);
                            Swal.fire("Deleted!", response.message, "success");
                        },
                        error: function (xhr) {
                            Swal.fire("Error!", xhr.responseJSON.message, "error");
                        },
                    });
                } else if (result.dismiss === "cancel") {
                    Swal.fire("Cancelled", "Your department is safe :)", "error");
                }
            });
        }

        function editSubDept(id) {
            $.ajax({
                url: "{{ route('admin.subdept.edit') }}",
                type: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}",
                },
                success: function (response) {
                    const data = response.data;

                    // Set nilai form
                    $("#id_subdept").val(data.id);
                    $("#name_edit_subdept").val(data.name);

                    // Tambahkan opsi department secara manual agar Select2 bisa menampilkannya
                    const departmentOption = new Option(data.department_name, data.id_department, true, true);
                    $("#id_department_edit").append(departmentOption).trigger('change');

                    // Tampilkan modal
                    $("#edit_subdept_modal").modal("show");
                },
                error: function (xhr) {
                    Swal.fire("Error!", xhr.responseJSON?.message || "Terjadi kesalahan", "error");
                },
            });
        }
        function deleteSubDept(id) {
            Swal.fire({
                text: "Are you sure you want to delete this sub department?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: "{{ route('admin.subdept.destroy') }}",
                        type: "POST",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            $("#dt_subdept").DataTable().ajax.reload(null, false);
                            Swal.fire("Deleted!", response.message, "success");
                        },
                        error: function (xhr) {
                            Swal.fire("Error!", xhr.responseJSON.message, "error");
                        },
                    });
                } else if (result.dismiss === "cancel") {
                    Swal.fire("Cancelled", "Your sub department is safe :)", "error");
                }
            });
        }
    </script>
@endsection
