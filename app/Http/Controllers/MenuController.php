<?php

namespace App\Http\Controllers;

use App\Models\Cup;
use App\Models\Diskon;
use App\Models\KategoriProduk;
use App\Models\Menu;
use App\Models\Stok_bahan_baku;
use App\Models\Topping;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //Menu

    public function showMenu() {
        $data['kategori']=KategoriProduk::with('produk')->get();

        $data['list_diskon']=Diskon::all();

        $data['topping']=Topping::all();

        $data['bahan']=Stok_bahan_baku::all();

        return view('administrasi.menu.menu', $data);
    }

    public function addMenu(Request $req){
        $filename=$req->gambar_produk->getClientOriginalName();
        Menu::create([
            'produk'=>$req->produk,
            'gambar_produk'=>$req->file('gambar_produk')->storeAs($filename),
            'harga_produk'=>$req->harga_produk,
            'kategori_id'=>$req->kategori_id,
            'stok_bahan_baku_id'=>$req->bahan,
            'diskon_id'=>$req->diskon_id
        ]);
        return redirect('/menu');
    }

    public function changeMenu(Request $req) {
        $data=Menu::where('id', $req->id)->first();
        if ($req->gambar_produk=='') {
            $gambar_produk=$data->gambar_produk;
        }else{
            $filename=$req->gambar_produk->getClientOriginalName();
            $gambar_produk= $req->file('gambar_produk')->storeAs($filename);
        }

        Menu::where('id', $req->id)->update([
            'produk'=>$req->produk,
            'gambar_produk'=>$gambar_produk,
            'harga_produk'=>$req->harga_produk,
            'kategori_id'=>$req->kategori_id,
            'stok_bahan_baku_id'=>$req->bahan,
            'diskon_id'=>$req->diskon_id
        ]);
        return redirect('/menu');
    }

    public function removeMenu($id){
        Menu::find($id)->delete();
        return redirect('/menu');
    }



    //Topping

    public function showTambahan(){
        $data['cup']=Cup::all();
        $data['bahan']=Stok_bahan_baku::all();
        return view('administrasi.menu.tambahan', $data);
    }

    public function addTopping(Request $req){
        $filename=$req->gambar_topping->getClientOriginalName();
        $data=[
            'topping'=>$req->topping,
            'gambar_topping'=>$req->file('gambar_topping')->storeAs($filename),
            'harga_tambah_topping'=>$req->harga_tambah_topping,
            'stok_bahan_baku_id'=>$req->bahan
        ];

        Topping::create($data);
        return redirect('/menu');
    }

    public function changeTopping(Request $req){
        $data=Topping::where('id',$req->id)->first();
        if($req->gambar_topping==''){
            $gambar_topping= $data->gambar_topping;
        }else{
            $filename= $req->gambar_topping->getClientOriginalName();
            $gambar_topping= $req->file('gambar_topping')->storeAs($filename);
        }

        Topping::where('id',$req->id)->update([
            'topping'=>$req->topping,
            'gambar_topping'=>$gambar_topping,
            'harga_tambah_topping'=>$req->harga_tambah_topping,
            'stok_bahan_baku_id'=>$req->bahan
        ]);
        return redirect('/menu');
    }

    public function removeTopping($id){
        Topping::find($id)->delete();
        return redirect('/menu');
    }



    //Cup

    public function addCup(Request $req){
        $data=[
            'cup'=>$req->cup,
            'ukuran'=>$req->ukuran,
            'harga_tambah_cup'=>$req->harga_tambah_cup,
            'stok_bahan_baku_id'=>$req->bahan
        ];
        
        Cup::create($data);
        return redirect('/tambahan');
    }

    public function changeCup(Request $req){
        Cup::where('id', $req->id)->update([
            'cup'=>$req->cup,
            'ukuran'=>$req->ukuran,
            'harga_tambah_cup'=>$req->harga_tambah_cup,
            'stok_bahan_baku_id'=>$req->bahan
        ]);
        return redirect('/tambahan');
    }

    public function removeCup($id){
        Cup::find($id)->delete();
        return redirect('/tambahan');
    }
}
