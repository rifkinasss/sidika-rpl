<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pegawai\PelaporanPerjadin;

class VerifikasiPelaporanPerjalananDinasController extends Controller
{
    public function index()
    {
        $pelaporanperjadin = PelaporanPerjadin::all();
        return view('admin.verifikasi.verifikasi-pelaporan', compact('pelaporanperjadin'));
    }

    public function show(string $id)
    {
        $user = User::find($id);
        $detail_pelaporanperjadin = PelaporanPerjadin::find($id);
        return view('admin.detail.detail-perjalanan-dinas', compact('detail_pelaporanperjadin'));
    }

    public function update(Request $request, string $id)
    {
        $pelaporanperjadin = PelaporanPerjadin::findOrFail($id);

        if ($request->has('approved')) {
            $pelaporanperjadin->update([
                'status' => 'Disetujui',
            ]);
        } elseif ($request->has('rejected')) {
            $pelaporanperjadin->update([
                'status' => 'Ditolak',
            ]);
        }

        return redirect()->route('verifikasi-pelaporan-perjadin.index');
    }
}
