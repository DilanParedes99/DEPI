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
<body>

    <div class="container mw-100">
        <div class="row justify-content-center text-white py-5" style="background-color:#1A5D82;">
            <center>
            <h1 class="display-3" style="font-weight:bold;">Red de negocios local</h1>
            <div class="container py-4">
                <div class="text-center">
                        <img src="img/¡ANUNCIATE CON NOSOTROS.png" class="img-fluid col-sm-12 col-md-5 col-lg-4 px-10" alt="Responsive image">
                </div>
            </div>
            </center>
        
            <div class="col-9">
                <blockquote class="blockquote text-center">
                    <p class="mb-0">En apoyo a la economía local, el Instituto Tecnológico de Morelia pone a disposición este espacio publicitario para fomentar el movimiento económico en el estado de Michoacán frente a la contingencia COVID-19.</p>
                </blockquote>
                <blockquote class="blockquote text-left px-4">
                    <p class="mb-0">Si desea formar parte de esta red de NEGOCIOS, por favor enviar un correo a <strong> repomichitm@gmail.com</strong> adjuntando:</p>
                    
                    </blockquote>
                    <ul class="list-unstyled px-5">
                    <li>a) Logotipo o nombre de la empresa</li>
                    <li>b) Contacto de email, telefono o página web</li>
                    <li>c) Domicilio</li>
                    </ul>
                
            </div>      
        </div>
    </div>

    <div class="container mt-4">
    <div class="row mb-4">
        <div class="col-sm-12 text-center">    
            <h1 class="lead" style="font-size: 58px;">Tipo de servicio</h1> 
        </div>      
    </div>
<!--     <div class="row mb-4">
        <div class="col-sm-12">
            <hr style="color: #0056b2; width: 100%;" />
            <p>Haga click en la categoría para ir a los negocios correspondientes</p>
        </div>  
    </div> -->
    <div class="row mb-4">
        <div class="col-sm-9">
            <a href="#alimentos" style="font-size: 1.50em;">
                <i class="fas fa-chevron-circle-right"></i> Alimentos
            </a>
        </div>
        <!-- <div class="col-sm-9">
            <a href="#audio" style="font-size: 1.5em;">
                <i class="fas fa-chevron-circle-right"></i> Audio y video
            </a>
        </div> -->
        <div class="col-sm-9">
            <a href="#computadoras" style="font-size: 1.5em;">
                <i class="fas fa-chevron-circle-right"></i> Computadoras
            </a>
        </div>
        <div class="col-sm-9">
            <a href="#otros" style="font-size: 1.5em;">
                <i class="fas fa-chevron-circle-right"></i> Otros servicios
            </a>
        </div>
    </div>
    <!-- Aquí van a ir los de Alimentos -->
    <div class="card-deck mb-4 pb-4" id="alimentos">
        <div class="col-12"><h1 style="font-size: 2.35rem;">Alimentos</h1></div>
        <div class="card">
            <img class="card-img-top" src="img/mordida.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><a href="https://www.facebook.com/claudiadelarenas">La Mordida</a></h5>
                    <p class="card-text">Av Acueducto 902, Centro histórico de Morelia, 58260 Morelia, Mich., México</p>
                    <p class="card-text">443 312 2718</p>
               </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="img/buffalocas.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><a href="https://www.facebook.com/Buffalucas-Morelia-193990940786886">BUFFALOCAS</a></h5>
                    <p class="card-text">Camelinas 639, 58070 Morelia, Mich., México</p>
                    <p class="card-text">2747474</p>
                </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="img/pariente.jpg" style="height: 65%;" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><a href="https://www.facebook.com/ElParienteT/?ref=br_rs">El Pariente</a></h5>
                    <p class="card-text">Perif. Paseo de la República, Zona Sin Asignación de Nombre de Colonia, Morelia, Mich., México</p>
                    <p class="card-text">443 506 8746</p>
              </div>
        </div>
    </div>
        <!-- Aquí van a ir los de Audio y Video -->
    <div style="display: none;" class="card-deck mb-4 pb-4" id="audio">
        <div class="col-12"><h1 style="font-size: 2.35rem;">Audio y Video</h1></div>
        <div class="card">
            <img class="card-img-top" src="img/b1.jpeg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
               </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="img/b2.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="img/b2.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
        </div>
    </div>
        <!-- Aquí van a ir los de Computadoras -->
    <div class="card-deck mb-4 pb-4" id="computadoras">
        <div class="col-12"><h1 style="font-size: 2.35rem;">Computadoras</h1></div>
        <div class="card">
            <img class="card-img-top" src="img/mipc.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><a href="https://www.facebook.com/mipc.com.mx">MI PC</a></h5>
                    <p class="card-text">Blvd. García de León 33, Chapultepec Sur, 58260 Morelia, Mich.</p>
                    <p class="card-text">33 4770 3209</p>
               </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="img/plaza.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><a href="https://www.facebook.com/plazadelatecnologia/">Plaza de la Tecnología</a></h5>
                    <p class="card-text">Valladolid 60, Centro histórico de Morelia, 58000 Morelia, Mich.</p>
                </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="img/reparacion.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><a href="https://www.facebook.com/reparacioncomputadorasmorelia/">Reparación de Computadoras</a></h5>
                    <p class="card-text">2 de Mayo, Col. Independencia, 58000 Morelia, Mich.</p>
                    <p class="card-text">443 284 2979</p>
              </div>
        </div>
    </div>
        <!-- Aquí van a ir los de Otros servicios -->
    <div class="card-deck mb-4 pb-4" id="otros">
        <div class="col-12"><h1 style="font-size: 2.35rem;">Otros servicios</h1></div>
        <div class="card">
            <img class="card-img-top" src="img/burbuja.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><a href="https://www.facebook.com/Lavander%C3%ADa-La-Burbuja-114203873608769">Lavandería "La Burbuja"</a></h5>
                    <p class="card-text">Alfonso Martínez Serrano 48-A, Morelia, Mexico 58000</p>
                    <p class="card-text">443 459 5215</p>
               </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="img/yorch.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><a href="https://www.facebook.com/abarrotes-vinos-cerveza-y-licores-el-yorch-265876783439346/">Abarrotes "YORCH"</a></h5>
                    <p class="card-text">Calle Sta María de los Urdiales 1030-1044, Las Margaritas, 58160 Morelia, Mich., México</p>
                    <p class="card-text">443 327 3452</p>
                </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="img/interfit.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><a href="https://www.facebook.com/InterfitnessGymSpa/">Interfitness</a></h5>
                    <p class="card-text">Juan de Medina Rincón 94, La Rinconada, 58270 Morelia, Mich., México</p>
                    <p class="card-text">443 315 2040</p>
              </div>
        </div>
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