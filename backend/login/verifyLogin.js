const verifyLogin = (email, rol) => {
    $.ajax({
        type: 'post',
        url: "/presently/backend/login/verifyLogin.php",
        data: {email, rol},
        success: (response) => {
            const data = JSON.parse(response);
            if (data['error']) {
                const src = "https://cdn-icons-png.flaticon.com/512/10015/10015297.png";
                const template = `<img src="${src}" alt="warning"/><span>${data['error']}</span>`
                $('#alert').html(template);
                $('#alert').show();
                return
            }
            redirectIfLogged()
        }
    })
}
