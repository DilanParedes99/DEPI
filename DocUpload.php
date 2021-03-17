<?php 
    session_start();
    if(!isset($_SESSION['User']))
        header('Location: index.php');
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        var jqclasic = $.noConflict(true);
    </script>
    <script src="https://kit.fontawesome.com/47a5d5df4f.js" crossorigin="anonymous"></script>
    <script src="js/DocUploads.js"></script>
    <title>Subir Tesis</title>
</head>
<body>
    <?php 
    // session_start();
    include 'includes/navbar.php'; ?> 
     <script>$('#search').hide()</script>
    <div class="container">
        <div class="col-sm-1 offset-sm-1 mt-2">
            <button onclick="location.href='personal_files.php'" type="button" class="btn btn-primary btn-sm btn-block save"><i class="fas fa-chevron-left"></i></button>
        </div>
        <div class="shadow p-3 mb-5 mt-3 bg-white rounded col-10 offset-1">
            <div class="row">
                <div class="col mb-3">
                    <div class="label font-weight-bold">Tipo de documento a subir:</div>
                </div>
            </div>            
            <div class="row">
                <div class="col offset-0">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">

                        <?php 
                            $tesis = "";
                            $tesis2 = "";
                            $articulo = "";
                            $articulo2 = "";
                            $proyecto = "";
                            $proyecto2 = "";
                        if(isset($_GET['tipo'])){
                            switch($_GET['tipo']){
                                case "tesis":
                                    echo '<input type="hidden" value="1" id="state">';
                                    $tesis = "active";
                                    $tesis2 = "checked";
                                break;
                                case "articulo":
                                    echo '<input type="hidden" value="2" id="state">';
                                    $articulo = "active";
                                    $articulo2 = "checked";
                                break;
                                case "proyecto":
                                    echo '<input type="hidden" value="2" id="state">';
                                    $proyecto = "active";
                                    $proyecto2 = "checked";
                                break;
                            }            
                        }else echo '<input type="hidden" value="0" id="state">';
                        ?>
                        <label class="btn btn-secondary btn-lg btn-tesis <?= $tesis ?>">
                            <input type="radio" name="options" id="option1" autocomplete="off" <?= $tesis2 ?>> Tesis
                        </label>
                        <label class="btn btn-secondary btn-lg btn-article <?=$articulo?>">
                            <input type="radio" name="options" id="option2" autocomplete="off" <?= $articulo2 ?>> Articulo
                        </label>
                        <label class="btn btn-secondary btn-lg btn-project <?=$proyecto?>">
                            <input type="radio" name="options" id="option2" autocomplete="off" <?= $proyecto2 ?>> Proyecto
                        </label>
                    </div>                
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label class="font-weight-bold" for="">Seleccione el tipo de documento,rellene los campos y adjunte un documento en formato pdf</label>
                </div>
            </div>
            <!-- Forma para subir tesis -->
            <div class="tesisForm">    
                <form action="# ">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputTitle">Titulo</label>
                            <input type="text" class="form-control" id="inputTitleTes">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <label for="inputAutor">Autor(es)</label>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAutor">
                                <i class="fas fa-plus"></i>
                            </button>
                            <span id="err-autor"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <ul class="list-group list-group-horizontal lista-autor" >
                            </ul>
                        </div>
                    </div>
                    <div class="form-row">             
                        <div class="form-group col-sm">
                            <label for="InputAsesor">Asesor(es)</label>
                            <input type="text" class="form-control" id="inputAsesorTes">
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <label for="inputDateTes">Año de realizacion</label>
                            <input type="number" class="form-control" id="inputDateTes">
                        </div>
                        <div class="form-group col">
                            <label for="inputNivelTes">Nivel</label>
                            <select class="form-control" id="inputNivelTes">
                                <option value="Licenciatura">Licenciatura</option>
                                <option value="Maestria">Maestría</option>
                                <option value="Doctorado">Doctorado</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="inputDeptTes">Departamento</label>
                            <select class="form-control" name="" id="inputDeptTes">
                                <option value="Ciencias en ingenieria electronica">Ciencias en ingenieria electronica</option>
                                <option value="Ciencias en ingenieria electrica">Ciencias en ingenieria electrica</option>
                                <option value="Ciencias en metalurgia">Ciencias en metalurgia</option>
                                <option value="Ingenieria administrativa">Ingenieria administrativa</option>
                                <option value="Sistemas computacionales">Sistemas computacionales</option>
                                <option value="Ciencias de la ingenieria">Ciencias de la ingenieria</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputAbstractTes">Palabras claves</label>
                            <textarea class="form-control" style="resize: none" name="" id="inputAbstractTes" cols="30" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="exampleFormControlFile1">Recuerda solo subir la portada y el abstract de tu documento, este pasará por un proceso de revisión. En caso de contener más datos de los solicitados no podrá ser publicado.</label>
                            <input type="file" class="form-control-file" id="archivoTesis">  
                        </div>
                    </div>
                </form>
            </div>

            <!-- Forma para articulos -->
            <div class="articleForm" >
                <form action="#">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputTitleArt">Titulo</label>
                            <input type="text" class="form-control" id="inputTitleArt" >             
                        </div>        
                    </div>
                    <!-- Modal articulos -->
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <label for="inputAutor">Autor(es)</label>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAutor">
                                <i class="fas fa-plus"></i>
                            </button>
                            <span id="err-autor"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <ul class="list-group list-group-horizontal lista-autor" >
                            </ul>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="form-group col-sm ">
                            <label for="inputRevistaArt">Revista</label>
                            <input type="text" class="form-control" id="inputRevistaArt" >
                        </div>
                        <div class="form-group col-sm">
                            <label for="inputVolumenArt">Volumen</label>
                            <input type="text" class="form-control" id="inputVolumenArt" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <label for="inputDateArt">Fecha de realizacion</label>
                            <input type="date" class="form-control" id="inputDateArt">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputAbstractArt">Palabras clave</label>
                            <textarea class="form-control" style="resize: none" id="inputAbstractArt" cols="30" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="exampleFormControlFile1">Recuerda solo subir la portada y el abstract de tu documento, este pasará por un proceso de revisión. En caso de contener más datos de los solicitados no podrá ser publicado.</label>
                            <input type="file" class="form-control-file" id="archivoArticulo">  
                        </div>
                    </div>
                </form>            
            </div>
            <!-- Forma para subir proyectos -->
            <div class="projectForm" >
                <form action="#">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputTitleArt">Titulo</label>
                            <input type="text" class="form-control" id="inputTitleProy" >             
                        </div>        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <label for="inputAutor">Encargado de proyecto</label>
                            <button type="button" class="btn btn-primary project-add-leader-btn" data-toggle="modal" data-target="#modalAutor">
                                <i class="fas fa-plus"></i>
                            </button>
                            <span id="err-autor"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm colaborador">
                            
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <label for="inputAutor">Colaboradores</label>
                            <button type="button" class="btn btn-primary project-add-collab-btn" data-toggle="modal" data-target="#modalAutor">
                                <i class="fas fa-plus"></i>
                            </button>
                            <span id="err-autor"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <ul class="list-group list-group-horizontal lista-autor" >
                            </ul>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <div class="form-check">
                                <input class="form-check-input" checkedstate="false" type="checkbox" id="financiado">
                                <label class="form-check-label" for="defaultCheck1">
                                    Proyecto financiado
                                </label>
                                <input class="form-control" type="text" placeholder="Default input" id="inputFinanciado" style="display: none">
                            </div>
                        </div>
                        <!-- <div class="form-group col hidden">
                                <input class="form-control" type="text" placeholder="Default input">
                        </div>    -->
                        <div class="form-group col-sm">
                            <label for="inputDateIniProy">Fecha de inicio</label>
                            <input type="date" class="form-control" id="inputDateIniProy">
                        </div>
                        <div class="form-group col-sm">
                            <label for="inputDateFinProy">Fecha de terminacion</label>
                            <input type="date" class="form-control" id="inputDateFinProy">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputDescProy">Descripcion</label>
                            <textarea class="form-control" style="resize: none" name="" id="inputDescProy" cols="30" rows="8"></textarea>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="exampleFormControlFile1">Recuerda solo subir la portada y el abstract de tu documento, este pasará por un proceso de revisión. En caso de contener más datos de los solicitados no podrá ser publicado.</label>
                            <input type="file" class="form-control-file" id="archivoProy">  
                        </div>
                    </div>
                </form>            
            </div>
            <!-- Boton de guardado -->
            <div class="row">
                <div class="col-sm-2 offset-sm-10 ">
                    <button type="button" class="btn btn-primary btn-sm btn-block save">Guardar</button>
                </div>
            </div>

        </div>    
    </div>
    <!-- Modal de confirmacion de subida de archivo -->
    <div class="modal bd-example-modal-sm fade" id="modal-confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <span>El documento se subio correctamente</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-cnf" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de error en subida de archivo -->
    <div class="modal bd-example-modal-sm fade" id="modal-error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                Error
                </div>
                <div class="modal-body">
                    <span id="error-message"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-cnf" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal agregar autores -->
    <div class="modal" tabindex="-1" role="dialog" id="modalAutor">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar autor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col ">
                                    <input class="form-control" type="text" placeholder="Default input" id="buscarAutor">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="list-group" id="resultadosAutor">
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <span>Si no encuentra el autor en la lista use el boton de agregar</span>
                <button id="add-autor" type="button" class="btn btn-warning">Agregar</button>
            </div>
            </div>
        </div>
    </div>
</body>
</html>