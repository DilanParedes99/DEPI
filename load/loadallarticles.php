<?php  

//$sql = "SELECT titulo,autor,asesor,fecha,nivel,institucion,departamento,abstract,usuario,tesis.idTesis FROM docs LEFT JOIN tesis ON tesis.idTesis=docs.idTesis";
//$sql = "SELECT titulo,autor,revista,volumen,abstract,doi,fecha,articulos.idDoc FROM docs INNER JOIN articulos ON articulos.idDoc=docs.idDoc";
//$result = mysqli_query($conn,$sql);

$query = "SELECT * FROM `docs-autores` INNER JOIN autores on `docs-autores`.idAutor = `autores`.idAutor INNER JOIN articulos ON `docs-autores`.`idDoc` = articulos.idDoc";
$result2 = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result2))
{
	$IdArticle = $row['idDoc'];
	?>

	<div class="search_element row shadow-sm p-3 mb-3 mt-3 bg-white rounded">
		<div class="search_content col">
			<div class="row titulo">
				<div class="col font-weight-bold">					
					<a style="word-wrap:break-word" href="showarticles.php?id=<?= $IdArticle ?> "><?= $row['titulo'] ?> </a>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-4 col-12">
					<span style="word-wrap:break-word">Tipo: artículo</span>
				</div>
				<div class="col-xl-4 col-12">
					<span style="word-wrap:break-word">Autor: <?php
                        $name = $row['nombre']." ".$row['apellidos'];
                        echo $name;
                        ?></span>
				</div>
				<div class="col-xl-4 col-12">
					<span style="word-wrap:break-word">Revista: <?= $row['revista'] ?></span>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-6 col-12">
					<span style="word-wrap:break-word">Volumen: <?= $row['volumen'] ?></span>
				</div>
				<div class="col-xl-6 col-12">
					<span style="word-wrap:break-word">Fecha: <?= $row['fecha'] ?></span>
				</div>
			</div>
		</div>
	</div>

	<?php
}
?>