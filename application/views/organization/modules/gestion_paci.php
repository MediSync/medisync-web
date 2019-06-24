<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="card shadow mb-4">

		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Gestión Pacientes</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
					<div class="row">
						<div class="col-sm-12 col-md-6">
							<a href="#" data-toggle="modal" data-target="#new_modal" class="btn btn-primary">
								<i class="fas fa-plus"></i> Nuevo paciente
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<table class="table table-bordered table-sm dataTable" id="dataTable" width="100%"
								cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
								<thead>
									<tr role="row">
										<th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
											aria-sort="ascending" aria-label="" style="width: 10%;">Rut</th>
										<th class="" tabindex="1" aria-controls="dataTable" rowspan="1" colspan="1"
											aria-sort="ascending" aria-label="" style="width: 30%;">Nombre
											Completo</th>
										<th class="" tabindex="2" aria-controls="dataTable" rowspan="1" colspan="1"
											aria-sort="ascending" aria-label="" style="width: 5%;">Sexo</th>
										<th class="" tabindex="2" aria-controls="dataTable" rowspan="1" colspan="1"
											aria-sort="ascending" aria-label="" style="width: 5%;">Edad</th>
										<th class="" tabindex="3" aria-controls="dataTable" rowspan="1" colspan="1"
											aria-sort="ascending" aria-label="" style="width: 15%;">Fecha
											Nacimiento</th>
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

	<!-- Modal New Paciente -->
	<div class="modal fade bd-example-modal-lg" id="new_modal" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Nuevo Paciente</h5>
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
												<strong>Rut</strong>
											</div>
											<div class="col-3">
												<input type="text" class="form-control form-control-user" id="rut_pac"
													name="rut_pac" placeholder="12345678-9">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Nombre</strong>
											</div>
											<div class="col-6">
												<input type="text" class="form-control form-control-user" id="names_pac"
													name="names_pac" placeholder="">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Apellido Paterno</strong>
											</div>
											<div class="col-6">
												<input type="text" class="form-control form-control-user"
													id="last_name1_pac" name="last_name1_pac" placeholder="">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Apellido Materno</strong>
											</div>
											<div class="col-6">
												<input type="text" class="form-control form-control-user"
													id="last_name2_pac" name="last_name2_pac" placeholder="">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Fecha nacimiento</strong>
											</div>
											<div class="col-3">
												<input type="text" class="form-control selectpicker" id="birth_date_pac"
													name="birth_date_pac" placeholder="">
											</div>
											<div class="col-1 text-right">
												<strong>Sexo</strong>
											</div>
											<div class="col-3">
												<select id="sexo_pac" name="sexo_pac" class="form-control">
													<option disabled selected>Seleccione...</option>
													<option value="M">Masculino</option>
													<option value="F">Femenino</option>
												</select>
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Correo electronico</strong>
											</div>
											<div class="col-5">
												<input type="email" class="form-control form-control-user"
													id="email_pac" name="email_pac" placeholder="">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Telefono</strong>
											</div>
											<div class="col-4">
												<input type="text" class="form-control form-control-user" id="phone_pac"
													name="phone_pac" placeholder="">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Direccion</strong>
											</div>
											<div class="col-8">
												<input type="text" class="form-control form-control-user"
													id="address_pac" name="address_pac" placeholder="">
											</div>
										</div>

										<input type="text" class="invisible" name="txtTipoUsuario" value="3">

										<div class="row">
											<div class="col-sm-6 text-left">
												<button href="#" class="btn btn-secondary btn" data-dismiss="modal"
													aria-label="Close">
													Cancelar
												</button>
											</div>

											<div class="col-sm-6 text-right">
												<button href="#" id="btn_add_patient" class="btn btn-primary btn">
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

	<!-- Modal Edit Paciente -->
	<div class="modal fade bd-example-modal-lg" id="edit_modal" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Editar Datos del Paciente</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row m-2">
						<div class="col-12">
							<table class="responsive-table" style="width: 100%">
								<tbody id=datos_paciente>
									<form id="form_edit_patient">
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Rut</strong>
											</div>
											<div class="col-3">
												<input readonly type="text" class="form-control form-control-user"
													id="rut_pac_edit" name="rut_pac_edit" placeholder="12345678-9">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Nombre</strong>
											</div>
											<div class="col-6">
												<input type="text" class="form-control form-control-user"
													id="names_pac_edit" name="names_pac_edit" placeholder="">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Apellido Paterno</strong>
											</div>
											<div class="col-6">
												<input type="text" class="form-control form-control-user"
													id="last_name1_pac_edit" name="last_name1_pac_edit" placeholder="">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Apellido Materno</strong>
											</div>
											<div class="col-6">
												<input type="text" class="form-control form-control-user"
													id="last_name2_pac_edit" name="last_name2_pac_edit" placeholder="">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Fecha nacimiento</strong>
											</div>
											<div class="col-3">
												<input type="text" class="form-control selectpicker"
													id="birth_date_pac_edit" name="birth_date_pac_edit" placeholder="">
											</div>
											<div class="col-1 text-right">
												<strong>Sexo</strong>
											</div>
											<div class="col-3">
												<select id="sexo_pac_edit" name="sexo_pac_edit" class="form-control">
													<option disabled selected>Seleccione...</option>
													<option value="M">Masculino</option>
													<option value="F">Femenino</option>
												</select>
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Correo electronico</strong>
											</div>
											<div class="col-5">
												<input type="email" class="form-control form-control-user"
													id="email_pac_edit" name="email_pac_edit" placeholder="">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Telefono</strong>
											</div>
											<div class="col-4">
												<input type="text" class="form-control form-control-user"
													id="phone_pac_edit" name="phone_pac_edit" placeholder="">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Direccion</strong>
											</div>
											<div class="col-8">
												<input type="text" class="form-control form-control-user"
													id="address_pac_edit" name="address_pac_edit" placeholder="">
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
												<button href="#" id="btn_edit_patient" class="btn btn-primary">
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