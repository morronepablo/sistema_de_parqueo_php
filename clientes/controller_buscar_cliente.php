<?php

global $pdo, $id_map;
include ('../app/config.php');

$placa = strtoupper($_GET['placa']);
$id_map = $_GET['id_map'];

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
        <label for="staticEmail" class="col-sm-4 col-form-label">Nombre: <span class="text-danger"><b>*</b></span></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nombre_cliente<?=$id_map;?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="staticEmail" class="col-sm-4 col-form-label">DNI: <span class="text-danger"><b>*</b></span></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="dni<?=$id_map;?>">
        </div>
    </div>
<?php
} else {
    // echo $nombres_cliente.' - '.$dni_cliente;
    ?>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-4 col-form-label">Nombre: <span class="text-danger"><b>*</b></span></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nombre_cliente<?=$id_map;?>" value="<?=$nombres_cliente;?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="staticEmail" class="col-sm-4 col-form-label">DNI: <span class="text-danger"><b>*</b></span></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="dni<?=$id_map;?>" value="<?=$dni_cliente;?>">
        </div>
    </div>
<?php
}

?>