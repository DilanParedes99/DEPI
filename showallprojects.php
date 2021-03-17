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
    <script src="js/searchresult.js"></script>
	<title>Tesis</title>
</head>
<body>
    <?php 
    session_start();
    include 'includes/navbar.php'; 
    ?>
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
                    //$inicio = mysqli_real_escape_string($conn,$_GET['page']);
                    $pagina = (isset($_GET['page'])) ? $_GET['page'] : 1;
                    $inicio = ($pagina - 1)*10;
                    require 'includes/dbconnection.php';
                    include 'load/loadallprojects.php';
                    ?>
                    <input type="hidden" id="s-words" value='<?= $_GET['searchwords'] ?>'>
                </div>
                <div class="pagination">
                <?php
                    $sqlcount = "SELECT COUNT(proyectos.idDoc) as num FROM docs INNER JOIN proyectos ON proyectos.idDoc=docs.idDoc" ;
                    $resultcount = mysqli_query($conn,$sqlcount);
                    $rows = mysqli_fetch_array($resultcount);
                    $nrows = $rows['num'];
                    $pags = ($nrows % 10 == 0) ? ($nrows/10) : (floor($nrows/10) + 1) ;
                    $pagerange = ($pagina%10 == 0) ? floor(($pagina-1)/10)*10+1 : floor($pagina/10)*10+1;
                    
                ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-sm">
                            <?php $backvalue = ($pagina == 1) ? "disabled" : "" ; ?>
                            <li class="page-item <?= $backvalue ?>">
                            <a class="page-link" href="showallprojects.php?page=<?= ($pagina-1) ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                            </li>
                            <?php
                                for($i = $pagerange;$i < $pagerange + 10 && $i <= $pags;$i++){
                                    if($pagina%10 != 0 && $pagina/10 >= 1 && $i == $pagerange )
                                        echo '<li class="page-item "><a class="page-link" href="showallprojects.php?page='.($i-1).' ">'. ($i-1).'</a></li>';
                                    $pagvalue = ($i == $pagina) ? "active" : "";      
                                    echo '<li class="page-item '.$pagvalue.'"><a class="page-link" href="showallprojects.php?page='.$i.' ">'. $i.'</a></li>';
                                } ?>
                                <?php
                                if($pagina == $pagerange + 9)
                                    echo '<li class="page-item"><a class="page-link" href="showallprojects.php?page='.($pagerange+10).'">'.($pagerange+10).'</a></li>';
                                $pagerangemax = floor($pags/10)*10 + 1;
                                if($pagerange !=  $pagerangemax){
                                ?>
                                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="showallprojects.php?page=<?= $pags ?>"><?=$pags?></a></li>
                                <?php } ?>
                            <li class="page-item">
                            <a class="page-link" href="showallprojects.php?page=<?= ($pagina+1) ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>       
</body>
</html>