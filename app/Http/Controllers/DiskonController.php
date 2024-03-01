<?php

namespace App\Http\Controllers;

use App\Models\Diskon;
use Illuminate\Http\Request;

class DiskonController extends Controller
{
    //
    public function showDiskon(){
        $data['diskon']=Diskon::all();
        return view('administrasi.diskon.diskon', $data);
    }

    public function addDiskon(Request $req){
        Diskon::create([
            'nama_diskon'=>$req->nama_diskon,
            'jenis_diskon'=>$req->jenis_diskon,
            'nilai_diskon'=>$req->nilai_diskon,
            'deskripsi'=>$req->deskripsi,
            'awal_berlaku'=>$req->awal_berlaku,
            'akhir_berlaku'=>$req->akhir_berlaku
        ]);
        return redirect('/diskon');
    }

    public function changeDiskon(Request $req){
        Diskon::where('id',$req->id)->update([
            'nama_diskon'=>$req->nama_diskon,
            'jenis_diskon'=>$req->jenis_diskon,
            'nilai_diskon'=>$req->nilai_diskon,
            'deskripsi'=>$req->deskripsi,
            'awal_berlaku'=>$req->awal_berlaku,
            'akhir_berlaku'=>$req->akhir_berlaku
        ]);
        return redirect('/diskon');
    }

    public function removeDiskon($id){
        Diskon::find($id)->delete();
        return redirect('/diskon');
    }
}
