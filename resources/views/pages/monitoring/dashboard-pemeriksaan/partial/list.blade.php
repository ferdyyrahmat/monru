@php
use Carbon\Carbon;
$currentMonth = Carbon::now()->month;
$currentYear = Carbon::now()->year;
$daysInMonth = 31;
@endphp

@for ($day = 1; $day <= $daysInMonth; $day++)
    @php
    $item = $dataMonitoring->first(function ($data) use ($day, $currentMonth, $currentYear) {
        $tgl = $data->tgl_pemeriksaan;
        $bulan = $data->bulan_pemeriksaan;
        $tahun = $data->tahun_pemeriksaan;
        return $tahun == $currentYear && $bulan == $currentMonth && $tgl == $day;
    });
    @endphp

    <div class="card">
        <div class="card-body">
            <div class="card-content">
                <div class="row">
                    <div class="col text-center">
                        <h6>Tanggal</h6>
                        <div class="separator my-2"></div>
                        <p class="fs-4 mt-5 fw-semibold">
                            <button class="btn btn-primary">
                                <span class="fs-4 fw-bold">{{ $day }}</span>
                            </button>
                        </p>
                    </div>

                    <div class="col text-center">
                        <h6>Suhu (degC)</h6>
                        <div class="separator my-2"></div>
                        <p class="fs-4 mt-5 fw-semibold">
                            <button class="btn btn-light border">
                                <span class="fs-4 fw-bold">{{ $item->suhu ?? 'NA' }}</span>
                            </button>
                        </p>
                    </div>

                    <div class="col text-center">
                        <h6>Suhu Min (degC)</h6>
                        <div class="separator my-2"></div>
                        <p class="fs-4 mt-5 fw-semibold">
                            @if ($item)
                                <button class="btn
                                        @if (
            $item->suhu_min <= $item->ruangan->jenisRuangan->syarats->batas_bawah_suhu_alert &&
            $item->suhu_min > $item->ruangan->jenisRuangan->syarats->batas_bawah_suhu_action &&
            $item->suhu_min < $item->ruangan->jenisRuangan->syarats->batas_atas_suhu_alert &&
            $item->suhu_min < $item->ruangan->jenisRuangan->syarats->batas_atas_suhu_action
        )
                                            btn-info
                                        @elseif (
            $item->suhu_min < $item->ruangan->jenisRuangan->syarats->batas_bawah_suhu_alert &&
            $item->suhu_min <= $item->ruangan->jenisRuangan->syarats->batas_bawah_suhu_action &&
            $item->suhu_min < $item->ruangan->jenisRuangan->syarats->batas_atas_suhu_alert &&
            $item->suhu_min < $item->ruangan->jenisRuangan->syarats->batas_atas_suhu_action
        )
                                            btn-dark
                                        @elseif (
            $item->suhu_min > $item->ruangan->jenisRuangan->syarats->batas_bawah_suhu_alert &&
            $item->suhu_min > $item->ruangan->jenisRuangan->syarats->batas_bawah_suhu_action &&
            $item->suhu_min >= $item->ruangan->jenisRuangan->syarats->batas_atas_suhu_alert &&
            $item->suhu_min < $item->ruangan->jenisRuangan->syarats->batas_atas_suhu_action
        )
                                            btn-warning
                                        @elseif (
            $item->suhu_min > $item->ruangan->jenisRuangan->syarats->batas_bawah_suhu_alert &&
            $item->suhu_min > $item->ruangan->jenisRuangan->syarats->batas_bawah_suhu_action &&
            $item->suhu_min > $item->ruangan->jenisRuangan->syarats->batas_atas_suhu_alert &&
            $item->suhu_min >= $item->ruangan->jenisRuangan->syarats->batas_atas_suhu_action
        )
                                            btn-danger
                                        @else
                                            btn-light
                                        @endif 
                                        border">
                                    <span class="fs-4 fw-bold">{{ $item->suhu_min ?? 'NA' }}</span>
                                </button>
                            @else
                                <button class="btn btn-light border">
                                    <span class="fs-4 fw-bold">NA</span>
                                </button>
                            @endif
                        </p>
                    </div>

                    <div class="col text-center">
                        <h6>Suhu Max (degC)</h6>
                        <div class="separator my-2"></div>
                        <p class="fs-4 mt-5 fw-semibold">
                            @if ($item)
                                <button class="btn
                                @if (
            $item->suhu_max <= $item->ruangan->jenisRuangan->syarats->batas_bawah_suhu_alert &&
            $item->suhu_max > $item->ruangan->jenisRuangan->syarats->batas_bawah_suhu_action &&
            $item->suhu_max < $item->ruangan->jenisRuangan->syarats->batas_atas_suhu_alert &&
            $item->suhu_max < $item->ruangan->jenisRuangan->syarats->batas_atas_suhu_action
        )
                                    btn-info
                                @elseif (
            $item->suhu_max < $item->ruangan->jenisRuangan->syarats->batas_bawah_suhu_alert &&
            $item->suhu_max <= $item->ruangan->jenisRuangan->syarats->batas_bawah_suhu_action &&
            $item->suhu_max < $item->ruangan->jenisRuangan->syarats->batas_atas_suhu_alert &&
            $item->suhu_max < $item->ruangan->jenisRuangan->syarats->batas_atas_suhu_action
        )
                                    btn-dark
                                @elseif (
            $item->suhu_max > $item->ruangan->jenisRuangan->syarats->batas_bawah_suhu_alert &&
            $item->suhu_max > $item->ruangan->jenisRuangan->syarats->batas_bawah_suhu_action &&
            $item->suhu_max >= $item->ruangan->jenisRuangan->syarats->batas_atas_suhu_alert &&
            $item->suhu_max < $item->ruangan->jenisRuangan->syarats->batas_atas_suhu_action
        )
                                    btn-warning
                                @elseif (
            $item->suhu_max > $item->ruangan->jenisRuangan->syarats->batas_bawah_suhu_alert &&
            $item->suhu_max > $item->ruangan->jenisRuangan->syarats->batas_bawah_suhu_action &&
            $item->suhu_max > $item->ruangan->jenisRuangan->syarats->batas_atas_suhu_alert &&
            $item->suhu_max >= $item->ruangan->jenisRuangan->syarats->batas_atas_suhu_action
        )
                                    btn-danger
                                @else
                                    btn-light
                                @endif 
                                border">
                                    <span class="fs-4 fw-bold">{{ $item->suhu_max ?? 'NA' }}</span>
                                </button>
                            @else
                                <button class="btn btn-light border">
                                    <span class="fs-4 fw-bold">NA</span>
                                </button>
                            @endif
                        </p>
                    </div>

                    <div class="col text-center">
                        <h6>RH (%)</h6>
                        <div class="separator my-2"></div>
                        <p class="fs-4 mt-5 fw-semibold">
                            @if ($item)
                            <button class="btn 
                                @if (
            $item->rh <= $item->ruangan->jenisRuangan->syarats->batas_bawah_rh_alert &&
            $item->rh > $item->ruangan->jenisRuangan->syarats->batas_bawah_rh_action &&
            $item->rh < $item->ruangan->jenisRuangan->syarats->batas_atas_rh_alert &&
            $item->rh < $item->ruangan->jenisRuangan->syarats->batas_atas_rh_action
        )
                                        btn-info
                                @elseif (
            $item->rh < $item->ruangan->jenisRuangan->syarats->batas_bawah_rh_alert &&
            $item->rh <= $item->ruangan->jenisRuangan->syarats->batas_bawah_rh_action &&
            $item->rh < $item->ruangan->jenisRuangan->syarats->batas_atas_rh_alert &&
            $item->rh < $item->ruangan->jenisRuangan->syarats->batas_atas_rh_action
        )
                                        btn-dark
                                @elseif (
            $item->rh > $item->ruangan->jenisRuangan->syarats->batas_bawah_rh_alert &&
            $item->rh > $item->ruangan->jenisRuangan->syarats->batas_bawah_rh_action &&
            $item->rh >= $item->ruangan->jenisRuangan->syarats->batas_atas_rh_alert &&
            $item->rh < $item->ruangan->jenisRuangan->syarats->batas_atas_rh_action
        )
                                        btn-warning
                                @elseif (
            $item->rh > $item->ruangan->jenisRuangan->syarats->batas_bawah_rh_alert &&
            $item->rh > $item->ruangan->jenisRuangan->syarats->batas_bawah_rh_action &&
            $item->rh > $item->ruangan->jenisRuangan->syarats->batas_atas_rh_alert &&
            $item->rh >= $item->ruangan->jenisRuangan->syarats->batas_atas_rh_action
        )
                                        btn-danger
                                @else
                                    btn-light
                                @endif 
                                border">
                                <span class="fs-4 fw-bold">{{ $item->rh ?? 'NA' }}</span>
                            </button>
                            @else
                                <button class="btn btn-light border">
                                    <span class="fs-4 fw-bold">NA</span>
                                </button>
                            @endif
                        </p>
                    </div>

                    <div class="col text-center">
                        <h6>DP (Pa)</h6>
                        <div class="separator my-2"></div>
                        <p class="fs-4 mt-5 fw-semibold">
                            @if ($item)    
                                <button class="btn 
                                 @if (
                                        $item->dp <= $item->ruangan->jenisDp->syarats->alert &&
                                        $item->dp > $item->ruangan->jenisDp->syarats->action 
                                    )
                                            btn-warning
                                @elseif (
                                        $item->dp < $item->ruangan->jenisDp->syarats->alert &&
                                        $item->dp <= $item->ruangan->jenisDp->syarats->action 
                                    )
                                            btn-danger
                                @else
                                    btn-light
                                @endif 
                                border">
                                    <span class="fs-4 fw-bold">{{ $item->dp ?? 'NA' }}</span>
                                </button>
                            @else
                                <button class="btn btn-light border">
                                    <span class="fs-4 fw-bold">NA</span>
                                </button>
                            @endif
                        </p>
                    </div>

                    <div class="col text-center">
                        <h6>Pukul</h6>
                        <div class="separator my-2"></div>
                        <p class="mt-5">
                            <button class="btn btn-light-info">
                                <span
                                    class="fs-4 fw-bold">{{ $item ? Carbon::parse($item->jam_pemeriksaan)->format('H:i') : 'NA' }}</span>
                            </button>
                        </p>
                    </div>

                    <div class="col text-center">
                        <h6>Pelaksana</h6>
                        <div class="separator my-2"></div>
                        <p class="mt-5">
                            <button class="btn">
                                {{ $item->pelaksana->email ?? 'NA' }}
                            </button>
                        </p>
                    </div>

                    <div class="col text-center">
                        <h6>Verifikator</h6>
                        <div class="separator my-2"></div>
                        <p class="mt-5">
                            <button class="btn">
                                {{ $item->verifikator->email ?? 'NA' }}
                            </button>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="separator my-2"></div>
@endfor