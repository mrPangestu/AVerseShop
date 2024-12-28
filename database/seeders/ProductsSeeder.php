<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'product_name' => 'Anggrek Bulan',
                'description' => 'Deskripsi A',
                'price' => 90000,
                'stock' => 10,
                'image' => '/img/jenis1.jpg',
            ],
            [
                'product_name' => 'Anggrek Hitam',
                'description' => 'Deskripsi B',
                'price' => 120000,
                'stock' => 5,
                'image' => '/img/jenis2.jpg',
            ],
            [
                'product_name' => 'Anggrek Bibir Berbulu',
                'description' => 'Deskripsi B',
                'price' => 100000,
                'stock' => 7,
                'image' => '/img/jenis3.jpg',
            ],
            [
                'product_name' => 'Anggrek Kebutan',
                'description' => 'Deskripsi B',
                'price' => 120000,
                'stock' => 5,
                'image' => '/img/jenis4.jpeg',
            ],
        ]);
    }
}
