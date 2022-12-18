@extends('layout.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/kategori">Home</a></li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success " role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @endif
                                <a href="barang/tambah-barang" class="btn btn-primary btn-round ml-auto">
                                    Tambah Barang
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Kategori</th>
                                        <th>Jenis Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Barang</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @php
                                    $no=1;
                                    @endphp
                                    @foreach ($barangs as $barang)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $barang->kategori->kode_kategori }}</td>
                                        <td>{{ $barang->kategori->jenis_kategori }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>{{ $barang->harga_barang }}</td>
                                        <td>{{ $barang->qty }}</td>
                                        <td>
                                            <a href="lihat-barang/{{ $barang->id }}" class="btn btn-primary btn-xs"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="hapus-barang/{{ $barang->id }}" class="btn btn-danger btn-xs"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection