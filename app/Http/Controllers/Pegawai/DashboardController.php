<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pegawai\PerjalananDinas;
use App\Models\Pegawai\PelaporanPerjadin;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function index()
    {
        $perjadin = PerjalananDinas::all();
        $laporan = PelaporanPerjadin::all();
        return view('pegawai.dashboard', compact(['perjadin', 'laporan']));
    }

    public function getTotalPengajuanPerjadin(Request $request)
    {
        $totalPengajuanPerjadin = Perjalanandinas::selectRaw('YEAR(tanggal_berangkat) as tahun, COUNT(*) as total_pengajuan')
            ->groupBy('tahun')
            ->get();
        $labels = $totalPengajuanPerjadin->pluck('tahun');
        $data = $totalPengajuanPerjadin->pluck('total_pengajuan');
        $dataForChart = [
            'labels' => $labels,
            'data' => $data,
        ];

        return $dataForChart;
    }

    public function showChart()
    {
        $dataForChart = $this->getTotalPengajuanPerjadin(request());
        return view('pegawai.dashboard', compact('dataForChart'));
    }
}
