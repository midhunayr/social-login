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

                            <td><a href="" class="btn btn-dark btn-sm">Student</a></td>
                        </div><br>

                        <div class="card">
                            <div class="card-header">
                                <div class="col-sm-6">
                                    <h3 class="card-title">Student Mark Details</h3>
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            @foreach ($subject as $key => $value)
                                                <th scope="col">{{ $value->subject_name }}</th>
                                            @endforeach

                                            <th scope="col">term</th>
                                            <th scope="col">total</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($student_term as $key => $value)
                                            <tr id="">
                                                <td>{{ $value->studentName->name }}</td>
                                                <td>{{ $value->subjectMark->where('subject_id', 1)->first()->mark }}</td>
                                                <td>{{ $value->subjectMark->where('subject_id', 2)->first()->mark }}</td>
                                                <td>{{ $value->subjectMark->where('subject_id', 3)->first()->mark }}</td>
                                                <td>{{ $value->term->term }}</td>
                                                <td>{{ $value->subject_mark_sum_mark }}</td>

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
