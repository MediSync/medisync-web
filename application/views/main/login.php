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
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-select-1.13.9/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
</head>

<body>
    <div class="page">
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="content">
                    <div class="rtl-form">
                        <img src="assets/img/logo.png">
                        <h1>Bienvenido al Proyecto MediSync</h1>
                        <form id="login_form">
                            <select id="sexo_funcio" name="sexo_funcio" class="selectpicker form-control"
                                title="Seleccione un perfil...">
                                <option>Paciente</option>
                                <option>Profesional</option>
                                <option>Organización</option>
                            </select>
                            <input type="email" name="rut" id="rut" class="form-control" placeholder="Rut">
                            <input type="password" name="pass" id="pass" class="form-control" placeholder="Contraseña">
                            <br>
                            <button class="btn btn-block btn-primary btn-lg mt-5 mb-5" id="btn_login">Ingresar</button>
                            <div id="snackbar"></div>
                        </form>
                        <div class="footer-login">
                            <hr>
                            <h6>MediSync-Web v.2.1.190601</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="assets/lib/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="assets/lib/bootstrap-3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/lib/toastr-2.1.4-7/toastr.min.js"></script>
    <script type="text/javascript" src="assets/lib/bootstrap-select-1.13.9/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="assets/js/main/login.js"></script>
</body>

</html>