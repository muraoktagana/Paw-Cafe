<?php

namespace App\Http\Controllers;

use App\Models\Pasokan;
use App\Models\Pemasokan;
use App\Models\Stok_bahan_baku;
use Illuminate\Http\Request;

class PemasokanController extends Controller
{
    //
    public function showStok(){
        $data['barang']=Stok_bahan_baku::all();

        return view('administrasi.pemasokan.stok', $data);
    }

    public function addStok(Request $req){
        $data=[
            'bahan_baku'=>$req->bahan_baku,
            'stok'=>$req->stok
        ];

        $validasi=Stok_bahan_baku::where('bahan_baku', $req->bahan_baku)->first();

        if(!$validasi){
            Stok_bahan_baku::create($data);
        }else{
            return back()->withErrors('Bahan baku sudah terdaftar!')->withInput();
        }

        return redirect('/stok');
    }

    public function changeStok(Request $req){

        $data=[
            'bahan_baku'=>$req->bahan_baku,
            'stok'=>$req->stok
        ];

        Stok_bahan_baku::where('id', $req->id)->update($data);
        return redirect('/stok');
    }

    public function removeStok($id){
        Stok_bahan_baku::find($id)->delete();
        return redirect('/stok');
    }





    // Pemasokan

    public function showPemasokan(){
        
        $data['pemasokan']=Pasokan::all();
        $data['pasokan']=Stok_bahan_baku::all();

        return view('administrasi.pemasokan.pemasokan', $data); 
    }

    public function addPemasokan(Request $req){
        $tanggal_pemasokan=Pemasokan::create([
            'tanggal_pemasokan'=>$req->tanggal_pemasokan
        ]);

        $data=[
            'harga_pasokan'=>$req->harga_pasokan,
            'satuan'=>$req->satuan,
            'jumlah_beli'=>$req->jumlah_beli,
            'stok_bahan_baku_id'=>$req->bahan_baku,
            'pemasokan_id'=>$tanggal_pemasokan->id
        ];

        Pasokan::create($data);
        return redirect('/pemasokan');
    }

    public function changePemasokan(Request $req){
        $tanggal_pemasokan=Pemasokan::create([
            'tanggal_pemasokan'=>$req->tanggal_pemasokan
        ]);

        $data=[
            'harga_pasokan'=>$req->harga_pasokan,
            'satuan'=>$req->satuan,
            'jumlah_beli'=>$req->jumlah_beli,
            'stok_bahan_baku_id'=>$req->bahan_baku,
            'pemasokan_id'=>$tanggal_pemasokan->id
        ];

        Pasokan::where('id', $req->id)->update($data);
        return redirect('/pemasokan');
    }

    public function removePemasokan($pemasokan_id){
        Pemasokan::find($pemasokan_id)->delete();
        return redirect('/pemasokan');
    }
}
