<form id="formulario" method="post" action="validarLog.php">
	<div class="form-group">
		<label for="user">Correo</label>
		<input class="form-control" type="text" name="user" placeholder="Ingresa tu correo" required >
	</div>

	<div class="form-group">
		<label for="pass">Contraseña</label>
		<input class="form-control" type="password" name="pass" placeholder="Ingresa tu Contraseña" required>
	</div>
	
	<input type="hidden" name="tipeOfUser" value="L">

	<div class="col-sm-2 col-md-4 offset-sm-4 offset-md-5 ">
        <input type="submit" value="Ingresar" class="btn btn-primary">
 	</div>
	
</form>