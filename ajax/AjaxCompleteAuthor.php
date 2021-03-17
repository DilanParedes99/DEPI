<?php

require '../includes/dbconnection.php';

$name = mysqli_real_escape_string($conn,$_POST['autor']);

$sql = "SELECT idAutor,CONCAT(nombre,' ',apellidos) as nom FROM autores WHERE MATCH(nombre,apellidos) AGAINST('$name')  LIMIT 5";
$result = mysqli_query($conn,$sql);
echo mysqli_error($conn);
while($row = mysqli_fetch_array($result))
echo '<a aut="'.$row['idAutor'].'" href="#" class="item-autor list-group-item list-group-item-action ">' .$row['nom']. '</a>';  
