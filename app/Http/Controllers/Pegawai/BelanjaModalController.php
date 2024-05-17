<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai\BarangModal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BelanjaModalController extends Controller
{
    public function detail(string $id)
    {
        $barmod = BarangModal::find($id);
        return view('pegawai.detail.detail-belanja-modal', compact('barmod'));
    }
    
    public function create()
    {
        return view('pegawai.belanja-modal');
    }

    public function store(Request $request)
    {
        $tgl_spk = Carbon::createFromFormat('Y-m-d', $request->tgl_spk);

        $tgl_mulai_kontrak = Carbon::createFromFormat('Y-m-d', $request->tgl_mulai_kontrak);
        $tgl_berakhir_kontrak = Carbon::createFromFormat('Y-m-d', $request->tgl_berakhir_kontrak);
        $jumlah_hari_kontrak = $tgl_berakhir_kontrak->diffInDays($tgl_mulai_kontrak);
        
        $tgl_mulai_adendum = Carbon::createFromFormat('Y-m-d', $request->tgl_mulai_adendum);
        $tgl_berakhir_adendum = Carbon::createFromFormat('Y-m-d', $request->tgl_berakhir_adendum);
        $jumlah_hari_adendum = $tgl_berakhir_adendum->diffInDays($tgl_mulai_adendum);


        $tgl_mulai_pelaksanaan = Carbon::createFromFormat('Y-m-d', $request->tgl_mulai_pelaksanaan);
        $tgl_berakhir_pelaksanaan = Carbon::createFromFormat('Y-m-d', $request->tgl_berakhir_pelaksanaan);
        $tgl_mulai_pemeliharaan = Carbon::createFromFormat('Y-m-d', $request->tgl_mulai_pemeliharaan);
        $tgl_selesai_pemeliharaan = Carbon::createFromFormat('Y-m-d', $request->tgl_selesai_pemeliharaan);
        $tgl_sumber_dpa = Carbon::createFromFormat('Y-m-d', $request->tgl_sumber_dpa);
        
        BarangModal::create([
            'user_id' => Auth::id(),
            'tgl_spk' => $tgl_spk,
            'jns_belanja' => $request->jns_belanja,
            'nilai_kontrak' => $request->nilai_kontrak,
            'uraian_pengadaan' => $request->uraian_pengadaan,
            'tgl_mulai_kontrak' => $tgl_mulai_kontrak,
            'tgl_berakhir_kontrak' => $tgl_berakhir_kontrak,
            'jumlah_hari_kontrak' => $jumlah_hari_kontrak,
            'uraian_adendum' => $request->uraian_adendum,
            'tgl_mulai_adendum' => $tgl_mulai_adendum,
            'tgl_berakhir_adendum' => $tgl_berakhir_adendum,
            'jumlah_hari_adendum' => $jumlah_hari_adendum,
            'bentuk_pelaksanaan' => $request->bentuk_pelaksanaan,
            'nilai_pelaksanaan' => $request->nilai_pelaksanaan,
            'tgl_mulai_pelaksanaan' => $tgl_mulai_pelaksanaan,
            'tgl_berakhir_pelaksanaan' => $tgl_berakhir_pelaksanaan,
            'bentuk_pemeliharaan' => $request->bentuk_pemeliharaan,
            'nilai_pemeliharaan' => $request->nilai_pemeliharaan,
            'tgl_mulai_pemeliharaan' => $tgl_mulai_pemeliharaan,
            'tgl_selesai_pemeliharaan' => $tgl_selesai_pemeliharaan,
            'tgl_sumber_dpa' => $tgl_sumber_dpa,
            'nilai_sumber_dpa' => $request->nilai_sumber_dpa,
            'metode_pengadaan_dpa' => $request->metode_pengadaan_dpa,
        ]);

        return redirect()->route('pegawai');
    }

    public function show($id)
    {
        return view('pegawai.laporan_belanja-modal');
    }
}
