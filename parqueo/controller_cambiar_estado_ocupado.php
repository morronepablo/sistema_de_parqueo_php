<?php

global $pdo;
include ('../app/config.php');

$cuviculo = $_GET['cuviculo'];
$estado_espacio = 'OCUPADO';

// echo $nombres." - ".$email." - ".$password_user;

$sentencia = $pdo->prepare("
UPDATE tb_mapeos 
SET estado_espacio=:estado_espacio,
    fyh_actualizacion=:fyh_actualizacion
WHERE id_map=:id_map
"
);

$sentencia->bindParam(':estado_espacio', $estado_espacio);
$sentencia->bindParam(':fyh_actualizacion', $fechaHora);
$sentencia->bindParam(':id_map', $cuviculo);

if($sentencia->execute()) {
    echo "se actualizó correctamente";
    ?>
<!--    <script>location.href = "index.php"</script>-->
    <?php
} else {
    echo "no se pudo actualizar el usuario";
}