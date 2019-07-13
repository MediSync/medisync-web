<!-- Begin Page Content -->
<br>

<div class="container-fluid">
	<div class="card shadow mb-4">
		<!-- Card Header - Accordion -->
		<a href="#collapseCardExample" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button"
			aria-expanded="false" aria-controls="collapseCardExample">
			<h6 class="m-0 font-weight-bold text-primary">Datos Paciente&nbsp;&nbsp;
				<i class="fas fa-chevron-circle-down"></i>
			</h6>
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
		<div class="collapse" id="collapseCardExample">
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
								<td style="width: 10%;"><strong>Teléfono</strong></td>
								<td id="phone_hist" style="width: 50%;"></td>
							</tr>
							<tr>
								<td style="width: 20%;"><strong>Dirección</strong></td>
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
			<h6 class="m-0 font-weight-bold text-primary">Evolución</h6>
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
				<canvas id="myChart" style="display: block; width: 459px; height: 200px;" width="459" height="100"
					class="chartjs-render-monitor"></canvas>
			</div>
		</div>
	</div>
	<div class="card shadow mb-4">

		<div class="card-header py-3">
			<div class="row">
				<div class="col-8">
					<h6 class="m-0 font-weight-bold text-primary">Evaluación</h6>
				</div>
				<div class="col-4 text-right text-white">
					<a data-toggle="modal" data-target="#new_eval_modal" id="load_new_evol"
						class="btn btn-primary btn-sm" href="#">
						Nueva evaluación
					</a>
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
								<th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">Dato Y</th>
								<th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"></th>
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
					<a data-toggle="modal" data-target="#new_history_modal" id="load_new_hist"
						class="btn btn-primary btn-sm" href="#">
						Nuevo registro
					</a>
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
								<th class="" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
									style="width: 1%;"></th>
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
					<h5 class="modal-title" id="exampleModalLabel">Detalle del Historial</h5>
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
					<h5 class="modal-title" id="exampleModalLabel">Nuevo Registro de Atención</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row m-2">
						<div class="col-12">
							<table class="responsive-table" style="width: 100%">
								<tbody id=datos_paciente>
									<form id="form_new_history">

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
												<input type="text" class="form-control" id="date_hist" name="date_hist"
													placeholder="">
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
													rows="3"></textarea>
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Diagnostico</strong>
											</div>
											<div class="col-9">
												<textarea class="form-control" id="diag_hist" name="diag_hist"
													rows="3"></textarea>
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Tratamiento</strong>
											</div>
											<div class="col-9">
												<textarea class="form-control" id="trat_hist" name="trat_hist"
													rows="3"></textarea>
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

	<!-- Modal Edit Paciente -->
	<div class="modal fade bd-example-modal-lg" id="edit_history_modal" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar Registro de Atención</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row m-2">
						<div class="col-12">
							<table class="responsive-table" style="width: 100%">
								<tbody id=datos_paciente>
									<form id="form_edit_history">

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Titulo</strong>
											</div>
											<div class="col-9">
												<input type="text" class="form-control form-control-user"
													id="title_hist_edit" name="title_hist_edit" placeholder="">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Fecha Atención</strong>
											</div>
											<div class="col-3">
												<input type="text" class="form-control" id="date_hist_edit"
													name="date_hist_edit" placeholder="">
											</div>
											<div class="col-3 text-right">
												<strong>Hora</strong>
											</div>
											<div class="col-3">
												<input type="time" class="form-control form-control-user"
													id="time_hist_edit" name="time_hist_edit" placeholder="">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Responsable</strong>
											</div>
											<div class="col-9">
												<input type="text" class="form-control form-control-user"
													id="resp_hist_edit" name="resp_hist_edit" disabled placeholder="">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Evolución</strong>
											</div>
											<div class="col-9">
												<textarea class="form-control" id="evol_hist_edit" name="evol_hist_edit"
													rows="3"></textarea>
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Diagnostico</strong>
											</div>
											<div class="col-9">
												<textarea class="form-control" id="diag_hist_edit" name="diag_hist_edit"
													rows="3"></textarea>
											</div>
										</div>

										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Tratamiento</strong>
											</div>
											<div class="col-9">
												<textarea class="form-control" id="trat_hist_edit" name="trat_hist_edit"
													rows="3"></textarea>
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
												<button href="#" id="btn_edit_history" class="btn btn-primary btn">
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


	<!-- Modal New Evolucion -->
	<div class="modal fade bd-example-modal-lg" id="new_eval_modal" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Nuevo Evaluación</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row m-2">
						<div class="col-12">
							<table class="responsive-table" style="width: 100%">
								<tbody id=datos_paciente>
									<form id="form_new_eval">
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Fecha Atención</strong>
											</div>
											<div class="col-9">
												<input type="text" class="form-control" id="date_eval" name="date_eval"
													placeholder="">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Hora</strong>
											</div>
											<div class="col-9">
												<input type="time" class="form-control form-control-user" id="time_eval"
													name="time_eval" placeholder="">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Dato X</strong>
											</div>
											<div class="col-9">
												<input type="text" class="form-control form-control-user" id="dato_x"
													name="dato_x" placeholder="">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Dato Y</strong>
											</div>
											<div class="col-9">
												<input type="text" class="form-control form-control-user" id="dato_y"
													name="dato_y" placeholder="">
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
												<button href="#" id="btn_add_eval" class="btn btn-primary btn">
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

	<!-- Modal New Evolucion -->
	<div class="modal fade bd-example-modal-lg" id="edit_eval_modal" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar Evaluación</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row m-2">
						<div class="col-12">
							<table class="responsive-table" style="width: 100%">
								<tbody id=datos_paciente>
									<form id="form_edit_eval">
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Fecha Atención</strong>
											</div>
											<div class="col-9">
												<input type="text" class="form-control" id="date_eval_edit"
													name="date_eval_edit" placeholder="">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Hora</strong>
											</div>
											<div class="col-9">
												<input type="time" class="form-control form-control-user"
													id="time_eval_edit" name="time_eval_edit" placeholder="">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Dato X</strong>
											</div>
											<div class="col-9">
												<input type="text" class="form-control form-control-user"
													id="dato_x_edit" name="dato_x_edit" placeholder="">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-3 text-right">
												<strong>Dato Y</strong>
											</div>
											<div class="col-9">
												<input type="text" class="form-control form-control-user"
													id="dato_y_edit" name="dato_y_edit" placeholder="">
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
												<button href="#" id="btn_edit_eval" class="btn btn-primary btn">
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

