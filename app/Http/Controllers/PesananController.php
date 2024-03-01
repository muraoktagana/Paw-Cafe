<?php

namespace App\Http\Controllers;

use App\Models\Cup;
use App\Models\Diskon;
use App\Models\KategoriProduk;
use App\Models\Menu;
use App\Models\Pembeli;
use App\Models\Penjualan;
use App\Models\Pesanan;
use App\Models\Topping;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    //
    public function  index() {
        $data['kategori']=KategoriProduk::with('produk')->get();

        $data['toppings']=Topping::all();

        $data['cups'] = Cup::all();
        return view('administrasi.dashboard.pemesanan', $data);
    }

    public function  search(Request $req) {
        $data['kategori']=KategoriProduk::with('produk')->get();

        $data['toppings']=Topping::all();

        $data['cups'] = Cup::all();
        return view('administrasi.dashboard.pemesanan', $data);
    }

    public function addToCart($id){
        $product = Menu::find($id);
        $diskon =  Diskon::find($product->diskon_id);
        if ( !$product ){
            abort(404);
        }

        $cart = session()->get('cart');

        if(!$cart){

            $hargaSetelahDiskon = $product->harga_produk;

            if($diskon){
                if ($diskon->jenis_diskon === 'nominal') {
                    // Jika jenis diskon adalah nominal uang
                    $hargaSetelahDiskon = $product->harga_produk - $diskon->nilai_diskon;
                } elseif ($diskon->jenis_diskon === 'persentase') {
                    // Jika jenis diskon adalah persentase
                    $diskonPersen = $diskon->nilai_diskon / 100;
                    $hargaSetelahDiskon = $product->harga_produk - ($product->harga_produk * $diskonPersen);
                }
            }

            $card=[
                $id =>[
                    'produk'=>$product->produk,
                    'quantity'=>1,
                    'price'=>$hargaSetelahDiskon,
                    'photo'=>$product->gambar_produk
                ]
            ];
            session()->put('cart',$card);
            return redirect()->back()->with('success','Product added to cart successfully!');
        }

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;

            session()->put('cart',$cart);
            return  redirect()->back()->with('success','Product is already in your cart!');
        }

        $hargaSetelahDiskon = $product->harga_produk;

        if($diskon){
            if ($diskon->jenis_diskon === 'nominal') {
                // Jika jenis diskon adalah nominal uang
                $hargaSetelahDiskon = $product->harga_produk - $diskon->nilai_diskon;
            } elseif ($diskon->jenis_diskon === 'persentase') {
                // Jika jenis diskon adalah persentase
                $diskonPersen = $diskon->nilai_diskon / 100;
                $hargaSetelahDiskon = $product->harga_produk - ($product->harga_produk * $diskonPersen);
            }
        }

        $cart[$id] = [
            'produk'=>$product->produk,
            'quantity'=>1,
            'price'=>$hargaSetelahDiskon,
            'photo'=>$product->gambar_produk
        ];

        session()->put('cart',$cart);

        if(request()->wantsJson()) {
            return response()->json(['message' => 'Product added to cart successfully!']);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');

    }

    public function removeCartItem(Request $request)
    {
        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    public function clearCart(){
        session()->forget('cart');
        return redirect()->back();
    }


    public function checkout(Request $req){

        $pembeli_id=Pembeli::where('nama_pembeli', $req->nama_pembeli)->first();

        if(!isset($pembeli_id)){
            $pembeli_id = Pembeli::create([
                'nama_pembeli'=>$req->nama_pembeli
            ]);
        }
        
        $data = $req->all();

        $penjualan_id=Penjualan::create([
            'tanggal_jual'=>now(),
            'metode_pembayaran'=>'on_site',
            'total_pendapatan'=>$req->total,
            'pembeli_id'=>$pembeli_id->id,
        ]);
        
        foreach($data['produk_id'] as $items => $value){
            $data_array = array(
                'produk_id'=>$data['produk_id'][$items],
                'cup_id'=>$data['cup_id'][$items],
                'topping_id'=>$data['topping_id'][$items],
                'harga_jual'=>$data['harga_jual'][$items],
                'jumlah_beli'=>$data['jumlah_beli'][$items],
                'penjualan_id'=>$penjualan_id->id
            );

            Pesanan::create($data_array);
        }

        return redirect('/clear-cart');

    }

}
