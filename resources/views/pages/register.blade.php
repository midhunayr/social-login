<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3 | Registration Page</title>


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="{{asset('assets/admin/plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
<div class="register-logo">
<a href=""><b>Admin</b>LTE</a>
</div>

<div class="card">
<div class="card-body register-card-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="{{route('admin.registeruser')}}" method="post">
        @csrf
    <div class="input-group mb-1">
        <input type="text" name="name" class="form-control" placeholder="Full name">
        <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-user"></span>
        </div>
        </div>
    </div>
    <div>
        @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="input-group mb-1">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
        </div>
    </div>
    <div>
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="input-group mb-2">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
        </div>
    </div>
    <div>
        @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
    </div>
    <div class="input-group mb-2">
    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
    <div class="input-group-append">
        <div class="input-group-text">
        <span class="fas fa-lock"></span>
        </div>
    </div>
    </div>
    <div>
        @if ($errors->has('password_confirmation'))
        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
        @endif
    </div>
    <div class="row">
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
    </div>
    </form>

</div>
</div>
</div>
<script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/admin/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
