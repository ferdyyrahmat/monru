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
                    Monitoring Ruangan (Outstanding)
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
                    <li class="breadcrumb-item text-muted">Monitoring</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Ruangan</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Outstanding</li>
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
            <div class="row g-5">
                <div class="col">
                    <div class="card card-stretch">
                        <div class="card-header">
                            <div class="row row-cols-1 row-cols-md-2 my-5 w-100">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            Shift
                                            <!--begin::Input-->
                                            <select name="f_shift" id="f_shift" class="form-select mb-3 mb-lg-0" data-control="select2">
                                                @foreach ($shift as $item)
                                                    <option value="{{ $item->id }}">Shift {{ $item->shift }} ( {{ $item->start_time }} - {{ $item->end_time }} )</option>
                                                @endforeach
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <div class="col">
                                            Bulan:
                                            <!--begin::Input-->
                                            <select name="f_month" id="f_month" class="form-select mb-3 mb-lg-0" data-control="select2">
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Maret</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            Tahun:
                                            <!--begin::Input-->
                                            <select name="f_year" id="f_year" class="form-select mb-3 mb-lg-0" data-control="select2">

                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <div class="col">
                                            Nama Ruangan:
                                            <!--begin::Input-->
                                            <select name="id_ruang" id="id_ruang" class="form-select mb-3 mb-lg-0" data-control="select2"
                                                data-placeholder="Pilih Ruangan">
                                                @foreach ($ruangan as $item)
                                                    <option value="{{ $item->id }}">{{ $item->area_name }}</option>
                                                @endforeach
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body card-scroll">
                            <table id="dt_outstanding" class="table table-bordered table-striped align-middle gy-7">
                                <thead>
                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                        <td>#</td>
                                        <td>Tanggal</td>
                                        {{-- <td>Shift</td>
                                        <td>Jam</td> --}}
                                        <td>Ruangan</td>
                                        <td>Suhu (degC)</td>
                                        <td>Suhu Min (degC)</td>
                                        <td>Suhu Max (degC)</td>
                                        <td>RH (%)</td>
                                        <td>DP (Pa)</td>
                                        <td>Pelaksana</td>
                                        <td>Verifikator</td>
                                        <td>Status</td>
                                        {{-- <td>Alasan</td> --}}
                                        <td style="width: 10%">Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                {{-- <tfoot>
                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-2">
                                        <td>#</td>
                                        <td>Tanggal</td>
                                        <td>Shift</td>
                                        <td>Jam</td>
                                        <td>Ruangan</td>
                                        <td>Suhu (degC)</td>
                                        <td>Suhu Min (degC)</td>
                                        <td>Suhu Max (degC)</td>
                                        <td>RH (%)</td>
                                        <td>DP (Pa)</td>
                                        <td>Pelaksana</td>
                                        <td>Verifikator</td>
                                        <td>Alasan</td>
                                        <td >Action</td>
                                    </tr>
                                </tfoot> --}}
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="row row-cols-1 row-cols-md-4">
                                <div class="col mb-2">
                                    <label>No. Ruangan:</label>
                                    <!--begin::Input-->
                                    <input type="text" class="form-control" readonly id="no_ruang">
                                    <!--end::Input-->
                                </div>
                                <div class="col mb-2">
                                    <label>Jenis Ruangan:</label>
                                    <!--begin::Input-->
                                    <input type="text" class="form-control" readonly id="jenis_ruang">
                                    <!--end::Input-->
                                </div>
                                <div class="col mb-2">
                                    <label>DP:</label>
                                    <!--begin::Input-->
                                    <input type="text" class="form-control" readonly id="dp">
                                    <!--end::Input-->
                                </div>
                                <div class="col mb-2">
                                    <label>No. Alat:</label>
                                    <!--begin::Input-->
                                    <input type="text" class="form-control" readonly id="no_alat">
                                    <!--end::Input-->
                                </div>
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
    <!--begin::Modal-->
    <div class="modal fade" id="view_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="view_modal_header">
                    <!--begin::Modal title-->
                    <h3 class="fw-bold">Detail</h3>
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
                <!--begin::Form-->
                {{-- <form id="view_modal_form" action="" method="POST" class="form"> --}}
                    <div class="modal-body px-5">
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="view_modal_scroll" data-kt-scroll="true"
                            data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#view_modal_header" data-kt-scroll-wrappers="#view_modal_scroll"
                            data-kt-scroll-offset="300px">
                            <div class="row mb-2">
                                <input type="hidden" id="id_detail">
                                <!--begin::Input group-->
                                <div class="col mb-2">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6">Tanggal</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="tgl" id="tgl" class="form-control mb-3 mb-lg-0"
                                        placeholder="masukkan nama department" readonly />
                                    <!--end::Input-->
                                </div>
                                <!--begin::Input group-->
                                <div class="col mb-2">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6">Shift</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="shift" id="shift" class="form-control mb-3 mb-lg-0"
                                        placeholder="masukkan nama department" readonly />
                                    <!--end::Input-->
                                </div>
                            </div>
                            <div class="row row-cols-1 mb-2">
                                <!--begin::Input group-->
                                <div class="col mb-2">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6">Ruagan</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="ruang" id="ruang" class="form-control mb-3 mb-lg-0"
                                        placeholder="masukkan nama department" readonly />
                                    <!--end::Input-->
                                </div>
                                <div class="separator my-5"></div>
                                <!--begin::Input group-->
                                <div class="col mb-2">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6">Suhu</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="suhu" id="suhu" class="form-control mb-3 mb-lg-0"
                                        placeholder="masukkan nama department" readonly />
                                    <!--end::Input-->
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-md-2">
                                <!--begin::Input group-->
                                <div class="col mb-2">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6">Suhu Min</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="suhu_min" id="suhu_min" class="form-control mb-3 mb-lg-0"
                                        placeholder="masukkan nama department" readonly />
                                    <!--end::Input-->
                                </div>
                                <!--begin::Input group-->
                                <div class="col mb-2">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6">Suhu Max</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="suhu_max" id="suhu_max" class="form-control mb-3 mb-lg-0"
                                        placeholder="masukkan nama department" readonly />
                                    <!--end::Input-->
                                </div>
                                <!--begin::Input group-->
                                <div class="col mb-2">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6">DP</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="dp" id="dp_pa" class="form-control mb-3 mb-lg-0"
                                        placeholder="masukkan nama department" readonly />
                                    <!--end::Input-->
                                </div>
                                <!--begin::Input group-->
                                <div class="col mb-2">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6">RH</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="rh" id="rh" class="form-control mb-3 mb-lg-0"
                                        placeholder="masukkan nama department" readonly />
                                    <!--end::Input-->
                                </div>
                            </div>
                            <div class="row row-cols-1">
                                <!--begin::Input group-->
                                <div class="col mb-2">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6">Alasan</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <textarea name="alasan" id="alasan" class="form-control" readonly></textarea>
                                    <!--end::Input-->
                                </div>
                                <div class="separator my-5"></div>
                                <!--begin::Input group-->
                                <div class="col mb-2">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6 mb-2">Pelaksana</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="pelaksana" id="pelaksana" class="form-control mb-3 mb-lg-0"
                                        placeholder="masukkan nama department" readonly />
                                    <!--end::Input-->
                                </div>
                                <!--begin::Input group-->
                                <div class="col mb-2">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6 mb-2">Verifikator</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="verifikator" id="verifikator" class="form-control mb-3 mb-lg-0"
                                        placeholder="masukkan nama department" readonly />
                                    <!--end::Input-->
                                </div>
                            </div>
                            {{-- <!--begin::Actions-->
                            <div class="text-center pt-10">
                                <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                            <!--end::Actions--> --}}
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer" id="modal_footer">
                    </div>
                    <!--end::Modal footer-->
                    {{--
                </form> --}}
                <!--end::Form-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal-->

    <div class="modal fade" id="modal_verifikasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="modal_verifikasi_header">
                    <!--begin::Modal title-->
                    <h4 class="fw-bold">Verifikasi</h4>
                    <!--end::Modal title-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body px-5">
                    <form>
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="modal_verifikasi_scroll"
                            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#modal_verifikasi_header"
                            data-kt-scroll-wrappers="#modal_verifikasi_scroll" data-kt-scroll-offset="300px">
                            <div class="row">
                                <!--begin::Input group-->
                                <div class="col">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Email Verifikator</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="email_verifikator" id="email_verifikator"
                                        class="form-control mb-3 mb-lg-0" placeholder="Email OneKalbe" />
                                    <!--begin::Input group-->
                                    <div class="col my-2">
                                        <!--begin::Label-->
                                        <label class="required fw-semibold fs-6 mb-2">password</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="password" name="password_verifikator" id="password_verifikator"
                                            class="form-control mb-3 mb-lg-0" placeholder="password" autocomplete />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--begin::Actions-->
                                <div class="text-center pt-10">
                                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                                    <button type="button" class="btn btn-primary" onclick="checkUser()">
                                        <span class="indicator-label">Verifikasi</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Scroll-->
                    </form>
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
@endsection

