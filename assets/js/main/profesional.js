$(document).ready(function () {
    toastr.options = {
        "closeButton": true,
        "positionClass": "toast-top-right"
    }
    var user = localStorage.getItem("profesional");

    var db = firebase.firestore();

    var docPro = db.collection("profesional").doc(user);

    docPro.get().then(function (doc2) {
        if (doc2.exists) {
            $("#nav_brand").text("Bienvenido " + doc2.data().names + " " + doc2.data().last_name1 + " " + doc2.data().last_name2);
            localStorage.setItem("admin", doc2.data().admin);
            $("#loader").removeClass("is-active");
        } else {
            console.log("No such document!");
        }
    }).catch(function (error) {
        console.log("Error getting document:", error);
    });

    $("#new_modal").on('hidden.bs.modal', function () {
        document.getElementById("register_pac").reset();
    });

    $('#rut_pac').rut({
        validateOn: 'change keyup',
        useThousandsSeparator: false
    });

    $('#birth_date_pac').datepicker({ language: "es", autoclose: true });
    $('#birth_date_pac_edit').datepicker({ language: "es", autoclose: true });

    $("#sync_table").on("click", function (e) {
        e.preventDefault();
        table_body();
    });

});

function calculateAge(birthday) {
    var birthday_arr = birthday.split("/");
    var birthday_date = new Date(birthday_arr[2], birthday_arr[1] - 1, birthday_arr[0]);
    var ageDifMs = Date.now() - birthday_date.getTime();
    var ageDate = new Date(ageDifMs);
    return Math.abs(ageDate.getUTCFullYear() - 1970);
}

$("#gestion_pacientes").on("click", function (e) {
    e.preventDefault();
    $("#loader").addClass("is-active");
    $("main").load("gestion_pacientes");
    table_body();
});

function table_body() {
    var db = firebase.firestore();
    db.collection("patient").get().then((querySnapshot) => {
        $("#table_body").empty();
        querySnapshot.forEach((doc) => {
            var fil = "<tr>";
            fil += "<td >" + `${doc.data().rut}` + "</td>";
            fil += "<td >" + `${doc.data().names.toUpperCase()}` + " " + `${doc.data().last_name1.toUpperCase()}` + " " + `${doc.data().last_name2.toUpperCase()}` + "</td>";
            fil += "<td >" + `${doc.data().sexo}` + "</td>";
            fil += "<td >" + calculateAge(`${doc.data().birth_date}`) + "</td>";
            fil += "<td >" + `${doc.data().birth_date}` + "</td>";
            fil += "<td ><a href='#' id='load_history_paciente' class='btn btn-sm btn-success float-right' data-toggle='tooltip' data-placement='top' title='Ver ficha clinica'><i class='fas fa-notes-medical'></i></a></td>";
            fil += "<td ><a href='#' id='load_view_paciente' class='btn btn-sm btn-info float-right' data-toggle='modal' data-target='#view_modal' data-toggle='tooltip' data-placement='top' title='Ver detalles del paciente'><i class='fas fa-eye'></i></a></td>";
            if (localStorage.getItem("admin") === "si") {
                fil += "<td ><a href='#' id='load_edit_paciente' class='btn btn-sm btn-warning float-right' data-toggle='modal' data-target='#edit_modal' data-toggle='tooltip' data-placement='top' title='Editar datos del paciente'><i class='fas fa-edit'></i></a></td>";
            } else {
                fil += "<td ><a disabled href='#' class='btn btn-sm btn-warning float-right disabled'data-toggle='tooltip' data-placement='top' title='Opción no disponible'><i class='fas fa-edit'></i></a></td>";
            }
            fil += "</tr>";
            $("#table_body").append(fil);
            $("#loader").removeClass("is-active");
        });
    });
}

