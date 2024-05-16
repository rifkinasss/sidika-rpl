<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
use App\Models\Pegawai\PerjalananDinas;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $users = User::get();
        $perjadin = PerjalananDinas::findOrFail($id);

        $data = [
            'title' => 'Surat Perintah Perjalanan Dinas',
            'date' => date('m/d/Y'),
            'users' => $users,
            'perjadin' => $perjadin
        ];

        $pdf = PDF::loadView('pdf.SPPD', $data);
        return $pdf->stream('Surat_Tugas.pdf');
    }
}
