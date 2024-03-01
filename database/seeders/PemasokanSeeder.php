<?php

namespace Database\Seeders;

use App\Models\Pemasokan;
use illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemasokanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pemasokan::create([
            'tanggal_pemasokan'=>Carbon::now('Asia/Jakarta'),
            'user_id'=>'1'
        ]);
    }
}
