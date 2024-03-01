<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasokan extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function stok(){
        return $this->belongsTo(Stok_bahan_baku::class, 'stok_bahan_baku_id');
    }

    public function pemasokan(){
        return $this->belongsTo(Pemasokan::class, 'pemasokan_id');
    }
}
