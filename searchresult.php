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
    <script src="js/searchresult.js"></script>
    <title>Document</title>
</head>
<body>
    

    <?php include 'includes/navbar.php'; ?>
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
            <div class="col-sm-3">
                <div class="row mt-4">
                    <div class="col-8 offset-1 shadow-sm rounded">
                        <span >Mostrando elementos:</span>
                        <div class="form-check my-1">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="allRadio" value="option1" <?php if($_GET['doctype'] == "all") echo 'checked' ?>>
                            <label class="form-check-label" for="exampleRadios1">
                                Todos los resultados
                            </label>
                        </div>
                        <div class="form-check my-1">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="articuloRadio" value="option2" <?php if($_GET['doctype'] == "articulo") echo 'checked' ?> >
                            <label class="form-check-label" for="exampleRadios2">
                                Articulos
                            </label>
                        </div>
                        <div class="form-check my-1">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="tesisRadio" value="option2" <?php if($_GET['doctype'] == "tesis") echo 'checked' ?> >
                            <label class="form-check-label" for="exampleRadios2">
                                Tesis
                            </label>
                        </div>    
                        <div class="form-check my-1">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="proyectoRadio" value="option2" <?php if($_GET['doctype'] == "proyecto") echo 'checked' ?> >
                            <label class="form-check-label" for="exampleRadios2">
                                Proyectos
                            </label>
                        </div>                     
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="search_results mt-4">
                    <?php 
                    require 'includes/dbconnection.php';
                    include 'load/loadsearchresults.php';
                    ?>
                    <input type="hidden" id="s-words" value='<?= $_GET['searchwords'] ?>'>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>