<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\Keranjang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_kategori',
        'nama_barang',
        'harga_barang',
        'qty'
    ];

    public function kategori()
    {
        // id_kategori = field pada tabel barangs, id = field dari tabel kategories
        // join tabel
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }
}