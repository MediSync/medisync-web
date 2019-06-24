<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Datos Paciente</h6>
        </a>
        <!-- Card Content - Collapse -->

        <div class="row m-4">
            <div class="col-12">
                <table class="responsive-table" style="width: 80%">
                    <tbody>
                        <tr>
                            <td style="width: 10%;"><strong>Rut</strong></td>
                            <td id="rut_hist" style="width: 50%;"></td>
                            <td style="width: 7%;"><strong>Edad</strong></td>
                            <td id="age_hist" style="width: 30%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 10%;"><strong>Nombre</strong></td>
                            <td id="name_hist" style="width: 50%;"></td>
                            <td style="width: 7%;"><strong>Genero</strong></td>
                            <td id="sexo_hist" style="width: 30%;"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="collapse" id="collapseCardExample" style="">
            <div class="card-body">
                <div class="col-12">
                    <table class="responsive-table" style="width: 100%">
                        <tbody>
                            <tr>
                                <td style="width: 10%;"><strong>Fecha Nacimiento</strong></td>
                                <td id="birth_hist" style="width: 50%;"></td>
                                <td style="width: 10%;"><strong></strong></td>
                                <td style="width: 40%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 10%;"><strong>Correo</strong></td>
                                <td id="email_hist" style="width: 50%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 10%;"><strong>Telefono</strong></td>
                                <td id="phone_hist" style="width: 50%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 20%;"><strong>Direccion</strong></td>
                                <td id="address_hist" style="width: 50%;"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Evolucion</h6>
        </div>
        <div class="card-body">
            <div class="chart-area">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="myAreaChart" style="display: block; width: 459px; height: 320px;" width="459" height="320"
                    class="chartjs-render-monitor"></canvas>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <div class="row">
                <div class="col-8">
                    <h6 class="m-0 font-weight-bold text-primary">Evaluaciones</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-sm dataTable" id="dataTable" width="100%" cellspacing="0"
                        role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                    style="display: none;"></th>
                                <th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">Fecha</th>
                                <th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">Hora</th>
                                <th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">Dato X</th>
                                <th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">DATO Y</th>
                            </tr>
                        </thead>
                        <tbody id="table_evaluacion">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->