$(document).ready(function () {
    $('#alert').hide()
    redirectIfLogged()
})

const onLogin = () => {
    $.ajax({
        type: 'POST',
        url: "/presently/backend/login/onLogin.php",
        data: {email: $("#email").val(), password: $("#password").val()},
        success: function (response) {
            const data = JSON.parse(response);
            const alert = document.getElementById('alert')
            if (data['error']) {
                const src = "https://cdn-icons-png.flaticon.com/512/10015/10015297.png";
                const template = `<img src="${src}" alt="warning"/><span>${data['error']}</span>`
                $('#alert').html(template);
                $('#alert').show();
                return
            }
            alert.style.display = 'none'

            const {email, rol} = data['user']
            verifyLogin(email, rol)
        }
    })
}
