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
                    Formulir Pengukuran
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
                    <li class="breadcrumb-item text-muted">formulir</li>
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
            <div class="card border">
                <div class="card-header">
                    <div class="card-title">
                        <h4>Formulir</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-content">
                        <!--begin::Stepper-->
                        <div class="stepper stepper-pills" id="kt_stepper_example_basic">
                            <!--begin::Nav-->
                            <div class="stepper-nav flex-center flex-wrap mb-10">
                                <!--begin::Step 1-->
                                <div class="stepper-item mx-md-8 my-4 current" data-kt-stepper-element="nav">
                                    <!--begin::Wrapper-->
                                    <div class="stepper-wrapper d-flex align-items-center">
                                        <!--begin::Icon-->
                                        <div class="stepper-icon w-40px h-40px m-2">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">1</span>
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Label-->
                                        <div class="stepper-label">
                                            <h3 class="stepper-title fs-5">
                                                Monitoring
                                            </h3>
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Wrapper-->

                                </div>
                                <!--end::Step 1-->

                                <!--begin::Step 2-->
                                <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav">
                                    <!--begin::Wrapper-->
                                    <div class="stepper-wrapper d-flex align-items-center">
                                        <!--begin::Icon-->
                                        <div class="stepper-icon w-40px h-40px m-2">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">2</span>
                                        </div>
                                        <!--begin::Icon-->

                                        <!--begin::Label-->
                                        <div class="stepper-label">
                                            <h3 class="stepper-title fs-5">
                                                Lokasi
                                            </h3>
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Wrapper-->

                                </div>
                                <!--end::Step 2-->

                                <!--begin::Step 3-->
                                <div class="stepper-item mx-md-8 my-4" data-kt-stepper-element="nav">
                                    <!--begin::Wrapper-->
                                    <div class="stepper-wrapper d-flex align-items-center">
                                        <!--begin::Icon-->
                                        <div class="stepper-icon w-40px h-40px m-2">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">3</span>
                                        </div>
                                        <!--begin::Icon-->

                                        <!--begin::Label-->
                                        <div class="stepper-label">
                                            <h3 class="stepper-title fs-5">
                                                Pemeriksaan
                                            </h3>
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Wrapper-->

                                </div>
                                <!--end::Step 3-->

                                <!--begin::Step 4-->
                                <div class="stepper-item mx-md-8 my-4" data-kt-stepper-element="nav">
                                    <!--begin::Wrapper-->
                                    <div class="stepper-wrapper d-flex align-items-center">
                                        <!--begin::Icon-->
                                        <div class="stepper-icon w-40px h-40px m-2">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">4</span>
                                        </div>
                                        <!--begin::Icon-->

                                        <!--begin::Label-->
                                        <div class="stepper-label">
                                            <h3 class="stepper-title fs-5">
                                                Verifikasi
                                            </h3>
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Step 4-->
                            </div>
                            <!--end::Nav-->

                            <!--begin::Form-->
                            <form action="{{ route('v1.form.store') }}" method="POST" class="form w-lg-800px mx-auto" novalidate="novalidate" id="kt_stepper_example_basic_form">
                                @csrf
                                <!--begin::Group-->
                                <div class="mb-5">
                                    <!--begin::Step 1-->
                                    <div class="flex-column current" data-kt-stepper-element="content">
                                        <div class="row flex-center flex-wrap">
                                            <div class="col">
                                                <!--begin::Input group-->
                                                <div class="d-flex flex-column">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-5 fw-semibold mb-2" for="department">
                                                        <span class="required text-gray-700">Jenis Monitoring yang dilakukan</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" title="Pilih Department">
                                                            <i class="ki-duotone ki-information fs-7">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                        </span>
                                                    </label>
                                                    <!--end::Label-->

                                                    <div class="row row-cols-1 row-cols-md-2">
                                                        <div class="col">
                                                            <!--begin::Option-->
                                                            <input type="radio" class="btn-check jenisMonitoring" name="jenisMonitoring" value="new"
                                                                id="jenisMonitoring1" />
                                                            <label
                                                                class="btn btn-outline btn-outline btn-active-light-success p-7 d-flex align-items-center mb-5"
                                                                for="jenisMonitoring1">
                                                                <i class="ki-duotone ki-add-files fs-2x me-4">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                </i>

                                                                <span class="d-block fw-semibold text-start">
                                                                    <span class="text-gray-900 fw-bold d-block fs-5">Tambah Data Baru</span>
                                                                </span>
                                                            </label>
                                                            <!--end::Option-->
                                                        </div>
                                                        <div class="col">
                                                            <!--begin::Option-->
                                                            <input type="radio" class="btn-check jenisMonitoring" name="jenisMonitoring" value="edit"
                                                                id="jenisMonitoring2" />
                                                            <label class="btn btn-outline btn-outline btn-active-light-warning p-7 d-flex align-items-center"
                                                                for="jenisMonitoring2">
                                                                <i class="ki-duotone ki-notepad-edit fs-2x me-4">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>

                                                                <span class="d-block fw-semibold text-start">
                                                                    <span class="text-gray-900 fw-bold d-block fs-5">Perbaikan Data</span>
                                                                </span>
                                                            </label>
                                                            <!--end::Option-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Step 1-->

                                    <!--begin::Step 2-->
                                    <div class="flex-column" data-kt-stepper-element="content">
                                        <div class="row row-cols-1">
                                            <div class="col">
                                                <!--begin::Input group-->
                                                <div class="d-flex flex-column mb-5">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-5 fw-semibold mb-2" for="department">
                                                        <span class="required text-gray-700">Department</span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Select-->
                                                    <select name="id_sub_department" id="department" class="form-select form-select">
                                                        <option></option>
                                                        @foreach ($dept as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->departments->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <!--end::Select-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <div class="col">
                                                <!--begin::Input group-->
                                                <div class="d-flex flex-column mb-5">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-5 fw-semibold mb-2" for="ruangan">
                                                        <span class="required text-gray-700">Nama Ruangan / Alat</span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Select-->
                                                    <select name="id_ruangan" id="ruangan" class="form-select form-select">
                                                    </select>
                                                    <!--end::Select-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                        </div>

                                        <div class="row" id="alasanPerbaikan">
                                            <!--begin::Alasan Perbaikan-->
                                        </div>
                                    </div>
                                    <!--end::Step 2-->

                                    <!--begin::Step 3-->
                                    <div class="flex-column" data-kt-stepper-element="content">
                                        <div class="row row-cols-1">
                                            <div class="col">
                                                <!--begin::Input group-->
                                                <div class="d-flex flex-column mb-5">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-5 fw-semibold mb-2" for="suhu">
                                                        <span class="required text-gray-700">Suhu (degC)</span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <input type="number" class="form-control" name="suhu" id="suhu">
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <div class="col">
                                                <!--begin::Input group-->
                                                <div class="d-flex flex-column mb-5">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-5 fw-semibold mb-2" for="suhu_min">
                                                        <span class="required text-gray-700">Suhu Min (degC)</span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <input type="number" class="form-control" name="suhu_min" id="suhu_min">
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <div class="col">
                                                <!--begin::Input group-->
                                                <div class="d-flex flex-column mb-5">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-5 fw-semibold mb-2" for="suhu_max">
                                                        <span class="required text-gray-700">Suhu Max (degC)</span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <input type="number" class="form-control" name="suhu_max" id="suhu_max">
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <div class="col">
                                                <!--begin::Input group-->
                                                <div class="d-flex flex-column mb-5">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-5 fw-semibold mb-2" for="rh">
                                                        <span class="required text-gray-700">RH %</span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <input type="number" class="form-control" name="rh" id="rh">
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <div class="col">
                                                <!--begin::Input group-->
                                                <div class="d-flex flex-column mb-5">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-5 fw-semibold mb-2" for="dp">
                                                        <span class="required text-gray-700">DP (Pa)</span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <input type="number" class="form-control" name="dp" id="dp">
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Step 3-->

                                    <!--begin::Step 4-->
                                    <div class="flex-column" data-kt-stepper-element="content">
                                        <div class="row flex-end flex-wrap">
                                            <div class="col">
                                                <div class="card shadow-sm m-1">
                                                    <div class="card-body">
                                                        <div class="card-content">
                                                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2" for="department">
                                                                <span class="text-gray-800">Pelaksana: </span>
                                                            </label>
                                                            <input type="hidden" name="id_pelaksana" value="{{ auth()->user()->id }}">
                                                            <h4>{{ auth()->user()->email}}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card shadow-sm border-info m-1" id="verifikator_frame">
                                                    <div class="card-body">
                                                        <div class="card-content">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2" for="department">
                                                                        <span class="text-gray-800">Verifikator: </span>
                                                                        <input type="hidden" name="id_verifikator" id="id_verifikator">
                                                                    </label>
                                                                    <div id="verifikator">
                                                                        <h4 class="text-gray-500">belum di verifikasi</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="col" id="btnVerifikasi">
                                                                    <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#modal_verifikasi" >Verifikasi</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Step 4-->
                                </div>
                                <!--end::Group-->

                                <!--begin::Actions-->
                                <div class="d-flex flex-stack mt-10 mb-5">
                                    <!--begin::Wrapper-->
                                    <div class="me-2">
                                        <button type="button" class="btn btn-light btn-active-light-primary" data-kt-stepper-action="previous">
                                            Back
                                        </button>
                                    </div>
                                    <!--end::Wrapper-->

                                    <!--begin::Wrapper-->
                                    <div>
                                        <button type="submit" class="btn btn-primary" data-kt-stepper-action="submit">
                                            <span class="indicator-label">
                                                Submit
                                            </span>
                                            <span class="indicator-progress">
                                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>

                                        <button type="button" class="btn btn-primary" data-kt-stepper-action="next">
                                            Continue
                                        </button>
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Stepper-->
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
                                    <input type="text" name="email_verifikator" id="email_verifikator" class="form-control mb-3 mb-lg-0"
                                        placeholder="Email OneKalbe" />
                                <!--begin::Input group-->
                                <div class="col my-2">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">password</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="password" name="password_verifikator" id="password_verifikator" class="form-control mb-3 mb-lg-0"
                                        placeholder="password" autocomplete/>
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
    <!--end::Modal - Add Department-->
@endsection
@section('scripts')
    <script>
        $('#department').select2({
            placeholder: 'Pilih Department',
        });
        $('#ruangan').select2({
            placeholder: 'Pilih Ruangan/Alat',
        });

        // grab your stepper
        var element = document.querySelector("#kt_stepper_example_basic");
        var stepper = new KTStepper(element);

        // when “Next” is clicked…
        stepper.on("kt.stepper.next", function (stepperInstance) {
            var idx = stepperInstance.getCurrentStepIndex(); // 1-based
            if (!validateStep(idx)) {
                // blocked: don’t call goNext()
                return;
            }
            stepperInstance.goNext();
        });

        // Handle previous step
        stepper.on("kt.stepper.previous", function (stepper) {
            stepper.goPrevious(); // go previous step
        });

        // when “Submit” is clicked on final step, you could re-validate step 4 too:
        stepper.on("kt.stepper.submit", function (stepperInstance) {
            if (!validateStep(4)) return;
            // if you actually submit via AJAX or form.submit() you can do it here
            $('#kt_stepper_example_basic_form').submit();
        });

        // central validator
        function validateStep(step) {
            switch (step) {
                case 1:
                    if (!$('.jenisMonitoring:checked').length) {
                        alert('Silakan pilih jenis monitoring terlebih dahulu.');
                        return false;
                    }
                    break;

                case 2:
                    if (!$('#department').val()) {
                        alert('Silakan pilih Department.');
                        return false;
                    }
                    if (!$('#ruangan').val()) {
                        alert('Silakan pilih Nama Ruangan / Alat.');
                        return false;
                    }
                    // if “edit” mode, alasan must be non-empty
                    if ($('.jenisMonitoring:checked').val() === 'edit'
                        && !$('#alasan').val().trim()) {
                        alert('Silakan isi Alasan Perbaikan.');
                        return false;
                    }
                    break;

                case 3:
                    // assume step 3 fields are input[name="input1"], input[name="input2"]
                    var missing = [];
                    $('#kt_stepper_example_basic_form [data-kt-stepper-element="content"]:eq(2)')
                        .find('input[required]').each(function () {
                            if (!$(this).val().trim()) {
                                missing.push($(this).attr('name'));
                            }
                        });
                    if (missing.length) {
                        alert('Mohon isi semua field di Step 3.');
                        return false;
                    }
                    break;

                case 4:
                    // similarly for step 4
                    var missing4 = [];
                    $('#kt_stepper_example_basic_form [data-kt-stepper-element="content"]:eq(3)')
                        .find('input[required]').each(function () {
                            if (!$(this).val().trim()) {
                                missing4.push($(this).attr('name'));
                            }
                        });
                    if (missing4.length) {
                        alert('Mohon isi semua field di Step 4.');
                        return false;
                    }
                    break;
            }
            return true;
        }
    </script>
    <script>
        $("#department").on("change", function () {
            const id_dept = $(this).val();
            loadRuangan(id_dept);
        });

        function loadRuangan(id_dept) {
            $.ajax({
                url: "{{ route('v1.form.index') }}",
                method: "GET",
                data: {
                    id_dept: id_dept,
                    _token: "{{ csrf_token() }}",
                },
                beforeSend: function () {
                    $("#ruangan").empty().append("<option>loading...</option>");
                },
                success: function (response) {
                    const selectField = $("#ruangan");
                    selectField.empty();

                    const rooms = response.ruangan || [];

                    if (rooms.length === 0) {
                        selectField.append('<option>No data match...</option>');
                    } else {
                        selectField.append('<option></option>'); // Placeholder kosong

                        rooms.forEach(function (ruang) {
                            selectField.append(
                                $("<option>", {
                                    value: ruang.id,
                                    text: ruang.room_no + ' - ' + ruang.area_name
                                })
                            );
                        });
                    }
                },
                error: function (error) {
                    console.error("Error fetching data", error);
                },
            });
        }

    </script>
    <script>
        function checkUser(){
            var email = $('#email_verifikator').val();
            var password = $('#password_verifikator').val();

            $.ajax({
                url: "{{ route('v1.form.verifikasi') }}",
                method: "POST",
                data: {
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
                    }else {
                        $('#verifikator').html('<h4>' + response.verifikator + '</h4>');
                        $('#id_verifikator').val(response.id);
                        $('#verifikator_frame').removeClass('border-info').addClass('border-success');
                        $('#btnVerifikasi').remove();
                        $('#email_verifikator').val('');
                        $('#password_verifikator').val('');
                        $('#modal_verifikasi').modal('hide');
                        $('.page-loading').fadeOut();
                    }
                },
                error: function (error) {
                    console.error("Error fetching data", error);
                },
            });
        }
    </script>
    <script>
        $('.jenisMonitoring').on('change', function () {
            if (this.value == 'edit') {
                $('#alasanPerbaikan').html(`<div class="col"><div class= "d-flex flex-column" ><label class="d-flex align-items-center fs-5 fw-semibold mb-2" for="alasan"><span class="required text-gray-700">Alasan Perbaikan</span></label><textarea class="form-control" name="alasan" id="alasan" required></textarea></div ></div > `)
            }else{
                $('#alasanPerbaikan').html('');
            }
        });
    </script>
@endsection