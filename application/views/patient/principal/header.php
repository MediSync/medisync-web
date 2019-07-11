<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="assets/img/icono.ico">

    <title>MediSync Web</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    <!-- Custom fonts for this template-->
    <link href="assets/lib/admin-2/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/lib/admin-2/css/sb-admin-2.css" rel="stylesheet">
    <link href="assets/lib/admin-2/css/fontawesome.css" rel="stylesheet">
    <link href="assets/lib/admin-2/css/custom.css" rel="stylesheet">
    <link href="assets/lib/admin-2/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/lib/toastr-2.1.4-7/toastr.css">
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-select-1.13.9/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css"
        href="assets/lib/bootstrap-datepicker-1.6.4/css/bootstrap-datepicker3.min.css">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="principal">
                <div class="sidebar-brand-icon">
                    <img src="assets/lib/Bell/img/logo.png" style="width: 150px">
                </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Heading -->
            <div class="sidebar-heading">
            Portal Paciente
            </div>
        </ul>
        <!-- End of Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="mx-3"><label id="lbl_nav"></label></div>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <a id="boton" href="logout" class="btn btn-light btn-icon-split border-left-danger">
                            <span class="text">Cerrar Sesión</span>
                        </a>

                    </ul>
                </nav>
                <!-- End of Topbar -->