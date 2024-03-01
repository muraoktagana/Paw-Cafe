<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporan(){
        $data['laporan']=Penjualan::with('pembeli')->get();
        $data['total_keuangan']=$data['laporan']->sum('total_pendapatan');
        return view('administrasi.laporan.laporan_penjualan', $data);
    }
}
