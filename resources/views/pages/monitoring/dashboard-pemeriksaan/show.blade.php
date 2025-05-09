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
                            Monitoring Ruangan
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
                            <li class="breadcrumb-item text-muted">employee</li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">monitoring</li>
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
                    <div class="row g-5">
                        <div class="col">
                            <div class="card card-stretch">
                                <div class="card-header">
                                    <div class="row row-cols-1 row-cols-md-2 my-5 w-100">
                                        <div class="col">
                                            <div class="row">
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
                                                <div class="col">
                                                    Tahun:
                                                    <!--begin::Input-->
                                                    <select name="f_year" id="f_year" class="form-select mb-3 mb-lg-0" data-control="select2">

                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
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
                                <div class="card-body card-scroll" style="height: 60vh;">
                                    <div id="monitoring_content">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row mt-5">
                                        <div class="col">
                                            <label>No. Ruangan:</label>
                                            <!--begin::Input-->
                                            <input type="text" class="form-control" readonly id="no_ruang">
                                            <!--end::Input-->
                                        </div>
                                        <div class="col">
                                            <label>Jenis Ruangan:</label>
                                            <!--begin::Input-->
                                            <input type="text" class="form-control" readonly id="jenis_ruang">
                                            <!--end::Input-->
                                        </div>
                                        <div class="col">
                                            <label>DP:</label>
                                            <!--begin::Input-->
                                            <input type="text" class="form-control" readonly id="dp">
                                            <!--end::Input-->
                                        </div>
                                        <div class="col">
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

@section('scripts')
        {{-- <script>
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

            const id = window.location.pathname.split('/')[5];
            function fetchFilteredData() {
                const URL = "{{ route('v1.monitoring.pengukuran.show', ':id') }}";
                let month = $('#f_month').val();
                let year = $('#f_year').val();
                let ruang = $('#id_ruang').val();

                $.ajax({
                    url: URL.replace(':id', id),
                    method: "GET",
                    data:{
                        f_month: month,
                        f_year: year,
                        ruang: ruang
                    },
                    beforeSend: function () {
                        $("#monitoring_content").html('Loading...');
                    },
                    success: function (response) {
                        $('#no_ruang').val(response.data.room_no || '');
                        $('#jenis_ruang').val(response.data.jenis_ruangan.name || '');
                        $('#dp').val(response.data.jenis_dp.name || '');
                        $('#no_alat').val(response.data.no_alat || '');
                        $('#monitoring_content').html(response.view);

                    }
                })
            }
            $('#f_month, #f_year, #id_ruang').on('change', fetchFilteredData);
                // Initial fetch on page load
            fetchFilteredData();
        </script> --}}
