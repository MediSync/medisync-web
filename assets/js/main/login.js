$(document).ready(function () {
    toastr.options = {
        "closeButton": true,
        "positionClass": "toast-top-left"
    }

    if (localStorage.getItem("enviroment") == "main") {
        toastr["info"]('Esperamos vuelva pronto', 'Sesión cerrada');
    }

    localStorage.setItem("enviroment", "");
});

$("#btn_login").on("click", function (e) {
    e.preventDefault();
    var rut = $('#rut').val();
    var url = 'https://projectmedisync.firebaseapp.com/api/v1/users/'+ rut;

    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (o) {
            console.log(o.names);
            /*
            if (o.msg == "1") {
                window.location.href = "";
                localStorage.setItem("enviroment", "login");
            } else {
                toastr["warning"]("Correo o contraseña no coinciden", "Datos Incorrectos");
            }
            */
        },
        error: function () {
            toastr["error"]("Recargue la página, si persiste comuníquese con soporte", "Error de Conexión");
        }
    });
});