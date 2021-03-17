<?php
    session_start();

    if(isset($_SESSION['User'])){
        if($_SESSION['tipo'] == "Administrador"){

            if(isset($_GET['id'])){
                include "../../includes/dbconnection.php";

                $id = mysqli_real_escape_string($conn, $_GET['id']);

                $sql = "DELETE FROM usuario WHERE idUsuario = '$id';";
                $query = mysqli_query($conn, $sql);

                header("Location: ./users.php");
                exit();

            }else{
                header("Location: ./index.php");
                exit();
            }
        }else{
            header("Location: ./index.php");
            exit();
        }
    }else{
        header("Location: ./index.php");
        exit();
    }