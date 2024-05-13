<?php

namespace App\Models\Pegawai;

use App\Models\User;
use App\Models\Pegawai\PerjalananDinas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PelaporanPerjadin extends Model
{
    use HasFactory;


    protected $table = 'pelaporan_perjadins';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function perjalanandinas()
    {
        return $this->belongsTo(PerjalananDinas::class);
    }
}
