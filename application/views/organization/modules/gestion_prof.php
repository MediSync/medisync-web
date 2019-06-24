<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="card shadow mb-4">

		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Gestión Profesionales</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
					<div class="row">
						<div class="col-sm-12 col-md-6">
							<a href="#" data-toggle="modal" data-target="#new_prof_modal" class="btn btn-primary">
								<i class="fas fa-plus"></i> Nuevo profesional
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
											aria-sort="ascending" aria-label="" style="width: 5%;">Correo</th>
										<th class="" tabindex="2" aria-controls="dataTable" rowspan="1" colspan="1"
											aria-sort="ascending" aria-label="" style="width: 5%;">Telefono</th>
										<th class="" style="width: 1%;"></th>
										<th class="" style="width: 1%;"></th>
									</tr>
								</thead>
								<tbody id="table_body2">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal View Profesional -->
	<div class="modal fade bd-example-modal-lg" id="view_prof_modal" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Datos del Profesional</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row m-2">
						<div class="col-12">
							<table class="responsive-table" style="width: 100%">
								<tbody id=datos_view_prof>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal New Porfesional -->
	<div class="modal fade bd-example-modal-lg" id="new_prof_modal" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Nuevo Profesional</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row m-2">
						<div class="col-12">
							<table class="responsive-table" style="width: 100%">
								<tbody id=datos_prof>
									<form id="form_new_prof">

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Rut</strong>
											</div>
											<div class="col-3">
												<input type="text" class="form-control form-control-user" id="rut_prof"
													name="rut_prof" placeholder="12345678-9">
											</div>
											<div class="form-group">
												<div class="custom-control custom-switch" style="margin-left: 10px">
													<input type="checkbox" class="custom-control-input" id="admin">
													<label class="custom-control-label"
														for="admin">Administrador</label>
												</div>
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Nombre</strong>
											</div>
											<div class="col-6">
												<input type="text" class="form-control form-control-user"
													id="names_prof" name="names_prof" placeholder="">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Apellido Paterno</strong>
											</div>
											<div class="col-6">
												<input type="text" class="form-control form-control-user"
													id="last_name1_prof" name="last_name1_prof" placeholder="">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Apellido Materno</strong>
											</div>
											<div class="col-6">
												<input type="text" class="form-control form-control-user"
													id="last_name2_prof" name="last_name2_prof" placeholder="">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Fecha nacimiento</strong>
											</div>
											<div class="col-3">
												<input type="text" class="form-control selectpicker"
													id="birth_date_prof" name="birth_date_prof" placeholder="">
											</div>
											<div class="col-1 text-right">
												<strong>Sexo</strong>
											</div>
											<div class="col-3">
												<select id="sexo_prof" name="sexo_prof" class="form-control">
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
													id="email_prof" name="email_prof" placeholder="">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Telefono</strong>
											</div>
											<div class="col-4">
												<input type="text" class="form-control form-control-user"
													id="phone_prof" name="phone_prof" placeholder="">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Direccion</strong>
											</div>
											<div class="col-8">
												<input type="text" class="form-control form-control-user"
													id="address_prof" name="address_prof" placeholder="">
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
												<button href="#" id="btn_add_prof" class="btn btn-primary btn">
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

	<!-- Modal Edit Porfesional -->
	<div class="modal fade bd-example-modal-lg" id="edit_prof_modal" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Editar Datos del Profesional</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row m-2">
						<div class="col-12">
							<table class="responsive-table" style="width: 100%">
								<tbody id=datos_prof>
									<form id="form_edit_prof">
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Rut</strong>
											</div>
											<div class="col-3">
												<input readonly type="text" class="form-control form-control-user"
													id="rut_prof_edit" name="rut_prof_edit" placeholder="12345678-9">
											</div>
											<div class="form-group">
												<div class="custom-control custom-switch" style="margin-left: 10px">
													<input type="checkbox" class="custom-control-input" id="admin_edit">
													<label class="custom-control-label"
														for="admin_edit">Administrador</label>
												</div>
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Nombre</strong>
											</div>
											<div class="col-6">
												<input type="text" class="form-control form-control-user"
													id="names_prof_edit" name="names_prof_edit" placeholder="">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Apellido Paterno</strong>
											</div>
											<div class="col-6">
												<input type="text" class="form-control form-control-user"
													id="last_name1_prof_edit" name="last_name1_prof_edit"
													placeholder="">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Apellido Materno</strong>
											</div>
											<div class="col-6">
												<input type="text" class="form-control form-control-user"
													id="last_name2_prof_edit" name="last_name2_prof_edit"
													placeholder="">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Fecha nacimiento</strong>
											</div>
											<div class="col-3">
												<input type="text" class="form-control selectpicker"
													id="birth_date_prof_edit" name="birth_date_prof_edit"
													placeholder="">
											</div>
											<div class="col-1 text-right">
												<strong>Sexo</strong>
											</div>
											<div class="col-3">
												<select id="sexo_prof_edit" name="sexo_prof_edit" class="form-control">
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
													id="email_prof_edit" name="email_prof_edit" placeholder="">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Telefono</strong>
											</div>
											<div class="col-4">
												<input type="text" class="form-control form-control-user"
													id="phone_prof_edit" name="phone_prof_edit" placeholder="">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Direccion</strong>
											</div>
											<div class="col-8">
												<input type="text" class="form-control form-control-user"
													id="address_prof_edit" name="address_prof_edit" placeholder="">
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
												<button href="#" id="btn_edit_prof" class="btn btn-primary">
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