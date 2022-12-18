@extends('layout.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1 class="m-0">Edit User</h1>
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
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <form method="POST" enctype="multipart/form-data" action="/user/proses-edit-user/{{ $users->id }}">
        @method('put')
        @csrf
        <div class="card-body">
            <input type="hidden" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" placeholder="Nama" name="name" value="{{ $users->name }}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $users->email }}">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="{{ $users->alamat }}">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Username" name="username"
                    value="{{ $users->username }}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                    name="password">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </form>
</div>
@endsection