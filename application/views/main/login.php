<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/img/icono.ico">
    <title>MediSync</title>

    <!-- DEPENDENCIAS CSS-->
    <link rel="stylesheet" type="text/css" href="assets/lib/font/valera-round.css">
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/lib/fontawesome-5.8.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="assets/lib/toastr-2.1.4-7/toastr.css">
    <link rel="stylesheet" type="text/css" href="assets/lib/css-loader-3.3.2/loader-bouncing.css">
    <link rel="stylesheet" type="text/css"
        href="assets/lib/bootstrap-datepicker-1.6.4/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">

</head>

<body>
    <div class="page">
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="content">
                    <div class="rtl-form">
                        <img src="assets/img/logo.png">
                        <h1>Bienvenido al Portal para Empresas de MediSync</h1>
                        <form id="login_form" autocomplete="off">
                            <input type="text" name="rut" id="rut" class="form-control"
                                placeholder="Ingrese RUT sin puntos ni guion">
                            <input type="password" name="pass" id="pass" class="form-control" placeholder="Contraseña">
                            <div style="text-align: left; margin: 10px" class="checkbox">
                                <label style="color: #666;">
                                    <input type="checkbox"> Recordodar Credenciales
                                </label>
                            </div>
                            <button class="btn btn-block btn-primary btn-lg mt-5 mb-5" id="btn_login">Ingresar</button>
                            <br>
                            <p>
                                <a class="small" href="#" data-toggle="modal" data-target="#myModal">¿No
                                    tienes una cuenta? ¡Registrate!</a>
                            </p>
                            <div id="snackbar"></div>
                        </form>
                        <div class="footer-login">
                            <hr>
                            <h6>MediSync-Web v.1.3.0</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL REGISTRAR -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="color:#666" class="modal-title">Registro</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a href="#tab1" role="tab"
                                data-toggle="tab">Profesional</a></li>
                        <li role="presentation"><a href="#tab2" role="tab" data-toggle="tab">Organización</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <br>
                            <form class="form-horizontal" id="register_profesional">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="run"
                                            placeholder="RUN (sin puntos ni guion)" maxlength="10">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="names" placeholder="Nombres"
                                            maxlength="20">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 ">
                                        <input type="text" class="form-control" id="last_name1"
                                            placeholder="Apellido Paterno" maxlength="20">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="last_name2"
                                            placeholder="Apellido Materno" maxlength="20">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 ">
                                        <input type="text" class="form-control" id="birth_date" name="birth_date"
                                            placeholder="Fecha Nacimiento">
                                    </div>
                                    <div class="col-md-6">
                                        <select id="sexo" name="sexo" class="form-control">
                                            <option disabled selected>Seleccione Sexo</option>
                                            <option value="F">Femenino</option>
                                            <option value="M">Masculino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 ">
                                        <input type="text" class="form-control" id="address" placeholder="Dirección"
                                            maxlength="100">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 ">
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Correo Electronico" maxlength="50">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" id="phone"
                                            placeholder="Telefono de Contacto" maxlength="2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 ">
                                        <div class="input-group">
                                            <input style="margin: 0px 0px 0px" type="password" class="form-control"
                                                id="password1" placeholder="Contraseña" maxlength="15">
                                            <span class="input-group-btn">
                                                <button class="btn" type="button" data-toggle="popover"
                                                    title="Requisitos"
                                                    data-content="La contraseña debe tener de 8 a 15 caracteres con una letra mayuscula, una letra minuscula, un numero y un caracter especial."><span
                                                        class="far fa-question-circle" aria-hidden="true">
                                                    </span></button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <input style="margin: 0px 0px 0px" type="password" class="form-control"
                                            id="password2" placeholder="Repetir Contraseña" maxlength="15">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-9 col-md-3">
                                        <button type="button" id="btn_registrer"
                                            class="btn btn-primary btn-block">Registrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="tab2">
                            <br>
                            <form class="form-horizontal" id="register_org">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="rut_org"
                                            placeholder="RUT (sin puntos ni guion)" maxlength="10">
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 ">
                                        <input type="text" class="form-control" id="name_org" placeholder="Razón Social"
                                            maxlength="50">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 ">
                                        <input type="text" class="form-control" id="address_org" placeholder="Dirección"
                                            maxlength="100">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 ">
                                        <input type="email" class="form-control" id="email_org"
                                            placeholder="Correo Electronico" maxlength="50">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" id="phone_org"
                                            placeholder="Telefono de Contacto" maxlength="2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 ">
                                        <div class="input-group">
                                            <input style="margin: 0px 0px 0px" type="password" class="form-control"
                                                id="password1_org" placeholder="Contraseña" maxlength="15">
                                            <span class="input-group-btn">
                                                <button class="btn" type="button" data-toggle="popover"
                                                    title="Requisitos"
                                                    data-content="La contraseña debe tener de 8 a 15 caracteres con una letra mayuscula, una letra minuscula, un numero y un caracter especial."><span
                                                        class="far fa-question-circle" aria-hidden="true">
                                                    </span></button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <input style="margin: 0px 0px 0px" type="password" class="form-control"
                                            id="password2_org" placeholder="Repetir Contraseña" maxlength="15">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-9 col-md-3">
                                        <button type="button" id="btn_org"
                                            class="btn btn-primary btn-block">Registrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN MODAL REGISTRAR -->

    <div id="loader" class="loader loader-bouncing is-active"></div>
    <!-- is-active -->
    <script type="text/javascript" src="assets/lib/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="assets/lib/bootstrap-3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/lib/toastr-2.1.4-7/toastr.min.js"></script>
    <script type="text/javascript" src="assets/lib/jquery.rut/jquery.rut.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"></script>
    <script type="text/javascript" src="assets/lib/bootstrap-datepicker-1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript"
        src="assets/lib/bootstrap-datepicker-1.6.4/locales/bootstrap-datepicker.es.min.js"></script>

    <script src="https://www.gstatic.com/firebasejs/4.12.1/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.12.1/firebase-firestore.js"></script>
    <script type="text/javascript" src="assets/lib/firestore/firestoreConfig.js"></script>
    <script type="text/javascript" src="assets/js/main/login.js"></script>
</body>

</html>