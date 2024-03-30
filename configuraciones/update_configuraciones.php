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
            <h2>Actualización de la información</h2>

            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Registre los datos con mucho cuidado</h3>
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
                                    <input type="text" class="form-control" id="nombre_parqueo" value="<?=$nombre_parqueo;?>">
                                </div>
                                <div class="col-md-5">
                                    <label for="">Actividad de la empresa <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="actividad_empresa" value="<?=$actividad_empresa;?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Sucursal <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="sucursal" value="<?=$sucursal;?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Dirección <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="direccion" value="<?=$direccion;?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Zona <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="zona" value="<?=$zona;?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Teléfono <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="telefono" value="<?=$telefono;?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Provincia <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="provincia" value="<?=$provincia;?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Pais <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="pais" value="<?=$pais;?>">
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <a href="informaciones.php" class="btn btn-default btn-block">Cancelar</a>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-success btn-block" id="btn_actualizar_informacion">
                                        Actualizar
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
    $('#btn_actualizar_informacion').click(function () {
        var id_informacion = '<?=$id_informacion_get;?>';
        var nombre_parqueo = $('#nombre_parqueo').val();
        var actividad_empresa = $('#actividad_empresa').val();
        var sucursal = $('#sucursal').val();
        var direccion = $('#direccion').val();
        var zona = $('#zona').val();
        var telefono = $('#telefono').val();
        var provincia = $('#provincia').val();
        var pais = $('#pais').val();

        if (nombre_parqueo == "") {
            alert("Debe de completar el campo Nombre del parqueo");
            $('#nombre_parqueo').focus();
        } else if(actividad_empresa == "") {
            alert("Debe de completar el campo Actividad de la empresa");
            $('#actividad_empresa').focus();
        } else if(sucursal == "") {
            alert("Debe de completar el campo Sucursal");
            $('#sucursal').focus();
        } else if(direccion == "") {
            alert("Debe de completar el campo Dirección");
            $('#direccion').focus();
        } else if(zona == "") {
            alert("Debe de completar el campo Zona");
            $('#zona').focus();
        } else if(telefono == "") {
            alert("Debe de completar el campo Teléfono");
            $('#telefono').focus();
        } else if(provincia == "") {
            alert("Debe de completar el campo Provincia");
            $('#provincia').focus();
        } else if(pais == "") {
            alert("Debe de completar el campo Pais");
            $('#pais').focus();
        } else {
            var url = 'controller_update_informaciones.php';
            $.get(url, {
                id_informacion:id_informacion,
                nombre_parqueo:nombre_parqueo,
                actividad_empresa:actividad_empresa,
                sucursal:sucursal,
                direccion:direccion,
                zona:zona,
                telefono:telefono,
                provincia:provincia,
                pais:pais
            }, function (datos) {
                $('#respuesta').html(datos);
            });
        }

    });
</script>