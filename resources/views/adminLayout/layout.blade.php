<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
@include("adminLayout.header")
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
<img class="animation__shake" src="{{asset('assets/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
</div>
@include("adminLayout.sidebar")

<!-- Content Wrapper. Contains page content -->

@yield('body')

@include("adminLayout.footer")
@include("adminLayout.js")
@stack('js')

</body>
</html>
