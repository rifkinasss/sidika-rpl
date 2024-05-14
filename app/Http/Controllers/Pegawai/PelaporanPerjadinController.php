<?php

namespace App\Http\Controllers\Pegawai;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pegawai\PerjalananDinas;
use App\Models\Pegawai\PelaporanPerjadin;
use App\Utils\FileUtils;

class PelaporanPerjadinController extends Controller
{
    public function show($id)
    {
        $perjadin = PerjalananDinas::find($id);
        return view('pegawai.pelaporan-perjadin', compact('perjadin'));
    }

    public function store(Request $request, $id)
    {
        $perjadin = PerjalananDinas::find($id);

        $pelaporan = new PelaporanPerjadin();
        $pelaporan->perjalanan_dinas_id = $perjadin->id;
        $pelaporan->jns_penginapan = $request->jns_penginapan;
        $pelaporan->tujuan = $perjadin->tujuan;
        $pelaporan->tgl_berangkat = $perjadin->tgl_berangkat;
        $pelaporan->tgl_kembali = $perjadin->tgl_kembali;
        $pelaporan->jns_transportasi_berangkat = $request->jns_transportasi_berangkat;
        $pelaporan->jns_transportasi_kembali = $request->jns_transportasi_kembali;
        $pelaporan->nama_transportasi_berangkat = $request->nama_transportasi_berangkat;
        $pelaporan->nama_transportasi_kembali = $request->nama_transportasi_kembali;
        $pelaporan->nomor_tiket_berangkat = $request->nomor_tiket_berangkat;
        $pelaporan->nomor_tiket_kembali = $request->nomor_tiket_kembali;
        $pelaporan->nomor_kursi_berangkat = $request->nomor_kursi_berangkat;
        $pelaporan->nomor_kursi_kembali = $request->nomor_kursi_kembali;
        $pelaporan->harga_berangkat = $request->harga_berangkat;
        $pelaporan->harga_kembali = $request->harga_kembali;
        $pelaporan->total_biaya_akomodasi = $request->total_biaya_akomodasi;
        $pelaporan->total_biaya_berangkat = $request->total_biaya_berangkat;
        $pelaporan->total_biaya_kembali = $request->total_biaya_kembali;

        $pelaporan->save();

        return redirect()->route('pegawai', ['perjadin' => $perjadin->id])->with('success', 'Pelaporan berhasil diperbarui.');
    }
    public function destroy(string $id)
    {
        $pelaporan = PelaporanPerjadin::find($id);
        $pelaporan->delete();
        return redirect()->route('pegawai');
    }
}
