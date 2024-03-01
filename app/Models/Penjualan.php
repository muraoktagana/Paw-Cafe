<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function pesanan(){
        return $this->hasMany(Pesanan::class, 'penjualan_id');
    }

    public function pembeli(){
        return $this->belongsTo(Pembeli::class, 'pembeli_id');
    }
}
