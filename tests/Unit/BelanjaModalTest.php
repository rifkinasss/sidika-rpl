<?php

namespace Tests\Unit;

use App\Models\BarangModal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class BelanjaModalTest extends TestCase
{
    public function testStoreBarangModal()
    {
        // Buat pengguna dan login
        $user = User::find(3);
        Auth::login($user);

        // Buat data request
        $request = new Request([
            'tgl_spk' => '2024-05-20',
            'jns_belanja' => 'Barang Modal',
            'nilai_kontrak' => 1000000,
            'uraian_pengadaan' => 'Pengadaan Barang Modal',
            'tgl_mulai_kontrak' => '2024-05-21',
            'tgl_berakhir_kontrak' => '2025-05-20',
            'tgl_mulai_adendum' => '2024-06-01',
            'tgl_berakhir_adendum' => '2024-06-30',
            'tgl_mulai_pelaksanaan' => '2024-07-01',
            'tgl_berakhir_pelaksanaan' => '2024-12-31',
            'tgl_mulai_pemeliharaan' => '2025-01-01',
            'tgl_selesai_pemeliharaan' => '2025-03-31',
            'tgl_sumber_dpa' => '2024-05-20',
            'nilai_sumber_dpa' => 2000000,
            'metode_pengadaan_dpa' => 'Lelang Terbuka',
            'uraian_adendum' => 'Adendum Kontrak',
            'bentuk_pelaksanaan' => 'Swakelola',
            'nilai_pelaksanaan' => 1500000,
            'bentuk_pemeliharaan' => 'Kontrak',
            'nilai_pemeliharaan' => 500000,
        ]);

        // Panggil metode store
        $response = $this->post(route('belanja-modal.store'), $request->all());

        // Assert redirect
        $response->assertRedirect();

        // Assert database has the created record
        $this->assertDatabaseHas('barang_modal', [
            'user_id' => $user->id,
            'tgl_spk' => Carbon::createFromFormat('Y-m-d', $request->tgl_spk)->toDateString(),
            'jns_belanja' => $request->jns_belanja,
            'nilai_kontrak' => $request->nilai_kontrak,
            'uraian_pengadaan' => $request->uraian_pengadaan,
            'tgl_mulai_kontrak' => Carbon::createFromFormat('Y-m-d', $request->tgl_mulai_kontrak)->toDateString(),
            'tgl_berakhir_kontrak' => Carbon::createFromFormat('Y-m-d', $request->tgl_berakhir_kontrak)->toDateString(),
            'tgl_mulai_adendum' => Carbon::createFromFormat('Y-m-d', $request->tgl_mulai_adendum)->toDateString(),
            'tgl_berakhir_adendum' => Carbon::createFromFormat('Y-m-d', $request->tgl_berakhir_adendum)->toDateString(),
            'tgl_mulai_pelaksanaan' => Carbon::createFromFormat('Y-m-d', $request->tgl_mulai_pelaksanaan)->toDateString(),
            'tgl_berakhir_pelaksanaan' => Carbon::createFromFormat('Y-m-d', $request->tgl_berakhir_pelaksanaan)->toDateString(),
            'tgl_mulai_pemeliharaan' => Carbon::createFromFormat('Y-m-d', $request->tgl_mulai_pemeliharaan)->toDateString(),
            'tgl_selesai_pemeliharaan' => Carbon::createFromFormat('Y-m-d', $request->tgl_selesai_pemeliharaan)->toDateString(),
            'tgl_sumber_dpa' => Carbon::createFromFormat('Y-m-d', $request->tgl_sumber_dpa)->toDateString(),
            'nilai_sumber_dpa' => $request->nilai_sumber_dpa,
            'metode_pengadaan_dpa' => $request->metode_pengadaan_dpa,
            'uraian_adendum' => $request->uraian_adendum,
            'bentuk_pelaksanaan' => $request->bentuk_pelaksanaan,
            'nilai_pelaksanaan' => $request->nilai_pelaksanaan,
            'bentuk_pemeliharaan' => $request->bentuk_pemeliharaan,
            'nilai_pemeliharaan' => $request->nilai_pemeliharaan,
        ]);
    }
}
