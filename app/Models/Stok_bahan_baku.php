<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok_bahan_baku extends Model
{
    use HasFactory;
    protected $fillable=[
        'bahan_baku',
        'stok'
    ];

    public function pasokan(){
        return $this->hasMany(Pasokan::class, 'stok_bahan_baku_id');
    }

    public function topping(){
        return $this->belongsTo(Topping::class, 'stok_bahan_baku_id');
    }

    public function cup(){
        return $this->belongsTo(Cup::class, 'stok_bahan_baku_id');
    }

    public function produk(){
        return $this->belongsTo(Stok_bahan_baku::class, 'stok_bahan_baku_id');
    }
}
