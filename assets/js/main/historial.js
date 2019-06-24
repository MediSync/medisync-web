$(document).ready(function () {
    toastr.options = {
        "closeButton": true,
        "positionClass": "toast-top-right"
    }

    var user = localStorage.getItem("profesional");

    jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/profesional/' + user, function (result) {
        $("#resp_hist").val(result.names.toUpperCase() + " " + result.last_name1.toUpperCase() + " " + result.last_name2.toUpperCase());
    });

    var patient_history = localStorage.getItem("patient_history");

    jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/patient/' + patient_history, function (object) {
        $("#rut_hist").text(object.rut.toUpperCase());
        $("#age_hist").text(calculateAge(object.birth_date));
        $("#name_hist").text(object.names.toUpperCase() + " " + object.last_name1.toUpperCase() + " " + object.last_name2.toUpperCase());
        $("#sexo_hist").text(((object.sexo.toUpperCase() === "M") ? "MASCULINO" : "FEMENINO"));
        $("#birth_hist").text(object.birth_date.toUpperCase());
        $("#email_hist").text(object.email.toUpperCase());
        $("#phone_hist").text(object.phone.toUpperCase());
        $("#address_hist").text(object.address.toUpperCase());
    });

    $('#date_hist').datepicker({ language: "es", autoclose: true }).datepicker("setDate", new Date());

    table_body_history(patient_history);
    table_body_evaluacion(patient_history);

});

function table_body_evaluacion(rut) {
    jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/patient_range_of_motion', function (result) {
        $("#table_evaluacion").empty();
        Object.keys(result.patient).forEach(function (key) {
            var object = (key, result.patient[key]);
            if (object.rut == rut) {
                var i = 0;
                Object.keys(object.subCollection).forEach(function (key) {
                    var subobject = (key, object.subCollection[key]);
                    var fil = "<tr>";
                    fil += "<td style='display: none;'>" + Object.keys(object.subCollection)[i] + "</td>";
                    fil += "<td >" + subobject.fecha.toUpperCase() + "</td>";
                    fil += "<td >" + subobject.hora.toUpperCase() + "</td>";
                    fil += "<td >" + subobject.datox.toUpperCase() + "</td>";
                    fil += "<td >" + subobject.datoy.toUpperCase() + "</td>";
                    fil += "</tr>";
                    $("#table_evaluacion").append(fil);
                    i++;
                });
            }
        });
    });
}

function table_body_history(rut) {
    jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/patient_history', function (result) {
        $("#table_history").empty();
        Object.keys(result.patient).forEach(function (key) {
            var object = (key, result.patient[key]);
            if (object.rut == rut) {
                var i = 0;
                Object.keys(object.subCollection).forEach(function (key) {
                    var subobject = (key, object.subCollection[key]);
                    var fil = "<tr>";
                    fil += "<td style='display: none;'>" + Object.keys(object.subCollection)[i] + "</td>";
                    fil += "<td >" + subobject.fecha.toUpperCase() + "</td>";
                    fil += "<td >" + subobject.titulo.toUpperCase() + "</td>";
                    fil += "<td >" + subobject.responsable.toUpperCase() + "</td>";
                    fil += "<td ><a href='#' id='load_view_history' class='btn btn-sm btn-info float-right' data-toggle='modal' data-target='#view_history_modal'><i class='fas fa-eye'></i></a></td>";
                    //fil += "<td ><a href='#' id='load_edit_history' class='btn btn-sm btn-warning float-right' data-toggle='modal' data-target='#edit_history_modal'><i class='fas fa-edit'></i></a></td>";
                    fil += "</tr>";
                    $("#table_history").append(fil);
                    i++;
                });
            }
        });
    });
}

function table_view_history(id) {
    var rut = localStorage.getItem("patient_history");
    jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/patient_history', function (result) {
        $("#datos_history").empty();
        Object.keys(result.patient).forEach(function (key) {
            var object = (key, result.patient[key]);
            if (object.rut == rut) {
                var i = 0;
                Object.keys(object.subCollection).forEach(function (key) {
                    if (Object.keys(object.subCollection)[i] == id) {
                        var subobject = (key, object.subCollection[key]);
                        $("#datos_history").empty();
                        var fil = "";
                        fil += "<tr><td style='width: 30%;'><strong>Titulo:</strong></td><td style='width: 70%;'>" + subobject.titulo.toUpperCase() + "</td></tr>";
                        fil += "<tr><td style='width: 30%;'><strong>Fecha:</strong></td><td style='width: 70%;'>" + subobject.fecha.toUpperCase() + "</td></tr>";
                        fil += "<tr><td style='width: 30%;'><strong>Hora:</strong></td><td style='width: 70%;'>" + subobject.hora.toUpperCase() + "</td></tr>";
                        fil += "<tr><td style='width: 30%;'><strong>Responsable:</strong></td><td style='width: 70%;'>" + subobject.responsable.toUpperCase() + "</td></tr>";
                        fil += "<tr><td style='width: 30%;'><strong>Evolución:</strong></td><td style='width: 70%;'>" + subobject.text_Evolucion.toUpperCase() + "</td></tr>";
                        $("#datos_history").append(fil);
                    }
                    i++;
                });
            }
        });
    });
}

// cargar vista paciente
$("body").on("click", "#load_view_history", function (e) {
    e.preventDefault();
    var id = $(this).parents("tr").find("td").html();
    table_view_history(id);
});

$("#btn_add_history").on("click", function (e) {
    e.preventDefault();
    var title_hist = $('#title_hist').val();
    var date_hist = $('#date_hist').val();
    var time_hist = $('#time_hist').val();
    var resp_hist = $('#resp_hist').val();
    var evol_hist = $('#evol_hist').val();

    var url = 'https://projectmedisync.firebaseapp.com/api/v1/patient/' + rut;

    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: {
            titulo: title_hist,
            fecha: date_hist,
            hora: time_hist,
            responsable: resp_hist,
            text_Evolucion: evol_hist
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
