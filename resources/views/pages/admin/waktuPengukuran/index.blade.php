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
                    Manage Waktu Pengukuran
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
                    <li class="breadcrumb-item text-muted">waktuPengukuran</li>
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
                        <h4>List Waktu Pengukuran</h4>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_waktu_modal">
                            <i class="ki-duotone ki-plus fs-2"></i>
                            Add
                        </button>
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
                        <table id="dt_waktu" class="table table-bordered align-middle table-row-dashed fs-6 gy-5"
                            style="width:100%">
                            <thead>
                                <tr class="text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th>#</th>
                                    <th>Shift</th>
                                    <th>Start Jam</th>
                                    <th>End Jam</th>
                                    <th style="width: 15%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr class="text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th>#</th>
                                    <th>Shift</th>
                                    <th>Start Jam</th>
                                    <th>End Jam</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            {{-- end Syarat Ruangan --}}
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
@endsection

@section('modal')
    <!--begin::Modal - Add Department-->
    <div class="modal fade" id="add_waktu_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="add_waktu_modal_header">
                    <!--begin::Modal title-->
                    <h3 class="fw-bold">Add Waktu Pengukuran</h3>
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
                    <form id="add_waktu_modal_form" action="{{ route('admin.waktu.store') }}" method="POST" class="form">
                        @csrf
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="add_waktu_modal_scroll"
                            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#add_waktu_modal_header"
                            data-kt-scroll-wrappers="#add_waktu_modal_scroll" data-kt-scroll-offset="300px">
                            <div class="row row-cols-1">
                                <!--begin::Input group-->
                                <div class="col mb-5">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Shift</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select name="shift" class="form-select mb-3 mb-lg-0" data-control="select2" data-placeholder="Pilih Shift"
                                        data-dropdown-parent="#add_waktu_modal" data-allow-clear="true">
                                        <option></option>
                                        <option value="1">Shift 1</option>
                                        <option value="2">Shift 2</option>
                                        <option value="3">Shift 3</option>
                                    </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col mb-5">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Jam Start</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="start_time" id="start_time" class="form-control mb-3 mb-lg-0"
                                        placeholder="00:00" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col mb-5">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Jam End</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="end_time" id="end_time" class="form-control mb-3 mb-lg-0"
                                        placeholder="00:00" />
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

    <!--begin::Modal - Edit Department-->
    <div class="modal fade" id="edit_waktu_modal" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="edit_waktu_modal_header">
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
                    <form action="{{route('admin.waktu.update')}}" method="POST">
                        @csrf
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="edit_waktu_modal_scroll"
                            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#edit_waktu_modal_header"
                            data-kt-scroll-wrappers="#edit_waktu_modal_scroll" data-kt-scroll-offset="300px">
                            <div class="row row-cols-1">
                                <input type="hidden" name="id_waktu" id="id_waktu">
                                <!--begin::Input group-->
                                <div class="col mb-5">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Shift</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select name="shift" id="edit_shift" class="form-select mb-3 mb-lg-0" data-control="select2" data-placeholder="Pilih Shift"
                                        data-dropdown-parent="#edit_waktu_modal" data-allow-clear="true">
                                        <option></option>
                                        <option value="1">Shift 1</option>
                                        <option value="2">Shift 2</option>
                                        <option value="3">Shift 3</option>
                                    </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col mb-5">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Jam Start</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="start_time" id="edit_start_time" class="form-control mb-3 mb-lg-0" placeholder="00:00" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col mb-5">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Jam End</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="end_time" id="edit_end_time" class="form-control mb-3 mb-lg-0" placeholder="00:00" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--begin::Actions-->
                            <div class="text-center pt-10">
                                <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                    <span class="indicator-label">Update</span>
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

@endsection

@section('scripts')
    <script src="{{asset("/assets/plugins/custom/datatables/datatables.bundle.js")}}"></script>
    <script>
        const URL_WAKTU = "{{ route('admin.waktu.index') }}";

        $(document).ready(function () {
            $('.page-loading').fadeIn();
            setTimeout(function () {
                $('.page-loading').fadeOut();
            }, 1000); // Adjust the timeout duration as needed

            let dt_waktu = $("#dt_waktu").DataTable({
                processing: true,
                serverSide: true,
                order: [[1, 'desc']],
                ajax: {
                    url: URL_WAKTU,
                },
                columns: [
                    { data: 0, orderable: true },
                    { data: "shift" },
                    { data: "start_time" },
                    { data: "end_time" },
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

            $("#start_time").flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
            });
            $("#end_time").flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
            });

            $('#search_dt').on('keyup', function () {
                dt_waktu.search(this.value).draw();
            });
        });
    </script>
    <script>
        function editWaktu(id) {
            $.ajax({
                url: "{{ route('admin.waktu.edit') }}",
                type: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}",
                },
                success: function (response) {
                    
                    $("#id_waktu").val(response.data.id);
                    $('#edit_shift').val(response.data.shift).trigger('change');
                    // Set the start_time and end_time inputs
                    $('#edit_start_time').flatpickr({
                        enableTime: true,
                        noCalendar: true,
                        dateFormat: "H:i",
                        defaultDate: response.data.start_time,
                    });
                    $('#edit_end_time').flatpickr({
                        enableTime: true,
                        noCalendar: true,
                        dateFormat: "H:i",
                        defaultDate: response.data.end_time,
                    });
                    // Show the edit modal
                    $('#edit_waktu_modal').modal('show');
                },
                error: function (xhr) {
                    Swal.fire("Error!", xhr.responseJSON.message, "error");
                },
            });
        }

        function deleteWaktu(id) {
            Swal.fire({
                text: "Are you sure you want to delete this Waktu Pengukuran?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: "{{ route('admin.waktu.destroy') }}",
                        type: "POST",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            $("#dt_waktu").DataTable().ajax.reload(null, false);
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