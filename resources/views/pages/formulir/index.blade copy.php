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
        <div id="kt_app_content_container" class="app-container container">
            <div class="card shadow-lg border-0">
                <div class="card-header">
                    <div class="card-title">
                        <h4>Formulir Pengukuran</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-content">
                        <form action="#" method="post">
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
                                                <label class="btn btn-outline btn-outline btn-active-light-success p-7 d-flex align-items-center mb-5"
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
                                                <input type="radio" class="btn-check jenisMonitoring" name="jenisMonitoring" value="edit" id="jenisMonitoring2" />
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

                            <div class="separator my-5"></div>

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
                                        <select name="department" id="department" class="form-select form-select">
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
                                        <select name="ruangan" id="ruangan" class="form-select form-select">
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>

                            <div class="row" id="alasanPerbaikan">
                                <!--begin::Alasan Perbaikan-->
                            </div>

                            <div class="separator my-10"></div>

                            <div class="row row-cols-1 row-cols-md-2">
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

                            <div class="separator my-10"></div>

                            <div class="row flex-end flex-wrap">
                                <div class="col">
                                    <div class="card shadow-sm m-1">
                                        <div class="card-body">
                                            <div class="card-content">
                                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2" for="department">
                                                    <span class="text-gray-800">Pelaksana: </span>
                                                </label>
                                                <h4>ferdy.rahmat@kalbe.co.id</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card shadow-sm border-info m-1">
                                        <div class="card-body">
                                            <div class="card-content">
                                                <div class="row row-cols-1 row-cols-md-2">
                                                    <div class="col">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2" for="department">
                                                            <span class="text-gray-800">Verifikator: </span>
                                                        </label>
                                                        <h4 class="text-gray-500" id="verifikator">belum di verifikasi</h4>
                                                    </div>
                                                    <div class="col">
                                                        <button type="button" class="btn btn-info w-100" id="btnVerifikasi">Verifikasi</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="separator my-10"></div>

                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col">
                                    <button type="reset" class="btn btn-secondary w-100 m-2 border">Batal</button>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary w-100 m-2">Simpan</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
@endsection
@section('scripts')
        <script>
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
            $('#department').select2({
                minimumInputLength: 2,
                placeholder: 'Pilih Departmen',
            });
            $('#ruangan').select2({
                minimumInputLength: 2,
                placeholder: 'Pilih Ruangan/Alat',
            });
        </script>
        <script>
            $('.jenisMonitoring').on('change', function () {
                console.log(this.value);
                if (this.value == 'edit') {
                    $('#alasanPerbaikan').html(`<div class="col"><div class= "d-flex flex-column" ><label class="d-flex align-items-center fs-5 fw-semibold mb-2" for="alasan"><span class="required text-gray-700">Alasan Perbaikan</span></label><textarea class="form-control" name="alasan" id="alasan" required></textarea></div ></div > `)
                }else{
                    $('#alasanPerbaikan').html('');
                }
            });
        </script>
@endsection