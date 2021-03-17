<?php
require '../includes/dbconnection.php';
mysqli_set_charset($conn,'utf-8');
//echo 'asad';
//Se recibe el id del documento
if(isset($_POST['collab'])){
    $collab = mysqli_real_escape_string($conn,$_POST['collab']);

    //Se hace un select de todos los campos necesarios
    $sql = "SELECT ".
    "Nombre,Apellidos,Correo,Telefono,Area".
    " FROM usuario".
    " WHERE Id = '$collab' ";    

$result = mysqli_query($conn,$sql);
//echo mysqli_error($conn);
$row = mysqli_fetch_array($result);

//Se crean objetos del resultado de la query, posteriormente se convierten a json

    $collab_data = (object) array(
        'nombre'    => $row['Nombre'],
        'apellido'  =>  $row['Apellidos'],
        'correo'    =>  $row['Correo'],
        'telefono'  =>  $row['Telefono'],
        'area'      =>  $row['Area'],
    );



    echo json_encode($collab_data);
}