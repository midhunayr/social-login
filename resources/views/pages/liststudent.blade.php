@extends('adminLayout.layout')
@section('body')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Student</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div>

                            <td><a href="{{ route('user.addstudent') }}" class="btn btn-dark btn-sm">Add Student</a></td>
                        </div><br>

                        <div class="card">
                            <div class="card-header">
                                <div class="col-sm-6">
                                    <h3 class="card-title">Student Details</h3>
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Age</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">ReportingTeacher</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($student as $key => $value)
                                            <tr id="">
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->age }}</td>
                                                <td>{{ $value->gender->name }}</td>
                                                <td>{{ $value->teacher->teacher_name }}</td>

                                                <td><a href=""><button type="button" onclick=""
                                                            class="btn btn-dark btn-sm">Edit</button></a></td>
                                                <td>
                                                    <a href=""><button type="button" onclick=""
                                                            class="btn btn-dark btn-sm">Delete</button></a>
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
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
