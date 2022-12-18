<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{

    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'kode_kategori',
        'jenis_kategori'
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}