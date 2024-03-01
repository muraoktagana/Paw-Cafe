<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //
    public function showKategori(){
        $data['kategori']=KategoriProduk::all();
        return view('administrasi.kategoti.kategori', $data);
    }

    public function addKategori(Request $req){
        KategoriProduk::create([
            'nama_kategori' => $req->nama_kategori
        ]);
        return redirect('/kategori');
    }

    public function changeKategori(Request $req){
        KategoriProduk::where('id',$req->id)->update([
            'nama_kategori' => $req->nama_kategori
        ]);
        return redirect('/kategori');
    }

    public function removeKategori($id){
        KategoriProduk::find($id)->delete();
        return redirect('/kategori');
    }

}
