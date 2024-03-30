<?php

global $pdo;
include ('../app/config.php');

$id = $_GET['id_user'];
$estado_inactivo = '0';

// echo $nombres." - ".$email." - ".$password_user;

$sentencia = $pdo->prepare("
UPDATE tb_usuarios 
SET estado=:estado,
    fyh_eliminacion=:fyh_eliminacion
WHERE id=:id
"
);

$sentencia->bindParam(':estado', $estado_inactivo);
$sentencia->bindParam(':fyh_eliminacion', $fechaHora);
$sentencia->bindParam(':id', $id);

if($sentencia->execute()) {
    echo "se eliminó correctamente";
    ?>
    <script>location.href = "index.php"</script>
    <?php
} else {
    echo "no se pudo eliminar el usuario";
}