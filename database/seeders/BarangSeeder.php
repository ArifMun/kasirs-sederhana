<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Barang::create([
            'id_kategori' => 1,
            'nama_barang' => 'Taro',
            'harga_barang' => 2000,
            'qty' => 5
        ]);

        Barang::create([
            'id_kategori' => 1,
            'nama_barang' => 'Momogi',
            'harga_barang' => 2000,
            'qty' => 5
        ]);
    }
}