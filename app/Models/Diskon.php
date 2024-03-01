<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function produk(){
        return $this->hasMany(Menu::class, 'diskon_id');
    }
}
 