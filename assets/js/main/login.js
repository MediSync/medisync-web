$(document).ready(function () {
    toastr.options = {
        "closeButton": true,
        "positionClass": "toast-top-left"
    }

    if (localStorage.getItem("enviroment") == "main") {
        toastr["info"]('Esperamos vuelva pronto', 'Sesión cerrada');
    }

    localStorage.setItem("enviroment", "");

    $('#rut').rut({
        validateOn: 'change keyup',
        useThousandsSeparator: false
    });
});

$("#btn_login").on("click", function (e) {
    e.preventDefault();
    var data = $('#login_form').serialize();

    if ($('#profile').val() == "") {
        toastr["info"]("Debe seleccionar un perfil", "Atención");
    } else if ($('#rut').val() == "") {
        toastr["info"]("Debe igresar un RUT", "Atención");
    } else if ($('#pass').val() == "") {
        toastr["info"]("Debe ingresar una contraseña", "Atención");
    } else if (!$.validateRut($('#rut').val())) {
        toastr["info"]("RUT invalido", "Atención");
    } else {
        $("#loader").addClass("is-active");
        $.ajax({
            url: 'login',
            type: 'post',
            dataType: 'json',
            data: data,
            success: function (o) {
                if (o == 1) {
                    window.location.href = "";
                    localStorage.setItem("enviroment", "login");
                } else {
                    $("#loader").removeClass("is-active");
                    toastr["warning"]("Contraseña incorrecta", "Datos Incorrectos");
                }
            },
            error: function () {
                $("#loader").removeClass("is-active");
                toastr["warning"]("Usuario no registrado", "Datos Incorrectos");
            }
        });
    }
});