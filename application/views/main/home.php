<body id="page-top" class="fondo">
	<style>
		/*
Removes white gap between slides
*/
		.carousel {
			background: darkgray;
		}

		/*
Forces image to be 100% width and not max width of 100%
*/
		.carousel-item .img-fluid {
			width: 100%;
			height: auto;
		}

		.mb-4,
		.my-4 {
			margin-bottom: 0 !important;
		}
	</style>

	<!-- Page Wrapper -->
	<div id="wrapper" class="">



		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
						<div class="input-group">
							<strong>MediSync</strong>
						</div>
					</div>


					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<a id="boton" href="login"
							class="btn btn-light btn-icon-split border-left-info">
							<span class="text">Ingresar</span>
						</a>
						&nbsp;
						&nbsp;
						<a id="boton" href="registrer"
							class="btn btn-light btn-icon-split border-left-success">
							<span class="text">Registrarse</span>
						</a>

					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<!--
    ####################################################
    C A R O U S E L
    ####################################################
    -->
				<div id="carousel-2" class="carousel slide carousel-fade" data-ride="carousel" data-interval="6000">
					<ol class="carousel-indicators">
						<li data-target="#carousel-2" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-2" data-slide-to="1"></li>
						<li data-target="#carousel-2" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner" role="listbox">

						<div class="carousel-item active">
							<a href="https://bootstrapcreative.com/">

								<img src="assets/img/img-01.jpeg" alt="responsive image"
									class="d-block img-fluid">

								<div class="carousel-caption">
									<div>
										<h2>Dispositovo con Sensores</h2>
										<p>Construido con tegnologia Arduino</p>
										<!--<span class="btn btn-sm btn-outline-secondary">Learn More</span>-->
									</div>
								</div>
							</a>
						</div>
						<!-- /.carousel-item -->


						<div class="carousel-item">
							<a href="https://bootstrapcreative.com/">
								<img src="assets/img/img-02.jpg" alt="responsive image"
									class="d-block img-fluid">

								<div class="carousel-caption justify-content-center align-items-center">
									<div>
										<h2 style="color: black">MediSync APP para Android</h2>
										<p style="color: black">Revise historial clinico, registre examenes y controle el sensor</p>
										<!--<span class="btn btn-sm btn-outline-secondary">Our Process</span>-->
									</div>
								</div>
							</a>
						</div>
						<!-- /.carousel-item -->
						<div class="carousel-item">
							<a href="https://bootstrapcreative.com/">

								<img src="assets/img/img-03.jpg" alt="responsive image"
									class="d-block img-fluid">


								<div class="carousel-caption justify-content-center align-items-center">
									<div>
										<h2 style="color: black">Plataforma WEB</h2>
										<p style="color: black">Gestione examenes, historial clinico y mucho mas!</p>
										<!--<span class="btn btn-sm btn-secondary">Learn How</span>-->
									</div>
								</div>
							</a>
						</div>
						<!-- /.carousel-item -->
					</div>
					<!-- /.carousel-inner -->
					<a class="carousel-control-prev" href="#carousel-2" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carousel-2" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				<!-- /.carousel -->


				<div class="container-fluid">
					<!-- rest of the page-->
				</div>
				<!-- /.container -->

			</div>
			<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->

	</div>
	<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->