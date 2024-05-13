<?php

namespace App\Http\Controllers\Pegawai;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pegawai\PerjalananDinas;
use App\Models\Pegawai\PelaporanPerjadin;

class PelaporanPerjadinController extends Controller
{
    public function create()
    {
        $perjalanandinas = PerjalananDinas::where('user_id', Auth::id())->get();
        return view('pegawai.pelaporan-perjadin', compact('perjalanandinas'));
    }

    public function store(Request $request)
    {
        $tglBerangkat = Carbon::createFromFormat('Y-m-d', $request->tgl_berangkat);
        $tglKembali = Carbon::createFromFormat('Y-m-d', $request->tgl_kembali);
        $jumlah_hari = $tglKembali->diffInDays($tglBerangkat);

        $uang_total = $request->uang_harian * $jumlah_hari;

        $uang_total = (float)$uang_total;
        $biaya_akomodasi = (float)$request->biaya_akomodasi;
        $biaya_lain = (float)$request->biaya_lain;
        $biaya_tiket = (float)$request->biaya_tiket;

        if (!is_numeric($uang_total) || !is_numeric($biaya_akomodasi) || !is_numeric($biaya_lain) || !is_numeric($biaya_tiket)) {
            return response()->json(['error' => 'Input tidak valid'], 400);
        }

        $jumlah_biaya = $uang_total + $biaya_akomodasi + $biaya_lain + $biaya_tiket;

        PelaporanPerjadin::create([
            'user_id' => Auth::id(),
            'jns_penginapan' => $request->jns_penginapan,
            'tujuan' => $request->tujuan,
            'tgl_berangkat' => $request->tgl_berangkat,
            'tgl_kembali' => $request->tgl_kembali,
            'jns_transportasi_berangkat' => $request->jns_transportasi_berangkat,
            'jns_transportasi_kembali' => $request->jns_transportasi_kembali,
            'nama_transportasi_berangkat' => $request->nama_transportasi_berangkat,
            'nama_transportasi_kembali' => $request->nama_transportasi_kembali,
            'nomor_tiket_berangkat' => $request->nomor_tiket_berangkat,
            'nomor_tiket_kembali' => $request->nomor_tiket_kembali,
            'nomor_kursi_berangkat' => $request->nomor_kursi_berangkat,
            'nomor_kursi_kembali' => $request->nomor_kursi_kembali,
            'harga_berangkat' => $request->harga_berangkat,
            'harga_kembali' => $request->harga_kembali,
            'bukti_akomodasi' => $request->bukti_akomodasi,
            'total_biaya_akomodasi' => $request->total_biaya_akomodasi,
            'bukti_berangkat' => $request->bukti_berangkat,
            'total_biaya_berangkat' => $request->total_biaya_berangkat,
            'bukti_kembali' => $request->bukti_kembali,
            'total_biaya_kembali' => $request->total_biaya_kembali,
        ]);

        session()->flash('uang_total', $uang_total);

        return redirect()->route('pegawai');
    }
    public function destroy(string $id)
    {
        $pelaporan = PelaporanPerjadin::find($id);
        $pelaporan->delete();
        return redirect()->route('pegawai');
    }
}
