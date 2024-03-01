<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    public function showPembeli(){
        $data['pembeli']=Pembeli::all();
        return view('administrasi.pembeli.pembeli', $data);
    }
}
