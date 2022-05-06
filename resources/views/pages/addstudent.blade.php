@extends('adminLayout.layout')

@section('body')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><img src="{{ asset('assets/admin/images/logo.png') }}" width="100" height="100" alt="Image">
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="" style="color: black">Home</a></li>
                            <li class="breadcrumb-item active">Add Student</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Add Student</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" id="studentform" method="post"
                            action="{{ route('user.storestudent') }}" name="studentform"
                            data-url="{{ route('user.liststudent') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="name">
                                        <p class="question" style="color: red"></p>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Age</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="age" name="age" placeholder="age">
                                        <p class="option_one" style="color: red"></p>
                                    </div>
                                </div>

                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Gender</label>
                                        <select name="gender" class="form-control" id="gender">
                                            <option selected disabled>Choose Gender</option>
                                            @foreach ($gender as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Reporting Teacher</label>
                                        <select name="teacher" class="form-control" id="teacher">
                                            <option selected disabled>Choose Teacher </option>
                                            @foreach ($teacher as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->teacher_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div><!-- /.container-fluid -->
        </section>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        let redirect = $('#studentform').data("url");

        $("#studentform").submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var actionUrl = form.attr('action');
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: new FormData($(form)[0]),
                dataType: 'JSON',
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    if (response.status == 200) {

                        Swal.fire({
                                title: 'Success!',
                                text: 'Do you want to continue',
                                icon: 'success',
                                confirmButtonText: 'ok'
                            })

                            .then((result) => {
                                if (result.isConfirmed) {
                                    location.href = redirect;
                                }
                            })
                    } else {

                        Swal.fire({
                            title: 'Error!',
                            text: 'Do you want to continue',
                            icon: 'error',
                            confirmButtonText: 'ok'
                        })

                    }
                },
                error: function(resp) {
                    console.log(resp);
                    let errors = resp.responseJSON.errors;

                    Object.keys(errors).forEach((item, index) => {
                        $('input[name=' + item + ']')
                            .closest('div')
                            .append('<p class="error" style="color: red">' + errors[item][0] +
                                '</p>')
                    })

                }
            });
        });
    </script>
@endsection