// agregar paciente
$("#btn_add_pac").on("click", function (e) {
    $("#loader").addClass("is-active");
    e.preventDefault();

    var db = firebase.firestore();

    var run = $('#rut_pac').val();
    var names = $('#names_pac').val();
    var last_name1 = $('#last_name1_pac').val();
    var last_name2 = $('#last_name2_pac').val();
    var birth_date = $('#birth_date_pac').val();
    var sexo = $('#sexo_pac').val();
    var address = $('#address_pac').val();
    var email = $('#email_pac').val();
    var phone = $('#phone_pac').val();

    if (run == "" || names == "" || last_name1 == "" || last_name2 == "" || birth_date == "" || sexo == "" || address == "" || email == "" || phone == "") {
        toastr["warning"]("Debe completar todos los campos", "Atención");
    } else if (!$.validateRut(run)) {
        toastr["warning"]("El RUN es invalido", "Atención");
    } else if (!ValidateEmail(email)) {
        toastr["warning"]("El correo no es valido", "Atención");
    } else if (!phonenumber(phone)) {
        toastr["warning"]("El telefono no es valido", "Atención");
    } else if (sexo == null) {
        toastr["warning"]("Debe seleccionar un sexo", "Atención");
    } else {
        $.validateRut(run, function (r, dv) {
            var password = CryptoJS.MD5(r).toString();

            var docPro = db.collection("patient").doc(run);

            docPro.get().then(function (doc2) {
                if (doc2.exists) {
                    toastr["warning"]("El paciente ya esta registrado", "Atención");
                } else {
                    db.collection("patient").doc(run).set({
                        rut: run,
                        names: names,
                        last_name1: last_name1,
                        last_name2: last_name2,
                        birth_date: birth_date,
                        sexo: sexo,
                        address: address,
                        email: email,
                        phone: phone,
                        password: password
                    }).then(function () {
                        table_body();
                        toastr["success"]("Paciente registrado", "Operación Exitosa");
                        $('#new_modal').modal('toggle');
                        document.getElementById("register_pac").reset();
                        $("#loader").removeClass("is-active");
                    }).catch(function () {
                        toastr["warning"]("Contactese con soporte", "No se ha podido registrar");
                    });
                }
            }).catch(function (error) {
                console.log("Error getting document:", error);
            });
        });
    }
    $("#loader").removeClass("is-active");
});

// cargar datos en edit paciente
$("body").on("click", "#load_edit_paciente", function (e) {
    e.preventDefault();
    var db = firebase.firestore();

    var rut = $(this).parents("tr").find("td").html();
    var docPro = db.collection("patient").doc(rut);

    docPro.get().then(function (doc) {
        if (doc.exists) {
            $('#rut_pac_edit').val(`${doc.data().rut}`);
            $('#names_pac_edit').val(`${doc.data().names}`);
            $('#last_name1_pac_edit').val(`${doc.data().last_name1}`);
            $('#last_name2_pac_edit').val(`${doc.data().last_name2}`);
            $('#birth_date_pac_edit').val(`${doc.data().birth_date}`);
            $('#sexo_pac_edit').val(`${doc.data().sexo}`);
            $('#address_pac_edit').val(`${doc.data().address}`);
            $('#email_pac_edit').val(`${doc.data().email}`);
            $('#phone_pac_edit').val(`${doc.data().phone}`);
        } else {
            toastr["warning"]("Algo sucedio, contactese con soporte", "Atención");
        }
    }).catch(function (error) {
        console.log("Error getting document:", error);
    });
});

// editar paciente
$("#btn_edit_pac").on("click", function (e) {
    $("#loader").addClass("is-active");
    e.preventDefault();
    console.log("asdfa")
    var db = firebase.firestore();

    var run = $('#rut_pac_edit').val();
    var names = $('#names_pac_edit').val();
    var last_name1 = $('#last_name1_pac_edit').val();
    var last_name2 = $('#last_name2_pac_edit').val();
    var birth_date = $('#birth_date_pac_edit').val();
    var sexo = $('#sexo_pac_edit').val();
    var address = $('#address_pac_edit').val();
    var email = $('#email_pac_edit').val();
    var phone = $('#phone_pac_edit').val();

    if (run == "" || names == "" || last_name1 == "" || last_name2 == "" || birth_date == "" || sexo == "" || address == "" || email == "" || phone == "") {
        toastr["warning"]("Debe completar todos los campos", "Atención");
    } else if (!$.validateRut(run)) {
        toastr["warning"]("El RUN es invalido", "Atención");
    } else if (!ValidateEmail(email)) {
        toastr["warning"]("El correo no es valido", "Atención");
    } else if (!phonenumber(phone)) {
        toastr["warning"]("El telefono no es valido", "Atención");
    } else if (sexo == null) {
        toastr["warning"]("Debe seleccionar un sexo", "Atención");
    } else {
        var updatePac = db.collection("patient").doc(run);

        return updatePac.update({
            names: names,
            last_name1: last_name1,
            last_name2: last_name2,
            birth_date: birth_date,
            sexo: sexo,
            address: address,
            email: email,
            phone: phone
        }).then(function () {
            table_body();
            toastr["success"]("Paciente actualizado", "Operación Exitosa");
            $('#edit_modal').modal('toggle');
            document.getElementById("edit_pac").reset();
            $("#loader").removeClass("is-active");
        }).catch(function (error) {
            // The document probably doesn't exist.
            console.error("Error updating document: ", error);
        });

    }
    $("#loader").removeClass("is-active");
});

function ValidateEmail(inputText) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (inputText.match(mailformat)) {
        console.log("correo valido");
        return true;
    }
    else {
        console.log("correo invalido");
        return false;
    }
}

