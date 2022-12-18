<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'id_barang',
        'nama_barang',
        'harga_barang',
        'quantity',
        'subtotal',
        'bayar',
        'kembalian',
        'no_transaksi',
        'dibuat'
    ];

    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class, 'id_keranjang', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}