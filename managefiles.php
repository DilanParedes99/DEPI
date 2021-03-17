<?php  

require 'includes/dbconnection.php';

if(isset($_POST["id"]))
{
	$id = $_POST['id'];
	$tipo = $_POST['tipo'];
	$sql = "CALL del_archivos('$id','$tipo')";
	$result = mysqli_query($conn,$sql);	

	if($tipo == '1')
	{
		header('Location: articleadmonresults.php');
	}

	else if ($tipo == '2')
	{		
		header('Location: thesisadmonresults.php');
	}
	else if ($tipo == '3')
	{
		header('Location: projectsadmonresults.php');
	}
}
else
	echo ":C";
?>