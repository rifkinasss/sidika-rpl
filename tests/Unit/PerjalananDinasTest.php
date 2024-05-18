<?php

namespace Tests\Unit;

use App\Models\Pegawai\PerjalananDinas;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerjalananDinasTest extends TestCase
{
    public function testCreatePerjalananDinas()
    {
        $user = User::find(3);
        Auth::login($user);

        $request = new Request([
            'keperluan_perjadin' => 'Meeting',
            'jumlah_dibayarkan' => 500000,
            'tujuan' => 'Jakarta',
            'tgl_berangkat' => '2024-05-20',
            'tgl_kembali' => '2024-05-25',
            'uang_harian' => 100000,
            'biaya_akomodasi' => 200000,
            'biaya_lain' => 50000,
        ]);

        $jumlah_hari = (new \DateTime($request->tgl_kembali))->diff(new \DateTime($request->tgl_berangkat))->days + 1;
        $uang_total = $jumlah_hari * $request->uang_harian;
        $jumlah_biaya = $uang_total + $request->biaya_akomodasi + $request->biaya_lain;

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
            'jumlah_biaya' => $jumlah_biaya,
        ]);

        $this->assertDatabaseHas('perjalanan_dinas', [
            'user_id' => $user->id,
            'keperluan_perjadin' => 'Meeting',
            'jumlah_dibayarkan' => 500000,
            'tujuan' => 'Jakarta',
            'tgl_berangkat' => '2024-05-20',
            'tgl_kembali' => '2024-05-25',
            'jumlah_hari' => $jumlah_hari,
            'uang_harian' => 100000,
            'uang_total' => $uang_total,
            'biaya_akomodasi' => 200000,
            'biaya_lain' => 50000,
            'jumlah_biaya' => $jumlah_biaya,
        ]);
    }
}
