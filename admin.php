<?php
    session_start();

    if(isset($_SESSION['User'])){
        if($_SESSION['tipo'] == "Administrador"){
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DEPI</title>
    <link rel="stylesheet" href="./resources/owl/animate.css">
    <link rel="stylesheet" href="./resources/owl/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./resources/owl/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main_style.css">
    <style>
        .col_mine a img{
            max-height: 320px;
        }
    </style>
</head>
<body>
    <?php 
        include "./includes/navbar.php";
    ?>
    <br>


    <div class="container container_mine" style="margin-bottom: 200px;">
        <center><h2>Panel de Administración</h2></center><br><br>   
        <div class="row row_mine">
            <div class="col-sm col_mine">
                <a href="./personal_files2.php">
                    <img src="./img/g2.jpg" alt="g2" class="img-fluid">
                    <div class="centered_mine">Documentos</div>
                </a>
            </div>
            <div class="col-sm col_mine">
                <a href="./users/Admin/users.php">
                    <img src="./img/p1.jpg" alt="p1" class="img-fluid">
                    <div class="centered_mine">Usuarios</div>
                </a>
            </div>
            <div class="col-sm col_mine">
                <a href="./users/Admin/institutes.php">
                    <img src="./img/p2.jpg" alt="g3" class="img-fluid">
                    <div class="centered_mine">Instituciones</div>
                </a>
            </div>
        </div>
        <br>
    </div>
    
    <?php 
        include "./includes/footer.php";
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

<?php
    }
    else{
        header("Location: ./index.php");
        exit();
    }
    }else{
        header("Location: ./index.php");
        exit();
    }
?>