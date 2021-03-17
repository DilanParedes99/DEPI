<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Administración de documentos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
	<script src="https://kit.fontawesome.com/47a5d5df4f.js" crossorigin="anonymous"></script>
	<style>
		.cont{
			border-radius: 15px;
			background-color: #fdfdfd;
			-webkit-box-shadow: 3px 4px 30px -16px rgba(0,0,0,0.75);
			-moz-box-shadow: 3px 4px 30px -16px rgba(0,0,0,0.75);
			box-shadow: 3px 4px 30px -16px rgba(0,0,0,0.75);
			color: #3d3d3d;
		}
		.tut{
			margin-top: 40px;
			font-size: 30px;
			padding: 0.3em 1em;
			-webkit-box-shadow: 3px 4px 30px -10px rgba(0,0,0,0.75);
			-moz-box-shadow: 3px 4px 30px -10px rgba(0,0,0,0.75);
			box-shadow: 3px 4px 30px -10px rgba(0,0,0,0.75);
		}
		.modal-body{
			padding: 2em;
			padding-bottom: 3em;
		}

	</style>
</head>
<body>
	
	<?php 
	session_start();
	if(isset($_SESSION['User']))
	{
	require 'includes/dbconnection.php';	//Includes the database connection
	require 'includes/navbar.php'			//Includes the navbar
	?>

 
	<div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel" style="color: #3d3d3d; font-size: 25px; margin-left: 10px;">TUTORIAL</h5>
					<button type="button" id="btnClose" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="embed-responsive embed-responsive-21by9">
						<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/iHC1QAuEciA"></iframe>
					</div>
				</div>
				
			</div>
		</div>
	</div>


	<div class="container cont">	
		<div class="row mt-5 mb-xl-1 text-center"> <!-- The row for the title of the page. At an xl size, has a margin-bottom of 5 -->
			<div class="col">
				<h1 class="text-center mb-3"><br>Bienvenido al panel de administración de tus archivos</h1>	
				<br>			
			</div>
		</div> 
		<div class="row text-center">
			<div class=" col 12 mb-1">
				<div class="col-sm-12">
					<h2 class="text-center">Consultar Documentos <br></h2>
				</div>
				<div class="row">
					<div class="col-sm-4 col-12 mt-3"> <!-- Has an offset at an xl size of 2, md of 1, so that the ipad pro would look fine. -->
						<span style="font-size: 25px;">
							<a href="thesisadmonresults.php" style="color:#ac2144;"><i class="fas fa-book" style="font-size: 15vmin;"></i><br><br><p style="color: #3d3d3d; font-weight: bold;">Tesis</p></a>
						</span>					
					</div>
					<div class="col-sm-4 col-12 mt-3">
						<span style="font-size: 25px;">
							<a href="articleadmonresults.php" style="color:#ac2144;"><i class="fas fa-file" style="font-size: 15vmin;"></i><br><br><p style="color: #3d3d3d; font-weight: bold;" class="">Artículos</p></a>
						</span>				
					</div>
					<div class="col-sm-4 col-12 mt-3 mb-5">
						<span style="font-size: 25px;">
							<a href="projectsadmonresults.php" style="color:#ac2144;"><i class="fas fa-tasks" style="font-size: 15vmin;"></i><br><br><p style="color: #3d3d3d; font-weight: bold;" class="offset-xl-1">Proyectos</p></a>
						</span>					
					</div>
				</div>
			</div>			
			<div class="col-sm-4 col-12 mb-3 text-center">
				<h2 class="text-center">Subir Archivos <br></h2>				
				<div class="col-12 mt-4 mb-5 mr-3 text-xl-center">
					<span style="font-size: 25px;">
						<a href="DocUpload.php" style="color:#ac2144;"><i class="fas fa-upload" style="font-size: 15vmin;"></i><br><br><p style="color: #3d3d3d; font-weight: bold;" class="">Subir</p></a>
					</span>	
				</div>				
			</div>
		</div>

		<div class="row text-center text-xl-left">	<!-- The row for the options to be selected by the user. Tells what documents wants to administrate. At an xl size has the text aligned to the left. -->


		</div>
	</div>

	<div class="container d-flex justify-content-end"> 
		<button type="button" class="btn btn-primary tut" style="background-color: #1B396A; margin-bottom: 1em;" data-toggle="modal" data-target="#exampleModal">
			Ver tutorial
		</button>

	</div>
	<?php  
}
else
{
	header('Location: index.php');
}
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

<script> 
	/*$( document ).ready(function() {
		$('#exampleModal').modal('toggle')
	});
*/



</script>