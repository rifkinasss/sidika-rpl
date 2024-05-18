<?php

namespace App\Models;

use App\Models\Pegawai\BarangJasa;
use App\Models\Pegawai\PelaporanPerjadin;
use App\Models\Pegawai\PerjalananDinas;
use App\Models\Pegawai\BarangModal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nip',
        'nama',
        'email',
        'role',
        'jabatan',
        'unit_kerja',
        'password',
        'nip_or_email',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function perjadin()
    {
        return $this->hasMany(PerjalananDinas::class);
    }

    public function barang_modal()
    {
        return $this->hasMany(BarangModal::class);
    }

    public function barang_jasa()
    {
        return $this->hasMany(BarangJasa::class);
    }
}
