<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai\PerjalananDinas;
use App\Models\Pegawai\PelaporanPerjadin;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the raw data from the database including the year
        $dataForChart = PerjalananDinas::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Map month numbers to month names
        $months = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        ];

        // Format the data
        $formattedData = [];
        foreach ($dataForChart as $data) {
            $yearMonth = explode('-', $data->month);
            $year = $yearMonth[0];
            $monthNumber = $yearMonth[1];

            $formattedData[] = [
                'month' => $months[$monthNumber] . ' ' . $year,
                'total' => $data->total
            ];
        }

        // Fetch additional data
        $perjadin = PerjalananDinas::all();
        $laporan = PelaporanPerjadin::all();

        // Pass data to the view
        return view('pegawai.dashboard', compact('perjadin', 'laporan', 'formattedData'));
    }



    public function showChart()
    {
        $dataForChart = $this->getTotalPengajuanPerjadin(request());
        return view('pegawai.dashboard', compact('dataForChart'));
    }
}
