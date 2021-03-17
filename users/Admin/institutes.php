<?php
session_start();
include "../../includes/dbconnection.php";
mysqli_set_charset($conn,'utf8' );
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
        <style>
        .banner{
            align-items: center;
            justify-content: space-around;
            display: flex;
            float: none;
            height: 120px;
        }

        .banner img{
            max-height: 130%;
        }

        @media screen and (max-width: 800px) {
            .banner{
                height: 50px;
            }

            .toogle_search{
                width: 100%;
            }
        }
    </style>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Está seguro que quiere eliminar este usuario?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        Se eliminaran todos los datos relacionados con el usuario y no se podrán recuperar.
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-doc-delete" onclick="del()">Eliminar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
    </div>
</div>
</div>
</div>

<!-- First line navbar logos -->
<nav class="navbar navbar-expand-sm navbar-light">
    <div class="navbar-collapse collapsed banner">
       <img src="../../img/banner.jpg" class="img-fluid" alt="banner">
   </div>
</nav>
<!-- Second line of navbar -->
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #1B396A;">
    <button class="navbar-toggler" type="button" id="tog" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse w-100 dual-collapse2" id="navbarNav">
        <ul class="navbar-nav text-center w-100">
            <li class="nav-item w-100" style="text-align:center;">
                <a class="nav-link" href="../../index.php">Inicio</a>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 dual-collapse2" id="navbarNav">
        <ul class="navbar-nav text-center w-100">
            <li class="nav-item dropdown w-100">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Documentos</a>
                <div class="dropdown-menu w-100 text-center">
                    <a class="dropdown-item" href="../../showallarticles.php">Artículos</a>
                    <a class="dropdown-item" href="../../showallthesis.php">Tesis</a>
                    <a class="dropdown-item" href="#">Proyectos</a>
                </div>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 dual-collapse2" id="navbarNav">
        <ul class="navbar-nav mr-auto text-center w-100">
            <li class="nav-item w-100">
                <a class="nav-link w-100" href="../../statistics.php">Estadísticas</a>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 dual-collapse2" id="navbarNav">
        <ul class="navbar-nav mr-auto text-center w-100">
            <li class="nav-item w-100">
                <a class="nav-link" href="./negocios.php">Negocios Locales</a>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 dual-collapse2" id="navbarNav">
        <ul class="navbar-nav mr-auto text-center w-100">
            <li class="nav-item w-100">
                <a class="nav-link" href="http://icti.michoacan.gob.mx/">ICTI</a>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 dual-collapse2" id="navbarNav">
        <ul class="navbar-nav mr-auto text-center w-100">
            <li class="nav-item w-100">
                <a class="nav-link" href="../../contact.php">Contacto</a>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 dual-collapse2" id="navbarNav">
        <ul class="navbar-nav mr-auto text-center w-100">
            <li class="nav-item w-100">
                <a class="nav-link" href="../../admin.php">Mis documentos</a>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 dual-collapse2" id="navbarNav">
        <ul class="navbar-nav mr-auto text-center w-100">
            <li class="nav-item w-100">
                <a class="nav-link" href="../../logout.php">Cerrar Sesión</a>
            </li>
        </ul>
    </div>
    <form class="form-inline my-2 my-md-0" id="search">
        <input class="form-control" type="text" placeholder="Buscar">
    </form>
</nav>

<script>
    var flag = true;
    var element = document.getElementById("search");

    document.getElementById("tog").addEventListener("click", function(){
        flag ? element.classList.add("toogle_search") : element.classList.remove("toogle_search");
        flag = !flag;
    });
</script>
<br>

<div class="modal fade" id="exampleModalAG" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agrega una nueva Institución</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <form  class="mt-5"; id="contact-form" method="post" action="../../includes/addinstitute.php" role="form">
        <div class="controls">
            <div class="form-group">
                <label for="form_name">Nombre de la Institución *</label>
                <input id="form_name" type="text" name="name" class="form-control" placeholder="" required="required" data-error="Se requiere el nombre.">
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>

    </form>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
</div>
</div>
</div>
</div> 
<div class="container container_mine" style="margin-bottom: 200px;">
    <center><h2>Gestión de Instituciones</h2></center><br><br> 
    <button type="button" class="btn btn-primary tut" style="background-color: #1B396A; margin-bottom: 1em;" data-toggle="modal" data-target="#exampleModalAG">
        Agregar Institución
    </button>
    <div class="table-responsive">
        <table class="table">
            <thead style="background-color: #1B396A; color:#CeCeCe;">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Institución</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../../includes/dbconnection.php";
                $sql = "SELECT * FROM instituciones;";
                $query = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_array($query))
                {
                    echo "<tr>";
                    for($i=0; $i<2; $i++){
                        echo "<th scope=\"row\">".utf8_encode($row[$i])."</th>";
                    }
                    echo "<th scope=\"row\"><button id=\"".$row[0]."\" type=\"button\" class=\"btn btn-danger btn-delete\" data-toggle=\"modal\" data-target=\"#exampleModal\"><i class=\"fas fa-trash\"></i></button></i></th>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>



<?php 
include "../../includes/footer.php";
?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/47a5d5df4f.js" crossorigin="anonymous"></script>



<script>
       //noone has id -1
       var ids = -1;

       $(".btn-delete").click(function(){
           ids = this.id;
           console.log(ids);
       });

       function del(){
           window.location.href = "./dropInstitute.php?id=" + ids;
       }
   </script>

</body>
</html>

<?php
}else{
    header("Location: ./index.php");
    exit();
}
}else{
    header("Location: ./index.php");
    exit();
}
?>