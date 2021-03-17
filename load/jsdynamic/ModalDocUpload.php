
<?php 
if($_GET['add']=="True"){

echo 
'<form action="#">
        <div class="form-row">
            <div class="form-group col">
                <button id="regresar" type="button" class="btn btn-light">Regresar</button>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="">Nombre</label>                    
                <input id="nombre-autor" class="form-control" type="text">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="">Apellidos</label>                    
                <input id="apellido-autor" class="form-control" type="text">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="">Sexo</label>
                <select id="sexo-autor" class="form-control">
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                </select>
            </div>
        </div>
</form>';
 
}else if($_GET['add']=="False"){

echo '<div class="row">
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
    </div>';
}
