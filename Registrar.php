<?php
	require 'includes/dbconnection.php';
	$query="SELECT * FROM instituciones";
	$result=mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link rel="stylesheet" href="./resources/owl/animate.css">
    <link rel="stylesheet" href="./resources/owl/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./resources/owl/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  	 <script type="text/javascript">
        var jqclasic = $.noConflict(true);
    </script>
    <script
  		src="https://code.jquery.com/jquery-3.4.1.js"
  		integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
 		crossorigin="anonymous">
 	</script>
    <script src="./resources/owl/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/register.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/progressBar.css">
</head>
<body>
	   	<?php 
	        include "includes/navbar.php";
	    ?>
    <div class="container py-5" style="margin-bottom: 11em;">

    	
    	
    	<div class="row justify-content-center">
    	<div class="col-9 ">
	    	<form class="bg-light p-5">
	    		<div class=" form-row">
		    		<div class="form-group col-md-6 col-sm-12">
			    			<label for="tipo">Tipo de Cuenta:</label>
			    			<select class="form-control" id="tipo" onchange='change()'>
			    				<option selected disabled></option>
			    				<option>Estudiante</option>
			    				<option>Academico</option>
			    			</select>
			    	</div>
			    	<div id="type_error" class="text-left pr-3 "></div>
		    	</div>
		    	<div id="Form" style="display: none;">
	  			<div class="form-group has-warning">
	    			<label for="nombre">Nombre(s):</label>
	    			<input type="text" class="form-control form-control-warining" id="nombre" placeholder="Ingrese Nombre">
	    			<div id="name_error" class="text-left pr-3 "></div>
	  			</div>
	  			<div class="form-group">
	    			<label for="apellidos">Apellidos:</label>
	    			<input type="text" class="form-control" id="apellidos" placeholder="Ingrese Apellidos">
	    			<div id="lname_error" class="text-left pr-3 "></div>
	  			</div>


	  			<div class="form-row">
	  				<div class="form-group col-md-6 col-sm-12">
		    			<label for="gen">Sexo:</label>
		    			<select class="form-control" id="gen">
		    				<option selected disabled></option>
		    				<option>Hombre</option>
		    				<option>Mujer</option>
		    			</select>
		    			<!--<div id="inst_error" class="text-left"></div>-->
		    		</div>
		    		<div class="form-group col-md-6 col-sm-12">
		    			<label for="fecha">Fecha de Nacimiento:</label>
		    			<input type="date" class="form-control" id="fecha" placeholder="Ingrese Fecha de nacimiento" >
		    			<!--<div id="area_error" class="text-left"></div>-->
		    		</div>
	  			</div>
	  			<div id="Cambio" class="form-group">
	  				
	  			</div>
	  			<div class="form-group">
	    			<label for="correo">Correo:</label>
	    			<input type="email" class="form-control" id="correo" placeholder="Ingrese Correo">
	    			<div id="email_error" class="text-left pr-3 "></div>
	  			</div>
	  			<div class="form-group">
	    			<label for="tel">Telefono:</label>
	    			<input type="text" class="form-control" id="tel" placeholder="Ingrese Teléfono">
	    			<div id="tel_error" class="text-left pr-3 "></div>
	  			</div>
	  			<div class="form-row">
	  				<div class="form-group col-md-6 col-sm-12">
		    			<label for="inst">Institución:</label>
		    			<select class="form-control" id="inst">
		    				<option selected disabled></option>
		    				<!--<option>Instituto Tecnológico de Morelia</option>-->
		    				<?php
								while ($row=mysqli_fetch_array($result)) {

							?>
							<option value="<?php echo $row['nombre']?>"><?php echo $row['nombre']?></option>
							<?php
								}
							?>
		    			</select>
		    			<div id="inst_error" class="text-left"></div>
		    		</div>
		    		<div class="form-group col-md-6 col-sm-12">
		    			<label for="area">Carrera o Posgrado:</label>
		    			<select class="form-control" id="area">
		    				<option selected disabled></option>
		    				<option>Ingenieria Mecatrónica</option>
		    				<option>Ingenieria en Sistemas Computacionales</option>
		    				<option>Ingenieria Eléctrica</option>
		    				<option>Ingenieria Bioquimica</option>
		    				<option>Ingenieria Industrial</option>
		    				<option>Ingenieria en Materiales</option>
		    				<option>Ingenieria Mecánica</option>
		    				<option>Ingenieria Eléctrónica</option>
		    				<option>Ingenieria en Gestión Empresarial</option>
		    				<option>Maestría en Ingenieria Administrativa</option>
		    				<option>Maestría en Ingenieria Eléctrica</option>
		    				<option>Maestría en Sistemas Computacionales</option>
		    				<option>Maestría en Ciencias en Ingenieria Eléctrica</option>
		    				<option>Maestría en Ciencias en Ingenieria Electrónica</option>
		    				<option>Maestría en Ciencias en Metalurgia</option>
		    				<option>Doctorado en Ciencias de la Ingenieria</option>
		    				<option>Doctorado en Ciencias en Ingenieria Eléctrica</option>
		    			</select>
		    			<div id="area_error" class="text-left"></div>
		    		</div>
		    		
	  			</div>
	  			<div class="form-group">
	    				<label for="pass">Contraseña: <label class="text-muted">(Debe contener una mayúscula, una minúscula, un número y al menos 6 caracteres)*</label></label>
	    				<input type="password" class="form-control" id="pass">
	    				<div id="pass_error" class="text-left pr-3 "></div>
						<progress id="strength" max="100" value="0"></progress>
    					<p id="password-strength-text"></p>
	  			</div>
	  			<div class="form-group">
	    				<label for="pass2">Repita su contraseña:</label>
	    				<input type="password" class="form-control" id="pass2">
	    				<div id="repass_error" class="text-left pr-3 "></div>
	  			</div>
	  			<div id="password_error" class="text-left pr-3 ">
	  				
	  			</div>
	  			<div class=" col-4 col-sm-6 col-md-10 offset-sm-3 offset-md-5 offset-1 pt-3">
                    <input type="button" value="Registrar" class="btn btn-primary" id="send">
 				</div>
 				</div>
			</form>
		</div>
		</div>
    </div>
     <?php 
        include "./includes/footer.php";
    ?>

	<!-- Scripts para barra de progreso de contraseña -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>
   <script>
        var strength = {
            0: "Pésimo, recuerda no utilizar contraseñas comunes o muy cortas.",
            1: "Malo, recuerda no utilizar contraseñas comunes, añade más simbolos para que sea más compleja.",
            2: "Débil, añade más simbolos para que sea más compleja.",
            3: "Bueno, tienes una buena contraseña, pero podría ser mejor.",
            4: "Fuerte, una excelente contraseña."
        }

        var password = document.getElementById('pass');
        var text = document.getElementById('password-strength-text');

        password.addEventListener('input', function() {
            var val = password.value;
            var result = zxcvbn(val);

            // Update the text indicator
            if (val !== "") {
                text.innerHTML = "Nivel de seguridad: " + strength[result.score]; 
                var bar = document.getElementById("strength");
				bar.style.display = "block";

				if(!checkReq(val)){
					text.innerHTML = "Nivel de seguridad: Pésimo, recuerda cumplir los requisitos."; 
					bar.value = "0";
				}else{
					switch(result.score){
						case 0: 
							bar.value = "0";
							break;
						case 1: 
							bar.value = "25";
							break;
						case 2: 
							bar.value = "50";
							break;
						case 3: 
							bar.value = "75";
							break;
						case 4: 
							bar.value = "100";
							break;
					}
				}
            } else {
                text.innerHTML = "";
            }
        });

		// Revisar que se cumplan los requisitos "una mayúscula, una minúscula, un número y al menos 6 caracteres"
		function checkReq(inputtxt){
			if(/\d/.test(inputtxt) && /[A-Z]/.test(inputtxt) && /[a-z]/.test(inputtxt) && inputtxt.length >= 6) return true;
			else return false;
		}
    </script>
</body>
</html>