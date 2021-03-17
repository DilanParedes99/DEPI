<?php 
    $Nombre=htmlspecialchars($_POST['name']);
    $Apellidos=htmlspecialchars($_POST['surname']);
    $Correo=htmlspecialchars($_POST['email']);
    $Necesidad=htmlspecialchars($_POST['need']);
    $Comentarios=htmlspecialchars($_POST['message']);

    // Filtro para confirmar que no están vacios los campos
    if(empty($Nombre) || empty($Apellidos) || empty($Correo) || empty($Necesidad) || empty($Comentarios)){
        header('Location: ../contacto.php');
        exit();
    }else{
        $header = 'From: ' . $Correo . " \r\n";
        $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
        $header .= "Mime-Version: 1.0 \r\n";
        $header .= "Content-Type: text/plain";
    
        $mensaje = "Este mensaje fue enviado por " . $Nombre . ",\r\n";
        $mensaje .= "Su e-mail es: " . $Correo . " \r\n";
        $mensaje .= "Mensaje: " . $Comentarios . " \r\n";
        $mensaje .= "Enviado el " . date('d/m/Y', time());
    
        $para = 'repomichitm@gmail.com';
        $asunto = 'Contacto Repositorio';
    
        mail($para, $asunto, utf8_decode($mensaje), $header);
    
        header('Location: ../index.php');
        exit();
    }