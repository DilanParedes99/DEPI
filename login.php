<!DOCTYPE html>
<html>
<head>
	<title>DEPI-Gestión de Usuarios</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<script src="https://kit.fontawesome.com/47a5d5df4f.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">
	body{
		background-color: #1D2368;
	}
	.container{
		background-color: #fff;
	}

	a{
		font-size: 10px;
		align-items: center;
		text-align: center;
		padding-right: 100px;
		padding-left: 3em;
	}
</style>
</head>
<body>
	<?php $id=""; 
	?>
	<div class="container pb-4 mt-5 col-xs-10 col-sm-9 col-md-9 col-lg-7 align-items-center">
		<div class="row bg-light " id="banner">
			<img src="img/banner.jpg" class="img-fluid" alt="Responsive image">
		</div>
		<div class="row justify-content-center">
			<p class="text-center col-8">Bienvenido a Gestión de Usuarios REPOMICH, por favor elige una opción de acuerdo a tus actividades</p>
		</div>

		<div class="row justify-content-center">
			<a class=" mx-2 btn btn-light col-sm-11 col-md-5 col-lg-2"	 href="index.php" id=<?php 
			if(isset($_GET['op'])){
				if($_GET['op']=='inicio') echo "\"act\"";
				else echo "\"des\"";
			}else{
				echo "\"act\"";
			}
			?>>  <i class="fas fa-2x fa-home"></i></a>
			<a class=" mx-2 btn btn-light col-sm-11 col-md-5 col-lg-2" href="login.php?op=Administrador" id=<?php
			if(isset($_GET['op'])){ 
				if($_GET['op']=='Administrador') echo "\"act\"";
				else echo "\"des\"";
			}else echo "\"des\"";
			?>>Administrador</a>

			<a class=" mx-2 btn btn-light col-sm-11 col-md-5 col-lg-2" href="login.php?op=Alumnos" id=<?php
			if(isset($_GET['op'])){ 
				if($_GET['op']=='Alumnos') echo "\"act\"";
				else echo "\"des\"";
			}else echo "\"des\"";
			?>>Alumnos</a>

			<a class=" mx-2 btn btn-light col-sm-11 col-md-5 col-lg-2" href="login.php?op=Academicos" id=<?php 
			if(isset($_GET['op'])){
				if($_GET['op']=='Academicos') echo "\"act\"";
				else echo "\"des\"";
			}else echo "\"des\"";
			?>>Académicos</a>

		</div>
		
		<div>
			<?php 
			if(isset($_GET['op'])){
				if($_GET['op']=='inicio') header('location: index.php');
					if($_GET['op']=='Administrador') include('forms/formulariodirector.php');
					if($_GET['op']=='Alumnos') include('forms/formalumno.php');
					if($_GET['op']=='Academicos') include('forms/formcontr.php');
				}
				?>
			</div>
			<div class="row mt-4">
				<div class="col-sm-3 offset-3 ">
					<span style="text-align: center; font-size: 1.1rem">¿Ya te registraste?</span>
				</div>
				<div class="col-sm offset-sm-0 offset-2">
					<a class="" style=" font-size: 1.1rem" href="Registrar.php">Registrate aqui</a>

				</div>


			</div>
			<center>
				<div class="row mt-4">
					<div class="col-sm-3 offset-3 ">
						<span style="text-align: center; font-size: 0.8rem">¿Has olvidado la contraseña?</span>
					</div>
					<div class="col-sm offset-sm-0 offset-2">
						<a class="" style=" font-size: 0.8em" href="passrecovery.php">Presiona aquí</a>

					</div>


				</div>
			</center>
		</div>
		<div id="justify-content-center my-3">
			<p class="text-white text-center">Tecnológico Nacional de México. Todos los Derechos reservados &copy 2020. <br> Desarrollado por el Instituto Tecnológico de Morelia</p>
		</div>
	</body>
	</html>