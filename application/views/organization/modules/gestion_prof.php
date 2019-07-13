<!-- Begin Page Content -->
<br>
<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="card-header">
			<div class="row">
				<div class="col-md-9">
					<h4 style="margin-top: 4px">Gestión Profesionales
				</div>
				<div class="col-md-1">
					<a href="#" id="sync_table" class="btn btn-link" data-toggle="tooltip" data-placement="top"
						title="Actualizar tabla">
						<i class="fas fa-sync"></i>
					</a>
				</div>
				<div class="col-md-2">
					<a href="#" data-toggle="modal" data-target="#new_prof_modal" class="btn btn-primary btn-block">
						<i class="fas fa-plus"></i> Nuevo profesional
					</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
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
											aria-sort="ascending" aria-label="" style="width: 5%;">Teléfono</th>
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

	<!-- MODAL REGISTRAR PROFESIONAL-->
	<div class="modal fade" id="new_prof_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 style="color:#666" class="modal-title">Nuevo Profesional</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" id="register_profesional2">
						<div class="form-group row">
							<div class="custom-control custom-switch" style="margin-left: 10px">
								&nbsp;<input type="checkbox" class="custom-control-input" id="admin">
								<label class="custom-control-label" for="admin">Administrador</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<input type="text" class="form-control" id="run" placeholder="RUN (sin puntos ni guion)"
									maxlength="10">
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" id="names" placeholder="Nombres" maxlength="20">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6 ">
								<input type="text" class="form-control" id="last_name1" placeholder="Apellido Paterno"
									maxlength="20">
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" id="last_name2" placeholder="Apellido Materno"
									maxlength="20">
							</div>
						</div>
						<div class="form-group row">
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
						<div class="form-group row">
							<div class="col-sm-12 ">
								<input type="text" class="form-control" id="address" placeholder="Dirección"
									maxlength="100">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6 ">
								<input type="email" class="form-control" id="email" placeholder="Correo Electrónico"
									maxlength="50">
							</div>
							<div class="col-md-6">
								<input type="number" class="form-control" id="phone" placeholder="Teléfono de Contacto"
									maxlength="2">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-offset-9 col-md-3">
								<button type="button" id="btn_registrer"
									class="btn btn-primary btn-block">Registrar</button>
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- FIN MODAL REGISTRAR -->

<!-- MODAL editar PROFESIONAL-->
<div class="modal fade" id="edit_prof_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 style="color:#666" class="modal-title">Editar Profesional</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="edit_profesional2">
					<div class="form-group row">
						<div class="custom-control custom-switch" style="margin-left: 10px">
							&nbsp;<input type="checkbox" class="custom-control-input" id="admin_edit">
							<label class="custom-control-label" for="admin_edit">Administrador</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-6">
							<input type="text" class="form-control" id="run_edit"
								placeholder="RUN (sin puntos ni guion)" maxlength="10">
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="names_edit" placeholder="Nombres"
								maxlength="20">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-6 ">
							<input type="text" class="form-control" id="last_name1_edit" placeholder="Apellido Paterno"
								maxlength="20">
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="last_name2_edit" placeholder="Apellido Materno"
								maxlength="20">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-6 ">
							<input type="text" class="form-control" id="birth_date_edit" name="birth_date"
								placeholder="Fecha Nacimiento">
						</div>
						<div class="col-md-6">
							<select id="sexo_edit" name="sexo" class="form-control">
								<option disabled selected>Seleccione Sexo</option>
								<option value="F">Femenino</option>
								<option value="M">Masculino</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12 ">
							<input type="text" class="form-control" id="address_edit" placeholder="Dirección"
								maxlength="100">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-6 ">
							<input type="email" class="form-control" id="email_edit" placeholder="Correo Electrónico"
								maxlength="50">
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="phone_edit" placeholder="Teléfono de Contacto"
								maxlength="2">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-offset-9 col-md-3">
							<button type="button" id="btn_update" class="btn btn-primary btn-block">Actualizar</button>
						</div>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>
</div>
<!-- FIN MODAL REGISTRAR -->

</div>
<!-- /.container-fluid -->

