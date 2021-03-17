<?php

include '../includes/dbconnection.php';
mysqli_set_charset($conn,'utf8');

if(isset($_POST['user'])){
    $id = mysqli_real_escape_string($conn,$_POST['user']);
    $sql = "UPDATE usuario SET Estado = 'Inactivo' WHERE Id = '$id' ";
    if(mysqli_query($conn,$sql))
        echo "true";
    else echo mysqli_error($conn);
}