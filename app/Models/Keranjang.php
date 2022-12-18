<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keranjang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_barang',
        'nama_barang',
        'harga_barang',
        'quantity',
        'subtotal',
        'bayar',
        'kembalian'
    ];


    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }
}