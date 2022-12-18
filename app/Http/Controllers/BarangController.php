<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        $kategoris = Kategori::all();
        return \view('barang.barang', \compact('barangs', 'kategoris'));
    }


    public function lihat_barang($id)
    {
        $barangs = Barang::findOrFail($id);
        $kategoris = Kategori::all();

        return \view('barang.edit-barang', \compact('barangs', 'kategoris'));
    }

    public function edit_barang(Request $request, $id)
    {
        $barangs = Barang::findOrFail($id);
        $validate = Validator::make(
            $request->all(),
            [
                'id_kategori' => 'required',
                'nama_barang' => 'required',
                'harga_barang' => 'required|numeric',
                'qty' => 'required|numeric'
            ]
        );

        // \dd($barangs);
        if ($validate->fails()) {
            return \back()->with('success', 'Data Tidak tersimpan!!');
        } else {
            $barangs->update($request->all());
            return redirect()->route('barang')->with('success', 'Barang Berhasil DiEdit');
        }
    }

    public function tambah()
    {
        $kategoris = Kategori::all();
        return \view('barang.tambah-barang', \compact('kategoris'));
    }

    public function proses_tambah_barang(Request $request)
    {
        $barangs = $request->validate([
            'id_kategori' => 'required',
            'nama_barang' => 'required',
            'harga_barang' => 'required|numeric',
            'qty' => 'required|numeric',
        ]);


        $barang = Barang::create($barangs);
        // \dd($barang);

        return \redirect()->route('barang')->with('success', 'Barang Berhasil Ditambahkan');
    }

    public function hapus($id)
    {
        $barangs = Barang::findOrFail($id);
        $barangs->delete();
        return \redirect()->route('barang')->with('success', 'Data Berhasil Dihapus');
    }
}