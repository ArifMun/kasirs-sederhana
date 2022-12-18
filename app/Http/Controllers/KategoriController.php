<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Kategori;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return \view('kategori.kategori', \compact('kategoris'));
    }

    public function tambah()
    {
        return \view('kategori.tambah-kategori');
    }

    public function lihat_kategori($id)
    {
        $kategoris = Kategori::findOrFail($id);

        return \view('kategori.edit-kategori', \compact('kategoris'));
    }

    public function edit_kategori(Request $request, Kategori $kategori, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $validate = Validator::make(
            $request->all(),
            [
                'kode_kategori' => 'required|unique:kategoris',
                'jenis_kategori' => 'required'
            ]
        );

        if ($validate->fails()) {
            return \back()->with('success', 'Data Tidak Tersimpan');
        } else {
            $kategori->update($request->all());
            return redirect()->route('kategori')->with('success', 'Kategori Berhasil Disimpan!');
        }
    }

    public function proses_tambah_kategori(Request $request)
    {
        $kategoris = $request->validate([
            'kode_kategori' => 'required',
            'jenis_kategori' => 'required|unique:kategoris'
        ]);

        Kategori::create($kategoris);

        return redirect()->route('kategori')->with('success', 'Kategori Berhasil Disimpan!');
    }

    public function hapus($id)
    {
        $kategoris = Kategori::where('id', $id);
        $kategoris->delete();
        return \redirect()->route('kategori')->with('success', 'Data Berhasil Dihapus');
    }
}