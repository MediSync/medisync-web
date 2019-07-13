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

    $('#run').rut({
        validateOn: 'change keyup',
        useThousandsSeparator: false
    });

    $('#rut_org').rut({
        validateOn: 'change keyup',
        useThousandsSeparator: false
    });

    $('#birth_date').datepicker({ language: "es", autoclose: true });

    $(document).on('click', function (e) {
        $('[data-toggle="popover"],[data-original-title]').each(function () {
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                (($(this).popover('hide').data('bs.popover') || {}).inState || {}).click = false  // fix for BS 3.3.6
            }
        });
    });

    $(function () {
        $('[data-toggle="popover"]').popover()
    });

    $("#myModal").on('hidden.bs.modal', function () {
        document.getElementById("register_profesional").reset();
        document.getElementById("register_org").reset();
    });

    $("#loader").removeClass("is-active");
});

$("#btn_login").on("click", function (e) {
    e.preventDefault();
    $("#loader").addClass("is-active");

    var db = firebase.firestore();

    var rut = $('#rut').val();
    var pass = $('#pass').val();

    if (rut == "" || pass == "") {
        toastr["info"]("Debe llenar todos los campos", "Atención");
        $("#loader").removeClass("is-active");
    } else {
        var db = firebase.firestore();

        var docOrg = db.collection("organization").doc(rut);
        var docPro = db.collection("profesional").doc(rut);

        if (!$.validateRut(rut)) {
            toastr["warning"]("El RUT es invalido", "Atención");
            $("#loader").removeClass("is-active");
        } else {
            docOrg.get().then(function (doc) {
                if (doc.exists) {
                    if (doc.data().password == CryptoJS.MD5(pass).toString()) {
                        localStorage.setItem("organization", doc.data().rut);
                        window.location.href = "set_organization";
                    } else {
                        toastr["warning"]("Datos Incorrectos", "Atención");
                        $("#loader").removeClass("is-active");
                    }
                } else {
                    docPro.get().then(function (doc2) {
                        if (doc2.exists) {
                            if (doc2.data().password == CryptoJS.MD5(pass).toString()) {
                                localStorage.setItem("profesional", doc2.data().rut);
                                window.location.href = "set_profesional";
                                $("#loader").removeClass("is-active");
                            } else {
                                toastr["warning"]("Datos Incorrectos", "Atención");
                                $("#loader").removeClass("is-active");
                            }
                        } else {
                            // doc.data() will be undefined in this case
                            console.log("No such document!");
                        }
                    }).catch(function (error) {
                        console.log("Error getting document:", error);
                    });
                }
            }).catch(function (error) {
                console.log("Error getting document:", error);
            });
        }
    }
});

$("#btn_registrer").on("click", function (e) {
    $("#loader").addClass("is-active");
    e.preventDefault();
    var db = firebase.firestore();

    var run = $('#run').val();
    var names = $('#names').val();
    var last_name1 = $('#last_name1').val();
    var last_name2 = $('#last_name2').val();
    var birth_date = $('#birth_date').val();
    var sexo = $('#sexo').val();
    var address = $('#address').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var password1 = $('#password1').val();
    var password2 = $('#password2').val();

    if (run == "" || names == "" || last_name1 == "" || last_name2 == "" || birth_date == "" || sexo == "" || address == "" || email == "" || phone == "" || password1 == "" || password2 == "") {
        toastr["warning"]("Debe completar todos los campos", "Atención");
    } else if (password1 != password2) {
        toastr["warning"]("Contraseñas no coinciden", "Atención");
    } else if (!$.validateRut(run)) {
        toastr["warning"]("El RUN es invalido", "Atención");
    } else if (!CheckPassword(password1)) {
        toastr["warning"]("Contraseña no cumple con los requisitos", "Atención");
    } else if (!ValidateEmail(email)) {
        toastr["warning"]("El correo no es valido", "Atención");
    } else if (!phonenumber(phone)) {
        toastr["warning"]("El teléfono no es valido", "Atención");
    } else if (!dateValidate(birth_date)) {
        toastr["warning"]("Debe ser mayor de edad", "Atención");
    } else if (sexo == null) {
        toastr["warning"]("Debe seleccionar un sexo", "Atención");
    } else {
        var docPro = db.collection("profesional").doc(run);

        docPro.get().then(function (doc2) {
            if (doc2.exists) {
                toastr["warning"]("El profesional ya está registrado", "Atención");
            } else {
                var docOrg = db.collection("organization").doc(run);

                docOrg.get().then(function (doc) {
                    if (doc.exists) {
                        toastr["warning"]("El RUT se encuentra asociado a una organización registrada", "Atención");
                    } else {
                        password = CryptoJS.MD5(password1).toString()
                        db.collection("profesional").doc(run).set({
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
                            toastr["success"]("Profesional registrado", "Operación Exitosa");
                            document.getElementById("register_profesional").reset();
                            $('#myModal').modal('hide');
                            $("#loader").removeClass("is-active");
                        }).catch(function () {
                            toastr["warning"]("Contáctese con soporte", "No se ha podido registrar");
                        });
                    }
                }).catch(function (error) {
                    console.log("Error getting document:", error);
                });

            }
        }).catch(function (error) {
            console.log("Error getting document:", error);
        });
    }
    $("#loader").removeClass("is-active");
});

