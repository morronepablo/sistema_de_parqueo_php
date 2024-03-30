<?php

global $URL, $pdo, $ano_actual, $mes_actual, $dia_actual;
include ('app/config.php');
include ('layout/admin/datos_usuario_sesion.php');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('layout/admin/head.php');?>
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">

    <!-- Navbar -->
    <?php include('layout/admin/menu.php');?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <br>
        <div class="container">
            <h2>Bienvenido al Sistema de Parqueo</h2>

            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Mapeo actual del parqueo</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="row">
                                <?php

                                $query_mapeos = $pdo->prepare("SELECT * FROM tb_mapeos WHERE estado = '1'");
                                $query_mapeos->execute();
                                $mapeos = $query_mapeos->fetchAll(PDO::FETCH_ASSOC);
                                $contador_mapeos = 0;
                                foreach ($mapeos as $mapeo) {
                                    $contador_mapeos    = $contador_mapeos + 1;
                                    $id_map             = $mapeo['id_map'];
                                    $nro_espacio        = $mapeo['nro_espacio'];
                                    $estado_espacio     = $mapeo['estado_espacio'];
                                    if($estado_espacio == "LIBRE") { ?>
                                        <div class="col">
                                            <center>
                                                <h2><?=$mapeo['nro_espacio'];?></h2>
                                                <button class="btn btn-success" style="width: 100%; height: 114px;" data-toggle="modal" data-target="#modal<?=$id_map?>">
                                                    <p><?=$mapeo['estado_espacio']?></p>
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modal<?=$id_map?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content text-left">
                                                            <div class="modal-header bg-success">
                                                                <h5 class="modal-title" id="exampleModalLabel">Ingreso del Vehículo</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group row">
                                                                    <label for="staticEmail" class="col-sm-2 col-form-label">Placa:</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text" style="text-transform: uppercase" class="form-control" id="placa_buscar<?=$id_map?>">
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <button class="btn btn-primary" id="btn_buscar_cliente<?=$id_map?>">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                                                            </svg>
                                                                            Buscar
                                                                        </button>
                                                                        <script>
                                                                            $('#btn_buscar_cliente<?=$id_map?>').click(function () {
                                                                                var placa = $('#placa_buscar<?=$id_map?>').val();

                                                                                if(placa == "") {
                                                                                    alert("Debe de completar el campo placa");
                                                                                    $('#placa_buscar<?=$id_map?>').focus();
                                                                                } else {
                                                                                    var url = 'clientes/controller_buscar_cliente.php';
                                                                                    $.get(url, {
                                                                                        placa:placa
                                                                                    }, function (datos) {
                                                                                        $('#respuesta_buscar_cliente<?=$id_map?>').html(datos);
                                                                                    });
                                                                                }
                                                                            });
                                                                        </script>
                                                                        
                                                                    </div>
                                                                </div>

                                                                <div id="respuesta_buscar_cliente<?=$id_map?>"></div>

                                                                <div class="form-group row">
                                                                    <label for="staticEmail" class="col-sm-4 col-form-label">Fecha de ingreso:</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="date" class="form-control" value="<?=$ano_actual.'-'.$mes_actual.'-'.$dia_actual;?>">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="staticEmail" class="col-sm-4 col-form-label">Hora de ingreso:</label>
                                                                    <div class="col-sm-8">
                                                                        <?php
                                                                            $hora_actual = date('H');
                                                                            $minutos_actual = date('i');
                                                                        ?>
                                                                        <input type="time" class="form-control" value="<?=$hora_actual.':'.$minutos_actual;?>">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                <button type="button" class="btn btn-primary">Imprimir ticket</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </center>
                                        </div>
                                    <?php
                                    }
                                    if($estado_espacio == "OCUPADO") { ?>
                                        <div class="col">
                                            <center>
                                                <h2><?=$mapeo['nro_espacio'];?></h2>
                                                <button class="btn btn-info">
                                                    <img src="<?=$URL;?>/public/imagenes/auto.png" width="60px" alt="">
                                                </button>
                                                <p><?=$mapeo['estado_espacio']?></p>
                                            </center>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <?php include('layout/admin/footer.php');?>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<?php include('layout/admin/footer_link.php');?>
</body>
</html>



