<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai\BarangJasa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BelanjaBarangJasaController extends Controller
{
    public function detail(string $id)
    {
        $barjas = BarangJasa::find($id);
        return view('pegawai.detail.detail-belanja-barang-jasa', compact('barjas'));
    }
    
    public function create()
    {
        return view('pegawai.belanja-barang-jasa');
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

        BarangJasa::create([
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

        return redirect()->route('pegawai')->with('belanja-barjas', 'Pengajuan belanja barang jasa berhasil dikirim.');
    }

    public function show($id)
    {
        $barjas = BarangJasa::find($id);
        return view('pegawai.laporan_belanja-barang-jasa', compact('barjas'));
    }

    public function update(Request $request, string $id)
    {
        $barjas = BarangJasa::find($id);

        if ($barjas->status_lapor == 'Belum') {
            $tgl_spmk = Carbon::createFromFormat('Y-m-d', $request->tgl_spmk);
            $tgl_bast = Carbon::createFromFormat('Y-m-d', $request->tgl_bast);
            $tgl_pho = Carbon::createFromFormat('Y-m-d', $request->tgl_pho);
            $tgl_fho = Carbon::createFromFormat('Y-m-d', $request->tgl_fho);
            $tgl_sp2d = Carbon::createFromFormat('Y-m-d', $request->tgl_sp2d);

            $barjas->update([
                'tgl_spmk' => $tgl_spmk,
                'tgl_bast' => $tgl_bast,
                'nilai_bast' => $request->nilai_bast,
                'tgl_pho' => $tgl_pho,
                'tgl_fho' => $tgl_fho,
                'tgl_sp2d' => $tgl_sp2d,
                'nilai_sp2d' => $request->nilai_sp2d,
                'persentase_progress' => $request->persentase_progress,
                'status_lapor' => 'Lapor',
            ]);

        } elseif ($barjas->status_lapor != 'Belum') {
            $barjas->update([
                'persentase_progress' => $request->persentase_progress,
            ]);

        } 

        return redirect()->route('pegawai')->with('pel-belanja-barjas', 'Progress dokumen belanja barang jasa berhasil diperbarui.');
    }
}
