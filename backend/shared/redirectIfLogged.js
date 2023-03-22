const redirectIfLogged = () => {
    $.ajax({
        type: 'get',
        url: "/presently/backend/shared/redirectIfLogged.php",
        success: (response) => {
            const uri = JSON.parse(response);
            if (uri.length === 0) {
                console.log('No more refresh hell')
                return
            }
            window.location.href = JSON.parse(response).replace('\/', '/');
        }
    })
}
