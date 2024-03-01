<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    
    protected $guarded=[];

    public function produk(){
        return $this->belongsTo(Menu::class, 'produk_id');
    }
    public function topping(){
        return $this->belongsTo(Topping::class, 'topping_id');
    }
    public function cup(){
        return $this->belongsTo(Cup::class, 'cup_id');
    }
    public function penjualan(){
        return $this->belongsTo(Penjualan::class, 'penjualan_id');
    }
}
