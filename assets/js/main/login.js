$(document).ready(function () {
    toastr.options = {
        "closeButton": true,
        "positionClass": "toast-top-right"
    }

    if (localStorage.getItem("enviroment") == "main") {
        toastr["info"]('Esperamos vuelva pronto', 'Sesión cerrada');
    }

    localStorage.setItem("enviroment", "");

    $('#rut').rut({
        validateOn: 'change keyup',
        useThousandsSeparator: false
    });

    $('#birth_date').datepicker({ language: "es", autoclose: true });
});

$("#btn_login").on("click", function (e) {
    e.preventDefault();
    var profile = $('#profile').val();
    var email = $('#email').val();
    var pass = $('#pass').val();

    if (profile == "") {
        toastr["info"]("Debe seleccionar un perfil", "Atención");
    } else if (email == "") {
        toastr["info"]("Debe igresar un RUT", "Atención");
    } else if (pass == "") {
        toastr["info"]("Debe ingresar una contraseña", "Atención");
    } else if (profile == 1) {
        jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/patient/', function (result) {
            var logs = 0;
            Object.keys(result.patient).forEach(function (key) {
                var object = (key, result.patient[key]);
                if (object.email == email && object.password == CryptoJS.MD5(pass)) {
                    localStorage.setItem("patient", object.rut);
                    window.location.href = "set_patient";
                }
            });
            if (logs == 0) {
                toastr["warning"]("Datos Incorrectos", "Atención");
            }
        });
    } else if (profile == 2) {
        jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/profesional/', function (result) {
            var logs = 0;
            Object.keys(result.profesional).forEach(function (key) {
                var object = (key, result.profesional[key]);
                if (object.email == email && object.password == CryptoJS.MD5(pass)) {
                    localStorage.setItem("profesional", object.rut);
                    window.location.href = "set_profesional";
                }
            });
            if (logs == 0) {
                toastr["warning"]("Datos Incorrectos", "Atención");
            }
        });
    } else if (profile == 3) {
        jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/organization/', function (result) {
            var logs = 0;
            Object.keys(result.organization).forEach(function (key) {
                var object = (key, result.organization[key]);
                if (object.email == email && object.password == CryptoJS.MD5(pass)) {
                    localStorage.setItem("organization", object.rut);
                    window.location.href = "set_organization";
                }
            });
            if (logs == 0) {
                toastr["warning"]("Datos Incorrectos", "Atención");
            }
        });
    }
});

$("#btn_add_profesional").on("click", function (e) {
    e.preventDefault();
    var rut = $('#rut').val();
    var names = $('#names').val();
    var last_name1 = $('#last_name1').val();
    var last_name2 = $('#last_name2').val();
    var birth_date = $('#birth_date').val();
    var sexo = $('#sexo').val();
    var address = $('#address').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var password = $('#password').val();
    var password2 = $('#password2').val();
    var pass = CryptoJS.MD5(password).toString();

    if (password == password2) {
        var url = 'https://projectmedisync.firebaseapp.com/api/v1/profesional/' + rut;
        console.log(url);
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: {
                rut: rut,
                names: names,
                last_name1: last_name1,
                last_name2: last_name2,
                birth_date: birth_date,
                sexo: sexo,
                address: address,
                email: email,
                phone: phone,
                password: pass
            },
            success: function (o) {
                console.log(o);
                if (o == 1) {
                    toastr["success"]("Profesional registrado", "Operación Exitosa");
                    document.getElementById("register_profesional").reset();
                } else {
                    toastr["danger"]("Ups... algo paso", "Atención");
                }
            },
            error: function () {
                toastr["warning"]("Usuario no registrado", "Datos Incorrectos");
            }
        });
    } else {
        toastr["warning"]("Contraseñas no coinciden", "Atención");
    }
});

$("#btn_add_organization").on("click", function (e) {
    e.preventDefault();
    var data = $('#register_organization').serialize();
    console.log(data);
    var rut_org = $('#rut_org').val();
    var name_org = $('#name_org').val();
    var address_org = $('#address_org').val();
    var email_org = $('#email_org').val();
    var phone_org = $('#phone_org').val();
    var password_org = $('#password_org').val();
    var password2_org = $('#password2_org').val();
    var pass = CryptoJS.MD5(password_org).toString();

    if (password_org == password2_org) {
        var url = 'https://projectmedisync.firebaseapp.com/api/v1/organization/' + rut_org;
        console.log(url);
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: {
                rut: rut_org,
                name: name_org,
                address: address_org,
                email: email_org,
                phone: phone_org,
                password: pass
            },
            success: function (o) {
                console.log(o);
                if (o == 1) {
                    toastr["success"]("Organización registrada", "Operación Exitosa");
                    document.getElementById("register_organization").reset();
                } else {
                    toastr["danger"]("Ups... algo paso", "Atención");
                }
            },
            error: function () {
                toastr["warning"]("Usuario no registrado", "Datos Incorrectos");
            }
        });
    } else {
        toastr["warning"]("Contraseñas no coinciden", "Atención");
    }
});