$(document).ready(function () {
    toastr.options = {
        "closeButton": true,
        "positionClass": "toast-top-right"
    }
    var user = localStorage.getItem("organization");

    jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/organization/' + user, function (result) {
        $("#lbl_nav").text("BIEVENIDO " + result.name.toUpperCase());
    });


    $('#birth_date_prof').datepicker({ language: "es", autoclose: true });
    $('#birth_date_prof_edit').datepicker({ language: "es", autoclose: true });

    table_body();
    table_body2();
});

function table_body() {
    jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/patient/', function (result) {
        $("#table_body").empty();
        Object.keys(result.patient).forEach(function (key) {
            var object = (key, result.patient[key]);
            var fil = "<tr>";
            fil += "<td >" + object.rut.toUpperCase() + "</td>";
            fil += "<td >" + object.names.toUpperCase() + " " + object.last_name1.toUpperCase() + " " + object.last_name2.toUpperCase() + "</td>";
            fil += "<td >" + object.sexo.toUpperCase() + "</td>";
            fil += "<td >" + calculateAge(object.birth_date) + "</td>";
            fil += "<td >" + object.birth_date.toUpperCase() + "</td>";
            fil += "<td ><a href='#' id='load_view_paciente' class='btn btn-sm btn-info float-right' data-toggle='modal' data-target='#view_modal'><i class='fas fa-eye'></i></a></td>";
            fil += "<td ><a href='#' id='load_edit_paciente' class='btn btn-sm btn-warning float-right' data-toggle='modal' data-target='#edit_modal'><i class='fas fa-edit'></i></a></td>";
            fil += "</tr>";
            $("#table_body").append(fil);
        });
    });
}

function table_body_paciente(rut) {

    jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/patient/' + rut, function (object) {
        $("#datos_paciente").empty();
        var fil = "";
        fil += "<tr><td style='width: 30%;'><strong>Rut:</strong></td><td style='width: 70%;'>" + object.rut.toUpperCase() + "</td></tr>";
        fil += "<tr><td style='width: 30%;'><strong>Nombre:</strong></td><td style='width: 70%;'>" + object.names.toUpperCase() + " " + object.last_name1.toUpperCase() + " " + object.last_name2.toUpperCase() + "</td></tr>";
        fil += "<tr><td style='width: 30%;'><strong>Fecha Nacimiento:</strong></td><td style='width: 70%;'>" + object.birth_date.toUpperCase() + "</td></tr>";
        fil += "<tr><td style='width: 30%;'><strong>Edad:</strong></td><td style='width: 70%;'>" + calculateAge(object.birth_date) + " AÑOS</td></tr>";
        fil += "<tr><td style='width: 30%;'><strong>Genero:</strong></td><td style='width: 70%;'>" + ((object.sexo.toUpperCase() === "M") ? "MASCULINO" : "FEMENINO") + "</td></tr>";
        fil += "<tr><td style='width: 30%;'><strong>Dirección:</strong></td><td style='width: 70%;'>" + object.address.toUpperCase() + "</td></tr>";
        fil += "<tr><td style='width: 30%;'><strong>Correo:</strong></td><td style='width: 70%;'>" + object.email.toUpperCase() + "</td></tr>";
        fil += "<tr><td style='width: 30%;'><strong>Numero de Telefono:</strong></td><td style='width: 70%;'>" + object.phone.toUpperCase() + "</td></tr>";
        $("#datos_paciente").append(fil);
    });
}

function calculateAge(birthday) {
    var birthday_arr = birthday.split("/");
    var birthday_date = new Date(birthday_arr[2], birthday_arr[1] - 1, birthday_arr[0]);
    var ageDifMs = Date.now() - birthday_date.getTime();
    var ageDate = new Date(ageDifMs);
    return Math.abs(ageDate.getUTCFullYear() - 1970);
}

$('.modal').on('shown.bs.modal', function () {
    //Make sure the modal and backdrop are siblings (changes the DOM)
    $(this).before($('.modal-backdrop'));
    //Make sure the z-index is higher than the backdrop
    $(this).css("z-index", parseInt($('.modal-backdrop').css('z-index')) + 1);
});

// cargar vista paciente
$("body").on("click", "#load_view_paciente", function (e) {
    e.preventDefault();
    var rut = $(this).parents("tr").find("td").html();
    table_body_paciente(rut);
});

// cargar vista paciente
$("body").on("click", "#load_edit_paciente", function (e) {
    e.preventDefault();
    var rut = $(this).parents("tr").find("td").html();
    jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/patient/' + rut, function (object) {
        $('#rut_pac_edit').val(object.rut);
        $('#names_pac_edit').val(object.names);
        $('#last_name1_pac_edit').val(object.last_name1);
        $('#last_name2_pac_edit').val(object.last_name2);
        $('#birth_date_pac_edit').val(object.birth_date);
        $('#sexo_pac_edit').val(object.sexo);
        $('#address_pac_edit').val(object.address);
        $('#email_pac_edit').val(object.email);
        $('#phone_pac_edit').val(object.phone);
    });
});

