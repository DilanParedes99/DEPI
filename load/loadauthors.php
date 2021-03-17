<?php


$sqlaut = "SELECT CONCAT(nombre,' ',apellidos) as nom FROM autores a INNER JOIN `docs-autores` da ON a.idAutor=da.idAutor INNER JOIN docs d on d.idDoc=da.idDoc
WHERE d.idDoc = $Id ";

$resultaut = mysqli_query($conn,$sqlaut);

;
while($rowaut = mysqli_fetch_array($resultaut))
    echo $rowaut['nom']."; ";