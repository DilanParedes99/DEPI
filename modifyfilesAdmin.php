<?php  

require 'includes/dbconnection.php';

if(isset($_POST["id"]))
{

	$id = mysqli_real_escape_string($conn, $_POST['id']); 
	$tipo = mysqli_real_escape_string($conn, $_POST['tipo']);


	// Para los artículos
	if($tipo == '1')
	{
		$titulo = $_POST['titulo'];
		$fecha = $_POST['fecha'];
		$revista = $_POST['revista'];
		$volumen = $_POST['volumen'];	
	
		header('Location: articleadmonresultsAdmin.php');
		$sql = "UPDATE articulos SET titulo='$titulo', fecha='$fecha', revista = '$revista', volumen = '$volumen' 
		WHERE idDoc = '$id'";
		$result = mysqli_query($conn,$sql);	
	}
	
	// Para las tesis
	else if ($tipo == '2')
	{				
		$titulo = $_POST['titulo'];
		$asesor = $_POST['asesor'];
		$fecha = $_POST['fecha'];
		$nivel = $_POST['nivel'];
		$dpto = $_POST['departamento'];

		header('Location: showallthesisAdmin.php');	
		$sql = "UPDATE tesis SET titulo='$titulo', asesor='$asesor', fecha='$fecha', nivel = '$nivel', departamento='$dpto' 
		WHERE idDoc = '$id'";
		$result = mysqli_query($conn,$sql);	
	}

	else if($tipo == '3')
	{
		$titulo = $_POST['titulo'];
		$financiamiento = $_POST['financiamiento'];
		$fechaIni = $_POST['fechaInicio'];
		$fechaFin = $_POST['fechaFin'];			
		header('Location: showallprojectsAdmin.php');
		$sql = "UPDATE proyectos SET titulo='$titulo', financiamiento='$financiamiento', fechaInicio='$fechaIni', fechaFin = '$fechaFin' 
		WHERE idDoc = '$id'";
		$result = mysqli_query($conn,$sql);	
	}
}
else
	echo ":C";
?>