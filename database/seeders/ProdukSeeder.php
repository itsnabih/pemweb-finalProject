<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produk')->insert([
            'id' => 1,
            'namaProduk' => 'Baju UB',
            'stokProduk' => 67,
            'fotoProduk' => 'a',
            'kategori' => 'baju'
        ]);
    }
}
