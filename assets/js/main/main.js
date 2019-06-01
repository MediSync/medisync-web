// ON DOCUMENT READY FUNCTIONS
$(document).ready(function () {
    toastr.options = {
        "closeButton": true,
        "positionClass": "toast-top-left-main"
    }

    if (localStorage.getItem("enviroment") == "login") {
        toastr["success"]($('#name_user').val(), 'Te damos la bienvenida');
    } else if (localStorage.getItem("enviroment") == "changed") {
        toastr["success"]($('#name_institution').val() + " - "
            + $('#name_month').val() + " " + $('#name_period').val(), 'Aréa de trabajo cambiada a');
    }

    localStorage.setItem("enviroment", "main");

    select_establecimiento($('#id_institution').val());
    select_mes($('#id_month').val());
    select_periodo($('#id_period').val());

    console.log("▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒");
    console.log("░█▀▀█ ▒█░░░ ▒█░░░ ▒█▀▀▀█ ▒█▄░▒█ ▒█▀▀▀█ ░░ ▒█░░▒█");
    console.log("▒█▄▄█ ▒█░░░ ▒█░░░ ▒█░░▒█ ▒█▒█▒█ ░▀▀▀▄▄ ▀▀ ▒█▄▄▄█");
    console.log("▒█░▒█ ▒█▄▄█ ▒█▄▄█ ▒█▄▄▄█ ▒█░░▀█ ▒█▄▄▄█ ░░ ░░▒█░░");
    console.log("▒▒▒▒▒▒▒▒▒▒▒ DESARROLLADO POR LNMENDEZ ▒▒▒▒▒▒▒▒▒▒");
});

// NAVBAR FUNCTIONS

// stop default function dropdown menu
$(document).on("click", ".navbar-right .dropdown-menu", function (e) {
    e.stopPropagation();
});

// load module home
$("#main").on("click", function (e) {
    e.preventDefault();
    $("main").load("main");
});

// change environment function
$("#change").on("click", function (e) {
    e.preventDefault();
    var sb = document.getElementById("snackbar");
    var institution = $("#select_establecimiento").val();
    var month = $("#select_mes").val();
    var period = $("#select_periodo").val();

    if ($("#select_establecimiento").val() == $('#id_institution').val() && $("#select_mes").val() == $('#id_month').val() && $("#select_periodo").val() == $('#id_period').val()) {
        toastr["warning"]('Debe seleccionar un entorno diferente al actual', 'Atención');
    } else {
        $.ajax({
            url: 'change_environment',
            type: 'post',
            dataType: 'json',
            data: { institution: institution, month: month, period: period },
            success: function (o) {
                localStorage.setItem("enviroment", "changed");
                window.location.href = "";
            },
            error: function () {
                sb.innerHTML = "Error de Conexión";
                sb.className = "show";
                setTimeout(function () { sb.className = sb.className.replace("show", ""); }, 3000);
            }
        });
    }
});

// logout function
$("#logout").on("click", function (e) {
    e.preventDefault();
    window.location.href = "logout";
});

// select institution
function select_establecimiento(institution) {
    $.getJSON('get_establecimiento', function (result) {
        var mySelect = $('#select_establecimiento').empty();
        $.each(result.data, function (index, value) {
            if (value.id_establecimiento == institution) {
                mySelect.append('<option selected value="' + value.id_establecimiento + '">' + value.nombre_fantasia_establecimiento + '</option>');
            } else {
                mySelect.append(new Option(value.nombre_fantasia_establecimiento, value.id_establecimiento));
            }
        });
        mySelect.selectpicker();
    });
}

// select month
function select_mes(month) {
    $.getJSON('get_mes', function (result) {
        var mySelect = $('#select_mes').empty();
        $.each(result.data, function (index, value) {
            if (value.id_mes != 13) {
                if (value.id_mes == month) {
                    mySelect.append('<option selected value="' + value.id_mes + '">' + value.glosa_mes + '</option>');
                } else {
                    mySelect.append(new Option(value.glosa_mes, value.id_mes));
                }
            }
        })
    })
}

// select period
function select_periodo(period) {
    $.getJSON('get_periodo', function (result) {
        var mySelect = $('#select_periodo').empty();
        $.each(result.data, function (index, value) {
            if (value.glosa_periodo == period) {
                mySelect.append('<option selected value="' + value.id_periodo + '">' + value.glosa_periodo + '</option>');
            } else {
                mySelect.append(new Option(value.glosa_periodo, value.id_periodo));
            }
        })
    })
}

// LOAD MODULES FUNCTIONS

// maintainers functions
$("#module_parametros").on("click", function (e) {
    e.preventDefault();
    $("main").load("module_parametros");
});

$("#module_establecimientos").on("click", function (e) {
    e.preventDefault();
    $("main").load("module_establecimientos");
});

$("#module_funcionarios").on("click", function (e) {
    e.preventDefault();
    $("main").load("module_funcionarios");
});

// actions functions
$("#module_reajuste").on("click", function (e) {
    e.preventDefault();
    $("main").load("module_reajuste");
});

// reports functions
$("#module_liquidacion").on("click", function (e) {
    e.preventDefault();
    $("main").load("module_liquidacion");
});

$("#module_remuneracion").on("click", function (e) {
    e.preventDefault();
    $("main").load("module_remuneracion");
});

$("#module_previred").on("click", function (e) {
    e.preventDefault();
    $("main").load("module_previred");
});