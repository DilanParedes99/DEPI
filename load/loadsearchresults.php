<?php
//Arreglo que contiene los valores enviados desde el filtro avanzado
$array = json_decode($_GET['searchwords']);
$doctype = $_GET['doctype'];
$searchtype = $_GET['searchtype'];

//Generar string para busqueda con indices
$match = "+";
for($i = 0; $i < sizeof($array); $i++)
{
    $search_word = mysqli_real_escape_string($conn,$array[$i][1]);
            $match = $match ."$search_word ";
}
$match = $match . "' IN BOOLEAN MODE) ";

//Query de busqueda
$sql = "SELECT d.idDoc,tipo FROM docs d LEFT JOIN articulos a ON d.idDoc=a.idDoc LEFT JOIN tesis t ON t.idDoc=d.IdDoc LEFT JOIN proyectos p ON d.idDoc=p.idDoc LEFT JOIN `docs-autores` da ON d.idDoc=da.idDoc LEFT JOIN autores at ON da.idAutor=at.idAutor INNER JOIN usuario us ON d.idUsuario=us.idUsuario INNER JOIN instituciones ins ON us.idIns=ins.idIns WHERE";
if($doctype != "all"){
    $sql = $sql . " d.tipo='$doctype' AND (";      
}

//buscador simple
if($searchtype == 'smp')
{
    //la busqueda esta filtrada por tesis
    if($doctype == 'tesis' || $doctype == 'all')
    {
        $sql = $sql . " MATCH (t.titulo,t.abstract) AGAINST ('";
        $sql = $sql . $match;
    }
    //la busqueda no esta filtrada
    if($doctype == "all")
        $sql = $sql . " OR";
    //la busqueda esta filtrada por articulos
    if($doctype == 'articulo' || $doctype == "all")
    {
        $sql = $sql . " MATCH (a.titulo,a.abstract) AGAINST ('";
        $sql = $sql . $match;
    }
    if($doctype == "all")
        $sql = $sql . " OR";
    if($doctype == 'proyecto' || $doctype == "all"){
        $sql = $sql . " MATCH (p.titulo,p.descripcion) AGAINST('";
        $sql = $sql . $match;
    }
    //Busqueda en autores
    $sql = $sql . " OR";
    $sql = $sql . " MATCH (at.nombre,at.apellidos) AGAINST('";
    $sql = $sql . $match;
    //busqueda de instituciones 
    $sql = $sql . " OR";
    $sql = $sql . " MATCH (ins.nombre) AGAINST('";
    $sql = $sql . $match;

    if($doctype != "all"){
        $sql = $sql . " )";      
    }
    $sql = $sql . " GROUP BY d.idDoc";

}

//mostrar los resultados de la busqueda
$result = mysqli_query($conn,$sql);
//echo mysqli_error($conn);
while($row = mysqli_fetch_array($result)){
    $id = $row['idDoc'];
    if($row['tipo'] == "tesis"){
        $sqlin = "SELECT titulo, fecha, nivel, departamento FROM tesis WHERE idDoc = $id";
        $resultin = mysqli_query($conn,$sqlin);
        $rowin = mysqli_fetch_row($resultin);
?>
    
        <div class="search_element row shadow-sm p-3 mb-1 bg-white rounded">
            <div class="search_content col">
                <div class="row titulo">
                    <div class="col font-weight-bold">
                        <a href="showthesis.php?id=<?=$row['idDoc']?>"><?= $rowin[0] ?></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <span>Tipo: tesis</span>
                    </div>
                    <div class="col-2">
                        <span>Fecha: <?= $rowin[1] ?></span>
                    </div>
                    <div class="col-3">
                        <span>nivel: <?= $rowin[2] ?></span>
                    </div>
                    <!-- <div class="col-2 offset-3">
                        <a style="font-size:1.5rem" href="docs/<?=$row['url']?>"><i class="fas fa-file-pdf "></i></a>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col">
                        <span>Departamento: <?= $rowin[3] ?></span>
                    </div>
                </div>
            </div>
        </div>
<?php
    }else if($row['tipo'] == "articulo"){
        $sqlin = "SELECT titulo, fecha, revista, volumen FROM articulos WHERE idDoc = $id";
        $resultin = mysqli_query($conn,$sqlin);
        $rowin = mysqli_fetch_row($resultin);
        ?>
        <div class="search_element row shadow-sm p-3 mb-1 bg-white rounded">
            <div class="search_content col">
                <div class="row titulo">
                    <div class="col font-weight-bold">
                        <a href="showarticles.php?id=<?=$row['idDoc']?>"><?= $rowin[1] ?></a>
                    </div>
                </div>
                <div class="row datos1">
                    <div class="col">
                        <span>Autor: </span>
                    </div>
                    <div class="col">
                        <span>Fecha: <?= $rowin[2] ?></span>
                    </div>
                    <!-- <div class="col-2 offset-3">
                        <a style="font-size:1.5rem" href="docs/<?=$row['url']?>"><i class="fas fa-file-pdf "></i></a>
                    </div> -->
                </div>
                <div class="row datos2">
                    <div class="col">
                        <?php if($rowin[3] != ""){
                        ?>
                        <span>Revista: <?= $rowin[3] ?></span>
                        <span>Volumen: <?= $rowin[4] ?></span>
                        <?php
                        }?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    else if($row['tipo'] == "proyecto"){
        $sqlin = "SELECT titulo FROM proyectos WHERE idDoc = $id";
        $resultin = mysqli_query($conn,$sqlin);
        $rowin = mysqli_fetch_row($resultin);
        ?>
        <div class="search_element row shadow-sm p-3 mb-1 bg-white rounded">
            <div class="search_content col">
                <div class="row titulo">
                    <div class="col font-weight-bold">
                        <a href="showprojects.php?id=<?=$row['idDoc']?>"><?= $rowin[0] ?></a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
} 