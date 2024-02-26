<?php

global $pdo;
include ('../app/config.php');

session_start();

$usuario_user   = $_POST['usuario'];
$password_user  = $_POST['password_user'];

$email_tabla    = '';
$password_tabla = '';

$query_login = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$usuario_user' AND password_user = '$password_user' AND estado = '1'");
$query_login->execute();
$usuarios = $query_login->fetchAll(PDO::FETCH_ASSOC);
foreach ($usuarios as $usuario) {
    $email_tabla    = $usuario['email'];
    $password_tabla = $usuario['password_user'];
}

if( ($usuario_user == $email_tabla) && ($password_user == $password_tabla) ) {
    ?>
        <div class="alert alert-success" role="alert">
            Usuario correcto...
        </div>
        <script>location.href = "principal.php";</script>
    <?php
    $_SESSION['usuario_sesion'] = $email_tabla;
} else {
    ?>
        <div class="alert alert-danger" role="alert">
            Usuario incorrecto...
        </div>
        <script>$('#password').val(""); $('#password').focus();</script>
    <?php
}

?>