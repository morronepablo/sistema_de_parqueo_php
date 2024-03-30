<?php

global $pdo;
include ('../app/config.php');

$placa = $_GET['placa'];
$nombre_cliente = $_GET['nombre_cliente'];
$dni = $_GET['dni'];
$cuviculo = $_GET['cuviculo'];
$fecha_ingreso = $_GET['fecha_ingreso'];
$hora_ingreso = $_GET['hora_ingreso'];
$user_sesion = $_GET['user_session'];

$sentencia = $pdo->prepare('INSERT INTO tb_tickets
(placa_auto,nombre_cliente,dni,cuviculo,fecha_ingreso,hora_ingreso,user_sesion, fyh_creacion, estado)
VALUES ( :placa_auto,:nombre_cliente,:dni,:cuviculo,:fecha_ingreso,:hora_ingreso,:user_sesion,:fyh_creacion,:estado)');

$sentencia->bindParam(':placa_auto',$placa);
$sentencia->bindParam(':nombre_cliente',$nombre_cliente);
$sentencia->bindParam(':dni',$dni);
$sentencia->bindParam(':cuviculo',$cuviculo);
$sentencia->bindParam(':fecha_ingreso',$fecha_ingreso);
$sentencia->bindParam(':hora_ingreso',$hora_ingreso);
$sentencia->bindParam(':user_sesion',$user_sesion);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);

if($sentencia->execute()){
    echo 'success';
?>
    <script>location.href = "tickets/generar_ticket.php"</script>
<?php
}else{
    echo 'error al registrar a la base de datos';
}
