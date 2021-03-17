<?php  

require 'includes/dbconnection.php';

if(isset($_POST["id"]))
{
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
	$sql = "CALL del_archivos('$id','$tipo')";
	$result = mysqli_query($conn,$sql);	

	if($tipo == '1')
	{
		header('Location: articleadmonresultsAdmin.php');
	}

	else if ($tipo == '2')
	{		
		header('Location: showallthesisAdmin.php');	
	}
	else if ($tipo == '3')
	{
		header('Location: showallprojectsAdmin.php');
	}
}
else
	echo ":C"; 
?>