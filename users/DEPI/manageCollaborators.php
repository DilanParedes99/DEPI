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
    <script src="../../js/managecollaborators.js"></script>
    <title>Colaboradores</title>
</head>
<body>
    <?php 
        include '../../includes/tempnavdepi.php'; ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 offset-2 shadow-sm rounded">
                    <div class="row mt-4">
                        <div class="col">
                            <span>Nombre(s)</span>
                        </div>
                        <div class="col">
                            <span>Apellidos</span>
                        </div>
                        <div class="col">
                            <span>Area</span>
                        </div>
                        <div class="col-1">Accion</div>
                        <div class="col-1"></div>
                    </div>
                    <?php include '../../load/loadcollaborators.php';?>
                </div>
            </div>
        </div>

     <!-- Modal de datos del colaborador    -->
<div class="modal-collab modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                <span class="font-weight-light">Nombre(s)</span><br>
                                <span class="m-nombre"></span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <span class="font-weight-light">Apellidos</span><br>
                                <span class="m-apellido"></span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <span class="font-weight-light">Area</span><br>
                                <span class="m-area"></span>
                            </div>                            
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <span class="font-weight-light">Correo</span><br>
                                <span class="m-email"></span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <span class="font-weight-light">Telefono</span><br>
                                <span class="m-tel"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-1 offset-11 align-self-end">
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
                <h5 class="modal-title">¿Esta seguro que quiere eliminar este colaborador?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Se eliminaran todos los datos relacionados con el colaborador y no se podra usar su cuenta.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger btn-del-collab" data-dismiss="modal" >Eliminar</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>