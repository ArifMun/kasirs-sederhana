@extends('layout.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/barang">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <form method="POST" enctype="multipart/form-data" action="/barang/proses-tambah-barang">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" name="id_kategori" id="id_kategori" required>
                    <option value="" hidden="">-- Pilih Kategori --</option>
                    @foreach ($kategoris as $k)
                    <option value="{{ $k->id }}">{{ $k->jenis_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" class="form-control" placeholder="Nama barang" name="nama_barang">
            </div>
            <div class="form-group">
                <label>Harga Barang</label>
                <input type="text" class="form-control" placeholder="harga barang" name="harga_barang">
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="text" class="form-control" placeholder="jumlah" name="qty">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
</div>
@endsection