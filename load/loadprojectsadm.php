<?php  

$Id = mysqli_real_escape_string($conn, $_SESSION['User']);
$sql = "SELECT titulo,fechaInicio,fechaFin,descripcion,url,proyectos.idDoc FROM docs INNER JOIN proyectos ON proyectos.idDoc=docs.idDoc WHERE idUsuario = '$Id'";
$result = mysqli_query($conn,$sql);
$uploaded = mysqli_num_rows($result);

if($uploaded != 0)
{
	while($row = mysqli_fetch_array($result))
	{
		$IdProyecto = $row['idDoc'];
		?>

		<div class="search_element row shadow-sm p-3 mb-3 mt-3 bg-white rounded">
			<div class="search_content col">
				<div class="row titulo">
					<div class="col font-weight-bold">					
						<a href="view_project.php?id=<?= $IdProyecto ?>"><?= $row['titulo'] ?> </a>
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<span>Tipo: Proyecto</span>
					</div>
					<div class="col-4">
						<span>Fecha de inicio: <?= $row['fechaInicio'] ?></span>
					</div>
					<div class="col-4">
						<span>Fecha de Fin: <?= $row['fechaFin'] ?></span>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

else
{
	?>
	<div class="row">
		<div class="col-sm-4 col-12 mt-5 align-self-center text-center">
			<div class="item" >
				<img src="img/FileNotFound.png" alt="" id="NotFoundImg">
			</div>
		</div>
		<div class="col-sm-8 col-12 mt-5">
			<p style="font-size: 30px; text-align: justify;">Aún no cuentas con proyectos subidos en tu perfil. <br> <a href="DocUpload.php?tipo=proyecto">¡Sube uno!</a></p>
		</div>
	</div>
	<?php
}

?>