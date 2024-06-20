<?php

namespace App\Models\Pegawai;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarangJasa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'barang_jasa';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
