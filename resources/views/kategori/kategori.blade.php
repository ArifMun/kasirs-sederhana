@extends('layout.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kategori</h1>
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
                                <a href="kategori/tambah-kategori" class="btn btn-primary btn-round ml-auto">
                                    Tambah Kategori
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Jenis Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @php
                                    $no=1;
                                    @endphp
                                    @foreach ($kategoris as $kategori)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $kategori->kode_kategori}}</td>
                                        <td>{{ $kategori->jenis_kategori }}</td>
                                        <td>
                                            <a href="lihat-kategori/{{ $kategori->id }}"
                                                class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                            <a href="hapus-kategori/{{ $kategori->id }}"
                                                class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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