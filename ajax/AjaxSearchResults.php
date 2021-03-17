<?php

require '../includes/dbconnection.php';
$sql = "SELECT tipo,idLocal FROM docs";
$result = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_assoc($result))
 {
    if($row['tipo'] == 'tesis'){
        $resultInt = mysqli_query($conn,'SELECT * FROM tesis');
        $resultFetch = $resultInt ->fetch_assoc();
        echo "tesis".$resultFetch['idTesis']." ".$resultFetch['titulo'].$resultFetch['asesor']."<br>";
    }else if($row['tipo'] == 'articulo'){
        $resultInt = mysqli_query($conn, 'SELECT * FROM articulos');
        $resultFetch = $resultInt ->fetch_assoc();
        echo "articulo".$resultFetch['id_articulo']." ".$resultFetch['titulo'].$resultFetch['volumen']."<br>";
    }
    
    
 }