// cargar historial paciente
$("body").on("click", "#load_history_paciente", function (e) {
    e.preventDefault();
    var rut = $(this).parents("tr").find("td").html();
    localStorage.setItem("patient_history", rut);
    window.location.href = "gestion_historial";
});

$("#btn_add_patient").on("click", function (e) {
    e.preventDefault();
    var rut = $('#rut_pac').val();
    var names = $('#names_pac').val();
    var last_name1 = $('#last_name1_pac').val();
    var last_name2 = $('#last_name2_pac').val();
    var birth_date = $('#birth_date_pac').val();
    var sexo = $('#sexo_pac').val();
    var address = $('#address_pac').val();
    var email = $('#email_pac').val();
    var phone = $('#phone_pac').val();
    var password = CryptoJS.MD5(rut.split('-')[0]).toString();

    var url = 'https://projectmedisync.firebaseapp.com/api/v1/patient/' + rut;

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
            password: password
        },
        success: function (o) {
            console.log(o);
            if (o == 1) {
                toastr["success"]("Paciente registrado", "Operación Exitosa");
                document.getElementById("form_new_patient").reset();
                $('#new_modal').modal('hide');
                table_body();
            } else {
                toastr["danger"]("Ups... algo paso", "Atención");
            }
        },
        error: function () {
            toastr["warning"]("Usuario no registrado", "Datos Incorrectos");
        }
    });
});

$("#btn_edit_patient").on("click", function (e) {
    e.preventDefault();
    var rut = $('#rut_pac_edit').val();
    var names = $('#names_pac_edit').val();
    var last_name1 = $('#last_name1_pac_edit').val();
    var last_name2 = $('#last_name2_pac_edit').val();
    var birth_date = $('#birth_date_pac_edit').val();
    var sexo = $('#sexo_pac_edit').val();
    var address = $('#address_pac_edit').val();
    var email = $('#email_pac_edit').val();
    var phone = $('#phone_pac_edit').val();
    var password = "";

    jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/patient/' + rut, function (object) {
        console.log(object);
        password = object.password;

        var url = 'https://projectmedisync.firebaseapp.com/api/v1/patient/' + rut;

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
                password: password
            },
            success: function (o) {
                console.log(o);
                if (o == 1) {
                    toastr["success"]("Paciente Actualizado", "Operación Exitosa");
                    document.getElementById("form_edit_patient").reset();
                    $('#edit_modal').modal('hide');
                    table_body();
                } else {
                    toastr["danger"]("Ups... algo paso", "Atención");
                }
            },
            error: function () {
                toastr["warning"]("Usuario no registrado", "Datos Incorrectos");
            }
        });
    });

});


/////////////////////////////////////// mmmmmmmmmmmmmm /////////////////////////////////////


function table_body2() {
    jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/profesional/', function (result) {
        $("#table_body2").empty();
        Object.keys(result.profesional).forEach(function (key) {
            var object = (key, result.profesional[key]);
            var fil = "<tr>";
            fil += "<td >" + object.rut.toUpperCase() + "</td>";
            fil += "<td >" + object.names.toUpperCase() + " " + object.last_name1.toUpperCase() + " " + object.last_name2.toUpperCase() + "</td>";
            fil += "<td >" + object.email.toUpperCase() + "</td>";
            fil += "<td >" + object.phone + "</td>";
            fil += "<td ><a href='#' id='load_view_prof' class='btn btn-sm btn-info float-right' data-toggle='modal' data-target='#view_prof_modal'><i class='fas fa-eye'></i></a></td>";
            fil += "<td ><a href='#' id='load_edit_prof' class='btn btn-sm btn-warning float-right' data-toggle='modal' data-target='#edit_prof_modal'><i class='fas fa-edit'></i></a></td>";
            fil += "</tr>";
            $("#table_body2").append(fil);
        });
    });
}

function table_body_prof(rut) {

    jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/profesional/' + rut, function (object) {
        $("#datos_view_prof").empty();
        var fil = "";
        fil += "<tr><td style='width: 30%;'><strong>Rut:</strong></td><td style='width: 70%;'>" + object.rut.toUpperCase() + ((object.admin === "si") ? " (Administrador) " : "") + "</td></tr>";
        fil += "<tr><td style='width: 30%;'><strong>Nombre:</strong></td><td style='width: 70%;'>" + object.names.toUpperCase() + " " + object.last_name1.toUpperCase() + " " + object.last_name2.toUpperCase() + "</td></tr>";
        fil += "<tr><td style='width: 30%;'><strong>Fecha Nacimiento:</strong></td><td style='width: 70%;'>" + object.birth_date.toUpperCase() + "</td></tr>";
        fil += "<tr><td style='width: 30%;'><strong>Edad:</strong></td><td style='width: 70%;'>" + calculateAge(object.birth_date) + " AÑOS</td></tr>";
        fil += "<tr><td style='width: 30%;'><strong>Genero:</strong></td><td style='width: 70%;'>" + ((object.sexo.toUpperCase() === "M") ? "MASCULINO" : "FEMENINO") + "</td></tr>";
        fil += "<tr><td style='width: 30%;'><strong>Dirección:</strong></td><td style='width: 70%;'>" + object.address.toUpperCase() + "</td></tr>";
        fil += "<tr><td style='width: 30%;'><strong>Correo:</strong></td><td style='width: 70%;'>" + object.email.toUpperCase() + "</td></tr>";
        fil += "<tr><td style='width: 30%;'><strong>Numero de Telefono:</strong></td><td style='width: 70%;'>" + object.phone.toUpperCase() + "</td></tr>";
        $("#datos_view_prof").append(fil);
    });
}

