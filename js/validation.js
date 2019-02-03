
$('#contact-form-1').on('submit', function (e) {

    $('#submit-form-1').attr('disabled', true);

    $(this).find('p').text('');

    var emailRegexp = /^(?!.*\.\.)[\w.\-#!$%&'*+\/=?^_`{}|~]{1,35}@[\w.\-]+\.[a-zA-Z]{2,15}$/,
            phoneRegexp = /^(?:0(?!(5|7))(?:2|3|4|8|9))(?:-?\d){7}$|^(0(?=5|7)(?:-?\d){9})$/,
            $name = $('#name'),
            $email = $('#email'),
            $phone = $('#phone'),
            $type = $('#type'),
            formValid = true;

    var userData = {
        name: $name.val().trim(),
        email: $email.val().trim(),
        phone: $phone.val().trim(),
        type: $type.val().trim()

    }

    if (userData.name.length < 2 || userData.name.length > 50) {

        $name.next().text('* Name is required');
        formValid = false;

    }

    if (!emailRegexp.test(userData.email)) {

        $email.next().text('* A valid email is required');
        formValid = false;
    }

    if (!phoneRegexp.test(userData.phone)) {

        $phone.next().text('* A valid phone is required');
        formValid = false;

    }

    if (userData.type == '') {

        $type.next().text('* Please choose type');
        formValid = false;

    }

    if (!formValid) {

        $('#submit-form-1').attr('disabled', false);

    } else {

        $.ajax({
            url: 'server.php',
            type: 'POST',
            dataType: 'html',
            data: userData,
            success: function (res) {

                if (res) {

                    window.location = 'tnx.html';

                }

            }
        })


    }


    e.preventDefault();

});
