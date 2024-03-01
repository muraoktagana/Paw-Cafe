<?php

namespace Database\Seeders;

use App\Models\Pasokan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasokanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Pasokan::create([
            'harga_total_pasokan'=>'100000',
            'satuan'=>'box',
            'jumlah_beli'=>'3',
            'stok_bahan_baku_id'=>'1',
            'pemasokan_id'=>'1'
        ]);
    }
}
