<?php

global $pdo;
include ('../app/config.php');

$id_informacion     = $_GET['id_informacion'];
$nombre_parqueo     = $_GET['nombre_parqueo'];
$actividad_empresa  = $_GET['actividad_empresa'];
$sucursal           = $_GET['sucursal'];
$direccion          = $_GET['direccion'];
$zona               = $_GET['zona'];
$telefono           = $_GET['telefono'];
$provincia          = $_GET['provincia'];
$pais               = $_GET['pais'];

$sentencia = $pdo->prepare("
UPDATE tb_informaciones 
SET nombre_parqueo=:nombre_parqueo,
    actividad_empresa=:actividad_empresa,
    sucursal=:sucursal,
    direccion=:direccion,
    zona=:zona,
    telefono=:telefono,
    provincia=:provincia,
    pais=:pais,
    fyh_actualizacion=:fyh_actualizacion
WHERE id_informacion=:id_informacion
"
);

$sentencia->bindParam(':nombre_parqueo',$nombre_parqueo);
$sentencia->bindParam(':actividad_empresa',$actividad_empresa);
$sentencia->bindParam(':sucursal',$sucursal);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':zona',$zona);
$sentencia->bindParam(':telefono',$telefono);
$sentencia->bindParam(':provincia',$provincia);
$sentencia->bindParam(':pais',$pais);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_informacion',$id_informacion);

if($sentencia->execute()){
    echo 'success';
//header('Location:' .$URL.'/');
    ?>
    <script>location.href = "informaciones.php"</script>
    <?php
}else{
    echo 'error al registrar a la base de datos';
}