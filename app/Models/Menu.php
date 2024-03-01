<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function kategori(){
        return $this->belongsTo(KategoriProduk::class,'kategori_id');
    }

    public function diskon(){
        return $this->belongsTo(Diskon::class,'diskon_id');
    }

    public function stok(){
        return $this->belongsTo(Stok_bahan_baku::class, 'stok_bahan_baku_id');
    }

    public function pesanan(){
        return $this->hasMany(Pesanan::class, 'produk_id');
    }
}
