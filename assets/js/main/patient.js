$(document).ready(function () {
    toastr.options = {
        "closeButton": true,
        "positionClass": "toast-top-right"
    }
    var user = localStorage.getItem("patient");
    console.log(user);
    jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/patient/' + user, function (result) {
        $("#lbl_nav").text("BIEVENIDO " + result.names.toUpperCase() + " " + result.last_name1.toUpperCase() + " " + result.last_name2.toUpperCase());

        $("#rut_hist").text(result.rut.toUpperCase());
        $("#age_hist").text(calculateAge(result.birth_date));
        $("#name_hist").text(result.names.toUpperCase() + " " + result.last_name1.toUpperCase() + " " + result.last_name2.toUpperCase());
        $("#sexo_hist").text(((result.sexo.toUpperCase() === "M") ? "MASCULINO" : "FEMENINO"));
        $("#birth_hist").text(result.birth_date.toUpperCase());
        $("#email_hist").text(result.email.toUpperCase());
        $("#phone_hist").text(result.phone.toUpperCase());
        $("#address_hist").text(result.address.toUpperCase());
    });

    table_body_evaluacion(user);
    console.log();
});

function calculateAge(birthday) {
    var birthday_arr = birthday.split("/");
    var birthday_date = new Date(birthday_arr[2], birthday_arr[1] - 1, birthday_arr[0]);
    var ageDifMs = Date.now() - birthday_date.getTime();
    var ageDate = new Date(ageDifMs);
    return Math.abs(ageDate.getUTCFullYear() - 1970);
}



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
        if (object.rut == localStorage.getItem("patient")) {
            Object.keys(object.subCollection).forEach(function (key) {
                var subobject = (key, object.subCollection[key]);
                datos.push(subobject.datox);
                label.push(subobject.fecha);
            });
            var ctx = document.getElementById("myAreaChart");
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

