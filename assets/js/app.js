$(document).ready(function () {
    $('#userRegistration').validate({
        rules: {
            login: {
                required: true,
                minlength: 3
            },
            mail: {
                email: true,
                required: true
            },
            password: {
                required: true,
                minlength: 6
            }
        }
    });

    $('#btn').on('click', function(){
        var elementsFormRules = [
            'login',
            'mail',
            'password'
        ];
        elementsFormRules.forEach(function(element) {
            var nameElementsId = '#' + element;
            if(!$(nameElementsId).valid()) {
                $(nameElementsId).parent().addClass('has-error');
            } else {
                $(nameElementsId).parent().removeClass('has-error').addClass('has-success');
            }
        })

        if($('#userRegistration').valid()) {
            console.log('Success!');

            localStorage.setItem('userRegistration', JSON.stringify({
                login: $('#login').val(),
                email: $('#mail').val(),
                password: $('#password').val()
            }));
            return;
        }
    });
/*
    var userRegistration = JSON.parse(localStorage.getItem('userRegistration'));
    console.log(userRegistration.login);
    console.log(userRegistration.email);
    console.log(userRegistration.password);
*/
});