<script>
	$(document).ready(function () {
		$('#date_hist').datepicker({ language: "es", autoclose: true });
		$('#date_eval').datepicker({ language: "es", autoclose: true });


		var db = firebase.firestore();
		var rut = localStorage.getItem("rut_pat");

		console.log(rut);
		db.collection("patient").doc(rut).collection("range_of_motion").get().then(function (querySnapshot) {
			var datos = [];
			var label = [];

			$("#table_evaluacion").empty();

			querySnapshot.forEach(function (doc) {
				datos.push(doc.data().datox);
				label.push(doc.data().fecha);

				var fil = "<tr>";
				fil += "<td style='display: none;'>" + doc.id + "</td>";
				fil += "<td >" + doc.data().fecha.toUpperCase() + "</td>";
				fil += "<td >" + doc.data().hora.toUpperCase() + "</td>";
				fil += "<td >" + doc.data().datox.toUpperCase() + "</td>";
				fil += "<td >" + doc.data().datoy.toUpperCase() + "</td>";
				fil += "<td ><a href='#' id='load_edit_eval' class='btn btn-sm btn-warning float-right' data-toggle='modal' data-target='#edit_eval_modal' data-toggle='tooltip' data-placement='top' title='Editar evaluación del paciente'><i class='fas fa-edit'></i></a></td>";
				fil += "</tr>";
				$("#table_evaluacion").append(fil);
			});

			var ctx = document.getElementById("myChart").getContext("2d");
			var myChart = new Chart(ctx, {
				type: "line",
				data: {
					labels: label,
					datasets: [{
						label: 'Rango',
						data: datos,
						backgroundColor: [
							'rgb(66, 134, 244,0.5)',
							'rgb(74, 135, 72,0.5)',
							'rgb(229, 89, 50,0.5)'
						]
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							}
						}]
					}
				}
			});
		});

		db.collection("patient").doc(rut).collection("historial").get().then(function (querySnapshot) {
			$("#table_history").empty();
			querySnapshot.forEach(function (doc2) {
				var fil2 = "<tr>";
				fil2 += "<td style='display: none;'>" + doc2.id + "</td>";
				fil2 += "<td >" + doc2.data().fecha.toUpperCase() + "</td>";
				fil2 += "<td >" + doc2.data().titulo.toUpperCase() + "</td>";
				fil2 += "<td >" + doc2.data().responsable.toUpperCase() + "</td>";
				fil2 += "<td ><a href='#' id='load_view_history' class='btn btn-sm btn-info float-right' data-toggle='modal' data-target='#view_history_modal' data-toggle='tooltip' data-placement='top' title='Ver más detalles'><i class='fas fa-eye'></i></a></td>";
				fil2 += "<td ><a href='#' id='load_edit_history' class='btn btn-sm btn-warning float-right' data-toggle='modal' data-target='#edit_history_modal' data-toggle='tooltip' data-placement='top' title='Actualice el registro'><i class='fas fa-edit'></i></a></td>";
				fil2 += "</tr>";
				$("#table_history").append(fil2);
			});
		});
	});

	$("#load_new_hist").on("click", function (e) {
		e.preventDefault();
		var db = firebase.firestore();

		var user = localStorage.getItem("profesional");

		var docPro = db.collection("profesional").doc(user);

		docPro.get().then(function (doc2) {
			if (doc2.exists) {
				console.log("here: " + doc2.data().names);

				$("#resp_hist").val(doc2.data().names + " " + doc2.data().last_name1 + " " + doc2.data().last_name2);
			} else {
				console.log("No such document!");
			}
		}).catch(function (error) {
			console.log("Error getting document:", error);
		});
	});

	$("#btn_add_history").on("click", function (e) {
		$("#loader").addClass("is-active");
		e.preventDefault();
		var rut = localStorage.getItem("rut_pat");

		var db = firebase.firestore();

		var title_hist = $('#title_hist').val();
		var date_hist = $('#date_hist').val();
		var time_hist = $('#time_hist').val();
		var resp_hist = $('#resp_hist').val();
		var evol_hist = $('#evol_hist').val();
		var diag_hist = $('#diag_hist').val();
		var trat_hist = $('#trat_hist').val();
		var id_hist = (date_hist + "," + time_hist).replace("/", "-").replace("/", "-");

		console.log(title_hist);
		console.log(date_hist);
		console.log(time_hist);
		console.log(resp_hist);
		console.log(evol_hist);
		console.log(diag_hist);
		console.log(trat_hist);
		console.log(id_hist);

		if (title_hist == "" || date_hist == "" || time_hist == "" || resp_hist == "" || evol_hist == "" || diag_hist == "" || trat_hist == "") {
			toastr["warning"]("Debe completar todos los campos", "Atención");
		} else {
			db.collection("patient").doc(rut).collection("historial").doc(id_hist).set({
				titulo: title_hist,
				fecha: date_hist,
				hora: time_hist,
				responsable: resp_hist,
				text_Evolucion: evol_hist,
				diagnostico: diag_hist,
				tratamiento: trat_hist,
			}).then(function () {
				db.collection("patient").doc(rut).collection("historial").get().then(function (querySnapshot) {
					$("#table_history").empty();
					querySnapshot.forEach(function (doc2) {
						var fil2 = "<tr>";
						fil2 += "<td style='display: none;'>" + doc2.id + "</td>";
						fil2 += "<td >" + doc2.data().fecha.toUpperCase() + "</td>";
						fil2 += "<td >" + doc2.data().titulo.toUpperCase() + "</td>";
						fil2 += "<td >" + doc2.data().responsable.toUpperCase() + "</td>";
						fil2 += "<td ><a href='#' id='load_view_history' class='btn btn-sm btn-info float-right' data-toggle='modal' data-target='#view_history_modal' data-toggle='tooltip' data-placement='top' title='Ver más detalles'><i class='fas fa-eye'></i></a></td>";
						fil2 += "<td ><a href='#' id='load_edit_history' class='btn btn-sm btn-warning float-right' data-toggle='modal' data-target='#edit_history_modal'  data-toggle='tooltip' data-placement='top' title='Actualice el registro'><i class='fas fa-edit'></i></a></td>";
						fil2 += "</tr>";
						$("#table_history").append(fil2);
					});
				});
				toastr["success"]("Registro agregado", "Operación Exitosa");
				$('#new_history_modal').modal('toggle');
				document.getElementById("form_new_history").reset();
				$("#loader").removeClass("is-active");
			}).catch(function () {
				toastr["warning"]("Contáctese con soporte", "No se ha podido registrar");
			});
		}
		$("#loader").removeClass("is-active");
	});

	$("#btn_edit_history").on("click", function (e) {
		$("#loader").addClass("is-active");
		e.preventDefault();
		var rut = localStorage.getItem("rut_pat");

		var db = firebase.firestore();

		var title_hist = $('#title_hist_edit').val();
		var date_hist = $('#date_hist_edit').val();
		var time_hist = $('#time_hist_edit').val();
		var resp_hist = $('#resp_hist_edit').val();
		var evol_hist = $('#evol_hist_edit').val();
		var diag_hist = $('#diag_hist_edit').val();
		var trat_hist = $('#trat_hist_edit').val();
		var id_hist = localStorage.getItem("id_hist");

		console.log(title_hist);
		console.log(date_hist);
		console.log(time_hist);
		console.log(resp_hist);
		console.log(evol_hist);
		console.log(diag_hist);
		console.log(trat_hist);
		console.log(id_hist);

		if (title_hist == "" || date_hist == "" || time_hist == "" || resp_hist == "" || evol_hist == "" || diag_hist == "" || trat_hist == "") {
			toastr["warning"]("Debe completar todos los campos", "Atención");
		} else {
			db.collection("patient").doc(rut).collection("historial").doc(id_hist).set({
				titulo: title_hist,
				fecha: date_hist,
				hora: time_hist,
				responsable: resp_hist,
				text_Evolucion: evol_hist,
				diagnostico: diag_hist,
				tratamiento: trat_hist,
			}).then(function () {
				db.collection("patient").doc(rut).collection("historial").get().then(function (querySnapshot) {
					$("#table_history").empty();
					querySnapshot.forEach(function (doc2) {
						var fil2 = "<tr>";
						fil2 += "<td style='display: none;'>" + doc2.id + "</td>";
						fil2 += "<td >" + doc2.data().fecha.toUpperCase() + "</td>";
						fil2 += "<td >" + doc2.data().titulo.toUpperCase() + "</td>";
						fil2 += "<td >" + doc2.data().responsable.toUpperCase() + "</td>";
						fil2 += "<td ><a href='#' id='load_view_history' class='btn btn-sm btn-info float-right' data-toggle='modal' data-target='#view_history_modal' data-toggle='tooltip' data-placement='top' title='Ver más detalles'><i class='fas fa-eye'></i></a></td>";
						fil2 += "<td ><a href='#' id='load_edit_history' class='btn btn-sm btn-warning float-right' data-toggle='modal' data-target='#edit_history_modal'  data-toggle='tooltip' data-placement='top' title='Actualice el registro'><i class='fas fa-edit'></i></a></td>";
						fil2 += "</tr>";
						$("#table_history").append(fil2);
					});
				});
				toastr["success"]("Registro actualizado", "Operación Exitosa");
				$('#edit_history_modal').modal('toggle');
				document.getElementById("form_edit_history").reset();
				$("#loader").removeClass("is-active");
			}).catch(function () {
				toastr["warning"]("Contáctese con soporte", "No se ha podido registrar");
			});
		}
		$("#loader").removeClass("is-active");
	});

	$("#btn_add_eval").on("click", function (e) {
		$("#loader").addClass("is-active");
		e.preventDefault();
		var rut = localStorage.getItem("rut_pat");

		var db = firebase.firestore();

		var date_eval = $('#date_eval').val();
		var time_eval = $('#time_eval').val();
		var dato_x = $('#dato_x').val();
		var dato_y = $('#dato_y').val();
		var id_eval = (date_eval + " " + time_eval).replace("/", "-").replace("/", "-");

		console.log(date_eval);
		console.log(time_eval);
		console.log(dato_x);
		console.log(dato_y);
		console.log(id_eval);

		if (date_eval == "" || time_eval == "" || dato_x == "" || dato_y == "") {
			toastr["warning"]("Debe completar todos los campos", "Atención");
		} else {
			db.collection("patient").doc(rut).collection("range_of_motion").doc(id_eval).set({
				fecha: date_eval,
				hora: time_eval,
				datox: dato_x,
				datoy: dato_y
			}).then(function () {
				range();
				toastr["success"]("Evaluación agregada", "Operación Exitosa");
				$('#new_eval_modal').modal('toggle');
				document.getElementById("form_new_eval").reset();
				$("#loader").removeClass("is-active");
			}).catch(function () {
				toastr["warning"]("Contáctese con soporte", "No se ha podido registrar");
			});
		}
		$("#loader").removeClass("is-active");
	});

	$("#btn_edit_eval").on("click", function (e) {
		$("#loader").addClass("is-active");
		e.preventDefault();
		var rut = localStorage.getItem("rut_pat");

		var db = firebase.firestore();

		var date_eval = $('#date_eval_edit').val();
		var time_eval = $('#time_eval_edit').val();
		var dato_x = $('#dato_x_edit').val();
		var dato_y = $('#dato_y_edit').val();
		var id_eval = localStorage.getItem("id_eval");

		console.log(date_eval);
		console.log(time_eval);
		console.log(dato_x);
		console.log(dato_y);
		console.log(id_eval);

		if (date_eval == "" || time_eval == "" || dato_x == "" || dato_y == "") {
			toastr["warning"]("Debe completar todos los campos", "Atención");
		} else {
			db.collection("patient").doc(rut).collection("range_of_motion").doc(id_eval).set({
				fecha: date_eval,
				hora: time_eval,
				datox: dato_x,
				datoy: dato_y
			}).then(function () {
				range();
				toastr["success"]("Evaluación actualizada", "Operación Exitosa");
				$('#edit_eval_modal').modal('toggle');
				document.getElementById("form_edit_eval").reset();
				$("#loader").removeClass("is-active");
			}).catch(function () {
				toastr["warning"]("Contáctese con soporte", "No se ha podido registrar");
			});
		}
		$("#loader").removeClass("is-active");
	});


	function range() {
		var db = firebase.firestore();
		var rut = localStorage.getItem("rut_pat");

		console.log(rut);
		db.collection("patient").doc(rut).collection("range_of_motion").get().then(function (querySnapshot) {
			var datos = [];
			var label = [];

			$("#table_evaluacion").empty();

			querySnapshot.forEach(function (doc) {
				datos.push(doc.data().datox);
				label.push(doc.data().fecha);

				var fil = "<tr>";
				fil += "<td style='display: none;'>" + doc.id + "</td>";
				fil += "<td >" + doc.data().fecha.toUpperCase() + "</td>";
				fil += "<td >" + doc.data().hora.toUpperCase() + "</td>";
				fil += "<td >" + doc.data().datox.toUpperCase() + "</td>";
				fil += "<td >" + doc.data().datoy.toUpperCase() + "</td>";
				fil += "<td ><a href='#' id='load_edit_eval' class='btn btn-sm btn-warning float-right' data-toggle='modal' data-target='#edit_eval_modal' data-toggle='tooltip' data-placement='top' title='Editar evaluación del paciente'><i class='fas fa-edit'></i></a></td>";
				fil += "</tr>";
				$("#table_evaluacion").append(fil);
			});

			var ctx = document.getElementById("myChart").getContext("2d");
			var myChart = new Chart(ctx, {
				type: "line",
				data: {
					labels: label,
					datasets: [{
						label: 'Rango',
						data: datos,
						backgroundColor: [
							'rgb(66, 134, 244,0.5)',
							'rgb(74, 135, 72,0.5)',
							'rgb(229, 89, 50,0.5)'
						]
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							}
						}]
					}
				}
			});
		});
	}


</script>