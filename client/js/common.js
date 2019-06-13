$(document).ready(function(){
    $("#add-user").validate({
        rules:{
            name:{
                required: true,
                minlength: 3,
                maxlength: 16,
            },
            password:{
                required: true,
                minlength: 6,
                maxlength: 16,
            },
            email:{
                required: true,
            },
        },
    });
});