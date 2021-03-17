<?php
session_start();
require '../includes/dbconnection.php';

mysqli_set_charset($conn,'utf-8');

$tipo = $_POST['tipo'];

//tipo de archivo a subir = tesis
if($tipo == 'tesis'){
    $titulo = mysqli_real_escape_string($conn,$_POST['titulo']);
    $autores = json_decode($_POST['autores']);
    $new_autores = json_decode($_POST['new_autores']);
    $asesor = mysqli_real_escape_string($conn,$_POST['asesor']);
    $fecha = mysqli_real_escape_string($conn,$_POST['fecha']);
    $nivel = mysqli_real_escape_string($conn,$_POST['nivel']);
    $numero = mysqli_real_escape_string($conn,$_POST['numero']);
    $departamento = mysqli_real_escape_string($conn,$_POST['departamento']);
    $abstract = mysqli_real_escape_string($conn,$_POST['abstract']);
    $user = mysqli_real_escape_string($conn,$_SESSION['User']);

    //lista de autores
    $str_autores = "";
    foreach($autores as $v){
        $escv = mysqli_real_escape_string($conn, $v);
        $str_autores = $str_autores. "(".$escv."),";
    }
    $str_autores = substr($str_autores,0,-1);
       
    $str_new_autores = "";
    foreach($new_autores as $v){
        $escv = mysqli_real_escape_string($conn, $v);
        $str_new_autores = $str_new_autores.$escv.",";
    }
    
    $str_new_autores = substr($str_new_autores,0,-1);
    $str_new_autores = stripslashes($str_new_autores);
    
    //Proceso de guardado de archivo
    $_POST["file_name"] = "";
    $_POST["target_file"] = "";
    

    if($target_file = upload_doc() != "0"){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $_POST['target_file'])){
            $file_name = $_POST["file_name"];
            $sql = "call ins_tesis('$titulo','$str_autores','$str_new_autores','$asesor',$fecha,'$nivel','$numero','$departamento','$abstract','$file_name',$user)";
            
            if(mysqli_query($conn,$sql))
                echo 'true';
            else echo "Surgio un problema al tratar de guardar el documento "; 
        }
    }
}
//tipo de archivo a subir = articulo
else if($tipo == 'articulo'){
    $titulo = mysqli_real_escape_string($conn,$_POST['titulo']);
    $autores = json_decode($_POST['autores']);
    $new_autores = json_decode($_POST['new_autores']);
    $revista = mysqli_real_escape_string($conn,$_POST['revista']);
    $volumen = mysqli_real_escape_string($conn,$_POST['volumen']);
    $abstract = mysqli_real_escape_string($conn,$_POST['abstract']);
    $doi = mysqli_real_escape_string($conn,$_POST['doi']);
    $fecha = mysqli_real_escape_string($conn,$_POST['fecha']);
    $user = mysqli_real_escape_string($conn,$_SESSION['User']);


    //lista de autores
    $str_autores = "";
    foreach($autores as $v){
        $escv = mysqli_real_escape_string($conn, $v);
        $str_autores = $str_autores. "(".$escv."),";
    }
    $str_autores = substr($str_autores,0,-1);
       
    $str_new_autores = "";
    foreach($new_autores as $v){
        $escv = mysqli_real_escape_string($conn, $v);
        $str_new_autores = $str_new_autores.$escv.",";
    }
    
    $str_new_autores = substr($str_new_autores,0,-1);
    $str_new_autores = stripslashes($str_new_autores);

    //Proceso de guardado de archivo
    $_POST["file_name"] = "";
    $_POST["target_file"] = "";
    
    if($target_file = upload_doc() != "0"){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $_POST['target_file'])){
            $file_name = $_POST["file_name"];
            $sql = "call ins_articulo('$titulo','$str_autores','$str_new_autores','$revista','$volumen','$abstract','$doi','$fecha','$file_name',$user)";

            if(mysqli_query($conn,$sql))
                echo 'true';
            else echo "Surgio un problema al tratar de guardar el documento ";; 
        }
    }
    
}
//tipo de archivo a subir = proyecto
else if($tipo == 'proyecto'){
    $titulo = mysqli_real_escape_string($conn,$_POST['titulo']);
    $lider = mysqli_real_escape_string($conn,$_POST['lider']);
    $new_lider = mysqli_real_escape_string($conn,$_POST['new_lider']);
    $autores = json_decode($_POST['autores']);
    $new_autores = json_decode($_POST['new_autores']);
    $financiado = str_replace(array("true","false"),array("1","0"),mysqli_real_escape_string($conn,$_POST['financiado']));
    $financiamiento = mysqli_real_escape_string($conn,$_POST['financiamiento']);
    $fecha_ini = mysqli_real_escape_string($conn,$_POST['fechaIni']);
    $fecha_fin = mysqli_real_escape_string($conn,$_POST['fechaFin']);
    $desc = mysqli_real_escape_string($conn,$_POST['desc']);
    $user = mysqli_real_escape_string($conn,$_SESSION['User']);
    //lista de colaboradores
    $str_autores = "";
    foreach($autores as $v){
        $escv = mysqli_real_escape_string($conn, $v);
        $str_autores = $str_autores. "(".$escv."),";
    }
    $str_autores = substr($str_autores,0,-1);
       
    $str_new_autores = "";
    foreach($new_autores as $v){
        $escv = mysqli_real_escape_string($conn, $v);
        $str_new_autores = $str_new_autores.$escv.",";
    }
    $str_new_autores = substr($str_new_autores,0,-1);
    $str_new_autores = stripslashes($str_new_autores);

    //Proceso de guardado de archivo
    $_POST["file_name"] = "";
    $_POST["target_file"] = "";
    if($target_file = upload_doc() != "0"){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $_POST["target_file"])){
            $file_name = $_POST["file_name"];
            $sql = "call ins_proyecto('$titulo','$lider','$new_lider','$str_autores','$str_new_autores','$financiado','$financiamiento','$fecha_ini','$fecha_fin','$desc','$file_name',$user)";
            if(mysqli_query($conn,$sql))
                echo 'true';
            else echo "Surgio un problema al tratar de guardar el documento ";; 
        }
    }else {
        echo "file error";
    }

}


//Generador de nombre de archivo aleatorio
function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

//Codigo que genera la ruta del archivo
function upload_doc(){
    $target_dir = "../docs/";
    $uploadOk = 1;
    $fileType = strtolower(pathinfo(basename($_FILES["file"]["name"]),PATHINFO_EXTENSION));
    $file_name = random_string(10) . "." . $fileType;
    $target = $target_dir . $file_name;

    while(file_exists($target)){
        $file_name = random_string(10) . "." . $fileType;
        $target = $target_dir . $file_name;
    }
    $_POST["file_name"] = $file_name;
    if($_FILES["file"]["size"] > 2000000){
        echo "archivo muy grande";
        $uploadOk = "0";
    }
    if($fileType != 'pdf'){
        echo "tipo de archivo no valido";
        $uploadOk = "0";
    }
    $_POST["target_file"] = $target;
    return $uploadOk;
}