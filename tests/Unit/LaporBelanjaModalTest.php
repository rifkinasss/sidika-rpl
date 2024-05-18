<?php

namespace Tests\Unit;

use App\Models\Pegawai\BarangModal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LaporBelanjaModalTest extends TestCase
{
    public function testLaporBelanjaModal()
    {
        // Setup: Buat pengguna dan barang modal
        $user = User::find(3);
        $barmod = BarangModal::find(5);

        // Login pengguna
        Auth::login($user);

        // Data yang akan diupdate
        $updateData = [
            'tgl_spmk' => '2024-05-22',
            'tgl_bast' => '2024-05-23',
            'nilai_bast' => 1100000,
            'tgl_pho' => '2024-05-24',
            'tgl_fho' => '2024-05-25',
            'tgl_sp2d' => '2024-05-26',
            'nilai_sp2d' => 1200000,
            'persentase_progress' => '75',
        ];

        // Panggil metode update
        $barmod->update($updateData + ['status_lapor' => 'Lapor']);

        // Ambil ulang model dari database
        $updatedBarmod = BarangModal::find($barmod->id);

        // Assert: Periksa bahwa nilai-nilai telah diupdate dengan benar
        $this->assertEquals($updateData['tgl_spmk'], $updatedBarmod->tgl_spmk);
        $this->assertEquals($updateData['tgl_bast'], $updatedBarmod->tgl_bast);
        $this->assertEquals($updateData['nilai_bast'], $updatedBarmod->nilai_bast);
        $this->assertEquals($updateData['tgl_pho'], $updatedBarmod->tgl_pho);
        $this->assertEquals($updateData['tgl_fho'], $updatedBarmod->tgl_fho);
        $this->assertEquals($updateData['tgl_sp2d'], $updatedBarmod->tgl_sp2d);
        $this->assertEquals($updateData['nilai_sp2d'], $updatedBarmod->nilai_sp2d);
        $this->assertEquals($updateData['persentase_progress'], $updatedBarmod->persentase_progress);
        $this->assertEquals('Lapor', $updatedBarmod->status_lapor);
    }
}
