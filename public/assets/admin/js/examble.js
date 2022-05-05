
$(document).ready(function(){

    $('#subject').change(function(){
        let sid = $(this).val();
        var route = $('#userExam').data('subject');
        $.ajax({
            url       : route,
            type      : "GET",
            dataType  : 'JSON',
            //contentType: false,
            cache     :  false,
            //processData: false,
            data      :  {sid:sid},
            success:function(result)
            {
                $('#exam').empty();
                if(result.status==1)
                {
                    $('#exam').append('<option value="">Choose Exam</option>')
                    $.each(result.data , function(index,value){
                        $('#exam').append('<option value="'+value.id+'">'+value.exam+'</option>');
                    })
                }
                else
                {
                    $('#exam').empty();
                    $('#exam').append('<option value="">'+result.message+'</option>');
                }
            }
        });

    });

    //check exam already attend

    $('#exam').change(function(){
        let sid = $(this).val();
        var sub = $('#subject').val();
        var route = $('#userExam').data('exists');
        $.ajax({
            url       : route,
            type      : "GET",
            dataType  : 'JSON',
            //contentType: false,
            cache     :  false,
            //processData: false,
            data      :  {sid:sid,sub:sub},
            success:function(result)
            {
               console.log(result);
                if(result.status==1)
                {
                    $('#examError').append(result.message)
                    $('#submit').hide();

                }
                else
                {
                    $('#examError').empty();
                    $('#examError').append('');
                    $('#submit').show();
                }
            }
        });

    });

    //submit
    $('#userExam').validate({
        rules: {
            subject :{
                required : true,
            },
            exam: {
                required : true,
            }
        },

        errorPlacement: function(error, element) {

            if (element.attr("exam") == "select")
            {
                error.insertAfter(element);
            }
            else
            {
                error.insertAfter(element);
            }
        },
    submitHandler: function(form) {
      form.submit();

    }
    });

    //update


$('.submitAnswer').on('click', function(event){
    var a=$(this);
    var url = $(this).data('href');
    var exam_id = $(this).data('exam_id');
    var qid = $(this).data('question_id');
    var id = $(this).data('id');
    var radioName = $(this).data('answer');
        var answer = '';
        // console.log(radioName);
        if($('input[name='+radioName+']:checked').is(':checked'))
        {
            answer = $('input[name='+radioName+']:checked').val() ;

        }

    Swal.fire({
        icon: 'warning',
        title: 'Are your sure to confirm the exam ?',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No, cancel!',
        cancelButtonColor: '#d33',
        }).then((isConfirm) => {

        if (isConfirm.value) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
            url       : url,
            type      : "POST",
            dataType  : 'JSON',
            //contentType: false,
            cache     :  false,
            //processData: false,
            data      :{exam_id:exam_id,answer:answer,qid:qid,id:id},
            success:function(result)
            {
                if(result.status==1)
                {
                    a.html('Confirmed');
                    a.removeClass('submitAnswer');
                    a.addClass('reSubmitAnswer');
                }

            },

            }); // Ajax closing

        }
        // else{
        //     console.log("bikgu");
        // }
        return false;
    });
});

$('.reSubmitAnswer').on('click', function(event){
    Swal.fire({
        icon: 'error',
        text: 'You are already submitted the answer',
        customClass: {
        confirmButton: "btn btn-primary",
    },
    })
});

// finish exam

$('.finish').on('click', function(event){
    var url = $(this).data('url');
    var location = $(this).data('redirect');
    Swal.fire({
        icon: 'warning',
        title: 'Are your sure to finish the exam ?',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No, cancel!',
        cancelButtonColor: '#d33',
        }).then((isConfirm) => {
        //alert('check');
        if (isConfirm.value) {
            //alert('check');
            //console.log('qid');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
            url       : url,
            type      : "POST",
            dataType  : 'JSON',
            //contentType: false,
            cache     :  false,
            //processData: false,
            //data      :{exam_id:exam_id,answer:answer,qid:qid,id:id},
            success:function(result)
            {
                if(result.status==1)
                {
                    window.location=location;
                }
                else
                {

                }
            },

            }); // Ajax closing

        }
        // else{
        //     console.log("bikgu");
        // }
        return false;
    });
});

//list


});
