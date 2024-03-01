<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\KategoriProduk;
use App\Models\Pasokan;
use App\Models\Stok_bahan_baku;
use App\Models\Topping;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'mura',
            'username' => 'muraoktagana',
            'password' => bcrypt('oktagana'),
            'address' => 'Bandung',
            'phone' => '089789098',
            'level' => 'operator',
            'foto' => 'png.png'
        ]);
        User::create([
            'name' => 'komandan',
            'username' => 'komandan',
            'password' => bcrypt('komandan'),
            'address' => 'Tasikmalaya',
            'phone' => '089789078',
            'level' => 'admin',
            'foto' => 'png.pgn'
        ]);

        Stok_bahan_baku::create([
            'bahan_baku'=>'Matcha',
            'stok'=>1
        ]);

        Stok_bahan_baku::create([
            'bahan_baku'=>'Moca',
            'stok'=>1
        ]);
        Stok_bahan_baku::create([
            'bahan_baku'=>'cup M',
            'stok'=>1
        ]);
        Stok_bahan_baku::create([
            'bahan_baku'=>'Biskuit',
            'stok'=>1
        ]);
    }
}
