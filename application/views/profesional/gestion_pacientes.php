<!-- Begin Page Content -->
<br>
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header">
			<div class="row">
				<div class="col-md-9">
					<h4 style="margin-top: 4px">Gestión Pacientes
				</div>
				<div class="col-md-1">
					<a href="#" id="sync_table" class="btn btn-link" data-toggle="tooltip" data-placement="top"
						title="Actualizar tabla">
						<i class="fas fa-sync"></i>
					</a>
				</div>
				<div class="col-md-2">
					<a href="#" data-toggle="modal" data-target="#new_modal" class="btn btn-primary btn-block">
						<i class="fas fa-plus"></i> Nuevo paciente
					</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div>
				<div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
					<div class="row">
						<div class="col-sm-12">
							<table class="table table-sm table-bordered dataTable" id="dataTable" width="100%"
								cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
								<thead>
									<tr role="row">
										<th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
											aria-sort="ascending">Rut</th>
										<th class="" tabindex="1" aria-controls="dataTable" rowspan="1" colspan="1"
											aria-sort="ascending">Nombre
											Completo</th>
										<th class="" tabindex="2" aria-controls="dataTable" rowspan="1" colspan="1"
											aria-sort="ascending">Sexo</th>
										<th class="" tabindex="2" aria-controls="dataTable" rowspan="1" colspan="1"
											aria-sort="ascending">Edad</th>
										<th class="" tabindex="3" aria-controls="dataTable" rowspan="1" colspan="1"
											aria-sort="ascending">Fecha
											Nacimiento</th>
										<th class="" style="width: 1%;"></th>
										<th class="" style="width: 1%;"></th>
										<th class="" style="width: 1%;"></th>
									</tr>
								</thead>
								<tbody id="table_body">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- MODAL REGISTRAR -->
	<div class="modal fade" id="new_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" style="color:#666" id="exampleModalLabel">Registrar paciente</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="register_pac" style="margin: 8px">
						<div class="form-group row">
							<div class="col-md-6">
								<input type="text" class="form-control" id="rut_pac"
									placeholder="RUN (sin puntos ni guion)" maxlength="10">
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" id="names_pac" placeholder="Nombres"
									maxlength="20">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6 ">
								<input type="text" class="form-control" id="last_name1_pac"
									placeholder="Apellido Paterno" maxlength="20">
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" id="last_name2_pac"
									placeholder="Apellido Materno" maxlength="20">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6 ">
								<input type="text" class="form-control" id="birth_date_pac" name="birth_date"
									placeholder="Fecha Nacimiento">
							</div>
							<div class="col-md-6">
								<select id="sexo_pac" name="sexo" class="form-control">
									<option disabled selected>Seleccione Sexo</option>
									<option value="F">Femenino</option>
									<option value="M">Masculino</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-12 ">
								<input type="text" class="form-control" id="address_pac" placeholder="Dirección"
									maxlength="100">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6 ">
								<input type="email" class="form-control" id="email_pac" placeholder="Correo Electronico"
									maxlength="50">
							</div>
							<div class="col-md-6">
								<input type="number" class="form-control" id="phone_pac"
									placeholder="Telefono de Contacto" maxlength="2">
							</div>
						</div>
						<div class="form-group row">
							<div class="offset-md-9 col-md-3">
								<button type="button" id="btn_add_pac"
									class="btn btn-primary btn-block">Registrar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- FIN MODAL REGISTRAR -->

	<!-- MODAL EDITAR -->
	<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" style="color:#666" id="exampleModalLabel">Editar datos del paciente</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="edit_pac" style="margin: 8px">
						<div class="form-group row">
							<div class="col-md-6">
								<input type="text" class="form-control" id="rut_pac_edit"
									placeholder="RUN (sin puntos ni guion)" disabled maxlength="10">
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" id="names_pac_edit" placeholder="Nombres"
									maxlength="20">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6 ">
								<input type="text" class="form-control" id="last_name1_pac_edit"
									placeholder="Apellido Paterno" maxlength="20">
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" id="last_name2_pac_edit"
									placeholder="Apellido Materno" maxlength="20">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6 ">
								<input type="text" class="form-control" id="birth_date_pac_edit" name="birth_date"
									placeholder="Fecha Nacimiento">
							</div>
							<div class="col-md-6">
								<select id="sexo_pac_edit" name="sexo" class="form-control">
									<option disabled selected>Seleccione Sexo</option>
									<option value="F">Femenino</option>
									<option value="M">Masculino</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-12 ">
								<input type="text" class="form-control" id="address_pac_edit" placeholder="Dirección"
									maxlength="100">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6 ">
								<input type="email" class="form-control" id="email_pac_edit"
									placeholder="Correo Electronico" maxlength="50">
							</div>
							<div class="col-md-6">
								<input type="number" class="form-control" id="phone_pac_edit"
									placeholder="Telefono de Contacto" maxlength="2">
							</div>
						</div>
						<div class="form-group row">
							<div class="offset-md-9 col-md-3">
								<button type="button" id="btn_edit_pac"
									class="btn btn-primary btn-block">Actualizar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- FIN MODAL EDITAR -->

	<!-- Modal View Paciente -->
	<div class="modal fade bd-example-modal-lg" id="view_modal" tabindex="-1" role="dialog"
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
								<tbody id=datos_paciente>
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

<script>
	$.getScript("assets/js/main/profesional.js");
</script>
