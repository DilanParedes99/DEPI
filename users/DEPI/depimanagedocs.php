<?php
    session_start();
    if(!isset($_SESSION['User']))
        header('Location: ../../index.php');
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
    <script src="../../js/depimanagedocs.js"></script>
    <title>Document</title>
</head>
<body>

    <?php 
    include '../../includes/tempnavdepi.php'; ?>
    <div class="container-fluid">
        <div class="row shadow text-white mt-0" style="background-color: #1B396A;">
            <div class="col-8 offset-2">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-light dropdown-toggle meta-category" val="all" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Todo</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item meta-item" href="#" id="meta-all" val="all">Todo</a>
                            <a class="dropdown-item meta-item" href="#" id="meta-contenido" val="contenido">Contenido</a>
                            <a class="dropdown-item meta-item" href="#" id="meta-autores" val="autores">Autores</a>
                            <a class="dropdown-item meta-item" href="#" id="meta-revistas" val="revistas">Revistas</a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Usuarios</a>
                        </div>
                    </div>
                    <input type="text" id="input-search" class="form-control" placeholder="Insertar palabras clave" aria-label="Insertar palabras clave" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-light " type="button" id="button-search">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        </div>
        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-6 search_results">
                    <?php include '../Admin/listDocs.php'; ?>
            <input type="hidden" value="<?= GET_[''] ?>">
            </div>
        </div>
    </div>
    <!-- Modal -->
<div class="modal-tesis modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col">
                                <span class="font-weight-light">Autor </span><br>
                                <span class="m-autorTes"></span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <span class="font-weight-light">Departamento </span><br>
                                <span class="m-departamentoTes"></span>
                            </div>
                            <div class="col">
                                <span class="font-weight-light">Nivel </span><br>
                                <span class="m-nivelTes"></span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <span class="font-weight-light">Fecha </span><br>
                                <span class="m-fechaTes"></span>   
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <span class="font-weight-light">ISBN</span><br>
                                <span class="m-isbnTes"></span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <span class="font-weight-light">Fecha de subida</span><br>
                                <span class="m-subidaTes"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <span class="font-weight-light">Abstract</span><br>
                                <span class="m-abstractTes"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-danger btn-delete" data-toggle="modal" data-target=".modal-confirm"><i class="fas fa-trash"></i></button>
                            </div>
                            <div class="col-1 align-self-end">
                                <button type="button" class="btn btn-secondary">Salir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-articulo modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col">
                                <span class="font-weight-light">Autor</span><br>
                                <span class="m-autorArt"></span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <span class="font-weight-light">Fecha</span><br>
                                <span class="m-fechaArt"></span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <span class="font-weight-light">Revista</span><br>
                                <span class="m-revistaArt"></span>
                            </div>
                            <div class="col">
                                <span class="font-weight light">Volumen</span><br>
                                <span class="m-volumenArt"></span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <span class="font-weight-light">DOI</span><br>
                                <span class="m-doiArt"></span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <span class="font-weight-light">Fecha de subida</span><br>
                                <span class="m-subidaArt"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <span class="font-weight light">Abstract</span><br>
                                <span class="m-abstractArt"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-danger btn-delete" data-toggle="modal" data-target=".modal-confirm"><i class="fas fa-trash"></i></button>
                            </div>
                            <div class="col-1 align-self-end">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-confirm" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">¿Esta seguro que quiere eliminar este documento?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Se eliminaran todos los datos relacionados con el documento y no se podra recuperar.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger btn-doc-delete" data-dismiss="modal">Eliminar</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>