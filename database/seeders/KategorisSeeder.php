<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategorisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'kode_kategori' => 'AB',
            'jenis_kategori' => 'Makananan'
        ]);
        Kategori::create([
            'kode_kategori' => 'BC',
            'jenis_kategori' => 'Minuman'
        ]);
    }
}