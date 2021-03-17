<?php  
$sql = "SELECT proyectos.idDoc,titulo,fechaInicio,fechaFin,descripcion FROM docs INNER JOIN proyectos ON proyectos.idDoc=docs.idDoc  LIMIT $inicio, 10";

$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result))
{
	$IdProyecto = $row['idDoc'];
	?>

	<div class="search_element row shadow-sm p-3 mb-3 mt-3 bg-white rounded">
		<div class="search_content col">
			<div class="row titulo">
				<div class="col font-weight-bold">					
					<a style="word-wrap:break-word" href="view_projectAdmin.php?id=<?= $IdProyecto ?>"><?= $row['titulo'] ?> </a>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-4 col-12">
					<span style="word-wrap:break-word">Tipo: Proyecto</span>
				</div>
				<div class="col-xl-4 col-12">
					<span style="word-wrap:break-word">Fecha de inicio: <?= $row['fechaInicio'] ?></span>
				</div>
				<div class="col-xl-4 col-12">
					<span style="word-wrap:break-word">Fecha de término: <?= $row['fechaFin'] ?></span>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>