<script>
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

    const id = window.location.pathname.split('/')[5];

    function fetchFilteredData() {
        const URL = "{{ route('v1.monitoring.pengukuran.show', ':id') }}";
        let month = $('#f_month').val();
        let year = $('#f_year').val();
        let ruang = $('#id_ruang').val();

        // Calculate days in the selected month and year
        const daysInMonth = new Date(year, month, 0).getDate();

        $.ajax({
            url: URL.replace(':id', id),
            method: "GET",
            data: {
                f_month: month,
                f_year: year,
                ruang: ruang
            },
            beforeSend: function () {
                $("#monitoring_content").html('Loading...');
            },
            success: function (response) {
                $('#no_ruang').val(response.data.room_no || '');
                $('#jenis_ruang').val(response.data.jenis_ruangan.name || '');
                $('#dp').val(response.data.jenis_dp.name || '');
                $('#no_alat').val(response.data.no_alat || '');
                $('#monitoring_content').html(response.view);

                // Update the monitoring content based on the new daysInMonth
                updateMonitoringContent(daysInMonth, response.monitoring_data);
            }
        });
    }

    function updateMonitoringContent(daysInMonth, monitoringData) {
        
        let content = '';
        for (let day = 1; day <= daysInMonth; day++) {
            const item = monitoringData.find(data => data.tgl_pemeriksaan === day);
            const dateForDay = new Date(new Date().getFullYear(), $('#f_month').val() - 1, day);
            const isWeekend = [0, 6].includes(dateForDay.getDay()); // 0 = Sunday, 6 = Saturday

            content += `
                <div class="card">
                    <div class="card-body">
                        <div class="card-content">
                            <div class="row">
                                <div class="col text-center">
                                    <h6>Tanggal</h6>
                                    <div class="separator my-2"></div>
                                    <p class="fs-4 mt-5 fw-semibold">
                                        <button class="btn ${isWeekend ? 'btn-danger' : 'btn-primary'}">
                                            <span class="fs-4 fw-bold">${day}</span>
                                        </button>
                                    </p>
                                </div>
                                <div class="col text-center">
                                    <h6>Suhu (degC)</h6>
                                    <div class="separator my-2"></div>
                                    <p class="fs-4 mt-5 fw-semibold">
                                        <button class="btn btn-light border">
                                            <span class="fs-4 fw-bold">${item ? item.suhu : 'NA'}</span>
                                        </button>
                                    </p>
                                </div>
                                <div class="col text-center">
                                    <h6>Suhu Min (degC)</h6>
                                    <div class="separator my-2"></div>
                                    <p class="fs-4 mt-5 fw-semibold">
                                        <button class="btn ${item && item.ruangan && item.ruangan.jenis_ruangan && item.ruangan.jenis_ruangan.syarats ?
                                (item.suhu_min <= item.ruangan.jenis_ruangan.syarats.batas_bawah_suhu_alert && item.suhu_min > item.ruangan.jenis_ruangan.syarats.batas_bawah_suhu_action &&
                                    item.suhu_min < item.ruangan.jenis_ruangan.syarats.batas_atas_suhu_alert && item.suhu_min < item.ruangan.jenis_ruangan.syarats.batas_atas_suhu_action ? 'btn-info' :
                                    (item.suhu_min < item.ruangan.jenis_ruangan.syarats.batas_bawah_suhu_alert && item.suhu_min <= item.ruangan.jenis_ruangan.syarats.batas_bawah_suhu_action ? 'btn-dark' :
                                        (item.suhu_min > item.ruangan.jenis_ruangan.syarats.batas_bawah_suhu_alert && item.suhu_min > item.ruangan.jenis_ruangan.syarats.batas_bawah_suhu_action &&
                                            item.suhu_min >= item.ruangan.jenis_ruangan.syarats.batas_atas_suhu_alert && item.suhu_min < item.ruangan.jenis_ruangan.syarats.batas_atas_suhu_action ? 'btn-warning' :
                                            (item.suhu_min > item.ruangan.jenis_ruangan.syarats.batas_bawah_suhu_alert && item.suhu_min > item.ruangan.jenis_ruangan.syarats.batas_bawah_suhu_action &&
                                                item.suhu_min > item.ruangan.jenis_ruangan.syarats.batas_atas_suhu_alert && item.suhu_min >= item.ruangan.jenis_ruangan.syarats.batas_atas_suhu_action ? 'btn-danger' : 'btn-light')))) : 'btn-light'} border">
                                            <span class="fs-4 fw-bold">${item ? item.suhu_min : 'NA'}</span>
                                        </button>
                                    </p>
                                </div>

                                <div class="col text-center">
                                    <h6>Suhu Max (degC)</h6>
                                    <div class="separator my-2"></div>
                                    <p class="fs-4 mt-5 fw-semibold">
                                        <button class="btn ${item && item.ruangan && item.ruangan.jenis_ruangan && item.ruangan.jenis_ruangan.syarats ?
                                (item.suhu_max <= item.ruangan.jenis_ruangan.syarats.batas_bawah_suhu_alert && item.suhu_max > item.ruangan.jenis_ruangan.syarats.batas_bawah_suhu_action &&
                                    item.suhu_max < item.ruangan.jenis_ruangan.syarats.batas_atas_suhu_alert && item.suhu_max < item.ruangan.jenis_ruangan.syarats.batas_atas_suhu_action ? 'btn-info' :
                                    (item.suhu_max < item.ruangan.jenis_ruangan.syarats.batas_bawah_suhu_alert && item.suhu_max <= item.ruangan.jenis_ruangan.syarats.batas_bawah_suhu_action ? 'btn-dark' :
                                        (item.suhu_max > item.ruangan.jenis_ruangan.syarats.batas_bawah_suhu_alert && item.suhu_max > item.ruangan.jenis_ruangan.syarats.batas_bawah_suhu_action &&
                                            item.suhu_max >= item.ruangan.jenis_ruangan.syarats.batas_atas_suhu_alert && item.suhu_max < item.ruangan.jenis_ruangan.syarats.batas_atas_suhu_action ? 'btn-warning' :
                                            (item.suhu_max > item.ruangan.jenis_ruangan.syarats.batas_bawah_suhu_alert && item.suhu_max > item.ruangan.jenis_ruangan.syarats.batas_bawah_suhu_action &&
                                                item.suhu_max > item.ruangan.jenis_ruangan.syarats.batas_atas_suhu_alert && item.suhu_max >= item.ruangan.jenis_ruangan.syarats.batas_atas_suhu_action ? 'btn-danger' : 'btn-light')))) : 'btn-light'} border">
                                            <span class="fs-4 fw-bold">${item ? item.suhu_max : 'NA'}</span>
                                        </button>
                                    </p>
                                </div>

                                <div class="col text-center">
                                    <h6>RH (%)</h6>
                                    <div class="separator my-2"></div>
                                    <p class="fs-4 mt-5 fw-semibold">
                                        <button class="btn ${item && item.ruangan && item.ruangan.jenis_ruangan && item.ruangan.jenis_ruangan.syarats ?
                                (item.rh <= item.ruangan.jenis_ruangan.syarats.batas_bawah_rh_alert && item.rh > item.ruangan.jenis_ruangan.syarats.batas_bawah_rh_action &&
                                    item.rh < item.ruangan.jenis_ruangan.syarats.batas_atas_rh_alert && item.rh < item.ruangan.jenis_ruangan.syarats.batas_atas_rh_action ? 'btn-info' :
                                    (item.rh < item.ruangan.jenis_ruangan.syarats.batas_bawah_rh_alert && item.rh <= item.ruangan.jenis_ruangan.syarats.batas_bawah_rh_action ? 'btn-dark' :
                                        (item.rh > item.ruangan.jenis_ruangan.syarats.batas_bawah_rh_alert && item.rh > item.ruangan.jenis_ruangan.syarats.batas_bawah_rh_action &&
                                            item.rh >= item.ruangan.jenis_ruangan.syarats.batas_atas_rh_alert && item.rh < item.ruangan.jenis_ruangan.syarats.batas_atas_rh_action ? 'btn-warning' :
                                            (item.rh > item.ruangan.jenis_ruangan.syarats.batas_bawah_rh_alert && item.rh > item.ruangan.jenis_ruangan.syarats.batas_bawah_rh_action &&
                                                item.rh > item.ruangan.jenis_ruangan.syarats.batas_atas_rh_alert && item.rh >= item.ruangan.jenis_ruangan.syarats.batas_atas_rh_action ? 'btn-danger' : 'btn-light')))) : 'btn-light'} border">
                                            <span class="fs-4 fw-bold">${item ? item.rh : 'NA'}</span>
                                        </button>
                                    </p>
                                </div>

                                <div class="col text-center">
                                    <h6>DP (Pa)</h6>
                                    <div class="separator my-2"></div>
                                    <p class="fs-4 mt-5 fw-semibold">
                                        <button class="btn ${item && item.ruangan && item.ruangan.jenis_dp && item.ruangan.jenis_dp.syarats ?
                                (item.dp <= item.ruangan.jenis_dp.syarats.alert && item.dp > item.ruangan.jenis_dp.syarats.action ? 'btn-warning' :
                                    (item.dp < item.ruangan.jenis_dp.syarats.alert && item.dp <= item.ruangan.jenis_dp.syarats.action ? 'btn-danger' : 'btn-light')) : 'btn-light'} border">
                                            <span class="fs-4 fw-bold">${item ? item.dp : 'NA'}</span>
                                        </button>
                                    </p>
                                </div>
                                <div class="col text-center">
                                    <h6>Pukul</h6>
                                    <div class="separator my-2"></div>
                                    <p class="mt-5">
                                        <button class="btn btn-light-info">
                                            <span class="fs-4 fw-bold">
                                                ${item ? new Date(`1970-01-01T${item.jam_pemeriksaan}`).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', timeZone: 'Asia/Jakarta' }) : 'NA'}
                                            </span>
                                        </button>
                                    </p>
                                </div>
                                <div class="col text-center">
                                    <h6>Pelaksana</h6>
                                    <div class="separator my-2"></div>
                                    <p class="mt-5">
                                        <button class="btn">
                                            ${item ? item.pelaksana.email : 'NA'}
                                        </button>
                                    </p>
                                </div>
                                <div class="col text-center">
                                    <h6>Verifikator</h6>
                                    <div class="separator my-2"></div>
                                    <p class="mt-5">
                                        <button class="btn">
                                            ${item ? item.verifikator.email : 'NA'}
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="separator my-2"></div>
            `;
        }
        
        $('#monitoring_content').html(content);
    }

    $('#f_month, #f_year, #id_ruang').on('change', fetchFilteredData);
    fetchFilteredData();
</script>
@endsection