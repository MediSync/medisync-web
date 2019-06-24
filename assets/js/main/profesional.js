$(document).ready(function () {
    toastr.options = {
        "closeButton": true,
        "positionClass": "toast-top-right"
    }
    var user = localStorage.getItem("profesional");

    jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/profesional/' + user, function (result) {
        $("#lbl_nav").text("BIEVENIDO " + result.names.toUpperCase() + " " + result.last_name1.toUpperCase() + " " + result.last_name2.toUpperCase());
        table_body(result.admin);
    });

    $('#birth_date_pac').datepicker({ language: "es", autoclose: true });
    $('#birth_date_pac_edit').datepicker({ language: "es", autoclose: true });

    
});

function table_body(admin) {
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
            fil += "<td ><a href='#' id='load_history_paciente' class='btn btn-sm btn-success float-right'><i class='fas fa-file'></i></a></td>";
            fil += "<td ><a href='#' id='load_view_paciente' class='btn btn-sm btn-info float-right' data-toggle='modal' data-target='#view_modal'><i class='fas fa-eye'></i></a></td>";
            if (admin === "si") {
                fil += "<td ><a href='#' id='load_edit_paciente' class='btn btn-sm btn-warning float-right' data-toggle='modal' data-target='#edit_modal'><i class='fas fa-edit'></i></a></td>";                
            } else {
                fil += "<td ><a disabled href='#' class='btn btn-sm btn-warning float-right disabled'><i class='fas fa-edit'></i></a></td>";                
            }
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


/////////////////////////////// GRAFICO ////////////////////////////////////////////////////


// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

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
console.log(datos);

