<?php
require 'includes/dbconnection.php';
session_start();

mysqli_set_charset($conn,'utf8' );
$usuario= mysqli_real_escape_string($conn, $_POST['user']);
$pass= mysqli_real_escape_string($conn, $_POST['pass']);
$token=$pass;
$type= mysqli_real_escape_string($conn,$_POST['tipeOfUser']);
$pass=md5($pass);

if($type == 'E'){	
	$sql = "SELECT * FROM usuario WHERE correo='$usuario' AND contrasena='$pass' AND tipou='E' OR token='$token'";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_num_rows($res);
	if($row == "1"){
		$rows = mysqli_fetch_array($res);
		$_SESSION['tipo'] = "alumno";
		$_SESSION['User']=$rows["idUsuario"];
		$sql1 = "UPDATE usuario SET token=NULL WHERE correo='$usuario'";
		$result1 = mysqli_query($conn,$sql1);			
		header("Location: personal_files.php");
	}
	else{
		header("Location: login.php");
	}
}

else if($type == 'A'){
	$sql = "SELECT * FROM usuario WHERE correo='$usuario' AND contrasena='$pass' AND tipou='A' OR token='$token'";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_num_rows($res);
	if($row == "1"){
		$rows = mysqli_fetch_array($res);
		$US=$rows["idUsuario"];
		$sql1 = "SELECT * FROM academicos WHERE idAcad='$US'";
		$res1=mysqli_query($conn,$sql1);
		$row1=mysqli_num_rows($res1);
		if($row1=="1"){
			$_SESSION['User']=$rows["idUsuario"];
			$_SESSION['tipo']="academico";
			$sql1 = "UPDATE usuario SET token=NULL WHERE correo='$usuario'";
			$result1 = mysqli_query($conn,$sql1);	
			header("Location: personal_files.php");
		}
		else{
			header("Location: login.php");
		}		
	}
	else{
		header("Location: login.php");
	}
}

else if($type == 'L'){
	$sql = "SELECT * FROM usuario WHERE correo='$usuario' AND contrasena='$pass' AND tipou='L' OR token='$token'";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_num_rows($res);
	if($row == "1"){
		$rows = mysqli_fetch_array($res);
		$_SESSION['User']=$rows["idUsuario"];
		$_SESSION['tipo']="Administrador";
		$sql1 = "UPDATE usuario SET token=NULL WHERE correo='$usuario'";
		$result1 = mysqli_query($conn,$sql1);	
		header("Location: admin.php");
	}
	else{
		header("Location: login.php");
	}
}

else{
	header("Location: login.php");
}

?>