<?php  
//$inicio = mysqli_real_escape_string($conn,$_GET['page']);
//$inicio = ($inicio - 1) 
//$sql = "SELECT titulo,autor,asesor,fecha,nivel,institucion,departamento,abstract,usuario,tesis.idTesis FROM docs LEFT JOIN tesis ON tesis.idTesis=docs.idTesis";
$sql = "SELECT titulo,autor,asesor,fecha,nivel,isbn,departamento,abstract,tesis.idDoc FROM docs INNER JOIN tesis ON tesis.idDoc=docs.idDoc  LIMIT $inicio, 10";

$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result))
{
	$IdTesis = $row['idDoc'];
	?>

	<div class="search_element row shadow-sm p-3 mb-3 mt-3 bg-white rounded">
		<div class="search_content col">
			<div class="row titulo">
				<div class="col font-weight-bold">					
					<a style="word-wrap:break-word" href="showthesis.php?id=<?= $IdTesis ?>"><?= $row['titulo'] ?> </a>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-4 col-12">
					<span style="word-wrap:break-word">Tipo: tesis</span>
				</div>
				<div class="col-xl-4 col-12">
					<span style="word-wrap:break-word">Fecha: <?= $row['fecha'] ?></span>
				</div>
				<div class="col-xl-4 col-12">
					<span style="word-wrap:break-word">Nivel: <?= $row['nivel'] ?></span>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<span style="word-wrap:break-word">Departamento: <?= $row['departamento'] ?></span>
				</div>
			</div>
		</div>
	</div>

	<?php
}
?>