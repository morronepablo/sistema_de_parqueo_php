<?php

global $pdo;
include ('../app/config.php');

$nombre_parqueo = $_GET['nombre_parqueo'];
$actividad_empresa = $_GET['actividad_empresa'];
$sucursal = $_GET['sucursal'];
$direccion = $_GET['direccion'];
$zona = $_GET['zona'];
$telefono = $_GET['telefono'];
$provincia = $_GET['provincia'];
$pais = $_GET['pais'];

$sentencia = $pdo->prepare('INSERT INTO tb_informaciones
(nombre_parqueo,actividad_empresa,sucursal,direccion,zona,telefono,provincia,pais, fyh_creacion, estado)
VALUES ( :nombre_parqueo,:actividad_empresa,:sucursal,:direccion,:zona,:telefono,:provincia,:pais,:fyh_creacion,:estado)');

$sentencia->bindParam(':nombre_parqueo',$nombre_parqueo);
$sentencia->bindParam(':actividad_empresa',$actividad_empresa);
$sentencia->bindParam(':sucursal',$sucursal);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':zona',$zona);
$sentencia->bindParam(':telefono',$telefono);
$sentencia->bindParam(':provincia',$provincia);
$sentencia->bindParam(':pais',$pais);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);

if($sentencia->execute()){
    echo 'success';
//header('Location:' .$URL.'/');
    ?>
    <script>location.href = "informaciones.php"</script>
    <?php
}else{
    echo 'error al registrar a la base de datos';
}