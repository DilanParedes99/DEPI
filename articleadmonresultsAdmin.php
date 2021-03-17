<?php  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://kit.fontawesome.com/47a5d5df4f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/floatButton.css">
    <link rel="stylesheet" href="css/fileNotFound.css">
    <title>Artículos</title>
</head>
<body>
    <?php 
    session_start();
    if(isset($_SESSION['User'])){
        if($_SESSION['tipo'] == "Administrador"){
        include 'includes/navbar.php'; ?>
        <script>$('#search').hide()</script>        
        <div class="container-fluid">
            <div class="row shadow text-white mt-0" style="background-color: #1B396A;">
                <div class="col-8 offset-2">
                    <div class="input-group mb-3">
                        <input type="text" id="input-search" class="form-control" placeholder="Insertar palabras clave" aria-label="Insertar palabras clave" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-light " type="button" id="button-search">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">                
                <div class="col-xl-6 col-12 offset-xl-3">
                    <div class="search_results">
                        <?php 
                        require 'includes/dbconnection.php';
                        include 'load/loadallarticleadm.php';
                        ?>
                    </div>
                </div>
            </div>
            <a href="personal_files2.php" class="float-adm">
                <i class="fa fa-arrow-left my-float"></i>
            </a>
        </div>  
        <?php  
    }
}
    else
    {
        header('Location: index.php');
    }
    ?>  
</body>
</html>