$(function () {
    $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
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


$(document).ready(function(){

    $('#subject_id').change(function(){
        var subject_id= $(this).val();
        console.log(subject_id);
        $.ajaxSetup({
            headers: {
                'X-CSSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept':'application/json'
            }
        });
        $.ajax({
            // url: route,
            dataType:'json',
            type:'get',
            data:{'subjectId':subject_id,
                _token : $('meta[name="csrf-token"]').attr('content')
            },
            url:baseurl+'/getexams',
            // processData:false,
            cache:false,
            // contentType:false,
            success:function(result){
                $('#exam').empty();
                $('#exam').append('<option selected disabled value="">Select one</option>');
                if(result.status!=0){
                    // console.log(result.data);
                    $.each(result.data, function(key,val) {
                        console.log(val.exam_title);
                        $('#exam').append('<option value="'+val.id+'">'+val.exam_title+'</option>');
                    });
                }
            }
        });
    // console.log();
    });

    $("#examBasicForm").validate({
        rules: {
            subject_id : {
                required: true
            },
            exam : {
                required: true
            }

        },
        messages: {
            subject_id: {
                required: "Please chose subject"
            },
            exam: {
                required: "Please chose exam"
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });

    });
