<?php

global $pdo;
include ('../app/config.php');

$nombre = $_GET['nombre'];

$sentencia = $pdo->prepare("
INSERT INTO tb_roles 
       ( nombre, fyh_creacion, estado) 
VALUES (:nombre,:fyh_creacion,:estado)
"
);

$sentencia->bindParam(':nombre', $nombre);
$sentencia->bindParam(':fyh_creacion', $fechaHora);
$sentencia->bindParam(':estado', $estado_del_registro);

if($sentencia->execute()) {
    echo "registro satisfactorio";
    ?>
    <script>location.href = "index.php"</script>
    <?php
} else {
    echo "no se pudo registrar el rol";
}