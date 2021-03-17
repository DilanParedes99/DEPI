<?php
	//$conn = new mysqli('localhost','root','','depi_test');
	require '../includes/dbconnection.php';
	session_start();
	$Us=mysqli_real_escape_string($conn,$_SESSION['User']);

		if(isset($_POST["correo"])){
			$nombre =	mysqli_real_escape_string($conn,$_POST["nombre"]);
			$apellidos = mysqli_real_escape_string($conn,$_POST["apellidos"]);
			$correo = mysqli_real_escape_string($conn,$_POST["correo"]);
			$gen = mysqli_real_escape_string($conn,$_POST["gen"]);
			$fecha = mysqli_real_escape_string($conn,$_POST["fecha"]);
			$correo = mysqli_real_escape_string($conn,$_POST["correo"]);
			$inst = mysqli_real_escape_string($conn,$_POST["inst"]);
			$sqlinst="SELECT idIns FROM instituciones WHERE nombre='$inst'";
					$resinst=mysqli_query($conn,$sqlinst);
					while ($row=mysqli_fetch_array($resinst)) {
						$idins=$row['idIns'];
					}
			$area = mysqli_real_escape_string($conn,$_POST["area"]);
			$tel = mysqli_real_escape_string($conn,$_POST["tel"]);
			$type=mysqli_real_escape_string($conn,$_POST["type"]);
			$tipo=mysqli_real_escape_string($conn,$_POST["tipo"]);
			if ($tipo=="A") {
				$exp=mysqli_real_escape_string($conn,$_POST["exp"]);
				$cvu=mysqli_real_escape_string($conn,$_POST["cvu"]);
			}
			else{
				$control=mysqli_real_escape_string($conn,$_POST["control"]);
			}
			
			$pass = mysqli_real_escape_string($conn,$_POST["pass"]);
			if ($pass!="") {
				$sqlpass="SELECT contrasena FROM usuario WHERE idUsuario='".$Us."'";
				$resultpass = mysqli_query($conn,$sqlpass);
				 while($row=mysqli_fetch_array($resultpass)){
					$actpass=$row['contrasena'];      		
				 }
				 	$hash=md5($pass);
					$sql = "SELECT correo FROM usuario WHERE idUsuario='".$Us."'";
					$result = mysqli_query($conn,$sql);
					while($row=mysqli_fetch_array($result)){
							$actcorreo=$row['correo'];      		
					}
					if ($correo!=$actcorreo) {
						 	$sql = "SELECT correo FROM usuario WHERE correo='$correo' ";
							$result = mysqli_query($conn,$sql);
							$num_row=mysqli_num_rows($result);
							if($num_row == "1"){
								echo "1";
							}
					else{
						mysqli_set_charset($conn,'utf8' );

						if ($tipo=="A") {
							$sqlinst="SELECT idIns FROM instituciones WHERE nombre='$inst'";
							$resinst=mysqli_query($conn,$sqlinst);
							while ($row=mysqli_fetch_array($resinst)) {
								$idins=$row['idIns'];
							}
							$sql = "UPDATE usuario SET nombre='$nombre',apellidos='$apellidos',sexo='$gen',fechaNac='$fecha',correo='$correo',telefono='$tel',idIns='$idins',area='$area',contrasena='$hash' WHERE idUsuario='".$Us."'";
							$sqlA= "UPDATE academicos SET expediente='$exp',cvu='$cvu'  WHERE idAcad='".$Us."'";
							if(mysqli_query($conn, $sql)){
								if (mysqli_query($conn,$sqlA)) {
									echo "2";
								}
						    }
						}
						else{
							$sqlinst="SELECT idIns FROM instituciones WHERE nombre='$inst'";
							$resinst=mysqli_query($conn,$sqlinst);
							while ($row=mysqli_fetch_array($resinst)) {
								$idins=$row['idIns'];
							}
							$sql = "UPDATE usuario SET nombre='$nombre',apellidos='$apellidos',sexo='$gen',fechaNac='$fecha',ncontrol='$control',correo='$correo',telefono='$tel',idIns='$idins',area='$area',contrasena='$hash' WHERE idUsuario='".$Us."'";
							if(mysqli_query($conn, $sql)){
							echo "2";
						    }
						}

							
						
						
					
					}

					}//cambio de correo
				else{
					mysqli_set_charset($conn,'utf8' );
					if ($tipo=="A") {
						$sqlinst="SELECT idIns FROM instituciones WHERE nombre='$inst'";
						$resinst=mysqli_query($conn,$sqlinst);
						while ($row=mysqli_fetch_array($resinst)) {
							$idins=$row['idIns'];
						}
						$sql = "UPDATE usuario SET nombre='$nombre',apellidos='$apellidos',sexo='$gen',fechaNac='$fecha',correo='$correo',telefono='$tel',idIns='$idins',area='$area',contrasena='$hash' WHERE idUsuario='".$Us."'";
						$sqlA= "UPDATE academicos SET expediente='$exp',cvu='$cvu'  WHERE idAcad='".$Us."'";
							if(mysqli_query($conn, $sql)){
								if (mysqli_query($conn,$sqlA)) {
									echo "2";
								}
						    }
					}
					else{
						$sqlinst="SELECT idIns FROM instituciones WHERE nombre='$inst'";
						$resinst=mysqli_query($conn,$sqlinst);
						while ($row=mysqli_fetch_array($resinst)) {
							$idins=$row['idIns'];
						}
						$sql = "UPDATE usuario SET nombre='$nombre',apellidos='$apellidos',sexo='$gen',fechaNac='$fecha',ncontrol='$control',correo='$correo',telefono='$tel',idIns='$idins',area='$area',contrasena='$hash' WHERE idUsuario='".$Us."'";
						if(mysqli_query($conn, $sql)){
							echo "2";
						}
					}
						
						
						
		    	}//no hay cambio de correo

		}//cambio de contraseña
		else{
			$sql = "SELECT correo FROM usuario WHERE idUsuario='".$Us."'";
			$result = mysqli_query($conn,$sql);
			while($row=mysqli_fetch_array($result)){
					$actcorreo=$row['correo'];      		
			}
			if ($correo!=$actcorreo) {
				 	$sql = "SELECT correo FROM usuario WHERE correo='$correo' ";
					$result = mysqli_query($conn,$sql);
					$num_row=mysqli_num_rows($result);
					if($num_row == "1"){
						echo "1";
					}
					else{
				
						mysqli_set_charset($conn,'utf8' );
						if ($tipo=="A") {
							$sqlinst="SELECT idIns FROM instituciones WHERE nombre='$inst'";
							$resinst=mysqli_query($conn,$sqlinst);
							while ($row=mysqli_fetch_array($resinst)) {
								$idins=$row['idIns'];
							}
							$sql = "UPDATE usuario SET nombre='$nombre',apellidos='$apellidos',sexo='$gen',fechaNac='$fecha',correo='$correo',telefono='$tel',idIns='$idins',area='$area' WHERE idUsuario='".$Us."'";
							$sqlA= "UPDATE academicos SET expediente='$exp',cvu='$cvu'  WHERE idAcad='".$Us."'";
							if(mysqli_query($conn, $sql)){
								if (mysqli_query($conn,$sqlA)) {
									echo "2";
								}
						    }
						}
						else{
							$sqlinst="SELECT idIns FROM instituciones WHERE nombre='$inst'";
							$resinst=mysqli_query($conn,$sqlinst);
							while ($row=mysqli_fetch_array($resinst)) {
								$idins=$row['idIns'];
							}
							$sql = "UPDATE usuario SET nombre='$nombre',apellidos='$apellidos',sexo='$gen',fechaNac='$fecha',ncontrol='$control',correo='$correo',telefono='$tel',idIns='$idins',area='$area' WHERE idUsuario='".$Us."'";
							if(mysqli_query($conn, $sql)){
							echo "2";
						}
						}
						
						
						
					
					}

				}//hay cambio de correo
				else{
					$sqlinst="SELECT idIns FROM instituciones WHERE nombre='$inst'";
					$resinst=mysqli_query($conn,$sqlinst);
					while ($row=mysqli_fetch_array($resinst)) {
						$idins=$row['idIns'];
					}
						mysqli_set_charset($conn,'utf8' );
						if ($tipo=="A") {
							$sqlinst="SELECT idIns FROM instituciones WHERE nombre='$inst'";
					$resinst=mysqli_query($conn,$sqlinst);
					while ($row=mysqli_fetch_array($resinst)) {
						$idins=$row['idIns'];
					}
							$sql = "UPDATE usuario SET nombre='$nombre',apellidos='$apellidos',sexo='$gen',fechaNac='$fecha',correo='$correo',telefono='$tel',idIns='$idins',area='$area' WHERE idUsuario='".$Us."'";
							$sqlA= "UPDATE academicos SET expediente='$exp',cvu='$cvu'  WHERE idAcad='".$Us."'";
							if(mysqli_query($conn, $sql)){
								if (mysqli_query($conn,$sqlA)) {
									echo "2";
								}
						    }
						}
						else{
							$sqlinst="SELECT idIns FROM instituciones WHERE nombre='$inst'";
					$resinst=mysqli_query($conn,$sqlinst);
					while ($row=mysqli_fetch_array($resinst)) {
						$idins=$row['idIns'];
					}
							$sql = "UPDATE usuario SET nombre='$nombre',apellidos='$apellidos',sexo='$gen',fechaNac='$fecha',ncontrol='$control',correo='$correo',telefono='$tel',idIns='$idins',area='$area' WHERE idUsuario='".$Us."'";
							if(mysqli_query($conn, $sql)){
							echo "2";
						}
						}
						
						
				
		    }//no hay cambio de correo
		}//no hay cambio de contraseña
	}



?>