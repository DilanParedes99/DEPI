<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Visualizar archivos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
	<script src="https://kit.fontawesome.com/47a5d5df4f.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/floatButton.css">
</head>
<body>
	<?php 
	session_start();
	require 'includes/dbconnection.php';
	include "includes/navbar.php";
	
	
	$Id = mysqli_real_escape_string($conn, $_GET['id']);	
	$sql = "SELECT titulo,encargado,fechaInicio,fechaFin,descripcion,url,nombre,apellidos,proyectos.idDoc FROM docs LEFT JOIN proyectos ON proyectos.idDoc=docs.idDoc LEFT JOIN autores ON proyectos.encargado=autores.idAutor WHERE proyectos.idDoc = '$Id'";
	$resultado = mysqli_query($conn,$sql); 	

	while($row = mysqli_fetch_array($resultado))
	{
		$path = 'docs/'.$row['url'];	
		?>		
		<div class="container-fluid mt-xl-4">		
			<div class="row mt-3 px-xl-5">
				<div class="col-xl-4 col-12 px-xl-5">
					<!-- Title part -->
					<div class="row mt-3 px-1">					
						<div class="col-xl-11 col-12 align-self-center mt-xl-0 mt-2">
							<p class="text-justify font-weight-bold">Título</p>				
						</div>	

						<div class="col-xl-12 align-self-center ">
							<p class="text-justify" id = "titulo" style="word-wrap:break-word"><?=$row['titulo']?></p>				
						</div>					
					</div>
					<!--  -->

					<hr color="gray" style="border-top: 2px solid; color: #8D8D8D;">				


					<!-- Authors Part -->
					<div class="row px-1">							
						<div class="col-xl-1 align-self-center">
							<p class="text-left font-weight-bold"> Encargado </p>
						</div>	
					</div>

					<div class="row px-1">
						<div class="col-xl-12 align-self-center">
							<p class="text-justify" id = "titulo" style="word-wrap:break-word"><?=$row['nombre']." ".$row['apellidos']?></p>
						</div>	
					</div>
					<!--  -->

					<hr color="gray" style="border-top: 2px solid; color: #8D8D8D;">	
					
					<!-- advisor part -->
					<div class="row px-1">		
						<div class="col-xl-1 align-self-center">
							<p class="text-justify font-weight-bold"> Fecha de Inicio </p>
						</div>
					</div>	
					<div class="row px-1">
						<div class="col-xl-12 align-self-center">
							<?php  
							echo '<p class="text-justify text-truncate" id = "asesor" style="word-wrap:break-word">'.$row['fechaInicio'].'</p>';
							?>
						</div>
					</div>	
					<!--  -->

					<hr color="gray" style="border-top: 2px solid; color: #8D8D8D;">	

					<!-- Date's part -->
					<div class="row px-1">		
						<div class="col-xl-3 align-self-center">
							<p class="text-justify font-weight-bold">Fecha de Terminación </p>
						</div>
					</div>	
					<div class="row px-1">
						<div class="col-xl-12 align-self-center">
							<?php  
							echo '<p class="text-justify text-truncate" id = "fecha" style="word-wrap:break-word">'.$row['fechaFin'].'</p>';
							?>
						</div>
					</div>
					<!--  -->

					<hr color="gray" style="border-top: 2px solid; color: #8D8D8D;">

					<!-- Deparment part -->
					<div class="row px-1">		
						<div class="col-xl-3 align-self-center">
							<p class="text-justify font-weight-bold">Descripción</p>
						</div>
					</div>	
					<div class="row px-1">				
						<div class="col-xl-12 align-self-center">
							<?php  
							echo '<p class="text-justify text-truncate" id = "departamento" style="word-wrap:break-word">'.$row['descripcion'].'</p>';
							?>
						</div>					
					</div>
					<!--  -->

					<hr style="border-top: 2px solid; color: #8D8D8D;">
					
					<a href="showallthesis.php" class="float">
						<i class="fa fa-arrow-left my-float"></i>
					</a>
				</div>
				<div class="col-xl-8 col-12 px-xl-5">
					<a href="showallprojects.php" class="float">
						<i class="fa fa-arrow-left my-float"></i>
					</a>							
					<?php  
					echo '<embed src="'. $path .'" type="application/pdf" width="100%" height="800px" />';
					?>
				</div>
			</div>
		</div>
		<?php 
	} 
	?>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>