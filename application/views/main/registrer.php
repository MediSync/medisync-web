<body class="bg-gradient-primary">

	<style>
		/* Tabs Card */

		.tab-card {
			border: 1px solid #eee;
		}

		.tab-card-header {
			background: none;
		}

		/* Default mode */
		.tab-card-header>.nav-tabs {
			border: none;
			margin: 0px;
		}

		.tab-card-header>.nav-tabs>li {
			margin-right: 2px;
		}

		.tab-card-header>.nav-tabs>li>a {
			border: 0;
			border-bottom: 2px solid transparent;
			margin-right: 0;
			color: #737373;
			padding: 2px 15px;
		}

		.tab-card-header>.nav-tabs>li>a.show {
			border-bottom: 2px solid #007bff;
			color: #007bff;
		}

		.tab-card-header>.nav-tabs>li>a:hover {
			color: #007bff;
		}

		.tab-card-header>.tab-content {
			padding-bottom: 0;
		}
	</style>

	<div class="container">

		<div class="card o-hidden border-0 shadow-lg my-5">
			<div class="card-body p-0">
				<!-- Nested Row within Card Body -->
				<div class="row">
					<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
					<div class="col-lg-7">
						<div class="p-5">
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-4">Registro</h1>
							</div>
							<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
									role="tab" aria-controls="nav-home" aria-selected="true">Profesional</a>
								<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
									role="tab" aria-controls="nav-profile" aria-selected="false">Organización</a>
							</div>
							<div class="tab-content" id="nav-tabContent">
								<div class="tab-pane fade show active" id="nav-home" role="tabpanel"
									aria-labelledby="nav-home-tab">
									<form class="user" id="register_profesional">
										<br>
										<div class="form-group row">
											<div class="col-sm-6 mb-3 mb-sm-0">
												<input type="text" class="form-control form-control-user" id="rut"
													name="rut" placeholder="Rut">
											</div>
											<div class="col-sm-6 mb-3 mb-sm-0">
												<input type="text" class="form-control form-control-user" id="names"
													name="names" placeholder="Nombre">
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-6 mb-3 mb-sm-0">
												<input type="text" class="form-control form-control-user"
													id="last_name1" name="last_name1" placeholder="Apellido Paterno">
											</div>
											<div class="col-sm-6 mb-3 mb-sm-0">
												<input type="text" class="form-control form-control-user"
													id="last_name2" name="last_name2" placeholder="Apellido Materno">
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-6 mb-3 mb-sm-0">
												<input type="text" class="form-control form-control-user"
													id="birth_date" name="birth_date" placeholder="Fecha Nacimiento">
											</div>
											<div class="col-sm-6 mb-3 mb-sm-0">
												<select id="sexo" name="sexo" class="custom-select" style="font-size: 0.8rem;
															border-radius: 10rem; height: 3.1rem">
													<option disabled selected>Seleccione Sexo</option>
													<option value="F">Femenino</option>
													<option value="M">Masculino</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<input type="text" class="form-control form-control-user" id="address"
												name="address" placeholder="Domicilio">
										</div>
										<div class="form-group row">
											<div class="col-sm-6 mb-3 mb-sm-0">
												<input type="email" class="form-control form-control-user" id="email"
													name="email" placeholder="Correo Electronico">
											</div>
											<div class="col-sm-6 mb-3 mb-sm-0">
												<input type="text" class="form-control form-control-user" id="phone"
													name="phone" placeholder="Telefono Contacto">
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-6 mb-3 mb-sm-0">
												<input type="password" class="form-control form-control-user"
													id="password" name="password" placeholder="Contraseña">
											</div>
											<div class="col-sm-6">
												<input type="password" class="form-control form-control-user"
													id="password2" placeholder="Repetir contraseña">
											</div>
										</div>
										<button id="btn_add_profesional" class="btn btn-primary btn-user btn-block">
											Crear cuenta
										</button>
									</form>
								</div>
								<div class="tab-pane fade" id="nav-profile" role="tabpanel"
									aria-labelledby="nav-profile-tab">
									<form class="user" id="register_organization">
										<br>
										<div class="form-group row">
											<div class="col-sm-6 mb-3 mb-sm-0">
												<input type="text" class="form-control form-control-user" id="rut_org"
													name="rut_org" placeholder="Rut">
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-12">
												<input type="text" class="form-control form-control-user" id="name_org"
													name="name_org" placeholder="Razon Social">
											</div>
										</div>
										<div class="form-group">
											<input type="text" class="form-control form-control-user" id="address_org" name="address_org"
												placeholder="Domicilio">
										</div>
										<div class="form-group row">
											<div class="col-sm-6 mb-3 mb-sm-0">
												<input type="email" class="form-control form-control-user"
													id="email_org" name="email_org" placeholder="Correo Electronico">
											</div>
											<div class="col-sm-6 mb-3 mb-sm-0">
												<input type="text" class="form-control form-control-user"
													id="phone_org" name="phone_org" placeholder="Telefono Contacto">
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-6 mb-3 mb-sm-0">
												<input type="password" class="form-control form-control-user"
													id="password_org" name="password_org" placeholder="Contraseña">
											</div>
											<div class="col-sm-6">
												<input type="password" class="form-control form-control-user"
													id="password2_org" name="password2_org" placeholder="Repetir contraseña">
											</div>
										</div>
										<button id="btn_add_organization" class="btn btn-primary btn-user btn-block">
											Crear cuenta
										</button>
									</form>
								</div>
							</div>
							<hr>
							<!--<div class="text-center">
								<a class="small" href="forgot-password.html">Forgot Password?</a>
							</div>-->
							<div class="text-center">
								<a class="small" href="login">¿Ya tienes una cuenta? ¡Inicia sesion!</a>
							</div>
							<div class="text-center">
								<a class="small" href="home">Ir a inicio</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
