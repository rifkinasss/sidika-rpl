<?php

namespace App\Models\Pegawai;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PerjalananDinas extends Model
{
    use HasFactory;

    protected $table = 'perjalanan_dinas';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pelaporanPerjadin()
    {
        return $this->hasOne(PelaporanPerjadin::class, 'perjalanan_dinas_id');
    }
}
