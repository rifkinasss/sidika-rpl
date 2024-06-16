<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai\BarangJasa;
use App\Models\User;
use Illuminate\Http\Request;

class VerifikasiBelanjaBarangJasaController extends Controller
{
    public function index()
    {
        $barjas = BarangJasa::all();
        return view('admin.verifikasi.verifikasi-belanja-barang', compact('barjas'));
    }

    public function show($id)
    {
        $user = User::find($id);
        $barjas = BarangJasa::find($id);
        return view('admin.detail.detail-belanja-barang', compact('barjas', 'user'));
    }

    public function laporan(string $id)
    {
        $barjas = BarangJasa::find($id);
        return view('admin.detail.laporan-belanja-barang', compact('barjas'));
    }

    public function verif(Request $request, $id)
    {
        $barjas = BarangJasa::find($id);
        $tanggal = date('dmY');

        if ($request->has('disetujui')) {
            $nomor_spmk = "SPMK/BJS/DISDIKBUD/{$tanggal}/{$barjas->id}";
            $nomor_bast = "BAST/BJS/DISDIKBUD/{$tanggal}/{$barjas->id}";
            $nomor_sp2d = "SP2D/BJS/DISDIKBUD/{$tanggal}/{$barjas->id}";

            $barjas->update([
                'nomor_spmk' => $nomor_spmk,
                'nomor_bast' => $nomor_bast,
                'nomor_sp2d' => $nomor_sp2d,
                'status_lapor' => 'Disetujui',
            ]);
        } elseif ($request->has('ditolak')) {
            $barjas->update([
                'status_lapor' => 'Ditolak',
            ]);
        }

        return redirect()->route('verifikasi-belanja-barang-jasa.index')->with('verif-barjas', 'Status barang jasa berhasil diperbarui.');
    }

    public function update(Request $request, string $id)
    {
        $barjas = BarangJasa::find($id);

        if ($request->has('disetujui')) {
            $tanggal = date('dmY');
            $nomor_surat_spk = "SPK/BJS/DISDIKBUD/{$tanggal}/{$barjas->id}";
            $nomor_kontrak = "JWK/BJS/DISDIKBUD/{$tanggal}/{$barjas->id}";
            $nomor_tgl_adendum = "AKT/BJS/DISDIKBUD/{$tanggal}/{$barjas->id}";
            $nomor_sumber_dpa = "DPPA/BJS/DISDIKBUD/{$tanggal}/{$barjas->id}";

            $barjas->update([
                'nomor_sumber_dpa' => $nomor_sumber_dpa,
                'nomor_tgl_adendum' => $nomor_tgl_adendum,
                'nomor_kontrak' => $nomor_kontrak,
                'nomor_surat_spk' => $nomor_surat_spk,
                'status' => 'Disetujui',
            ]);
        } elseif ($request->has('ditolak')) {
            $barjas->update([
                'status' => 'Ditolak',
            ]);
        }

        return redirect()->route('verifikasi-belanja-barang-jasa.index')->with('verif-pel-barjas', 'Status progress belanja barang jasa berhasil diperbarui.');
    }
}
