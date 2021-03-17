<?php
	require '../includes/dbconnection.php';

if ($_POST["operacion"]==1) {
	$tipo=$_POST["tipo"];
	if($tipo=="Estudiante"){
			echo "<div class='form-group'>";
	    	echo      "<label for='Control'>Numero de Control:</label>";
	    	echo	  "<input type='text' class='form-control' id='Control' placeholder='Ingrese su Numero de Control'>";
	  		echo  "</div>";
	}
	else{
			echo "<div class='form-group'>";
	    	echo      "<label for='Expediente'>Expediente de CONACYT:</label>";
	    	echo	  "<input type='text' class='form-control' id='Expediente' placeholder='Ingrese su Expediente de CONACYT'>";
	  		echo  "</div>";

	  		echo "<div class='form-group'>";
	    	echo      "<label for='CVU'>CVU de TecNM:</label>";
	    	echo	  "<input type='text' class='form-control' id='CVU' placeholder='Ingrese su CVU de TecNM'>";
	  		echo  "</div>";
	}

}
else{

	if($_POST["clase"]=="E"){

		if(isset($_POST["correo"])){
			$nombre =	mysqli_real_escape_string($conn,$_POST["nombre"]);
			$apellidos = mysqli_real_escape_string($conn,$_POST["apellidos"]);
			$correo = mysqli_real_escape_string($conn,$_POST["correo"]);
			$gen = mysqli_real_escape_string($conn,$_POST["gen"]);
			$fecha = mysqli_real_escape_string($conn,$_POST["fecha"]);
			$correo = mysqli_real_escape_string($conn,$_POST["correo"]);
			$inst = mysqli_real_escape_string($conn,$_POST["inst"]);
			$area = mysqli_real_escape_string($conn,$_POST["area"]);
			$tel = mysqli_real_escape_string($conn,$_POST["tel"]);
			$type=mysqli_real_escape_string($conn,$_POST["type"]);
			$control=mysqli_real_escape_string($conn,$_POST["control"]);
			$pass = mysqli_real_escape_string($conn,$_POST["pass"]);
			$hash=md5($pass);
			$sql = "SELECT correo FROM usuario WHERE correo='$correo' ";
			$result = mysqli_query($conn,$sql);
			$num_row=mysqli_num_rows($result);
			if($num_row == "1"){
				echo "1";
			}

			else{
				
				mysqli_set_charset($conn,'utf8' );
				//if ($type=="Contribuidor") {
					//$sql = "INSERT INTO usuario (nombre,apellidos,ncontrol,correo,telefono,idIns,area,contrasena,estado)
					//VALUES ('$nombre','$apellidos','$control','$correo','$tel','$inst','$area','$hash','activo')";
				//}
				//else{
					$sql = "INSERT INTO usuario (nombre,apellidos,sexo,fechaNac,correo,ncontrol,telefono,idIns,area,contrasena,estado, tipou)
					VALUES ('$nombre','$apellidos','$gen','$fecha', '$correo','$control','$tel',1,'$area','$hash','activo', 'E')";
				//}
				//$sql1 = "INSERT INTO usuario (nombre,apellidos,ncontrol,correo,telefono,contrasena)
				//VALUES ('$nombre','$apellidos','$control','$correo','$tel','$hash')";
				
				if(mysqli_query($conn, $sql)){
					echo "2";
				}
			
			}

		}
	}

	if($_POST["clase"]=="A"){

		if(isset($_POST["correo"])){
			$nombre =	mysqli_real_escape_string($conn,$_POST["nombre"]);
			$apellidos = mysqli_real_escape_string($conn,$_POST["apellidos"]);
			$correo = mysqli_real_escape_string($conn,$_POST["correo"]);
			$gen = mysqli_real_escape_string($conn,$_POST["gen"]);
			$fecha = mysqli_real_escape_string($conn,$_POST["fecha"]);
			$inst = mysqli_real_escape_string($conn,$_POST["inst"]);
			$area = mysqli_real_escape_string($conn,$_POST["area"]);
			$tel = mysqli_real_escape_string($conn,$_POST["tel"]);
			$type=mysqli_real_escape_string($conn,$_POST["type"]);
			$exp=mysqli_real_escape_string($conn,$_POST["exp"]);
			$cvu=mysqli_real_escape_string($conn,$_POST["cvu"]);
			$pass = mysqli_real_escape_string($conn,$_POST["pass"]);
			$hash=md5($pass);
			$sql = "SELECT correo FROM usuario WHERE correo='$correo' ";
			$result = mysqli_query($conn,$sql);
			$num_row=mysqli_num_rows($result);
			if($num_row == "1"){
				echo "1";
			}

			else{
				
				mysqli_set_charset($conn,'utf8' );
				
				$sql = "INSERT INTO usuario (nombre,apellidos,sexo,fechaNac,correo,telefono,idIns,area,contrasena,estado,tipou)
					VALUES ('$nombre','$apellidos','$gen','$fecha','$correo','$tel',1,'$area','$hash','activo','A')";
				
				if(mysqli_query($conn, $sql)){
					$consulta = "SELECT idUsuario FROM usuario WHERE correo='$correo'";
					$result = mysqli_query($conn,$consulta);
					while ($row=mysqli_fetch_array($result)) {
						$UR=$row['idUsuario'];
					}
					$sql1 = "INSERT INTO academicos (idAcad,expediente,cvu)VALUES ('$UR','$exp','$cvu')";
					if(mysqli_query($conn, $sql1)){
						echo "2";
					}
				}
			
			}

		}
	}	

	else{
		//echo "error";
	}

}
?>