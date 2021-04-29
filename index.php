<?php session_start(); ?>
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
    <link rel="shortcut icon" href="img/LogoTecNM Horizontal.png">

</head>
<body>
    <?php 
    include "./includes/navbar.php";
    ?>
    <!-- covid-->
    <div class="container mw-100" style="margin:0;padding:0;">
        <div class="row mw-100" style="margin:0;padding:0;">
                <img src="./img/covid.jpg" style="margin:0;padding:0;" alt="covid" class="img-fluid">
        </div>
    </div>
    <br><br>
    <div class="container mw-100">
    <div class="row row_mine">
        <div class="col-sm col_mine">
            <a href="./covid/sep.pdf" download>
                <img src="./img/covid19.jpg" alt="tecnm" class="img-fluid" style="height: 200px">
                <div class="centered_mine" >Comunicado SEP</div>
            </a>
        </div>
        <div class="col-sm col_mine">
           <a href="./covid/tecnm.pdf" download>
            <img src="./img/comunicado.jpg" alt="sep" class="img-fluid" style="height: 200px">
            <div class="centered_mine" ></div>
        </a>
    </div>
    <div class="col-sm col_mine">
        <a href="./covid/comunicado.pdf" download>
            <img src="./img/pandemia.jpg" alt="itm" class="img-fluid" style="height: 200px">
            <div class="centered_mine" >Comunicado ITM</div>
        </a>
    </div>
    <div class="col-sm col_mine">
        <a href="./covid/medidas.pdf" download>
            <img src="./img/hands.jpeg" alt="pan" class="img-fluid" style="height: 200px">
            <div class="centered_mine" >Linea de Acción</div>
        </a>
    </div>
</div>
</div>
<br><br>

    <div class="container mw-100" style="margin:0;padding:0;">
        <div class="row justify-content-center text-white mw-100" style="margin:0;padding:0;background-color:#186F78;">
            <div class="col">
            <h4 class="h1" style="font-weight:bold;margin-top:30px; text-align:center;">¡Bienvenido al REPOMICH!</h4>
            <div class="container py-4">
                <div class="text-center">
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/-aibr-V0W8Q" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            </div>
        </div>
    </div>

<!-- Carrousel -->
 <!--   
     <div class="fadeOut owl-carousel owl-theme custom1">
        <div class="item">
            <img src="./img/b2.png" alt="">
        </div>
        <div class="item">
            <img src="./img/b1.jpeg" alt="">
        </div>
        <div class="item">
            <img src="./img/b2.png" alt="">
        </div>
        <div class="item">
            <img src="./img/b1.jpeg" alt="">
        </div>
    </div>
-->




<div class="container container_mine" style="margin-bottom: 0px;">
    <div class="row row_mine">
        <div class="col-sm col_mine">
            <a href="./statistics.php">
                <img src="./img/g1.jpg" alt="g1" class="img-fluid">
                <div class="centered_mine">Estadísticas</div>
            </a>
        </div>
        <div class="col-sm col_mine">
            <a href="./showallarticles.php">
                <img src="./img/g2.jpg" alt="g2" class="img-fluid">
                <div class="centered_mine">Documentos</div>
            </a>
        </div>
        <div class="col-sm col_mine">
            <a href="./contact.php">
                <img src="./img/g3.jpg" alt="g3" class="img-fluid">
                <div class="centered_mine">Contacto</div>
            </a>
        </div>
    </div>
    <br>
    <br>

</div>

<div class="container" style="margin-bottom: 200px; width: 100%;">
    <div class="row justify-content-center mt-4 pt-2" style="background-color: rgb(238, 238, 238); width: 100%; margin: auto; border-radius: 1em 1em 0 0;">
		<h2 style="font-size: 2.5em; margin-bottom: 20px;"> Sitios de Interés </h2>
    </div>
    <div class="row justify-content-center mb-4" style="background-color: rgb(238, 238, 238); width: 100%; margin: auto; border-radius: 0 0 1em 1em;">
        <div class="">
            <a href="https://www.tecnm.mx/" target="_blank">
                <img class="sites" loading="lazy" src="img/TecNM.png" alt="TecNM" title="TecNM" class="img-fluid">
            </a>
        </div>				
        <div class="">
            <a href="http://www.itmorelia.edu.mx/" target="_blank">
                <img class="sites" loading="lazy" src="img/itm.png" alt="ITM" title="ITM" class="img-fluid">
            </a>
        </div>	
        <div>
			<a href="https://ecosistemaempresarialdemichoacan.com/" target="_blank">
				<img class="sites" loading="lazy" src="img/ECO.png" alt="ECO" title="ECO" class="img-fluid">
			</a>
		</div>		
    </div>
</div>
<?php 
include "./includes/footer.php";
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="./resources/owl/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel();
    });
    $('.custom1').owlCarousel({
        animateOut: 'bounceOutLeft',
        animateIn: 'bounceInRight',
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause:true,
        items:1,
        margin:400,
        stagePadding: 5,
        smartSpeed:450,
        loop: true,
        responsiveClass:true,
        responsive:{
            1000:{
                stagePadding: 170,
            }
        }
    });
</script>
</body>
</html>
