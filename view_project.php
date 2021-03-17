<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Visualizar proyectos</title>
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
	if(isset($_SESSION['User']))
	{
		require 'includes/dbconnection.php';
		include "includes/navbar.php";
		

		$Id = mysqli_real_escape_string($conn, $_GET['id']);
		$sql = "SELECT titulo,encargado,financiado,financiamiento,fechaInicio,fechaFin,descripcion,url,proyectos.idDoc FROM docs INNER JOIN proyectos ON proyectos.idDoc=docs.idDoc  WHERE proyectos.idDoc = '$Id'";
		$resultado = mysqli_query($conn,$sql); 	


		// Para sacar el autor del archivo 
		$sqlaut = "SELECT CONCAT(nombre,' ',apellidos) as nom FROM autores a INNER JOIN `docs-autores` da ON a.idAutor=da.idAutor INNER JOIN docs d on d.idDoc=da.idDoc
		WHERE d.idDoc = $Id ";

		$resultaut = mysqli_query($conn,$sqlaut);

		
		while($rowaut = mysqli_fetch_array($resultaut))			
		{
			while($row = mysqli_fetch_array($resultado))
			{
				$path = 'docs/'.$row['url'];
				?>		
				<div class="container mt-4">		
					<form method="POST" action="modifyfiles.php">
						<input type="hidden" name="tipo" value="3">
						<input type="hidden" name="id" value="<?=$Id?>">
						<div class="row mt-3 px-1">		
							<div class="col-xl-1 col-12">
								<a href="projectsadmonresults.php">
									<i class="fa fa-arrow-left my-float"></i>
								</a>
							</div>
							<div class="col-xl-11 col-12 align-self-center mt-xl-0 mt-2">
								<p class="text-justify font-weight-bold">Título</p>				
							</div>	
							<div class="col-xl-12 col-11">
								<input type="text" class="form-control col-xl-10 align-self-center offset-xl-1" id="inp-title" aria-describedby="emailHelp" placeholder="Ingrese un título válido" name="titulo" value="<?=$row['titulo']?>">	
							</div>
						</div>	
						<!--  -->
						<hr color="gray" style="border-top: 2px solid; color: #8D8D8D;">	
						<!--  -->
						<div class="row mt-3 px-1">							

							<div class="col-xl-11 col-12 align-self-center offset-xl-1">
								<p class="text-left font-weight-bold"> Encargado del proyecto </p>
							</div>

							<div class="col-xl-12 col-11">
								<input type="text" class="form-control col-xl-10 align-self-center offset-xl-1" id="inp-title" aria-describedby="emailHelp" placeholder="Ingrese un autor válido" value="<?=$rowaut['nom']?>" readonly>	
							</div>		
						</div>

						<hr color="gray" style="border-top: 2px solid; color: #8D8D8D;">

						<div class="col-xl-11 col-12 align-self-center offset-xl-1">
							<p class="text-left font-weight-bold"> Estado de financiado </p>
						</div>
						<?php 
						if($row['financiado'] == 1)
						{
							?>
							<div class="row mt-3 px-1">
								<div class="col-xl-12 col-11">																	
									<input type="text" class="form-control col-xl-10 align-self-center offset-xl-1" id="inp-title" aria-describedby="emailHelp" placeholder="Ingrese un autor válido" value="Se encuentra financiado" readonly>	
								</div>		
							</div>
							<hr color="gray" style="border-top: 2px solid; color: #8D8D8D;">

							<div class="col-xl-11 col-12 align-self-center offset-xl-1">
								<p class="text-left font-weight-bold"> Financiamiento </p>
							</div>

							<div class="col-xl-12 col-11">																	
								<input type="number" min="1" class="form-control col-xl-10 align-self-center offset-xl-1" id="inp-title" aria-describedby="emailHelp" name="financiamiento" placeholder="Ingrese un autor válido" value="<?=$row['financiamiento']?>">	
							</div>
							<?php 
						} 
						?>
						<?php  
						if ($row['financiado'] == 0)
						{
							?>
							<div class="row mt-3 px-1">
								<div class="col-xl-12 col-11">																	
									<input type="text" class="form-control col-xl-10 align-self-center offset-xl-1" id="inp-title" aria-describedby="emailHelp" placeholder="Ingrese un autor válido" value="No se financió" readonly>	
								</div>		
							</div>
							<div class="col-xl-12 col-11">																	
								<input class="form-control col-xl-10 align-self-center offset-xl-1" id="inp-title" aria-describedby="emailHelp" name="financiamiento" placeholder="Ingrese un autor válido" value=0 hidden>	
							</div>
							<?php 
						}
						?>						
						<hr color="gray" style="border-top: 2px solid; color: #8D8D8D;">			

						<div class="row mt-3 px-1">		
							<div class="col-xl-11 col-12 align-self-center offset-xl-1">
								<p class="text-justify font-weight-bold">Fecha de inicio</p>
							</div>

							<div class="col-xl-12 col-11">
								<input type="date" class="form-control col-xl-10 align-self-center offset-xl-1" id="inp-title" aria-describedby="emailHelp" placeholder="Ingrese la fecha de inicio del proyecto." name="fechaInicio" value="<?=$row['fechaInicio']?>">	
							</div>
						</div>	

						<hr color="gray" style="border-top: 2px solid; color: #8D8D8D;">

						<div class="row mt-3 px-1">		
							<div class="col-xl-11 col-12 align-self-center offset-xl-1">
								<p class="text-justify font-weight-bold">Fecha de Término</p>
							</div>

							<div class="col-xl-12 col-11">
								<input type="date" class="form-control col-xl-10 align-self-center offset-xl-1" id="inp-title" aria-describedby="emailHelp" placeholder="Ingrese la fecha de término del proyecto." name="fechaFin" value="<?=$row['fechaFin']?>">	
							</div>
						</div>		

						<hr color="gray" style="border-top: 2px solid; color: #8D8D8D;">				

						<div class="row mt-3 mb-5 px-1">		
							<div class="col-xl-11 col-12 align-self-center offset-xl-1">
								<?php  echo '<a href="'. $path.'" style="font-size: 25px; color: black;"> Ver Pdf </a>'; ?>	
							</div>					
						</div>	

						<div class="row mb-5">
							<div class="col-sm-2 offset-sm-5 ">
								<input type="submit" value="Guardar" class="btn btn-primary">
							</div>
						</div>

					</form>	

					<form action="managefiles.php" id="myFavoriteForm" method="POST">
						<input type="hidden" name="tipo" value="3">
						<input type="hidden" name="id" value="<?=$Id?>">
						<a href="#" class="float-del" id="delete-bn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">						
							<i class="fa fa-trash my-float"></i>
						</a>
					</form>				

					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Eliminar proyecto</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									¿Está seguro de que desea eliminarla?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
									<button type="button" class="btn btn-primary" id="delete-btn">Eliminar</button>
								</div>
							</div>
						</div>
					</div>		
				</div>
				<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

				<script>
					$("#delete-btn").bind('click', function(event) {
						$("#myFavoriteForm").submit();
					});
				</script>	

				<?php 
			} 
		}
	}
	else
	{
		header('Location: index.php');
	}
	?>
</body>
</html>