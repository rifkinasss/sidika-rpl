<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BelanjaModalController extends Controller
{
    public function create()
    {
        return view('pegawai.belanja-modal');
    }
}
