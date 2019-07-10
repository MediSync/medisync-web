<!-- Begin Page Content -->
<div class="container-fluid">

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
				<canvas id="arearChart_pro" style="display: block; width: 459px; height: 320px;" width="459" height="320"
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
								<th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
									>Fecha</th>
								<th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
									>Hora</th>
								<th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
									>Dato X</th>
								<th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
									>DATO Y</th>
							</tr>
						</thead>
						<tbody id="table_evaluacion">
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="card shadow mb-4">

		<div class="card-header py-3">
			<div class="row">
				<div class="col-8">
					<h6 class="m-0 font-weight-bold text-primary">Historial</h6>
				</div>
				<div class="col-4 text-right text-white">
					<!--<a data-toggle="modal" data-target="#new_history_modal" class="btn btn-primary btn-sm" href="#">
						Nuevo informe
					</a>-->
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
								<th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
									style="width: 10%;">Fecha</th>
								<th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
									style="width: 45%;">Titulo</th>
								<th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
									style="width: 45%;">Profesional</th>
								<th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
									style="width: 1%;"></th>
								<!--<th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
									style="width: 1%;"></th>-->
							</tr>
						</thead>
						<tbody id="table_history">
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal View Paciente -->
	<div class="modal fade bd-example-modal-lg" id="view_history_modal" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Datos del Paciente</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row m-2">
						<div class="col-12">
							<table class="responsive-table" style="width: 100%">
								<tbody id=datos_history>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal New Paciente -->
	<div class="modal fade bd-example-modal-lg" id="new_history_modal" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Nuevo Informe de Atención</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row m-2">
						<div class="col-12">
							<table class="responsive-table" style="width: 100%">
								<tbody id=datos_paciente>
									<form id="form_new_patient">

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Titulo</strong>
											</div>
											<div class="col-9">
												<input type="text" class="form-control form-control-user"
													id="title_hist" name="title_hist" placeholder="">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Fecha Atención</strong>
											</div>
											<div class="col-3">
												<input type="text" class="form-control selectpicker" id="date_pac"
													name="date_hist" placeholder="">
											</div>
											<div class="col-3 text-right">
												<strong>Hora</strong>
											</div>
											<div class="col-3">
												<input type="time" class="form-control form-control-user" id="time_hist"
													name="time_hist" placeholder="">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Responsable</strong>
											</div>
											<div class="col-9">
												<input type="text" class="form-control form-control-user" id="resp_hist"
													name="resp_hist" disabled placeholder="">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Evolución</strong>
											</div>
											<div class="col-9">
												<textarea class="form-control" id="evol_hist" name="evol_hist"
													rows="5"></textarea>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-6 text-left">
												<button href="#" class="btn btn-secondary btn" data-dismiss="modal"
													aria-label="Close">
													Cancelar
												</button>
											</div>

											<div class="col-sm-6 text-right">
												<button href="#" id="btn_add_history" class="btn btn-primary btn">
													Guardar
												</button>
											</div>
										</div>

									</form>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

<a class="scroll-to-top rounded" href="#page-top" style="display: none;">
	<i class="fas fa-angle-up"></i>
</a>