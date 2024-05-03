<?php

namespace App\Models;

use App\Models\Pegawai\PerjalananDinas;
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
        return $this->belongsTo(PerjalananDinas::class, 'user_id');
    }
    // public function perjadin()
    // {
    //     return $this->belongsTo(Perjadin::class, 'user_id');
    // }
}