$("#btn_org").on("click", function (e) {
    $("#loader").addClass("is-active");
    e.preventDefault();
    var db = firebase.firestore();

    var rut = $('#rut_org').val();
    var name = $('#name_org').val();
    var address = $('#address_org').val();
    var email = $('#email_org').val();
    var phone = $('#phone_org').val();
    var password1 = $('#password1_org').val();
    var password2 = $('#password2_org').val();

    if (rut == "" || name == "" || last_name1 == "" || last_name2 == "" || birth_date == "" || sexo == "" || address == "" || email == "" || phone == "" || password1 == "" || password2 == "") {
        toastr["warning"]("Debe completar todos los campos", "Atención");
        $("#loader").removeClass("is-active");
    } else if (password1 != password2) {
        toastr["warning"]("Contraseñas no coinciden", "Atención");
        $("#loader").removeClass("is-active");
    } else if (!$.validateRut(rut)) {
        toastr["warning"]("El RUT es invalido", "Atención");
        $("#loader").removeClass("is-active");
    } else if (!CheckPassword(password1)) {
        toastr["warning"]("Contraseña no cumple con los requisitos", "Atención");
        $("#loader").removeClass("is-active");
    } else if (!ValidateEmail(email)) {
        toastr["warning"]("El correo no es valido", "Atención");
        $("#loader").removeClass("is-active");
    } else if (!phonenumber(phone)) {
        toastr["warning"]("El teléfono no es valido", "Atención");
        $("#loader").removeClass("is-active");
    } else {
        var docOrg = db.collection("organization").doc(rut);

        docOrg.get().then(function (doc) {
            if (doc.exists) {
                toastr["warning"]("La organización ya está registrada", "Atención");
                $("#loader").removeClass("is-active");
            } else {
                var docPro = db.collection("profesional").doc(rut);

                docPro.get().then(function (doc2) {
                    if (doc2.exists) {
                        toastr["warning"]("El RUT se encuentra asociado a un profesional registrado", "Atención");
                        $("#loader").removeClass("is-active");
                    } else {
                        password = CryptoJS.MD5(password1).toString()
                        db.collection("organization").doc(rut).set({
                            rut: rut,
                            names: name,
                            address: address,
                            email: email,
                            phone: phone,
                            password: password
                        }).then(function () {
                            toastr["success"]("Organización registrada", "Operación Exitosa");
                            document.getElementById("register_org").reset();
                            $('#myModal').modal('hide');
                            $("#loader").removeClass("is-active");
                        }).catch(function () {
                            toastr["warning"]("Contáctese con soporte", "No se ha podido registrar");
                            $("#loader").removeClass("is-active");

                        });
                    }
                }).catch(function (error) {
                    $("#loader").removeClass("is-active");

                    console.log("Error getting document:", error);
                });
            }
        }).catch(function (error) {
            $("#loader").removeClass("is-active");
            console.log("Error getting document:", error);
        });
    }
});

function CheckPassword(inputtxt) {
    var decimal = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
    if (inputtxt.match(decimal)) {
        console.log("pass valida");
        return true;
    }
    else {
        console.log("pass invalida");
        return false;
    }
}

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

function dateValidate(inputDate) {
    var from = inputDate.split("/"); // DD/MM/YYYY 

    var day = from[0] - 1;
    var month = from[1];
    var year = from[2];
    var age = 18;

    var mydate = new Date();
    mydate.setFullYear(year, month - 1, day);

    var currdate = new Date();
    var setDate = new Date();

    setDate.setFullYear(mydate.getFullYear() + age, month - 1, day);

    if ((currdate - setDate) > 0) {
        console.log("mayor");
        return true;
    } else {
        console.log("menor");
        return false;
    }
}