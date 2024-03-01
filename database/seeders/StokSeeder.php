<?php

namespace Database\Seeders;

use App\Models\Stok_bahan_baku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Stok_bahan_baku::create([
            'bahan_baku'=>'Biji kopi',
            'satuan'=>'Box'
        ]);
        Stok_bahan_baku::create([
            'bahan_baku'=>'Daun teh',
            'stok'=>'5',
            'satuan'=>'Box'
        ]);
    }
}
