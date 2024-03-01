<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasokan extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function pasokan(){
        return $this->belongsTo(Pasokan::class, 'pemasokan_id');
    }
}