function calculateAge(birthday) {
    var birthday_arr = birthday.split("/");
    var birthday_date = new Date(birthday_arr[2], birthday_arr[1] - 1, birthday_arr[0]);
    var ageDifMs = Date.now() - birthday_date.getTime();
    var ageDate = new Date(ageDifMs);
    return Math.abs(ageDate.getUTCFullYear() - 1970);
}

$('.modal').on('shown.bs.modal', function () {
    //Make sure the modal and backdrop are siblings (changes the DOM)
    $(this).before($('.modal-backdrop'));
    //Make sure the z-index is higher than the backdrop
    $(this).css("z-index", parseInt($('.modal-backdrop').css('z-index')) + 1);
});

// cargar vista paciente
$("body").on("click", "#load_view_prof", function (e) {
    e.preventDefault();
    var rut = $(this).parents("tr").find("td").html();
    console.log("rut=====> " + rut);
    table_body_prof(rut);
});

// cargar vista paciente
$("body").on("click", "#load_edit_prof", function (e) {
    e.preventDefault();
    var rut = $(this).parents("tr").find("td").html();
    jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/profesional/' + rut, function (object) {
        $('#rut_prof_edit').val(object.rut);
        $('#names_prof_edit').val(object.names);
        $('#last_name1_prof_edit').val(object.last_name1);
        $('#last_name2_prof_edit').val(object.last_name2);
        $('#birth_date_prof_edit').val(object.birth_date);
        $('#sexo_prof_edit').val(object.sexo);
        $('#address_prof_edit').val(object.address);
        $('#email_prof_edit').val(object.email);
        $('#phone_prof_edit').val(object.phone);
        if (object.admin === "si") {
            $('#admin_edit').prop('checked', true);
        }
    });
});

$("#btn_add_prof").on("click", function (e) {
    e.preventDefault();
    var rut = $('#rut_prof').val();
    var names = $('#names_prof').val();
    var last_name1 = $('#last_name1_prof').val();
    var last_name2 = $('#last_name2_prof').val();
    var birth_date = $('#birth_date_prof').val();
    var sexo = $('#sexo_prof').val();
    var address = $('#address_prof').val();
    var email = $('#email_prof').val();
    var phone = $('#phone_prof').val();
    var password = CryptoJS.MD5(rut.split('-')[0]).toString();
    var admin = "no"

    if ($('#admin').is(":checked")) {
        admin = "si"
    }

    var url = 'https://projectmedisync.firebaseapp.com/api/v1/profesional/' + rut;

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
            password: password,
            admin: admin
        },
        success: function (o) {
            console.log(o);
            if (o == 1) {
                toastr["success"]("Porfesional registrado", "Operación Exitosa");
                document.getElementById("form_new_prof").reset();
                $('#new_prof_modal').modal('hide');
                table_body2();
            } else {
                toastr["danger"]("Ups... algo paso", "Atención");
            }
        },
        error: function () {
            toastr["warning"]("Profesional no registrado", "Datos Incorrectos");
        }
    });
});

$("#btn_edit_prof").on("click", function (e) {
    e.preventDefault();
    var rut = $('#rut_prof_edit').val();
    var names = $('#names_prof_edit').val();
    var last_name1 = $('#last_name1_prof_edit').val();
    var last_name2 = $('#last_name2_prof_edit').val();
    var birth_date = $('#birth_date_prof_edit').val();
    var sexo = $('#sexo_prof_edit').val();
    var address = $('#address_prof_edit').val();
    var email = $('#email_prof_edit').val();
    var phone = $('#phone_prof_edit').val();
    var password = "";
    var admin = "no"

    if ($('#admin_edit').is(":checked")) {
        admin = "si"
    } else {
        admin = "no"
    }

    jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/profesional/' + rut, function (object) {
        password = object.password;


        var url = 'https://projectmedisync.firebaseapp.com/api/v1/profesional/' + rut;

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
                password: password,
                admin: admin
            },
            success: function (o) {
                console.log(o);
                if (o == 1) {
                    toastr["success"]("Profesional Actualizado", "Operación Exitosa");
                    document.getElementById("form_edit_prof").reset();
                    $('#edit_prof_modal').modal('hide');
                    table_body2();
                } else {
                    toastr["danger"]("Ups... algo paso", "Atención");
                }
            },
            error: function () {
                toastr["warning"]("Profesional no registrado", "Datos Incorrectos");
            }
        });
    });
});



