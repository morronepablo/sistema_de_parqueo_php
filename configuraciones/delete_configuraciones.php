<?php
global $pdo;
include ('../app/config.php');
include ('../layout/admin/datos_usuario_sesion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('../layout/admin/head.php');?>
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">

    <!-- Navbar -->
    <?php include('../layout/admin/menu.php');?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <br>
        <div class="container">
            <h2>Eliminación de la información</h2>

            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-danger">
                        <div class="card-header">
                            <h3 class="card-title">¿Esta seguro de eliminar este registro?</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <?php
                        $id_informacion_get = $_GET['id'];
                        $query_informaciones = $pdo->prepare("SELECT * FROM tb_informaciones WHERE estado = '1' AND id_informacion = '$id_informacion_get'");
                        $query_informaciones->execute();
                        $informaciones = $query_informaciones->fetchAll(PDO::FETCH_ASSOC);
                        $contador_informaciones = 0;
                        foreach ($informaciones as $informacione) {
                            $contador_usuario = $contador_informaciones + 1;
                            $id_informacion = $informacione['id_informacion'];
                            $nombre_parqueo = $informacione['nombre_parqueo'];
                            $actividad_empresa = $informacione['actividad_empresa'];
                            $sucursal = $informacione['sucursal'];
                            $direccion = $informacione['direccion'];
                            $zona = $informacione['zona'];
                            $telefono = $informacione['telefono'];
                            $provincia = $informacione['provincia'];
                            $pais = $informacione['pais'];
                        }
                        ?>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-5">
                                    <label for="">Nombre del parqueo <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="nombre_parqueo" value="<?=$nombre_parqueo;?>" disabled>
                                </div>
                                <div class="col-md-5">
                                    <label for="">Actividad de la empresa <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="actividad_empresa" value="<?=$actividad_empresa;?>" disabled>
                                </div>
                                <div class="col-md-2">
                                    <label for="">Sucursal <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="sucursal" value="<?=$sucursal;?>" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Dirección <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="direccion" value="<?=$direccion;?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Zona <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="zona" value="<?=$zona;?>" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Teléfono <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="telefono" value="<?=$telefono;?>" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Provincia <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="provincia" value="<?=$provincia;?>" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Pais <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="pais" value="<?=$pais;?>" disabled>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <a href="informaciones.php" class="btn btn-default btn-block">Cancelar</a>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-danger btn-block" id="btn_eliminar_informacion">
                                        Eliminar
                                    </button>
                                </div>
                            </div>
                            <div id="respuesta"></div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <?php include('../layout/admin/footer.php');?>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<?php include('../layout/admin/footer_link.php');?>
</body>
</html>

<script>
    $('#btn_eliminar_informacion').click(function () {
        var id_informacion = '<?=$id_informacion_get;?>';

        var url = 'controller_delete_informaciones.php';
        $.get(url, {
            id_informacion:id_informacion
        }, function (datos) {
            $('#respuesta').html(datos);
        });
    });
</script>