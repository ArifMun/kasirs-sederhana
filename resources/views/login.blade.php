<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <title>Document</title>
</head>

<body>

  <section class="content">
    <div class="container d-flex justify-content-center">
      <div class="row p-5 ">
        <!-- left column -->
        <div class="col-md-12 ">
          @if ($message = Session::get('warning'))
          <div class="alert alert-danger alert-block">
            <strong>{{ $message }}</strong>
          </div>
          @endif
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header d-flex justify-content-center">
              <h3 class="card-title ">LOGIN</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" method="post" action="{{ url('proses_login') }}">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" name="username" class="form-control" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                    placeholder="Password">
                </div>
                {{-- <div class="form-group mb-0">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                    <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of
                        service</a>.</label>
                  </div>
                </div> --}}
              </div>
              <!-- /.card-body -->
              <div class="card-footer d-flex justify-content-center">
                <button type="login" class="btn btn-primary">Login</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>

      </div><!-- /.container-fluid -->
    </div>
  </section>

</body>

</html>