$(function () {
    let form = $("#order-add-form");
    let status = $("#status");

    let validator = form.validate({
        normalizer: function (value) {
            return $.trim(value);
        },
        ignore: [],
        rules: {
            order_name: {
                required: true,
                maxlength: 100,
            },
            receiver_name: {
                required: true,
            },
            receiver_phone: {
                required: true,
            },
            receiver_email: {
                required: true,
            },
            desc: {
                required: true,
            },
            address: {
                required: true,
            },

            // This is just dummy rule
            // It is added so that showErrors() method would show error labels under otherwise may throw error
            error: {
                required: false,
            },
        },
        messages: {},
        // the default class 'error' has some styling issues so we are using custom classes
        errorClass: "validation-error text-danger",
        errorPlacement: function (error, element) {
            error.insertAfter(element);
        },
        showErrors: function (errorMap, errorList) {
            this.defaultShowErrors();
        },
        submitHandler: function (formElement, event) {
            event.preventDefault();

            let formData = new FormData($(form)[0]);

            formData.append("is_active", status.is(":checked") ? 1 : 0);

            let url = form.data("action");

            let options = {
                url: url,
                data: formData,
                method: "POST",

                // contentType:false and processData:false are needed when sending formData
                contentType: false,
                processData: false,
                disableLoader: false,
            };

            const client = new HttpClient(options);

            client.acceptJson();
            client.setErrorHandler(validationHandler, 422);
            client.setSuccessHandler(successHandler);

            client.send();
        },
    });

    function validationHandler(statusCode, responseJson, jqXHR, httpClient) {
        let response = responseJson;
        if (response) {
            let errors = (response || {}).errors;
            if (errors) {
                validator.showErrors(response.errors);
            }
        }
    }

    function successHandler(response, textStatus, jqXHR, httpClient) {
        let redirect = form.data("redirect");
        if (response.success) {
            Swal.fire({
                title: "ORDER",
                text: "Order added successfully",
                icon: "success",
                customClass: {
                    confirmButton: "btn btn-primary",
                },
                buttonsStyling: true,
                confirmButtonText: "Ok",
                willClose: () => {
                    location.href = redirect;
                },
            });
        }
    }
});
