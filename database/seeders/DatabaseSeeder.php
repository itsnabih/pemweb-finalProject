<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Produk;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('produk')->insert([
            'namaProduk' => 'Baju UB',
            'stokProduk' => 67,
            'fotoProduk' => 'a',
            'kategori' => 'baju'
        ]);
    }
}
