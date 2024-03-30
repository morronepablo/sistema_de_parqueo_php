<?php

global $pdo;
include ('../app/config.php');
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$id_user = $_POST['id_user'];
$rol = $_POST['rol'];

$sentencia = $pdo->prepare("
UPDATE tb_usuarios 
SET rol=:rol
WHERE id=:id
"
);

$sentencia->bindParam(':rol', $rol);
$sentencia->bindParam(':id', $id_user);

if($sentencia->execute()) {
    echo "se asignó el rol correctamente";
    ?>
    <script>location.href = "../roles/asignar.php"</script>
    <?php
} else {
    echo "no se pudo asignar el rol";
}