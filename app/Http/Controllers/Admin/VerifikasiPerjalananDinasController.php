<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai\PerjalananDinas;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\PerjalananDinasApproved;
use App\Mail\PerjalananDinasRejected;
use Illuminate\Support\Facades\Mail;

class VerifikasiPerjalananDinasController extends Controller
{
    public function index()
    {
        $perjalanandinas = PerjalananDinas::all();
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
            $tanggal = date('dmY');
            $nomorSurat = "SPM/{$tanggal}/{$perjalanandinas->id}";

            $perjalanandinas->update([
                'nomor_surat' => $nomorSurat,
                'status' => 'Disetujui',
            ]);

            // Send approval email
            Mail::to($perjalanandinas->user->email)->send(new PerjalananDinasApproved($perjalanandinas));
        } elseif ($request->has('ditolak')) {
            $perjalanandinas->update([
                'status' => 'Ditolak',
            ]);

            // Send rejection email
            Mail::to($perjalanandinas->user->email)->send(new PerjalananDinasRejected($perjalanandinas));
        }

        return redirect()->route('verifikasi-perjalanan-dinas.index')->with('verif-perjadin', 'Status perjalanan dinas berhasil diperbarui.');
    }
}
