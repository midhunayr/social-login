@extends('adminLayout.layout')

@section('body')
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1><img src="" width="100" height="100" alt=""></h1> --}}
            </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Admin</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                {{-- <div class="alert alert-warning alert-dismissible fade show" role="alert"> --}}
                @if(session('success'))
                <div class="alert alert-danger"  role="alert">
                {{session('success')}}
                </div>
                @endif

                <div class="col-lg-3 col-5">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                    <h4>haiii</h4>
                    <p>dfsgf</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-bag"></i>
                    </div>
                    <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>
                <div class="col-lg-3 col-5">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                        <h4>helloo</h4>
                        <p>vz dxXZxZx</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-bag"></i>
                        </div>
                        <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-5">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                        <h4>how'uu</h4>
                        <p>vz dxXZxZx</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-bag"></i>
                        </div>
                        <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- ./col -->
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>


@endsection