@section('scripts')
    <script src="{{asset("/assets/plugins/custom/datatables/datatables.bundle.js")}}"></script>
    <script>
        const id = window.location.pathname.split('/')[5];
        const URL = "{{ route('v1.monitoring.outstanding.getTableData') }}";
        let shift;
        let month;
        let year;
        let ruang;

        (function () {
            const select = document.getElementById('f_year');
            const currentYear = new Date().getFullYear();
            const startYear = currentYear - 10;
            const endYear = currentYear + 2;
            for (let year = startYear; year <= endYear; year++) {
                const option = document.createElement('option');
                option.value = year;
                option.textContent = year;
                if (year === currentYear) {
                    option.selected = true;
                }
                select.appendChild(option);
            }
        })();

        function _init()
        {
            const URL = "{{ route('v1.monitoring.outstanding.show', ':id') }}";
            month = $('#f_month').val();
            year = $('#f_year').val();
            ruang = $('#id_ruang').val();
            shift = $('#f_shift').val();

            $.ajax({
                url: URL.replace(':id', id),
                method: "GET",
                data: {
                    f_month: month,
                    f_year: year,
                    ruang: ruang
                },
                success: function (response) {
                    $('#no_ruang').val(response.data.room_no || '');
                    $('#jenis_ruang').val(response.data.jenis_ruangan.name || '');
                    $('#dp').val(response.data.jenis_dp.name || '');
                    $('#no_alat').val(response.data.no_alat || '');
                    dt_outstanding.ajax.reload();
                }
            });
        }

        $('#f_shift, #f_month, #f_year, #id_ruang').on('change', _init);
        _init();


       var dt_outstanding = $("#dt_outstanding").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('v1.monitoring.outstanding.getTableData') }}",
                data: function (d) {
                    d.f_shift = shift;
                    d.f_month = month;
                    d.f_year = year;
                    d.ruang = ruang;
                },
            },
            columns: [
                { data: 0, orderable: true }, // For row numbering
                { data: "tgl_pemeriksaan" },
               // { data: "shift_pemeriksaan" },
               // { data: "jam_pemeriksaan" },
               { data: "id_ruangan" },
               { data: "suhu" },
               { data: "suhu_min" },
               { data: "suhu_max" },
               { data: "rh" },
               { data: "dp" },
               { data: "id_pelaksana" },
               { data: "id_verifikator" },
               { data: "dt_status" },
               // { data: "alasan" },
               { data: "action" },
           ],
            columnDefs: [
                {
                    targets: 0,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1; // Calculate the row index
                    },
                }
            ],
        });

    </script>
    <script>
        function viewData(id) {
            $.ajax({
                url: "{{ route('v1.monitoring.outstanding.index') }}",
                type: "GET",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}",
                },
                success: function (response) {
                    var status = response.data[0].status;
                    const date = new Date(response.data[0].tahun_pemeriksaan, response.data[0].bulan_pemeriksaan - 1, response.data[0].tgl_pemeriksaan);
                    const formattedDate = date.toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
                    $("#tgl").val(formattedDate);
                    $("#shift").val('Shift ' + response.data[0].waktu.shift);
                    $("#ruang").val(response.data[0].ruangan.area_name);
                    $("#suhu").val(response.data[0].suhu);
                    $("#suhu_min").val(response.data[0].suhu_min);
                    $("#suhu_max").val(response.data[0].suhu_max);
                    $("#dp_pa").val(response.data[0].dp);
                    $("#rh").val(response.data[0].rh);
                    $("#alasan").html(response.data[0].alasan);
                    $("#pelaksana").val(response.data[0].pelaksana.fullname);
                    $("#verifikator").val(response.data[0].verifikator.fullname);
                    $("#id_detail").val(response.data[0].id);
                    if (status === "need_review") {
                        $('#modal_footer').html(`
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button class="btn btn-danger" onclick="rejected()">Reject</button>
                                <button class="btn btn-success" onclick="approved()">Approve</button>
                            `);
                    } else {
                        $('#modal_footer').html(`
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            `);
                    }
                    $("#view_modal").modal("show");
                },
                error: function (xhr) {
                    Swal.fire("Error!", xhr.responseJSON.message, "error");
                },
            });
        }

        function approved() {
            $('#modal_verifikasi').modal('show');
            // Swal.fire({
            //     title: 'Are you sure?',
            //     text: "You won't be able to revert this!",
            //     icon: 'warning',
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     cancelButtonColor: '#d33',
            //     confirmButtonText: 'Yes, approve it!'
            // }).then((result) => {
            //     if (result.isConfirmed) {

            //         $.ajax({
            //             url: "{{route('v1.monitoring.outstanding.approved')}}",
            //             type: "POST",
            //             data: {
            //                 id: id_detail,
            //                 _token: "{{ csrf_token() }}",
            //             },
            //             success: function (response) {
            //                 Swal.fire(
            //                     'Approved!',
            //                     'The outstanding data has been approved.',
            //                     'success'
            //                 );
            //                 $("#view_modal").modal("hide");
            //                 dt_outstanding.ajax.reload();
            //             },
            //             error: function (xhr) {
            //                 Swal.fire("Error!", xhr.responseJSON.message, "error");
            //             },
            //         });
            //     }
            // });
        }

        function rejected() {
            let id_detail = $('#id_detail').val();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, reject it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{route('v1.monitoring.outstanding.rejected')}}",
                        type: "POST",
                        data: {
                            id: id_detail,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            Swal.fire(
                                'Rejected!',
                                'The outstanding data has been rejected.',
                                'success'
                            );
                            $("#view_modal").modal("hide");
                            dt_outstanding.ajax.reload();
                        },
                        error: function (xhr) {
                            Swal.fire("Error!", xhr.responseJSON.message, "error");
                        },
                    });
                }
            });
        }

        function checkUser() {
            let id_detail = $('#id_detail').val();
            var email = $('#email_verifikator').val();
            var password = $('#password_verifikator').val();

            $.ajax({
                url: "{{route('v1.monitoring.outstanding.approved')}}",
                type: "POST",
                data: {
                    id: id_detail,
                    email: email,
                    password: password,
                    _token: "{{ csrf_token() }}",
                },
                beforeSend: function () {
                    $('.page-loading').fadeIn();
                },
                success: function (response) {
                    if (response.success == false) {
                        $('.page-loading').fadeOut();
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message,
                        });
                    }else{
                        Swal.fire(
                            'Approved!',
                            'The outstanding data has been approved.',
                            'success'
                        );
                        $('#modal_verifikasi').modal('show');
                        $("#view_modal").modal("hide");
                        dt_outstanding.ajax.reload();
                        $('.page-loading').fadeOut();
                    }
                },
                error: function (error) {
                    console.error("Error fetching data", error);
                },
            });
        }
    </script>
@endsection