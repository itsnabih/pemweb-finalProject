<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('produk')->insert([
            'id' => 1,
            'namaProduk' => 'Baju UB',
            'stokProduk' => 67,
            'fotoProduk' => 'a',
            'kategori' => 'baju'
        ]);
    }
}
