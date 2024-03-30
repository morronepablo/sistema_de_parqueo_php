<?php

global $pdo;
include ('../app/config.php');

$placa = strtoupper($_GET['placa']);

// echo $placa;

$id_cliente         = '';
$nombres_cliente    = '';
$dni_cliente        = '';


$query_buscars = $pdo->prepare("SELECT * FROM tb_clientes WHERE estado = '1' AND placa_auto = '$placa'");
$query_buscars->execute();
$buscars = $query_buscars->fetchAll(PDO::FETCH_ASSOC);
foreach ($buscars as $buscar) {
    $id_cliente         = $buscar['id_cliente'];
    $nombres_cliente    = $buscar['nombres_cliente'];
    $dni_cliente        = $buscar['dni_cliente'];
}

if($nombres_cliente == "") {
    // echo "el cliente es nuevo";
    ?>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nombre:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">DNI:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control">
        </div>
    </div>
<?php
} else {
    // echo $nombres_cliente.' - '.$dni_cliente;
    ?>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nombre:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="<?=$nombres_cliente;?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">DNI:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="<?=$dni_cliente;?>">
        </div>
    </div>
<?php
}

?>