@extends('layout.layout')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    {{-- <h1 class="m-0">Tambah User</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-4">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-danger " role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                </div>
                <div class="col-sm-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/user">Home</a></li>
                        <li class="breadcrumb-item active">Edit Kategori</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    {{-- @foreach ($kategoris as $kategori) --}}
    <form method="POST" enctype="multipart/form-data" action="/kategori/proses-edit-kategori/{{ $kategoris->id }}">
        @method('put')
        @csrf
        <div class="card-body">
            <input type="hidden" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <label>Kode Kategori</label>
                <input type="text" class="form-control" placeholder="kategori" name="kode_kategori"
                    value="{{ $kategoris->kode_kategori }}">
            </div>
            <div class="form-group">
                <label>Jenis Kategori</label>
                <input type="text" class="form-control" placeholder="jenis kategori" name="jenis_kategori"
                    value="{{ $kategoris->jenis_kategori }}">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </form>
    {{-- @endforeach --}}
</div>
@endsection