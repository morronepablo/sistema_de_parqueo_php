<?php

global $pdo;

session_start();
if(isset($_SESSION['usuario_sesion'])) {
    $usuario_sesion = $_SESSION['usuario_sesion'];

    $query_usuario_sesion = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$usuario_sesion' AND estado = '1'");
    $query_usuario_sesion->execute();
    $usuarios_sesions = $query_usuario_sesion->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios_sesions as $usuarios_sesion) {
        $id_user_sesion = $usuarios_sesion['id'];
        $nombres_sesion = $usuarios_sesion['nombres'];
        $rol_sesion     = $usuarios_sesion['rol'];
        $email_sesion   = $usuarios_sesion['email'];
    }

} else {
    echo "para ingresar a esta plataforma debe iniciar sesion";
}

// echo "Bienvenido administrador";

?>
