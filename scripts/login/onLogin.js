$(document).ready(function () {
    $('#action').click(() => {
        $.ajax({
            type: 'POST',
            url: "/presently/scripts/login/onLogin.php",
            data: {email: $("#email").val(), password: $("#password").val()},
            success: function (response) {
                console.log(response)
            }
        })
    })
})