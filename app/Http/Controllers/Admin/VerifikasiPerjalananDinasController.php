<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai\PerjalananDinas;
use Illuminate\Http\Request;
use App\Models\User;

class VerifikasiPerjalananDinasController extends Controller
{
    public function index()
    {
        $perjalanandinas = perjalanandinas::all();
        return view('admin.verifikasi.verifikasi-perjalanan-dinas', compact('perjalanandinas'));
    }

    public function show(string $id)
    {
        $user = User::find($id);
        $detail_perjalanandinas = perjalanandinas::find($id);
        return view('admin.detail.detail-perjalanan-dinas', compact('detail_perjalanandinas', 'user'));
    }

    public function update(Request $request, string $id)
    {
        $perjalanandinas = perjalanandinas::find($id);

        if ($request->has('disetujui')) {
            $perjalanandinas->update([
                'status' => 'Disetujui',
            ]);

            $tanggal = date('dmY');
            $nomorSurat = "SPM/{$tanggal}/{$perjalanandinas->id}";

            $perjalanandinas->update([
                'nomor_surat' => $nomorSurat,
            ]);
        } elseif ($request->has('ditolak')) {
            $perjalanandinas->update([
                'status' => 'Ditolak',
            ]);
        }

        return redirect()->route('verifikasi-perjalanan-dinas.index')->with('success', 'Status perjalanan dinas berhasil diperbarui.');
    }
}
