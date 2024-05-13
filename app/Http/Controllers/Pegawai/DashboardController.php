<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai\PerjalananDinas;
use App\Models\Pegawai\PelaporanPerjadin;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $perjadin = PerjalananDinas::all();
        $laporan = PelaporanPerjadin::all();
        return view('pegawai.dashboard', compact(['perjadin', 'laporan']));
    }
    public function getDataForChart()
    {
        $dataForChart = PerjalananDinas::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $formattedData = [];
        foreach ($dataForChart as $data) {
            $formattedData[] = [
                'month' => $data->month,
                'total' => $data->total
            ];
        }

        return view('pegawai.dashboard', ['dataForChart' => $formattedData]);
    }

    public function showChart()
    {
        $dataForChart = $this->getTotalPengajuanPerjadin(request());
        return view('pegawai.dashboard', compact('dataForChart'));
    }
}
