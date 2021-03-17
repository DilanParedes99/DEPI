<?php
if(isset($_POST['idoc'])){
    require '../includes/dbconnection.php';

    $id = mysqli_real_escape_string($conn,$_POST['idoc']);
    $sql = "DELETE FROM docs WHERE idDoc = '$id' ";
    if(mysqli_query($conn,$sql))
        echo 'true';
    else echo mysqly_error($conn);
}