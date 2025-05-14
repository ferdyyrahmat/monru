<?php

namespace App\Http\Controllers\System\Monitoring;

use App\Http\Controllers\Controller;
use App\Models\FormPengukuran;
use App\Models\RuanganAlat;
use App\Models\SubDepartment;
use Illuminate\Http\Request;

class DashboardPemeriksaanController extends Controller
{
    public function index()
    {
        $department = SubDepartment::query()->orderBy('name', 'asc')->get();
        return view('pages.monitoring.dashboard-pemeriksaan.index', compact('department'));
    }

    public function show(Request $request, $id)
    {
        if($request->ajax()){
            $dataMonitoring = FormPengukuran::query()
                // ->with('ruangan')
                ->where('id_ruangan', $request->ruang)
                ->where('bulan_pemeriksaan', $request->f_month)
                ->where('tahun_pemeriksaan', $request->f_year)
                ->latest()
                ->get();

            $ruang = RuanganAlat::with('jenisRuangan')->with('jenisDp')->where('id', $request->ruang)->first();

            return response()->json([
                'view' => view('pages.monitoring.dashboard-pemeriksaan.partial.list', compact('dataMonitoring'))->render(),
                'data' => $ruang,
                'monitoring_data' => $dataMonitoring,
            ]);
        }

        $dataMonitoring = FormPengukuran::query()
            ->where('id_sub_department', $id)
            ->latest()
            ->get();

        $ruangan = RuanganAlat::query()
                ->where('id_sub_department', $id)
                ->orderBy('area_name', 'asc')
                ->get();
        return view('pages.monitoring.dashboard-pemeriksaan.show', compact('dataMonitoring', 'ruangan'));
    }
}
