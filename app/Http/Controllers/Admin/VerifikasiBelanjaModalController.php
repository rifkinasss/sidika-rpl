<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai\BarangModal;
use App\Models\User;
use Illuminate\Http\Request;

class VerifikasiBelanjaModalController extends Controller
{
    public function index()
    {
        $barmod = BarangModal::all();
        return view('admin.verifikasi.verifikasi-belanja-modal', compact('barmod'));
    }

    public function show($id)
    {
        $user = User::find($id);
        $barmod = BarangModal::find($id);
        return view('admin.detail.detail-belanja-modal', compact('barmod', 'user'));
    }

    public function laporan(string $id)
    {
        $barmod = BarangModal::find($id);
        return view('admin.detail.laporan-belanja-modal', compact('barmod'));
    }

    public function verif(Request $request, $id)
    {
        $barmod = BarangModal::find($id);
        $tanggal = date('dmY');

        if ($request->has('disetujui')) {
            $nomor_spmk = "SPMK/MDL/DISDIKBUD/{$tanggal}/{$barmod->id}";
            $nomor_bast = "BAST/MDL/DISDIKBUD/{$tanggal}/{$barmod->id}";
            $nomor_sp2d = "SP2D/MDL/DISDIKBUD/{$tanggal}/{$barmod->id}";

            $barmod->update([
                'nomor_spmk' => $nomor_spmk,
                'nomor_bast' => $nomor_bast,
                'nomor_sp2d' => $nomor_sp2d,
                'status_lapor' => 'Disetujui',
            ]);
        } elseif ($request->has('ditolak')) {
            $barmod->update([
                'status_lapor' => 'Ditolak',
            ]);
        }

        return redirect()->route('verifikasi-belanja-modal.index')->with('verif-barmod', 'Status belanja modal berhasil diperbarui.');
    }

    public function update(Request $request, string $id)
    {
        $barmod = BarangModal::find($id);

        if ($request->has('disetujui')) {
            $tanggal = date('dmY');
            $nomor_surat_spk = "SPK/MDL/DISDIKBUD/{$tanggal}/{$barmod->id}";
            $nomor_kontrak = "JWK/MDL/DISDIKBUD/{$tanggal}/{$barmod->id}";
            $nomor_tgl_adendum = "AKT/MDL/DISDIKBUD/{$tanggal}/{$barmod->id}";
            $nomor_sumber_dpa = "DPPA/MDL/DISDIKBUD/{$tanggal}/{$barmod->id}";

            $barmod->update([
                'nomor_sumber_dpa' => $nomor_sumber_dpa,
                'nomor_tgl_adendum' => $nomor_tgl_adendum,
                'nomor_kontrak' => $nomor_kontrak,
                'nomor_surat_spk' => $nomor_surat_spk,
                'status' => 'Disetujui',
            ]);
        } elseif ($request->has('ditolak')) {
            $barmod->update([
                'status' => 'Ditolak',
            ]);
        }

        return redirect()->route('verifikasi-belanja-modal.index')->with('verif-pel-barmod', 'Status progress belanja modal berhasil diperbarui.');
    }
}
