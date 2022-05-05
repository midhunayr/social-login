
$(document).ready(function(){

$('.submitAnswer').on('click', function(_event){
    console.log('hii');

    var url = $(this).data('href');
    var exam_id = $(this).data('exam_id');
    console.log(exam_id);
    var qid = $(this).data('question_id');
    var id = $(this).data('id');
    var radioName = $(this).data('answer');
        var answer = '';
        if($('input[name='+radioName+']:checked').is(':checked'))
        {
            answer = $('input[name='+radioName+']:checked').val() ;

        }
     //event.preventDefault();

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
        //     console.log("hello");
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
    console.log(url);
    Swal.fire({
        icon: 'warning',
        title: 'Are your sure to finish the exam ?',
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
            type      : "GET",
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















});