<script type="text/javascript">
	$(document).ready(function () {
		var user = localStorage.getItem("organization");
		console.log("fasdfa" + user);

		table_body2();

		$('#birth_date').datepicker({ language: "es", autoclose: true });

		$('#run').rut({
			validateOn: 'change keyup',
			useThousandsSeparator: false
		});

	});

	function table_body2() {
		var db = firebase.firestore();
		db.collection("profesional").get().then((querySnapshot) => {
			$("#table_body2").empty();
			querySnapshot.forEach((doc) => {
				var fil = "<tr>";
				fil += "<td >" + `${doc.data().rut.toUpperCase()}` + "</td>";
				fil += "<td >" + `${doc.data().names.toUpperCase()}` + " " + `${doc.data().last_name1.toUpperCase()}` + " " + `${doc.data().last_name2.toUpperCase()}` + "</td>";
				fil += "<td >" + `${doc.data().email.toUpperCase()}` + "</td>";
				fil += "<td >" + `${doc.data().phone.toUpperCase()}` + "</td>";
				fil += "<td ><a href='#' id='load_view_prof' class='btn btn-sm btn-info float-right' data-toggle='modal' data-target='#view_prof_modal'><i class='fas fa-eye'></i></a></td>";
				fil += "<td ><a href='#' id='load_edit_prof' class='btn btn-sm btn-warning float-right' data-toggle='modal' data-target='#edit_prof_modal'><i class='fas fa-edit'></i></a></td>";
				fil += "</tr>";
				$("#table_body2").append(fil);
				$("#loader").removeClass("is-active");
			});
		});
	}

	$("#btn_registrer").on("click", function (e) {
		$("#loader").addClass("is-active");
		e.preventDefault();
		var db = firebase.firestore();

		var run = $('#run').val();
		var names = $('#names').val();
		var last_name1 = $('#last_name1').val();
		var last_name2 = $('#last_name2').val();
		var birth_date = $('#birth_date').val();
		var sexo = $('#sexo').val();
		var address = $('#address').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		var admin = "no"

		if ($('#admin').is(":checked")) {
			admin = "si"
		}

		if (run == "" || names == "" || last_name1 == "" || last_name2 == "" || birth_date == "" || sexo == "" || address == "" || email == "" || phone == "") {
			toastr["warning"]("Debe completar todos los campos", "Atención");
		} else if (!$.validateRut(run)) {
			toastr["warning"]("El RUN es invalido", "Atención");
		} else if (!ValidateEmail(email)) {
			toastr["warning"]("El correo no es valido", "Atención");
		} else if (!phonenumber(phone)) {
			toastr["warning"]("El teléfono no es valido", "Atención");
		} else if (!dateValidate(birth_date)) {
			toastr["warning"]("Debe ser mayor de edad", "Atención");
		} else if (sexo == null) {
			toastr["warning"]("Debe seleccionar un sexo", "Atención");
		} else {
			$.validateRut(run, function (r, dv) {
				var password = CryptoJS.MD5(r).toString();

				var docPro = db.collection("profesional").doc(run);

				docPro.get().then(function (doc2) {
					if (doc2.exists) {
						toastr["warning"]("El profesional ya está registrado", "Atención");
					} else {
						var docOrg = db.collection("organization").doc(run);

						docOrg.get().then(function (doc) {
							if (doc.exists) {
								toastr["warning"]("El RUT se encuentra asociado a una organización registrada", "Atención");
							} else {
								password = CryptoJS.MD5(password).toString()
								db.collection("profesional").doc(run).set({
									rut: run,
									names: names,
									last_name1: last_name1,
									last_name2: last_name2,
									birth_date: birth_date,
									sexo: sexo,
									address: address,
									email: email,
									phone: phone,
									password: password,
									admin: admin
								}).then(function () {
									toastr["success"]("Profesional registrado", "Operación Exitosa");
									document.getElementById("register_profesional2").reset();
									$('#new_prof_modal').modal('hide');
									table_body2();
								}).catch(function () {
									toastr["warning"]("Contáctese con soporte", "No se ha podido registrar");
								});
							}
						}).catch(function (error) {
							console.log("Error getting document:", error);
						});

					}
				}).catch(function (error) {
					console.log("Error getting document:", error);
				});
			});
		}
		$("#loader").removeClass("is-active");
	});

	$("#btn_update").on("click", function (e) {
		$("#loader").addClass("is-active");
		e.preventDefault();
		var db = firebase.firestore();

		var run = $('#run_edit').val();
		var names = $('#names_edit').val();
		var last_name1 = $('#last_name1_edit').val();
		var last_name2 = $('#last_name2_edit').val();
		var birth_date = $('#birth_date_edit').val();
		var sexo = $('#sexo_edit').val();
		var address = $('#address_edit').val();
		var email = $('#email_edit').val();
		var phone = $('#phone_edit').val();
		var admin = "no"

		if ($('#admin_edit').is(":checked")) {
			admin = "si"
		}

		if (run == "" || names == "" || last_name1 == "" || last_name2 == "" || birth_date == "" || sexo == "" || address == "" || email == "" || phone == "") {
			toastr["warning"]("Debe completar todos los campos", "Atención");
		} else if (!$.validateRut(run)) {
			toastr["warning"]("El RUN es invalido", "Atención");
		} else if (!ValidateEmail(email)) {
			toastr["warning"]("El correo no es valido", "Atención");
		} else if (!phonenumber(phone)) {
			toastr["warning"]("El teléfono no es valido", "Atención");
		} else if (!dateValidate(birth_date)) {
			toastr["warning"]("Debe ser mayor de edad", "Atención");
		} else if (sexo == null) {
			toastr["warning"]("Debe seleccionar un sexo", "Atención");
		} else {
			$.validateRut(run, function (r, dv) {
				var password = CryptoJS.MD5(r).toString();

				password = CryptoJS.MD5(password).toString()
				db.collection("profesional").doc(run).set({
					rut: run,
					names: names,
					last_name1: last_name1,
					last_name2: last_name2,
					birth_date: birth_date,
					sexo: sexo,
					address: address,
					email: email,
					phone: phone,
					password: password,
					admin: admin
				}).then(function () {
					toastr["success"]("Profesional actualizado", "Operación Exitosa");
					document.getElementById("edit_profesional2").reset();
					$('#edit_prof_modal').modal('hide');
					table_body2();
				}).catch(function () {
					toastr["warning"]("Contáctese con soporte", "No se ha podido registrar");
				});
			});
		}
		$("#loader").removeClass("is-active");
	});

	// cargar vista paciente
	$("body").on("click", "#load_view_prof", function (e) {
		e.preventDefault();
		var rut = $(this).parents("tr").find("td").html();
		table_body_prof(rut);
	});

	// cargar vista paciente
	$("body").on("click", "#load_edit_prof", function (e) {
		$("#loader").addClass("is-active");
		e.preventDefault();
		var rut = $(this).parents("tr").find("td").html();

		var db = firebase.firestore();
		var docPro = db.collection("profesional").doc(rut);

		docPro.get().then(function (doc) {
			if (doc.exists) {
				$('#run_edit').val(`${doc.data().rut.toUpperCase()}`);
				$('#names_edit').val(`${doc.data().names.toUpperCase()}`);
				$('#last_name1_edit').val(`${doc.data().last_name1.toUpperCase()}`);
				$('#last_name2_edit').val(`${doc.data().last_name2.toUpperCase()}`);
				$('#birth_date_edit').val(`${doc.data().birth_date.toUpperCase()}`);
				$('#sexo_edit').val(`${doc.data().sexo.toUpperCase()}`);
				$('#address_edit').val(`${doc.data().address.toUpperCase()}`);
				$('#email_edit').val(`${doc.data().email.toUpperCase()}`);
				$('#phone_edit').val(`${doc.data().phone.toUpperCase()}`);
				if (`${doc.data().admin}` === "si") {
					$('#admin_edit').prop('checked', true);
				}
				$("#loader").removeClass("is-active");

			} else {
				toastr["warning"]("Algo sucedió, contáctese con soporte", "Atención");
			}
		}).catch(function (error) {
			console.log("Error getting document:", error);
		});

		jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/profesional/' + rut, function (object) {

		});
	});

	function table_body_paciente(rut) {
		var db = firebase.firestore();
		var docPro = db.collection("profesional").doc(rut);

		docPro.get().then(function (doc) {
			if (doc.exists) {
				$("#datos_view_prof").empty();
				var fil = "";
				fil += "<tr><td style='width: 30%;'><strong>Rut:</strong></td><td style='width: 70%;'>" + `${doc.data().rut.toUpperCase()}` + ((`${doc.data().admin.toUpperCase()}` === "si") ? " (Administrador) " : "") + "</td></tr>";
				fil += "<tr><td style='width: 30%;'><strong>Nombre:</strong></td><td style='width: 70%;'>" + `${doc.data().names.toUpperCase()}` + " " + `${doc.data().last_name1.toUpperCase()}` + " " + `${doc.data().last_name2.toUpperCase()}` + "</td></tr>";
				fil += "<tr><td style='width: 30%;'><strong>Fecha Nacimiento:</strong></td><td style='width: 70%;'>" + `${doc.data().birth_date.toUpperCase()}` + "</td></tr>";
				fil += "<tr><td style='width: 30%;'><strong>Edad:</strong></td><td style='width: 70%;'>" + calculateAge(`${doc.data().birth_date}`) + " AÑOS</td></tr>";
				fil += "<tr><td style='width: 30%;'><strong>Genero:</strong></td><td style='width: 70%;'>" + ((`${doc.data().sexo.toUpperCase()}` === "M") ? "MASCULINO" : "FEMENINO") + "</td></tr>";
				fil += "<tr><td style='width: 30%;'><strong>Dirección:</strong></td><td style='width: 70%;'>" + `${doc.data().address.toUpperCase()}` + "</td></tr>";
				fil += "<tr><td style='width: 30%;'><strong>Correo:</strong></td><td style='width: 70%;'>" + `${doc.data().email.toUpperCase()}` + "</td></tr>";
				fil += "<tr><td style='width: 30%;'><strong>Numero de Teléfono:</strong></td><td style='width: 70%;'>" + `${doc.data().phone.toUpperCase()}` + "</td></tr>";
				$("#datos_view_prof").append(fil);
			} else {
				toastr["warning"]("Algo sucedió, contáctese con soporte", "Atención");
			}
		}).catch(function (error) {
			console.log("Error getting document:", error);
		});
	}

	function table_body_prof(rut) {

		jQuery.getJSON('https://projectmedisync.firebaseapp.com/api/v1/profesional/' + rut, function (object) {
			$("#datos_view_prof").empty();
			var fil = "";
			fil += "<tr><td style='width: 30%;'><strong>Rut:</strong></td><td style='width: 70%;'>" + object.rut.toUpperCase() + ((object.admin === "si") ? " (Administrador) " : "") + "</td></tr>";
			fil += "<tr><td style='width: 30%;'><strong>Nombre:</strong></td><td style='width: 70%;'>" + object.names.toUpperCase() + " " + object.last_name1.toUpperCase() + " " + object.last_name2.toUpperCase() + "</td></tr>";
			fil += "<tr><td style='width: 30%;'><strong>Fecha Nacimiento:</strong></td><td style='width: 70%;'>" + object.birth_date.toUpperCase() + "</td></tr>";
			fil += "<tr><td style='width: 30%;'><strong>Edad:</strong></td><td style='width: 70%;'>" + calculateAge(object.birth_date) + " AÑOS</td></tr>";
			fil += "<tr><td style='width: 30%;'><strong>Genero:</strong></td><td style='width: 70%;'>" + ((object.sexo.toUpperCase() === "M") ? "MASCULINO" : "FEMENINO") + "</td></tr>";
			fil += "<tr><td style='width: 30%;'><strong>Dirección:</strong></td><td style='width: 70%;'>" + object.address.toUpperCase() + "</td></tr>";
			fil += "<tr><td style='width: 30%;'><strong>Correo:</strong></td><td style='width: 70%;'>" + object.email.toUpperCase() + "</td></tr>";
			fil += "<tr><td style='width: 30%;'><strong>Numero de Teléfono:</strong></td><td style='width: 70%;'>" + object.phone.toUpperCase() + "</td></tr>";
			$("#datos_view_prof").append(fil);
		});
	}

	function calculateAge(birthday) {
		var birthday_arr = birthday.split("/");
		var birthday_date = new Date(birthday_arr[2], birthday_arr[1] - 1, birthday_arr[0]);
		var ageDifMs = Date.now() - birthday_date.getTime();
		var ageDate = new Date(ageDifMs);
		return Math.abs(ageDate.getUTCFullYear() - 1970);
	}

	function CheckPassword(inputtxt) {
		var decimal = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
		if (inputtxt.match(decimal)) {
			console.log("pass valida");
			return true;
		}
		else {
			console.log("pass invalida");
			return false;
		}
	}

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

	function dateValidate(inputDate) {
		var from = inputDate.split("/"); // DD/MM/YYYY 

		var day = from[0] - 1;
		var month = from[1];
		var year = from[2];
		var age = 18;

		var mydate = new Date();
		mydate.setFullYear(year, month - 1, day);

		var currdate = new Date();
		var setDate = new Date();

		setDate.setFullYear(mydate.getFullYear() + age, month - 1, day);

		if ((currdate - setDate) > 0) {
			console.log("mayor");
			return true;
		} else {
			console.log("menor");
			return false;
		}
	}

</script>