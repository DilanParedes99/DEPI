<?php 
require '../includes/dbconnection.php';
$Correo=mysqli_real_escape_string($conn,$_POST['email']);
$CorreoRE= "repomichitm@gmail.com";


	// Filtro para confirmar que no están vacios los campos
if(empty($Correo)){
	header('Location: ../passrecovery.php');
	exit();
}else{
	$sql = "SELECT * FROM usuario WHERE correo='$Correo' ";
	$result = mysqli_query($conn,$sql);
	$rows = mysqli_fetch_array($result);
	echo $rows["correo"];
	$ncorreo=$rows["correo"];
	if($rows){
		echo "simon";

		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
		$ntoken= substr(str_shuffle($permitted_chars), 0, 10);
		echo $ntoken;

		$sql1 = "UPDATE usuario SET token='$ntoken' WHERE correo='$ncorreo'";
		$result1 = mysqli_query($conn,$sql1);	

		$header = 'From: ' . $CorreoRE . " \r\n";
		$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
		$header .= "Mime-Version: 1.0 \r\n";
		$header .= "Content-Type: text/plain";

		$mensaje = "Este mensaje fue enviado por REPOMICH para recuperar su contraseña. ";
		$mensaje .= "Esta es su contraseña temporal con la que podrá ingresar al REPOMICH: " . $ntoken . " \r\n";
		$mensaje .= "Esta contraseña es temporal, solo tendrá validez una unica vez, al momento de ingresar al REPOMICH porfavor revisar su contraseña o cambiarla en el apartado de DATOS PERSONALES. \r\n";
		$mensaje .= "Al momento de Iniciar Sesión en el Repomich, en el campo de contraseña, introduzca la contraseña que le hemos proporcionado. \r\n";
		$mensaje .= "Estamos a sus órdenes. \r\n";
		$mensaje .= "Atentamente REPOMICH. \r\n";
		$mensaje .= "Enviado el " . date('d/m/Y', time());

		$para = $ncorreo;
		$asunto = 'REPOMICH Recuperar contraseña';

		mail($para, $asunto, utf8_decode($mensaje), $header);

		header('Location: ../tokensend.php');
		exit();
	}
	else{
		header('Location: ../passrecovery.php');
	}

}