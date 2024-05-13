<?php

namespace App\Http\Controllers\Pegawai;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pegawai\PerjalananDinas;
use App\Models\Pegawai\PelaporanPerjadin;

class PerjalananDinasController extends Controller
{
    public function create()
    {
        return view('pegawai.perjalanan-dinas');
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

        PerjalananDinas::create([
            'user_id' => Auth::id(),
            'keperluan_perjadin' => $request->keperluan_perjadin,
            'jumlah_dibayarkan' => $request->jumlah_dibayarkan,
            'tujuan' => $request->tujuan,
            'tgl_berangkat' => $request->tgl_berangkat,
            'tgl_kembali' => $request->tgl_kembali,
            'jumlah_hari' => $jumlah_hari,
            'uang_harian' => $request->uang_harian,
            'uang_total' => $uang_total,
            'biaya_akomodasi' => $request->biaya_akomodasi,
            'biaya_lain' => $request->biaya_lain,
            'biaya_tiket' => $request->biaya_tiket,
            'jumlah_biaya' => $jumlah_biaya,
        ]);

        session()->flash('uang_total', $uang_total);

        return redirect()->route('pegawai');
    }
    public function destroy(string $id)
    {
        $perjadin = PerjalananDinas::find($id);
        $perjadin->delete();
        return redirect()->route('pegawai');
    }
}
