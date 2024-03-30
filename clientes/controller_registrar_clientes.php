<?php

global $pdo;
include ('../app/config.php');


$nombres_cliente = $_GET['nombre_cliente'];
$dni_cliente = $_GET['dni'];
$placa_auto = strtoupper($_GET['placa']);


$sql = "SELECT * FROM tb_clientes WHERE placa_auto = '$placa_auto' ";
$query = $pdo->prepare($sql);
$query->execute();
$cliente = $query->fetch(PDO::FETCH_ASSOC);


if(!empty($cliente)) {
    echo 'existe cliente';
} else {
//    echo "no existe cliente";

    $sentencia = $pdo->prepare('INSERT INTO tb_clientes
                                (nombres_cliente,dni_cliente,placa_auto, fyh_creacion, estado)
                                VALUES ( :nombres_cliente,:dni_cliente,:placa_auto,:fyh_creacion,:estado)');

    $sentencia->bindParam(':nombres_cliente',$nombres_cliente);
    $sentencia->bindParam(':dni_cliente',$dni_cliente);
    $sentencia->bindParam(':placa_auto',$placa_auto);
    $sentencia->bindParam('fyh_creacion',$fechaHora);
    $sentencia->bindParam('estado',$estado_del_registro);

    if($sentencia->execute()){
        echo 'success';
    //header('Location:' .$URL.'/');
    }else{
        echo 'error al registrar a la base de datos';
    }
}


