<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keranjang;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function proses_transaksi(Request $request)
    {
        $pembayaran = $request->validate([
            'id_user' => 'required',
            'no_transaksi' => 'required',
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'quantity' => 'required',
            'subtotal' => 'required',
            'bayar' => 'required',
            'kembalian' => 'required',
            'dibuat' => 'required',
        ]);
        // \dd($request->all());

        Pembayaran::create($pembayaran);
        $keranjang = Keranjang::where('id', '=', $request->id_keranjang);
        $keranjang->delete();
        $barangs = Barang::all();
        return \redirect()->route('keranjang', \compact('barangs'));
    }
}