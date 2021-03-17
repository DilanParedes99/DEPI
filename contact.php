<?php session_start(); ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='custom.css' rel='stylesheet' type='text/css'>

    <?php 
    include "./includes/navbar.php";
    ?>
</head>
<body>
    <!-- Status modal -->
    <div  id="myModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="margin-top:30%;">
            <div class="modal-header">
                <h5 class="modal-title">Error</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Por favor llena todos los campos de manera correcta.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>
    

    <div class="container" style="margin-top: -1.5rem; margin-bottom:11em;">

        <div class="row">

            <div class="col-xl-8 offset-xl-2 py-5">

                <h1 class="text-center">¿Tienes alguna duda?</h1>
                <h1 class="text-center">CONTÁCTANOS
                </h1>                

                <form  class="mt-5"; id="contact-form" method="post" action="includes/contact1.php" role="form">

                    <div class="messages"></div>

                    <div class="controls">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name">Nombre *</label>
                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Por favor introduzca su nombre *" required="required" data-error="Se requiere el nombre.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_lastname">Apellidos *</label>
                                    <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Por favor introduzca su apellido *" required="required" data-error="Se requiere el apellido.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_email">Correo *</label>
                                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Por favor introduzca su correo *" required="required" data-error="Se requiere el correo.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_need">¿Qué necesitas? *</label>
                                    <select id="form_need" name="need" class="form-control" required="required" data-error="
                                    Por favor especifique su necesidad.">
                                    <option value=""></option>
                                    <option value="Request quotation">Duda sobre un artículo/tesis/proyecto</option>
                                    <option value="Request order status">Sugerencia</option>
                                    <option value="Request copy of an invoice">Solicitar información</option>
                                    <option value="Other">Otro</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_message">Mensaje *</label>
                                <textarea id="form_message" name="message" class="form-control" placeholder="" rows="4" required="required" data-error="Escriba su mensaje."></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12" style="display: flex; justify-content:center;">
                            <input type="submit" class="btn btn-success btn-send" value="Enviar mensaje" style="background-color: #1B396A; font-size:24px; border: none;" onclick="checkIfEmpty()">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-muted">
                            </div>
                        </div>
                    </div>

                </form>

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
    <script>
        //Check if inputs have content
        function checkIfEmpty(){
            var name = document.getElementById("form_name").value;
            var lname = document.getElementById("form_lastname").value;
            var email = document.getElementById("form_email").value;
            var need = document.getElementById("form_need").value;
            var message = document.getElementById("form_message").value;

            if(name == null || name == "" || lname == null || lname == empty || email == null || email == "" ||
               need == null || need == "" || message == null || message == "" || !validateEmail(email))
            {  
                $('#myModal').modal({
                    show: true
                });
            }else{
                alert("Datos Recibidos. Gracias por contactarnos");
            }


        }

        // Check email regex
        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }
    </script>
</body>
</html>