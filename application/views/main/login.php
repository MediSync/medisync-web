<body class="bg-gradient-primary">
	<div class="container">
		<!-- Outer Row -->
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-12 col-md-9">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<!-- Imagen -->
							<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
									</div>
									<form class="user" id="login_form" autocomplete="off">
										<div class="form-group">
											<input type="email" class="form-control form-control-user" id="email"
												name="email" value="" placeholder="Ingrese su correo" autocomplete="off">
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user" id="pass"
												name="pass" value="" placeholder="Contraseña" autocomplete="off">
										</div>
										<div class="form-group">
											<select id="profile" name="profile" class="custom-select" style="font-size: 0.8rem;
															border-radius: 10rem; height: 3.1rem">
												<option value="" disabled selected>Seleccione un Perfil...</option>
												<option value="1">Paciente</option>
												<option value="2">Profesional</option>
												<option value="3">Organización</option>
											</select>
										</div>
										<div class="form-group">
											<div class="custom-control custom-switch" style="margin-left: 10px">
												<input type="checkbox" class="custom-control-input" id="remember">
												<label class="custom-control-label" for="remember">Recordar Credenciales</label>
											  </div>
										</div>
										<button id=btn_login class="btn btn-primary btn-user btn-block">
											Entrar
										</button>
									</form>
									<hr>
									<div class="text-center">
										<a class="small" href="registrer">¿No tienes una cuenta? ¡Registrate!</a>
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
		</div>
	</div>