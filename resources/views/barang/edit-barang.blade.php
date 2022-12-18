@extends('layout.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/barang">Home</a></li>
                        <li class="breadcrumb-item active">Edit Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <form method="POST" enctype="multipart/form-data" action="/barang/proses-edit-barang/{{ $barangs->id }}">
        @method('put')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" name="id_kategori" id="id_kategori" required>
                    <option value="" hidden="">-- Pilih Kategori --</option>
                    @foreach ($kategoris as $k)
                    @if (old('id_kategori',$barangs->id_kategori) == $k->id)
                    <option value="{{ $k->id }}" selected>{{ $k->jenis_kategori }}</option>
                    @endif
                    <option value="{{ $k->id }}">{{ $k->jenis_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" class="form-control" placeholder="Nama barang" name="nama_barang"
                    value="{{ $barangs->nama_barang }}">
            </div>
            <div class="form-group">
                <label>Harga Barang</label>
                <input type="text" class="form-control" placeholder="harga barang" name="harga_barang"
                    value="{{ $barangs->harga_barang }}">
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="text" class="form-control" placeholder="jumlah" name="qty"
                    value="{{ $barangs->quantity }}">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </form>
</div>
@endsection