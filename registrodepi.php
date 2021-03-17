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
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script src="js/regdepi.js"></script>
</head>
<body>
   	 <?php 
        include "./includes/navbar.php";
    ?>
    <div class="container py-5  ">
    	
    	<div class="row justify-content-center">
    	<div class="col-9 ">
	    	<form class="bg-light p-5">
	  			<div class="form-group">
	    			<label for="nombre">Nombre(s):</label>
	    			<input type="text" class="form-control" id="nombre" placeholder="Ingrese Nombre">
	  			</div>
	  			<div class="form-group">
	    			<label for="apellidos">Apellidos:</label>
	    			<input type="text" class="form-control" id="apellidos" placeholder="Ingrese Apellidos">
	  			</div>
	  			<div class="form-group">
	    			<label for="correo">Correo:</label>
	    			<input type="email" class="form-control" id="correo" placeholder="Ingrese Correo">
	  			</div>
	  			<div class="form-group">
	    			<label for="tel">Telefono:</label>
	    			<input type="text" class="form-control" id="tel" placeholder="Ingrese Teléfono">
	  			</div>
	  			<div class="form-row">
	  				<div class="form-group  col-12">
		    			<label for="inst">Institución:</label>
		    			<select class="form-control" id="inst">
		    				<option selected></option>
		    				<option>Instituto Tecnológico de Morelia</option>
		    				<?php
								while ($row=mysqli_fetch_array($result)) {

							?>
							<option value="<?php echo $row['Nombre']?>"><?php echo $row['Nombre']?></option>
							<?php
								}
							?>
		    			</select>
		    		</div>
	  			</div>
	  			<div class="form-group">
	    				<label for="pass">Contraseña:</label>
	    				<input type="password" class="form-control" id="pass">
	  			</div>
	  			<div class="form-group">
	    				<label for="pass2">Repita su contraseña:</label>
	    				<input type="password" class="form-control" id="pass2">
	  			</div>
	  			<div class="col-sm-2 col-md-4 offset-sm-4  offset-md-5 mt-4">
                    <input type="button" value="Registrar" class="btn btn-primary" id="send">
 				</div>
			</form>
		</div>
		</div>
    </div>
     <?php 
        include "./includes/footer.php";
    ?>
   
</body>
</html>