
<!doctype html>
<html lang="en">
  <head>
  	<link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
  	<title>Iniciar Sesión</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/login.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="./admin/css/sweetalert2.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	</head>
	<body>
	<header>
		<?php include "./modulos/cambio.php" ?>
	</header>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(./images/about.jpg);">
							<div class=" p-3 p-lg-5 text-center d-flex align-items-center order-md-last" z-index="0">
								<div class="text w-100">
									<br>
									<br>
									<div class="colorsi">
										<h2>Bienvenido a nuestra Comunidad</h2>
										<p>¿Aun no tienes una cuenta?</p>
									</div>
									<a href="./signup.php" class=" btn btn-primary submit px-3">Registrarse</a>
								</div>
							</div>
			      		</div>
						<div class="login-wrap p-4 p-md-5">
			      			<div class="d-flex row">
			      				<div class="w-100">
			      					<h3 class="mb-4">Iniciar Sesión</h3>
			      				</div>
			      			</div>
							<form action="./php/login.php" method="post" id="formulario" class="signin-form">
			      				<div class="form-group mb-3">
									<i class='bx bx-user'></i>
									<label class="label" for="name">Usuario</label>
									<input type="text" class="form-control" placeholder="Usuario" required name="usuario" id="DNIClient">
			      				</div>
								<div class="form-group mb-3">
									<i class='bx bx-key'></i>
		            				<label class="label" for="password">Contraseña</label>
		              				<input type="password" class="form-control" placeholder="Contraseña" required name="contra" id="passwordClient">
									<input type="checkbox" id="show-password" name="show-password" aria-label="Mostrar contraseña">
    								<label for="show-password">Mostrar contraseña</label>
		            			</div>
								<div class="form-group">
									<button class="form-control btn-primary rounded submit px-3" id="btn-login">Iniciar Sesión</button>
								</div>
		            			<div class="form-group d-md-flex row">
									<div class="w-50 text-md-right col-8">
										<a href="./recovery_(new).php">Olvidé mi Contraseña</a>
									</div>
									<div class="col-4">
									    <a href="./index.php" class="btn btn-warning ms-5" style="color:white;">Volver</a>
									</div>
		            			</div>
							</form>
		        		</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
</script>
</body>
<!-- <script src="js/login_validation.js"></script> -->
<script src="js/jquery.min.login.js"></script>
<script src="js/popper.login.js"></script>
<script src="js/bootstrap.min.login.js"></script>
</html>