    <link rel="shortcut icon" href="img/LogoTecNM Horizontal.png">

    <style>
    .banner{
        align-items: center;
        justify-content: space-around;
        display: flex;
        float: none;
        height: 120px;
    }

    .banner img{
        max-height: 100%;
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

<!-- First line navbar logos -->
<nav class="navbar navbar-expand-sm navbar-light">
    <div class="navbar-collapse collapsed banner">
     <img src="./img/banner_mejorado.png" class="img-fluid" alt="banner">
 </div>
</nav>
<!-- Second line of navbar -->
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #1B396A; ">
    <button class="navbar-toggler" type="button" id="tog" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse w-100 dual-collapse2" id="navbarNav">
        <br>
        <ul class="navbar-nav mr-auto text-center w-100">
            <li class="nav-item w-100">
                <a class="nav-link" href="http://icti.michoacan.gob.mx/">
                    <img src="./img/icti.png" alt="ICTI" style="max-height: 55px;">
                </a>
            </li>
        </ul>
        <br>
    </div>
    <div class="navbar-collapse collapse w-100 dual-collapse2" id="navbarNav">
        <ul class="navbar-nav text-center w-100">
            <li class="nav-item w-100" style="text-align:center;">
                <a class="nav-link" href="./index.php">Inicio</a>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 dual-collapse2" id="navbarNav">
        <ul class="navbar-nav text-center w-100">
            <li class="nav-item dropdown w-100">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Documentos</a>
                <div class="dropdown-menu w-100 text-center">
                    <a class="dropdown-item " href="showallarticles.php">Artículos</a>
                    <a class="dropdown-item" href="showallthesis.php">Tesis</a>
                    <a class="dropdown-item" href="showallprojects.php">Proyectos</a>
                </div>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 dual-collapse2" id="navbarNav">
        <ul class="navbar-nav mr-auto text-center w-100">
            <li class="nav-item w-100">
                <a class="nav-link w-100 " href="./statistics.php">Estadísticas</a>
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
                <a class="nav-link" href="./contact.php">Contacto</a>
            </li>
        </ul>
    </div>
    <?php
    if (!(isset($_SESSION['User']))){
        ?>        
        <div class="navbar-collapse collapse w-100 dual-collapse2" id="navbarNav">
            <ul class="navbar-nav mr-auto text-center w-100">
                <li class="nav-item w-100">
                    <a class="nav-link" href="./login.php">Iniciar Sesión</a>
                </li>
            </ul>
        </div>
        <?php }
        else if($_SESSION['tipo']=="alumno" || $_SESSION['tipo']=="academico"){
            ?>
            <div class="navbar-collapse collapse w-100 dual-collapse2" id="navbarNav">
                <ul class="navbar-nav mr-auto text-center w-100">
                    <li class="nav-item w-100">
                        <a class="nav-link" href="./personal_files.php">Mis documentos</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-collapse collapse w-100 dual-collapse2" id="navbarNav">
                <ul class="navbar-nav mr-auto text-center w-100">
                    <li class="nav-item w-100">
                        <a class="nav-link" href="./modifyuser.php">Mis datos</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-collapse collapse w-100 dual-collapse2" id="navbarNav">
                <ul class="navbar-nav mr-auto text-center w-100">
                    <li class="nav-item w-100">
                        <a class="nav-link" href="./logout.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
          
        <?php
        }else {
        ?>
        <div class="navbar-collapse collapse w-100 dual-collapse2" id="navbarNav">
            <ul class="navbar-nav mr-auto text-center w-100">
                <li class="nav-item w-100">
                    <a class="nav-link" href="./admin.php">Panel de Administración</a>
                </li>
            </ul>
        </div>
        <div class="navbar-collapse collapse w-100 dual-collapse2" id="navbarNav">
            <ul class="navbar-nav mr-auto text-center w-100">
                <li class="nav-item w-100">
                    <a class="nav-link" href="./logout.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
        <?php
    }
    ?>

    <!--<form class="form-inline my-2 my-md-0" id="search">
        <input class="form-control" type="text" placeholder="Buscar">
    </form>
-->
</nav>

<script>
    var flag = true;
    var element = document.getElementById("search");

    document.getElementById("tog").addEventListener("click", function(){
        flag ? element.classList.add("toogle_search") : element.classList.remove("toogle_search");
        flag = !flag;
    });
</script>