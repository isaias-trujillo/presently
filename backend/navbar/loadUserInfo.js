$(document).ready(function () {
    $.ajax({
        type: 'get',
        url: '/presently/backend/navbar/loadUserInfo.php',
        data: {},
        success: function (response) {
            const {lastname, firstname} = JSON.parse(response)
            buildNavBar(lastname, firstname)
        }
    })
})

const buildNavBar = (lastname, firstname) => {
    const template = `<span>${lastname}</span><br><span>${firstname}</span>`
    $('#navbar > header').html(template)
}