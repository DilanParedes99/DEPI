<?php session_start(); ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NEGOCIOS LOCALES</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='custom.css' rel='stylesheet' type='text/css'>
    <script src="https://kit.fontawesome.com/47a5d5df4f.js" crossorigin="anonymous"></script>

    <?php 
    include "./includes/navbar.php";
    ?>
</head>

<style>
.sites{                    /* Movimiento de los iconos al tocarlos*/
    -webkit-transition: all 0.5s ease-out;
    -moz-transition: all 0.5s ease;
    -ms-transition: all 0.5s ease;
    }
.sites:hover {
    -webkit-transform:scale(1.05);
    -moz-transform:scale(1.05);
    -ms-transform:scale(1.05);
    -o-transform:scale(1.05);
    transform:scale(1.05);
}

</style>

<body >

    <div class="container mw-100" style="background-color:#1A5D82;">
        <div class="row justify-content-center text-white py-5">
            <center>
            <h1 class="display-3" style="font-weight:bold;">Aliados Estratégicos</h1> <br>
            <hr style="color: white;  border-color: white;"><br><br>
            <div class="container mw-100">
                <div class="row row_mine">
                    <div class="col-sm col_mine sites">
                        <img src="./img/icti3.png" alt="icti" class="img-fluid" style="height: 200px">
                    </div>
                    <div class="col-sm col_mine sites">
                        <img src="./img/sedeamlab.png" alt="sedeam" class="img-fluid" style="height: 200px">
                    </div>
                    <div class="col-sm col_mine sites">
                         <img src="./img/ITM.jpeg" alt="tecnm" class="img-fluid" style="height: 200px">
                    </div>  
                </div> <br>
                <div class="row row_mine">
                    <div class="col-sm col_mine sites">
                        <img src="./img/itcoalcoman.png" alt="coalcoman" class="img-fluid" style="height: 200px">
                    </div>
                    <div class="col-sm col_mine sites">
                        <img src="./img/ituruapan.png" alt="uruapan" class="img-fluid" style="height: 200px">
                    </div>
                    <div class="col-sm col_mine sites">
                        <img src="./img/itvm.png" alt="itvm" class="img-fluid" style="height: 200px">
                    </div>  
                </div>
            </div>
            </center>
            
        </div>
    </div>



    <?php 
        include "./includes/footer.php";
    ?>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>

</body>
</html>