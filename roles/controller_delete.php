<?php

global $pdo;
include ('../app/config.php');

$id_rol = $_GET['id_rol'];
$estado_inactivo = '0';

// echo $nombres." - ".$email." - ".$password_user;

$sentencia = $pdo->prepare("
UPDATE tb_roles 
SET estado=:estado,
    fyh_eliminacion=:fyh_eliminacion
WHERE id_rol=:id_rol
"
);

$sentencia->bindParam(':estado', $estado_inactivo);
$sentencia->bindParam(':fyh_eliminacion', $fechaHora);
$sentencia->bindParam(':id_rol', $id_rol);

if($sentencia->execute()) {
    echo "se eliminó correctamente";
    ?>
    <script>location.href = "index.php"</script>
    <?php
} else {
    echo "no se pudo eliminar el rol";
}