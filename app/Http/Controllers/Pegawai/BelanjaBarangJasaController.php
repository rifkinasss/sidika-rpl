<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BelanjaBarangJasaController extends Controller
{
    public function create()
    {
        return view('pegawai.belanja-barang-jasa');
    }
}
