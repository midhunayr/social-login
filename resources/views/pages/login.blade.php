<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3 | Log in</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="{{asset('assets/admin/plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
<div class="login-logo">
<a href="../../index2.html"><b>Admin</b>LTE</a>
</div>

<div class="card">
<div class="card-body login-card-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{route('admin.loginuser')}}" method="post">
        @csrf
    <div class="input-group mb-2">
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
    <div class="row">
        <div class="col-8">
        </div>

        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">sign-In</button>
        </div>

    </div>
    </form>

    <div class="social-auth-links text-center mb-3">
    <p>- OR -</p>
    <a href="{{route('social.link',['driver'=>'facebook'])}}" class="btn btn-block btn-primary">
        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
    </a>
    <a href="{{route('social.link',['driver'=>'google'])}}" class="btn btn-block btn-success">
        <i class="fab fa-google-plus mr-2"></i> Sign in using Google
    </a>
    <a href="{{route('social.link',['driver'=>'linkedin'])}}" class="btn btn-block btn-secondary">
        <i class="fab fa-linkedin mr-2"></i> Sign in using linkdIn
    </a>
    </div>

    <p class="mb-0">
    <a href="{{route('admin.registerview')}}" class="text-center">Register a new membership</a>
    </p>
</div>
</div>
</div>

<script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/admin/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
