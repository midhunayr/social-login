

    var quesAry=[];
    var existQuestinId = $('#hidQues').val();
    //console.log(existQuestinId);
    if(existQuestinId!=''){
    quesAry = existQuestinId.split(',');
    }
    // console.log(quesAry);
    $(document).on("click", ".questAdd", function (event) {
    event.preventDefault();
    let button = $(this);
    let route = $(this).data("href");
    let remove = $(this).data("remove");
    let exam_id = $('#exam_id').val();
    let exam_ids = $(this).data('examid');
    //  console.log(remove);
    // console.log(exam_ids);
    //  console.log(route);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Accept' :'application/json'
        }
    });
    var quesId=$(this).attr('data-questid');
    index = quesAry.indexOf(quesId);
    if(index == -1){
        Swal.fire({
            title: "Are you sure you wish to add this question?",
            icon: "warning",
            showCancelButton: true,
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-secondary",
            },
            buttonsStyling: true,
            confirmButtonText: "Yes",
            showLoaderOnConfirm: true,
            preConfirm: () => {
                quesAry.push(quesId);
                $(this).html('Remove');
                // $(this).removeClass('btn-success');
                // $(this).addClass('btn-danger');
                //ajax code for inseritng quetion details
                $.ajax({
                    url       : route,
                    type      : "POST",
                    dataType  : 'JSON',
                    // contentType: false,
                    cache     :  false,
                    // processData: false,
                    data      : {exam_id:exam_id},
                    success:function(result)
                    {
                        //console.log(result.question);
                        if(result.status==1)
                        {
                            $('#questionModal').modal('show');

                                var ans;
                                if(result.question.correct_answer ==1)
                                {
                                    ans = 'Option 1';
                                }
                                if(result.question.correct_answer ==2)
                                {
                                    ans = 'Option 2';
                                }
                                if(result.question.correct_answer ==3)
                                {
                                    ans = 'Option 3';
                                }
                                if(result.question.correct_answer ==4)
                                {
                                    ans = 'Option 4';
                                }

                                $('.newQuest').append('<tr><td>'+result.question.question+'</td><td>'+result.question.option1+'</td><td>'+result.question.option2+'</td> <td>'+result.question.option3+'</td><td>'+result.question.option4+'</td><td>'+ans+'</td><td>'+result.question.point+'</td><td><div class="table-data-feature"><a data-href="'+result.url_edit+'" data-examid="'+result.question.exam_id+'" data-questionid="'+result.question.question_id+'" class="item questEdit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="zmdi zmdi-edit"></i></a><a data-href="'+result.url_delete+'" data-examid="'+result.question.exam_id+'" data-questionid="'+result.question.question_id+'" class="item delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="zmdi zmdi-delete"></i></a></div></td></tr>');

                        }
                        else{
                            Swal.fire({
                                icon: 'error',
                                text: result.message,
                                customClass: {
                                confirmButton: "btn btn-primary",
                            },
                            }).then((result) => {
                                if (result.isConfirmed) {
                                window.location.reload();
                                }
                            })
                        }
                    },

            }); // Ajax closing
        },
    });
    }
    else
    {

        Swal.fire({
                title: "Are you sure you wish to remove this question?",
                icon: "warning",
                showCancelButton: true,
                customClass: {
                    confirmButton: "btn btn-danger",
                    cancelButton: "btn btn-secondary",
                },
                buttonsStyling: true,
                confirmButtonText: "Yes",
                showLoaderOnConfirm: true,
                preConfirm: () => {
                        quesAry.splice(index,1);
                        $(this).html('Add');
                        //$(this).css('background-color:red');
                        //  $(this).removeClass('btn-danger');
                        //  $(this).addClass('btn-success');
                        //ajax code for inseritng quetion details
                        $.ajax({
                        url       : remove,
                        type      : "GET",
                        dataType  : 'JSON',
                        // contentType: false,
                        cache     :  false,
                        // processData: false,
                        data      : {exam_id:exam_ids},
                        success:function(result)
                        {


                            if(result.status==1)
                            {

                                $('#questionModal').modal('show');
                                $('.newQuest').empty();

                                    var ans;
                                    $.each(result.question ,function(index,value){
                                        if(value.correct_answer ==1)
                                        {
                                            ans = 'Option 1';
                                        }
                                        if(value.correct_answer ==2)
                                        {
                                            ans = 'Option 2';
                                        }
                                        if(value.correct_answer ==3)
                                        {
                                            ans = 'Option 3';
                                        }
                                        if(value.correct_answer ==4)
                                        {
                                            ans = 'Option 4';
                                        }
                                        $('.newQuest').append('<tr><td>'+value.question+'</td><td>'+value.option1+'</td><td>'+value.option2+'</td> <td>'+value.option3+'</td><td>'+value.option4+'</td><td>'+ans+'</td><td>'+value.point+'</td><td><div class="table-data-feature"><a href="" class="item" data-toggle="tooltip" data-placement="top" title="Edit"><i class="zmdi zmdi-edit"></i></a><a data-href="" class="item delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="zmdi zmdi-delete"></i></a></div></td></tr>');

                                    })
                                    //  $('.newQuest').append('<tr><td>'+result.question.question+'</td><td>'+result.question.option1+'</td><td>'+result.question.option2+'</td> <td>'+result.question.option3+'</td><td>'+result.question.option4+'</td><td>'+ans+'</td><td>'+result.question.point+'</td><td><div class="table-data-feature"><a href="" class="item" data-toggle="tooltip" data-placement="top" title="View"><i class="zmdi zmdi-mail-send"></i></a><a href="" class="item" data-toggle="tooltip" data-placement="top" title="Edit"><i class="zmdi zmdi-edit"></i></a><a data-href="" class="item delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="zmdi zmdi-delete"></i></a></div></td></tr>');

                            }
                            else{
                                Swal.fire({
                                    icon: 'error',
                                    text: result.message,
                                    customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            }).then((result) => {
                                if (result.isConfirmed) {
                                window.location.reload();
                                }
                            })
                        }
                    },

            }); // Ajax closing
        },
    });
    }
    });

    //delete

    $(document).on("click", ".delete", function (event) {
    event.preventDefault();
    let button = $(this);
    let route = $(this).data("href");
    let exam_id = $(this).data('examid');


    Swal.fire({
        title: "Are you sure you wish to delete this?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        customClass: {
            confirmButton: "btn btn-danger",
            cancelButton: "btn btn-secondary",
        },
        buttonsStyling: true,
        confirmButtonText: "Delete",
        showLoaderOnConfirm: true,
        preConfirm: () => {
            // let options = {
            //     url: route,
            //     method: "DELETE",
            // };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
            url       : route,
            type      : "GET",
            dataType  : 'JSON',
            //contentType: false,
            cache     :  false,
            //processData: false,
            data      :{exam_id:exam_id},
            success:function(result)
            {
                if(result.status==1)
                {
                    Swal.fire({
                        icon: 'success',
                        text: result.message,
                        customClass: {
                        confirmButton: "btn btn-primary",
                    },
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    })
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        text: result.message,
                        customClass: {
                        confirmButton: "btn btn-primary",
                    },
                    }).then((result) => {
                        if (result.isConfirmed) {
                        window.location.reload();
                        }
                    })
                }
            },

    }); // Ajax closing
        },

    });
    });

    // edit

    $(document).on("click", ".questEdit", function (event) {
        console.log('hii');
    event.preventDefault();
    var exam_id = $(this).data('examid');
    var route = $(this).data('href');
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
        $.ajax({
        url       :  route,
        type      : "GET",
        dataType  : 'JSON',
        //contentType: false,
        cache     :  false,
        //processData: false,
        data      :{exam_id:exam_id},
        success:function(result)
        {
            if(result.status==1)
            {
                $('#questEditModal').modal('show');
                value = result.question.correct_answer;
                    console.log(value);
                //$("select[name=correct][value=" + value + "]").prop('selected', true);
                $("#correct option[value=" + value + "]").attr('selected', 'selected');
                $('#question').val(result.question.question);
                $('#option1').val(result.question.option1);
                $('#option2').val(result.question.option2);
                $('#option3').val(result.question.option3);
                $('#option4').val(result.question.option4);
                $('#point').val(result.question.point);
                $('#examQuestionId').val(result.question.id);
                $('#updateQuest').attr('data-action',result.route);
            }
            else{
                Swal.fire({
                    icon: 'error',
                    text: result.message,
                    customClass: {
                    confirmButton: "btn btn-primary",
                },
                }).then((result) => {
                    if (result.isConfirmed) {
                    window.location.reload();
                    }
                })
            }
        },

    }); // Ajax closing
    });

    $("#updateQuest").validate({
    errorPlacement: function (error, element) {
        // console.log('dd', element.attr("name"))
        if (element.attr("name") == "correct") {
            error.appendTo("#correct");
        } else {
            error.insertAfter(element)
        }
    },
    rules: {
        option1 : {
            required: true
        },
        option2 : {
            required: true
        },
        option3 : {
            required: true
        },
        option4 : {
            required: true
        },
        point : {
            required: true,
            number: true
        }

    },
    messages: {
        option1: {
            required: "Please provide option 1 answer"
        },
        option2: {
            required: "Please provide option 2 answer"
        },
        option3: {
            required: "Please provide option 3 answer"
        },
        option4: {
            required: "Please provide option 4 answer"
        },
        point: {
            required: "Please provide Mark",
            number: 'Please provide valid Mark'
        }
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
        var action = $("#updateQuest").data("action");
        var id = $('#examQuestionId').val();
        $.ajaxSetup({
            headers: {
                'X-CSSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept':'application/json'
            }
        });
        $.ajax({
            dataType    :'json',
            type        :'post',
            data        :new FormData($(form)[0]),
            url         :action,
            processData :false,
            cache       :false,
            contentType :false,
            success:function(result){
                if(result.status==1)
                {
                    Swal.fire({
                        icon: 'success',
                        text: result.message,
                        customClass: {
                        confirmButton: "btn btn-primary",
                    },
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    })
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        text: result.message,
                        customClass: {
                        confirmButton: "btn btn-primary",
                    },
                    }).then((result) => {
                        if (result.isConfirmed) {
                        window.location.reload();
                        }
                    })
                }
            },
            error: function(resp){
                    console.log(resp);
                    let errors=resp.responseJSON.errors;
                            //  console.log(errors);
                Object.keys(errors).forEach((item,index)=>{
                    $('input[name='+item+']')
                    .closest('div')
                    .append('<p class="error" style="color: red">'+errors[item][0]+'</p>')
                });
            }
        })
    }
    });



