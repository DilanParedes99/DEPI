<?php
include '../../includes/dbconnection.php';
mysqli_set_charset($conn,'utf-8');

$sql = "SELECT idDoc,titulo  FROM tesis;";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)){
   
    if($row['estado'] == 'Inactivo')
        
?>
<hr>
<div class="row mb-1 collab" user="<?= $row['Id']?>">
    <div class="col">
        <span><?=$row['idDoc']?></span>
    </div>
    <div class="col">
        <span><?=$row['titulo']?></span>
    </div>
    <div class="col">
        <span><?=$row['area']?></span>
    </div>
    <?php
    if($row['estado'] != 'Inactivo'){ ?>
    <div class="col-1">
        <button type="button" class="btn btn-sm btn-danger btn-delete " ><i class="fas fa-trash"></i></button>
    </div>
    <?php }else echo '<div class="col-1" > </div>' ?>
    <div class="col-1">
        <button type="button" class="btn btn-sm btn-success btn-show" ><i class="fas fa-eye"></i></button>
    </div>
</div>
<?php
}