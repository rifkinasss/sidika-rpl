<?php

namespace App\Models\Pegawai;

use App\Models\User;
use App\Models\Pegawai\PerjalananDinas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PelaporanPerjadin extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = 'pelaporan_perjadins';
    protected $guarded = ['id'];

    protected $fillable = [
        'perjalanan_dinas_id',
        'jns_penginapan',
        'tujuan',
        'tgl_berangkat',
        'tgl_kembali',
        'jns_transportasi_berangkat',
        'jns_transportasi_kembali',
        'nama_transportasi_berangkat',
        'nama_transportasi_kembali',
        'nomor_tiket_berangkat',
        'nomor_tiket_kembali',
        'nomor_kursi_berangkat',
        'nomor_kursi_kembali',
        'harga_berangkat',
        'harga_kembali',
        'total_biaya_akomodasi',
        'total_biaya_berangkat',
        'total_biaya_kembali',
        'bukti_akomodasi',
        'bukti_berangkat',
        'bukti_kembali',
        'status',
    ];

    public function perjalananDinas()
    {
        return $this->belongsTo(PerjalananDinas::class, 'perjalanan_dinas_id');
    }
}
