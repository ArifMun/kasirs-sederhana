<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keranjang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KeranjangController extends Controller
{
    public function index()
    {
        // $keranjang = Keranjang::where('quantity')
        $barang = Barang::all();
        $keranjang = Keranjang::all();
        $bayar = Keranjang::distinct('bayar')->get('bayar');
        $kembalian = Keranjang::distinct('kembalian')->get('kembalian');
        $trs = Keranjang::distinct('no_transaksi')->get('no_transaksi');
        $tgl = Keranjang::max('dibuat');
        $qty = Keranjang::sum('subtotal');
        $user = User::all();

        return \view('keranjang.keranjang', \compact('keranjang', 'barang', 'qty', 'bayar', 'kembalian', 'tgl', 'trs'));
    }

    public function autofill($id)
    {
        // $data = DB::table('inv_kategori')->where('id',$id)->get();
        $data = Barang::find($id);
        return response()->json($data);
    }

    public function proses_transaksi(Request $request)
    {
        $keranjangs = $request->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'quantity' => 'required',
            'subtotal' => 'required'
        ]);

        if ($request->quantity > $request->qty) {
            return back();
        }

        Keranjang::create($keranjangs);
        Barang::where('id', '=', $request->id_barang)
            ->update(['qty' => $request->out]);
        $keranjang = Keranjang::all();
        $barangs = Barang::all();
        return \redirect()->route('keranjang', \compact('keranjang', 'barangs'));
    }

    public function proses_bayar(Request $request)
    {


        $kode = Keranjang::max('id');
        $k = '';
        $kode = \str_replace("TR", "", $kode);
        $kode = (int) $kode + 1;
        $incrementKode = $kode;
        if (\strlen($kode) == 1) {
            $k = "000";
        } elseif (\strlen($kode) == 2) {
            $k = "00";
        } else if (\strlen($kode) == 3) {
            $k = "0";
        }

        $transaksiBaru = "TR/" . \date('Y.m.d') . "/" . $incrementKode;
        // $q = $request->quantity;
        $keranjang = Keranjang::where('id', '!=', 0)
            ->update(['bayar' => $request->bayar, 'kembalian' => $request->kembalian, 'no_transaksi' => $transaksiBaru]);

        // $Keranjang = Keranjang::all();
        $barangs = Barang::all();

        return \redirect()->route('keranjang', \compact('keranjang', 'barangs'));
    }
}