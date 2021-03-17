<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/AdvFilters.js"></script>
</head>
<body>
<!--     
    <ul class="nav justify-content-end p-3 mb-2 bg-dark text-white" >
        <li class="nav-item">
            <a class="nav-link active" href="#">Active</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
    </ul> -->
     <?php include 'includes/navbar.php'; ?> 
     <script>$('#search').hide()</script>
    <div class="container">

        <div class="row mt-5 mb-2">
            <div class="col-1"></div>
            <div class="col">
            <h2>Busqueda avanzada</h2>
            <h5 class="font-weight-light">Seleccione la palabra que desea buscar y en donde desea buscarla, puede agregar mas palabras usando los operadores "Y/O/No"</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col">
                <span>Buscar la palabra:</span>            
            </div>
        </div>

        <div class="search-fields">
            <div class="row mt-2 mb-2 search_0 search-field">
                <div class="col-2">
                
                </div>
                <div class="col-8">
                    <div class="input-group">
                        <input type="text" class="form-control text-search" aria-label="Text input with dropdown button">
                        <!-- <div class="input-group-append"> -->
                            
                        <!-- </div> -->
                        <!-- <div class="input-group-append">
                            <span class="input-group-text">en</span>
                            <select class="custom-select select-search" id="inputGroupSelect01">
                                <option value="0" selected>Todos</option>
                                <option value="1">Titulo</option>
                                <option value="2">Autor</option>
                                <option value="3">Abstract</option>
                            </select>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="search-bottom"></div>
        </div>


        <div class="row opbtns mb-5">
            <div class="col-2"></div>
            <div class="col col-sm-1 mt-2"><button type="button" class="andbtn btn btn-light">Y...</button></div>
            <div class="col col-sm-1 mt-2"><button type="button" class="orbtn btn btn-light">O...</button></div>
            <div class="col col-sm-1 mt-2"><button type="button" class="notbtn btn btn-light">No...</button></div>            
        </div>       
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col">
                <input class="check_range" type="checkbox">  
                <span >Buscar en un rango de fechas de fechas</span>  
            </div> 

        </div>
        <div class="row mt-3 date_range invisible mb-3">
            <div class="col-2"></div>
            <div class="col col-sm-4">
                <span class="mr-4">Entre: </span>          
                <input class="mr-4" type="date" class="date" id="fecha-ini">
                </div>
            <div class="col offset-sm-0 offset-2">
                <span class="mr-4">y</span>
                <input class="mr-4" type="date" class="date" id="fecha-fin"> 
            </div>           
        </div>
        <div class="row">
            <div class="col offset-lg-9">
                <button type="button" class=" btn btn-secondary btn-lg btn-block btn-search">Buscar</button>
            </div>
        </div>
    </div>
</body>
</html>