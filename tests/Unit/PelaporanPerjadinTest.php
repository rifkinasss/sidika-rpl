<?php

namespace Tests\Unit;

use App\Models\Pegawai\PerjalananDinas;
use App\Models\Pegawai\PelaporanPerjadin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PelaporanPerjadinTest extends TestCase
{

    public function testStorePelaporanPerjadin()
    {
        // Siapkan penyimpanan untuk pengujian
        Storage::fake('public');

        // Buat pengguna dan login
        $user = User::find(3);
        Auth::login($user);

        // Buat entri PerjalananDinas
        $perjadin = PerjalananDinas::find(1);

        // Buat file palsu
        $bukti_akomodasi = UploadedFile::fake()->image('bukti_akomodasi.jpg');
        $bukti_berangkat = UploadedFile::fake()->image('bukti_berangkat.jpg');
        $bukti_kembali = UploadedFile::fake()->image('bukti_kembali.jpg');

        // Buat permintaan palsu dengan unggahan file yang valid
        $request = new Request([
            'jns_penginapan' => 'Hotel',
            'jns_transportasi_berangkat' => 'Pesawat',
            'jns_transportasi_kembali' => 'Kereta',
            'nama_transportasi_berangkat' => 'Garuda Indonesia',
            'nama_transportasi_kembali' => 'KAI',
            'nomor_tiket_berangkat' => 'GA123',
            'nomor_tiket_kembali' => 'KA456',
            'nomor_kursi_berangkat' => '12A',
            'nomor_kursi_kembali' => '14B',
            'harga_berangkat' => 1000000,
            'harga_kembali' => 800000,
            'total_biaya_akomodasi' => 3000000,
            'total_biaya_berangkat' => 1000000,
            'total_biaya_kembali' => 800000,
            'bukti_akomodasi' => $bukti_akomodasi,
            'bukti_berangkat' => $bukti_berangkat,
            'bukti_kembali' => $bukti_kembali,
        ]);

        // Panggil metode store
        $response = $this->post(route('pelaporan-perjadin.store', ['id' => $perjadin->id]), $request->all());

        // Periksa pengalihan
        $response->assertRedirect(route('pegawai', ['perjadin' => $perjadin->id]));

        // Periksa sesi memiliki pesan sukses
        $response->assertSessionHas('success', 'Pelaporan berhasil diperbarui.');

        // Verifikasi bahwa data telah disimpan dengan benar
        $this->assertDatabaseHas('pelaporan_perjadins', [
            'perjalanan_dinas_id' => $perjadin->id,
            'user_id' => $user->id,
            'jns_penginapan' => 'Hotel',
            'jns_transportasi_berangkat' => 'Pesawat',
            'jns_transportasi_kembali' => 'Kereta',
            'nama_transportasi_berangkat' => 'Garuda Indonesia',
            'nama_transportasi_kembali' => 'KAI',
            'nomor_tiket_berangkat' => 'GA123',
            'nomor_tiket_kembali' => 'KA456',
            'nomor_kursi_berangkat' => '12A',
            'nomor_kursi_kembali' => '14B',
            'harga_berangkat' => 1000000,
            'harga_kembali' => 800000,
            'total_biaya_akomodasi' => 3000000,
            'total_biaya_berangkat' => 1000000,
            'total_biaya_kembali' => 800000,
        ]);

        // Periksa file telah disimpan
        Storage::disk('public')->assertExists('uploads/bukti_akomodasi/' . $bukti_akomodasi->hashName());
        Storage::disk('public')->assertExists('uploads/bukti_berangkat/' . $bukti_berangkat->hashName());
        Storage::disk('public')->assertExists('uploads/bukti_kembali/' . $bukti_kembali->hashName());
    }
}
