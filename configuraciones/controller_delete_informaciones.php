<?php

global $pdo;
include ('../app/config.php');

$id_informacion = $_GET['id_informacion'];
$estado_inactivo = '0';

// echo $nombres." - ".$email." - ".$password_user;

$sentencia = $pdo->prepare("
UPDATE tb_informaciones 
SET estado=:estado,
    fyh_eliminacion=:fyh_eliminacion
WHERE id_informacion=:id_informacion
"
);

$sentencia->bindParam(':estado', $estado_inactivo);
$sentencia->bindParam(':fyh_eliminacion', $fechaHora);
$sentencia->bindParam(':id_informacion', $id_informacion);

if($sentencia->execute()) {
    echo "se eliminó correctamente";
    ?>
    <script>location.href = "informaciones.php"</script>
    <?php
} else {
    echo "no se pudo eliminar el usuario";
}