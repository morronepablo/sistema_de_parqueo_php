<?php

global $pdo;
include ('../app/config.php');

$id             = $_GET['id_user'];
$nombres        = $_GET['nombres'];
$email          = $_GET['email'];
$password_user  = $_GET['password_user'];

// echo $nombres." - ".$email." - ".$password_user;

$sentencia = $pdo->prepare("
UPDATE tb_usuarios 
SET nombres=:nombres,
    email=:email,
    password_user=:password_user,
    fyh_actualizacion=:fyh_actualizacion
WHERE id=:id
"
);

$sentencia->bindParam(':nombres', $nombres);
$sentencia->bindParam(':email', $email);
$sentencia->bindParam(':password_user', $password_user);
$sentencia->bindParam(':fyh_actualizacion', $fechaHora);
$sentencia->bindParam(':id', $id);

if($sentencia->execute()) {
    echo "se actualizó correctamente";
    ?>
    <script>location.href = "index.php"</script>
    <?php
} else {
    echo "no se pudo actualizar el usuario";
}