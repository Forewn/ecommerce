
<!doctype html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
  	<title>Registrarse</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/login.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<script src="./admin/js/sweetalert2.min.js" ></script>
	<link rel="stylesheet" href="./admin/css/sweetalert2.css">
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
						<div class="login-wrap p-4 p-md-5">
			      			<div class="d-flex">
			      				<div class="w-100">
									<div class="colorregistro">
			      						<div class="row">
			      						    <div class="col-8">
			      						        <h3 class="mb-4">Registrarse</h3>
			      						    </div>
			      						    <div class="col-4">
			      						        <a href="./index.php" class="btn btn-warning ms-5" style="color:white;">Volver</a>
			      						    </div>
			      						</div>
										<p>Rellena los siguientes campos para completar tu registro</p>
									</div>
			      				</div>
			      			</div>
									<form action="./php/signup.php" method="post" id="formulario">
									<div class="form-group mb-3">
										<i class='bx bx-user'></i>
										<label class="label" for="name">Nombres</label>
										<input class="form-control" type="text" placeholder="Nombre" id="nombre" name="nombre">
										<br>
										<!-- <input class="form-control" type="text" placeholder="Segundo nombre" id="nombre2" name="nombre2"> -->
										<i class='bx bx-user'></i>
										<label class="label">Apellidos</label>
										<input class="form-control" type="text" placeholder="Apellidos" id="apellido" name="apellido">	
										<i class='bx bx-user'></i>
										<label class="label">Usuario</label>
										<input class="form-control" type="text" placeholder="Usuario" id="usuario" name="usuario">	
										<!-- <label class="label">Seleccione Sexo</label>
										<div class="row form-group">
													<div class="col-3">
														<select name="idsex" id="tipoSex" style="width: 70px; height: 45px;">
															<option value="Seleccione una opcion" disabled>Sexo</option>
															<option value="M">M</option>
															<option value="F">F</option>
															<option value="X">O</option>
														</select>
													</div>
										</div> -->
										<div class="container mt-3">
												<i class='bx bx-user'></i>
												<label class="label">Cedula</label>
												<div class="row form-group">
													<div class="col-3">
														<select name="id" id="tipoID" style="width: 70px; height: 45px;">
															<option value="Seleccione una opcion">Tipo</option>
															<option value="V">V</option>
															<option value="E">E</option>
														</select>
													</div>
													<div class="col-9">
													<input class="form-control" type="text" name="cedula" id="id" placeholder="Cedula">													</div>
													</div>
												</div>
											
											<i class='bx bx-envelope'></i>
											<label class="label">Correo Electrónico</label>
											<input class="form-control" type="email" name="correo" id="correo" placeholder="Correo">
											<i class='bx bx-key'></i>
											<label class="label">Contraseña</label>
											<input class="form-control" type="password" placeholder="Contraseña" id="password" name="password">
											<input type="checkbox" id="show-password-1" name="show-password" aria-label="Mostrar contraseña">
											<label for="show-password">Mostrar contraseña</label>
											<br>
											<i class='bx bx-key'></i>
											<label class="label">Confirmar Contraseña</label>
											<input class="form-control" type="password" placeholder="Confirmar contraseña" id="password2">
											<input type="checkbox" id="show-password-2" name="show-password" aria-label="Mostrar contraseña">
											<label for="show-password">Mostrar contraseña</label>
										</div>
										<div class="form-group">
											<input type="submit" class="form-control btn-primary rounded submit px-3" value="Registrar">
										</div>
								</form>
							</div>
							<div class="img p-2" style="background-image: url(images/about.jpg);height:fit-content;">
								<div class=" p-3 p-lg-5 text-center d-flex align-items-center order-md-last" z-index="0">
								<div class="text w-100">
								<br><br>
								<div class="colorsi">
									<h2>Bienvenido nuevamente a nuestra Comunidad</h2>
									<p>¿Ya posees una cuenta?</p>
								</div>
								<a href="./login.php" class=" btn btn-primary submit px-3">Inicia Sesión</a>
							</div>
					    </div>
			  		</div>
		      	</div>
			</div>
		</div>
	</div>
</section>

<!-- <script src="js/modal_loginerror.js"></script> -->
<!-- <script src="js/jquery.min.login.js"></script>
<script src="js/popper.login.js"></script>
<script src="js/bootstrap.min.login.js"></script> -->
<!-- <script src="./js/signup_validation.js"></script> -->

</body>
</html>

