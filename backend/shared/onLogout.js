const onLogout = () => {
    $.ajax({
        type: 'get',
        url: "/presently/backend/shared/onLogout.php",
        success: () => {
            window.location.href = '/presently/pages/login.php';
        }
    })
}
