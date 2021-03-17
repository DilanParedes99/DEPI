<?php 
    require '../includes/dbconnection.php';

    $Nombre=mysqli_real_escape_string($conn, $_POST['name']);
    

    // Filtro para confirmar que no están vacios los campos
    if(empty($Nombre)){
        header('Location: ../users/Admin/institutes.php');
    }else{
        mysqli_set_charset($conn,'utf8' );
        $sql = "INSERT INTO instituciones (nombre) VALUES ('$Nombre')";
        mysqli_query($conn, $sql);
    
        header('Location: ../users/Admin/institutes.php');
        exit();
    }