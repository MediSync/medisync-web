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
								<input type="email" class="form-control" id="email_pac" placeholder="Correo Electrónico"
									maxlength="50">
							</div>
							<div class="col-md-6">
								<input type="number" class="form-control" id="phone_pac"
									placeholder="Teléfono de Contacto" maxlength="2">
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
									placeholder="Correo Electrónico" maxlength="50">
							</div>
							<div class="col-md-6">
								<input type="number" class="form-control" id="phone_pac_edit"
									placeholder="Teléfono de Contacto" maxlength="2">
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
	$(document).ready(function () {
		toastr.options = {
			"closeButton": true,
			"positionClass": "toast-top-right"
		}

		var db = firebase.firestore();

		$("#new_modal").on('hidden.bs.modal', function () {
			document.getElementById("register_pac").reset();
		});

		$('#rut_pac').rut({
			validateOn: 'change keyup',
			useThousandsSeparator: false
		});

		$('#birth_date_pac').datepicker({ language: "es", autoclose: true });
		$('#birth_date_pac_edit').datepicker({ language: "es", autoclose: true });

		$("#sync_table").on("click", function (e) {
			e.preventDefault();
			table_body();
		});

		table_body();


	});

	function calculateAge(birthday) {
		var birthday_arr = birthday.split("/");
		var birthday_date = new Date(birthday_arr[2], birthday_arr[1] - 1, birthday_arr[0]);
		var ageDifMs = Date.now() - birthday_date.getTime();
		var ageDate = new Date(ageDifMs);
		return Math.abs(ageDate.getUTCFullYear() - 1970);
	}

	$("#gestion_pacientes").on("click", function (e) {
		e.preventDefault();
		$("#loader").addClass("is-active");
		$("main").load("gestion_pacientes");
		table_body();
	});

	function table_body() {
		var db = firebase.firestore();
		db.collection("patient").get().then((querySnapshot) => {
			$("#table_body").empty();
			querySnapshot.forEach((doc) => {
				var fil = "<tr>";
				fil += "<td >" + `${doc.data().rut}` + "</td>";
				fil += "<td >" + `${doc.data().names.toUpperCase()}` + " " + `${doc.data().last_name1.toUpperCase()}` + " " + `${doc.data().last_name2.toUpperCase()}` + "</td>";
				fil += "<td >" + `${doc.data().sexo}` + "</td>";
				fil += "<td >" + calculateAge(`${doc.data().birth_date}`) + "</td>";
				fil += "<td >" + `${doc.data().birth_date}` + "</td>";
				fil += "<td ><a href='#' id='load_view_paciente' class='btn btn-sm btn-info float-right' data-toggle='modal' data-target='#view_modal' data-toggle='tooltip' data-placement='top' title='Ver detalles del paciente'><i class='fas fa-eye'></i></a></td>";
				fil += "<td ><a href='#' id='load_edit_paciente' class='btn btn-sm btn-warning float-right' data-toggle='modal' data-target='#edit_modal' data-toggle='tooltip' data-placement='top' title='Editar datos del paciente'><i class='fas fa-edit'></i></a></td>";
				fil += "</tr>";
				$("#table_body").append(fil);
				$("#loader").removeClass("is-active");
			});
		});
	}

	// agregar paciente
	$("#btn_add_pac").on("click", function (e) {
		$("#loader").addClass("is-active");
		e.preventDefault();

		var db = firebase.firestore();

		var run = $('#rut_pac').val();
		var names = $('#names_pac').val();
		var last_name1 = $('#last_name1_pac').val();
		var last_name2 = $('#last_name2_pac').val();
		var birth_date = $('#birth_date_pac').val();
		var sexo = $('#sexo_pac').val();
		var address = $('#address_pac').val();
		var email = $('#email_pac').val();
		var phone = $('#phone_pac').val();

		if (run == "" || names == "" || last_name1 == "" || last_name2 == "" || birth_date == "" || sexo == "" || address == "" || email == "" || phone == "") {
			toastr["warning"]("Debe completar todos los campos", "Atención");
		} else if (!$.validateRut(run)) {
			toastr["warning"]("El RUN es invalido", "Atención");
		} else if (!ValidateEmail(email)) {
			toastr["warning"]("El correo no es valido", "Atención");
		} else if (!phonenumber(phone)) {
			toastr["warning"]("El teléfono no es valido", "Atención");
		} else if (sexo == null) {
			toastr["warning"]("Debe seleccionar un sexo", "Atención");
		} else {
			$.validateRut(run, function (r, dv) {
				var password = CryptoJS.MD5(r).toString();

				var docPro = db.collection("patient").doc(run);

				docPro.get().then(function (doc2) {
					if (doc2.exists) {
						toastr["warning"]("El paciente ya está registrado", "Atención");
					} else {
						db.collection("patient").doc(run).set({
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
							table_body();
							toastr["success"]("Paciente registrado", "Operación Exitosa");
							$('#new_modal').modal('toggle');
							document.getElementById("register_pac").reset();
							$("#loader").removeClass("is-active");
						}).catch(function () {
							toastr["warning"]("Contáctese con soporte", "No se ha podido registrar");
						});
					}
				}).catch(function (error) {
					console.log("Error getting document:", error);
				});
			});
		}
		$("#loader").removeClass("is-active");
	});

	// cargar datos en edit paciente
	$("body").on("click", "#load_edit_paciente", function (e) {
		e.preventDefault();
		var db = firebase.firestore();

		var rut = $(this).parents("tr").find("td").html();
		var docPro = db.collection("patient").doc(rut);

		docPro.get().then(function (doc) {
			if (doc.exists) {
				$('#rut_pac_edit').val(`${doc.data().rut}`);
				$('#names_pac_edit').val(`${doc.data().names}`);
				$('#last_name1_pac_edit').val(`${doc.data().last_name1}`);
				$('#last_name2_pac_edit').val(`${doc.data().last_name2}`);
				$('#birth_date_pac_edit').val(`${doc.data().birth_date}`);
				$('#sexo_pac_edit').val(`${doc.data().sexo}`);
				$('#address_pac_edit').val(`${doc.data().address}`);
				$('#email_pac_edit').val(`${doc.data().email}`);
				$('#phone_pac_edit').val(`${doc.data().phone}`);
			} else {
				toastr["warning"]("Algo sucedió, contáctese con soporte", "Atención");
			}
		}).catch(function (error) {
			console.log("Error getting document:", error);
		});
	});

	// editar paciente
	$("#btn_edit_pac").on("click", function (e) {
		$("#loader").addClass("is-active");
		e.preventDefault();
		console.log("asdfa")
		var db = firebase.firestore();

		var run = $('#rut_pac_edit').val();
		var names = $('#names_pac_edit').val();
		var last_name1 = $('#last_name1_pac_edit').val();
		var last_name2 = $('#last_name2_pac_edit').val();
		var birth_date = $('#birth_date_pac_edit').val();
		var sexo = $('#sexo_pac_edit').val();
		var address = $('#address_pac_edit').val();
		var email = $('#email_pac_edit').val();
		var phone = $('#phone_pac_edit').val();

		if (run == "" || names == "" || last_name1 == "" || last_name2 == "" || birth_date == "" || sexo == "" || address == "" || email == "" || phone == "") {
			toastr["warning"]("Debe completar todos los campos", "Atención");
		} else if (!$.validateRut(run)) {
			toastr["warning"]("El RUN es invalido", "Atención");
		} else if (!ValidateEmail(email)) {
			toastr["warning"]("El correo no es valido", "Atención");
		} else if (!phonenumber(phone)) {
			toastr["warning"]("El teléfono no es valido", "Atención");
		} else if (sexo == null) {
			toastr["warning"]("Debe seleccionar un sexo", "Atención");
		} else {
			var updatePac = db.collection("patient").doc(run);

			return updatePac.update({
				names: names,
				last_name1: last_name1,
				last_name2: last_name2,
				birth_date: birth_date,
				sexo: sexo,
				address: address,
				email: email,
				phone: phone
			}).then(function () {
				table_body();
				toastr["success"]("Paciente actualizado", "Operación Exitosa");
				$('#edit_modal').modal('toggle');
				document.getElementById("edit_pac").reset();
				$("#loader").removeClass("is-active");
			}).catch(function (error) {
				// The document probably doesn't exist.
				console.error("Error updating document: ", error);
			});

		}
		$("#loader").removeClass("is-active");
	});

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

	// cargar vista paciente
	$("body").on("click", "#load_view_paciente", function (e) {
		e.preventDefault();
		var rut = $(this).parents("tr").find("td").html();
		table_body_paciente(rut);
	});

	function table_body_paciente(rut) {
		var db = firebase.firestore();
		var docPro = db.collection("patient").doc(rut);

		docPro.get().then(function (doc) {
			if (doc.exists) {
				$("#datos_paciente").empty();
				var fil = "";
				fil += "<tr><td style='width: 30%;'><strong>Rut:</strong></td><td style='width: 70%;'>" + `${doc.data().rut.toUpperCase()}` + "</td></tr>";
				fil += "<tr><td style='width: 30%;'><strong>Nombre:</strong></td><td style='width: 70%;'>" + `${doc.data().names.toUpperCase()}` + " " + `${doc.data().last_name1.toUpperCase()}` + " " + `${doc.data().last_name2.toUpperCase()}` + "</td></tr>";
				fil += "<tr><td style='width: 30%;'><strong>Fecha Nacimiento:</strong></td><td style='width: 70%;'>" + `${doc.data().birth_date}` + "</td></tr>";
				fil += "<tr><td style='width: 30%;'><strong>Edad:</strong></td><td style='width: 70%;'>" + calculateAge(`${doc.data().birth_date}`) + " AÑOS</td></tr>";
				fil += "<tr><td style='width: 30%;'><strong>Genero:</strong></td><td style='width: 70%;'>" + ((`${doc.data().sexo.toUpperCase()}` === "M") ? "MASCULINO" : "FEMENINO") + "</td></tr>";
				fil += "<tr><td style='width: 30%;'><strong>Dirección:</strong></td><td style='width: 70%;'>" + `${doc.data().address.toUpperCase()}` + "</td></tr>";
				fil += "<tr><td style='width: 30%;'><strong>Correo:</strong></td><td style='width: 70%;'>" + `${doc.data().email.toUpperCase()}` + "</td></tr>";
				fil += "<tr><td style='width: 30%;'><strong>Numero de Teléfono:</strong></td><td style='width: 70%;'>" + `${doc.data().phone}` + "</td></tr>";
				$("#datos_paciente").append(fil);
			} else {
				toastr["warning"]("Algo sucedió, contáctese con soporte", "Atención");
			}
		}).catch(function (error) {
			console.log("Error getting document:", error);
		});
	}

	// cargar historial paciente
	$("body").on("click", "#load_history_paciente", function (e) {
		e.preventDefault();
		$("#loader").addClass("is-active");
		var rut = $(this).parents("tr").find("td").html();
		localStorage.setItem("rut_pat", rut);

		$("main").load("gestion_historial");

		var db = firebase.firestore();
		var docPro = db.collection("patient").doc(rut);

		docPro.get().then(function (doc) {
			if (doc.exists) {
				$("#rut_hist").text(`${doc.data().rut.toUpperCase()}`);
				$("#age_hist").text(calculateAge(`${doc.data().birth_date.toUpperCase()}`));
				$("#name_hist").text(`${doc.data().names.toUpperCase()}` + " " + `${doc.data().last_name1.toUpperCase()}` + " " + `${doc.data().last_name2.toUpperCase()}`);
				$("#sexo_hist").text(((`${doc.data().sexo.toUpperCase()}` === "M") ? "MASCULINO" : "FEMENINO"));
				$("#birth_hist").text(`${doc.data().birth_date.toUpperCase()}`);
				$("#email_hist").text(`${doc.data().email.toUpperCase()}`);
				$("#phone_hist").text(`${doc.data().phone.toUpperCase()}`);
				$("#address_hist").text(`${doc.data().address.toUpperCase()}`);
				$("#loader").removeClass("is-active");
			} else {
				toastr["warning"]("Algo sucedió, contáctese con soporte", "Atención");
			}
		}).catch(function (error) {
			console.log("Error getting document:", error);
		});

	});

	// cargar vista paciente
	$("body").on("click", "#load_view_history", function (e) {
		e.preventDefault();
		var id = $(this).parents("tr").find("td").html();
		console.log(id);
		table_view_history(id);
	});

	// cargar vista paciente
	$("body").on("click", "#load_edit_history", function (e) {
		e.preventDefault();
		var id = $(this).parents("tr").find("td").html();
		console.log(id);
		table_edit_history(id);
	});

	// cargar vista paciente
	$("body").on("click", "#load_edit_eval", function (e) {
		e.preventDefault();
		var id = $(this).parents("tr").find("td").html();
		console.log(id);
		table_edit_eval(id);
	});



	function table_view_history(id) {
		$("#loader").addClass("is-active");

		var db = firebase.firestore();
		var rut = localStorage.getItem("rut_pat");

		var docPro = db.collection("patient").doc(rut).collection("historial").doc(id);

		docPro.get().then(function (doc) {
			if (doc.exists) {
				console.log(`${doc.data().titulo}`);

				$("#datos_history").empty();
				var fil = "";
				fil += "<tr><td style='width: 30%;'><strong>Titulo:</strong></td><td style='width: 70%;'>" + `${doc.data().titulo.toUpperCase()}` + "</td></tr>";
				fil += "<tr><td style='width: 30%;'><strong>Fecha:</strong></td><td style='width: 70%;'>" + `${doc.data().fecha.toUpperCase()}` + "</td></tr>";
				fil += "<tr><td style='width: 30%;'><strong>Hora:</strong></td><td style='width: 70%;'>" + `${doc.data().hora.toUpperCase()}` + "</td></tr>";
				fil += "<tr><td style='width: 30%;'><strong>Responsable:</strong></td><td style='width: 70%;'>" + `${doc.data().responsable.toUpperCase()}` + "</td></tr>";
				fil += "<tr><td style='width: 30%;'><strong>Evolución:</strong></td><td style='width: 70%;'>" + `${doc.data().text_Evolucion.toUpperCase()}` + "</td></tr>";
				fil += "<tr><td style='width: 30%;'><strong>Diagnostico:</strong></td><td style='width: 70%;'>" + `${doc.data().diagnostico.toUpperCase()}` + "</td></tr>";
				fil += "<tr><td style='width: 30%;'><strong>Tratamiento:</strong></td><td style='width: 70%;'>" + `${doc.data().tratamiento.toUpperCase()}` + "</td></tr>";
				$("#datos_history").append(fil);
				$("#loader").removeClass("is-active");

			} else {
				toastr["warning"]("Algo sucedió, contáctese con soporte", "Atención");
			}
		}).catch(function (error) {
			console.log("Error getting document:", error);
		});
	}

	function table_edit_history(id) {
		$("#loader").addClass("is-active");

		var db = firebase.firestore();
		var rut = localStorage.getItem("rut_pat");

		var docPro = db.collection("patient").doc(rut).collection("historial").doc(id);

		docPro.get().then(function (doc) {
			if (doc.exists) {
				localStorage.setItem("id_hist", `${doc.id}`);
				$("#title_hist_edit").val(`${doc.data().titulo}`);
				$("#date_hist_edit").val(`${doc.data().fecha}`);
				$("#time_hist_edit").val(`${doc.data().hora}`);
				$("#resp_hist_edit").val(`${doc.data().responsable}`);
				$("#evol_hist_edit").val(`${doc.data().text_Evolucion}`);
				$("#diag_hist_edit").val(`${doc.data().diagnostico}`);
				$("#trat_hist_edit").val(`${doc.data().tratamiento}`);
				$("#loader").removeClass("is-active");
			} else {
				toastr["warning"]("Algo sucedió, contáctese con soporte", "Atención");
			}
		}).catch(function (error) {
			console.log("Error getting document:", error);
		});
	}

	function table_edit_eval(id) {
		$("#loader").addClass("is-active");

		var db = firebase.firestore();
		var rut = localStorage.getItem("rut_pat");

		var docPro = db.collection("patient").doc(rut).collection("range_of_motion").doc(id);

		docPro.get().then(function (doc) {
			if (doc.exists) {
				localStorage.setItem("id_eval", `${doc.id}`);
				$("#date_eval_edit").val(`${doc.data().fecha}`);
				$("#time_eval_edit").val(`${doc.data().hora}`);
				$("#dato_x_edit").val(`${doc.data().datox}`);
				$("#dato_y_edit").val(`${doc.data().datoy}`);
				$("#loader").removeClass("is-active");
			} else {
				toastr["warning"]("Algo sucedió, contáctese con soporte", "Atención");
			}
		}).catch(function (error) {
			console.log("Error getting document:", error);
		});
	}




</script>