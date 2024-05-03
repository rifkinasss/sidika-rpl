<?php

namespace App\Models\Pegawai;

use App\Models\User;
use App\Models\Pegawai\PerjalananDinas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PelaporanPerjadin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function perjalanandinas()
    {
        return $this->belongsTo(PerjalananDinas::class, 'perjalanan_dinas_id');
    }
}