function phonenumber(inputtxt) {
    var phoneno = /^\d{9}$/;
    if (inputtxt.match(phoneno)) {
        console.log("numero valido")
        return true;
    }
    else {
        console.log("numero no valido")
        return false;
    }
}

// cargar vista paciente
$("body").on("click", "#load_view_paciente", function (e) {
    e.preventDefault();
    var rut = $(this).parents("tr").find("td").html();
    table_body_paciente(rut);
});

function table_body_paciente(rut) {
    var db = firebase.firestore();
    var docPro = db.collection("patient").doc(rut);

    docPro.get().then(function (doc) {
        if (doc.exists) {
            $("#datos_paciente").empty();
            var fil = "";
            fil += "<tr><td style='width: 30%;'><strong>Rut:</strong></td><td style='width: 70%;'>" + `${doc.data().rut.toUpperCase()}` + "</td></tr>";
            fil += "<tr><td style='width: 30%;'><strong>Nombre:</strong></td><td style='width: 70%;'>" + `${doc.data().names.toUpperCase()}` + " " + `${doc.data().last_name1.toUpperCase()}` + " " + `${doc.data().last_name2.toUpperCase()}` + "</td></tr>";
            fil += "<tr><td style='width: 30%;'><strong>Fecha Nacimiento:</strong></td><td style='width: 70%;'>" + `${doc.data().birth_date}` + "</td></tr>";
            fil += "<tr><td style='width: 30%;'><strong>Edad:</strong></td><td style='width: 70%;'>" + calculateAge(`${doc.data().birth_date}`) + " AÑOS</td></tr>";
            fil += "<tr><td style='width: 30%;'><strong>Genero:</strong></td><td style='width: 70%;'>" + ((`${doc.data().sexo.toUpperCase()}` === "M") ? "MASCULINO" : "FEMENINO") + "</td></tr>";
            fil += "<tr><td style='width: 30%;'><strong>Dirección:</strong></td><td style='width: 70%;'>" + `${doc.data().address.toUpperCase()}` + "</td></tr>";
            fil += "<tr><td style='width: 30%;'><strong>Correo:</strong></td><td style='width: 70%;'>" + `${doc.data().email.toUpperCase()}` + "</td></tr>";
            fil += "<tr><td style='width: 30%;'><strong>Numero de Telefono:</strong></td><td style='width: 70%;'>" + `${doc.data().phone}` + "</td></tr>";
            $("#datos_paciente").append(fil);
        } else {
            toastr["warning"]("Algo sucedio, contactese con soporte", "Atención");
        }
    }).catch(function (error) {
        console.log("Error getting document:", error);
    });
}

// cargar historial paciente
$("body").on("click", "#load_history_paciente", function (e) {
    e.preventDefault();
    $("#loader").addClass("is-active");
    var rut = $(this).parents("tr").find("td").html();
    $("main").load("gestion_historial");

    jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/patient/' + rut, function (object) {
        $("#rut_hist").text(object.rut.toUpperCase());
        $("#age_hist").text(calculateAge(object.birth_date));
        $("#name_hist").text(object.names.toUpperCase() + " " + object.last_name1.toUpperCase() + " " + object.last_name2.toUpperCase());
        $("#sexo_hist").text(((object.sexo.toUpperCase() === "M") ? "MASCULINO" : "FEMENINO"));
        $("#birth_hist").text(object.birth_date.toUpperCase());
        $("#email_hist").text(object.email.toUpperCase());
        $("#phone_hist").text(object.phone.toUpperCase());
        $("#address_hist").text(object.address.toUpperCase());
        $("#loader").removeClass("is-active");
    });
});


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
$(document).ready(function () {
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





/////////////////////////////// GRAFICO ////////////////////////////////////////////////////


// Set new default font family and font color to mimic Bootstrap's default styling
//Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
//Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

// Area Chart Example
var datos = [];
var label = [];
jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/patient_range_of_motion', function (result) {
    Object.keys(result.patient).forEach(function (key) {
        var object = (key, result.patient[key]);
        if (object.rut == localStorage.getItem("patient_history")) {
            Object.keys(object.subCollection).forEach(function (key) {
                var subobject = (key, object.subCollection[key]);
                datos.push(subobject.datox);
                label.push(subobject.fecha);
            });
            var ctx = document.getElementById("arearChart_pro");
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: label,
                    datasets: [{
                        label: "Movimiento",
                        lineTension: 0.3,
                        backgroundColor: "rgba(78, 115, 223, 0.05)",
                        borderColor: "rgba(78, 115, 223, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointBorderColor: "rgba(78, 115, 223, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: datos,
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 5,
                                padding: 10,
                                // Agrega el simbolo de grados
                                callback: function (value, index, values) {
                                    return number_format(value) + '°';
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        callbacks: {
                            label: function (tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + '°';
                            }
                        }
                    }
                }
            });
        }
    });
});
*/