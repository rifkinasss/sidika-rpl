<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai\BarangJasa;
use App\Models\Pegawai\BarangModal;
use App\Models\Pegawai\PerjalananDinas;
use App\Models\Pegawai\PelaporanPerjadin;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the data for the chart
        $dataForChart = PerjalananDinas::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Map month numbers to month names
        $months = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];

        // Format the data for the chart
        $formattedData = [];
        foreach ($dataForChart as $data) {
            $yearMonth = explode('-', $data->month);
            $year = $yearMonth[0];
            $monthNumber = $yearMonth[1];

            $formattedData[] = [
                'month' => $months[$monthNumber] . ' ' . $year,
                'total' => $data->total,
            ];
        }

        // Fetch additional data
        $perjadinCount = PerjalananDinas::count();
        $laporanCount = PelaporanPerjadin::count();
        $barangModalCount = BarangModal::count();
        $barangJasaCount = BarangJasa::count();
        $jumlahDisetujui = PerjalananDinas::where('status', 'disetujui')->count();

        // Pass data to the view
        return view('pegawai.dashboard', compact(
            'perjadinCount',
            'laporanCount',
            'barangModalCount',
            'barangJasaCount',
            'formattedData',
            'jumlahDisetujui'
        ));
    }



    public function showChart()
    {
        $dataForChart = $this->getTotalPengajuanPerjadin(request());
        return view('pegawai.dashboard', compact('dataForChart'));
    }
}
