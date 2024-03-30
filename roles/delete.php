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

            <?php
            $id_get = $_GET['id'];
            $query_roles = $pdo->prepare("SELECT * FROM tb_roles WHERE id_rol = '$id_get' AND estado = '1'");
            $query_roles->execute();
            $roles = $query_roles->fetchAll(PDO::FETCH_ASSOC);
            $contador_roles = 0;
            foreach ($roles as $role) {
                $contador_roles = $contador_roles + 1;
                $id_rol         = $role['id_rol'];
                $nombre         = $role['nombre'];
            }
            ?>

            <h2>Eliminación del rol</h2>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">

                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">¿Está seguro de eliminar el rol?</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" value="<?=$nombre;?>" disabled>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-danger" id="btn_eliminar">Eliminar</button>
                                    <a href="index.php" class="btn btn-default">Cancelar</a>
                                </div>
                                <div id="respuesta"></div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6"></div>
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
    $('#btn_eliminar').click(function () {
        var id_rol = '<?=$id_get;?>';

        var url = 'controller_delete.php';
        $.get(url, {
            id_rol:id_rol
        }, function (datos) {
            $('#respuesta').html(datos);
        });

    });
</script>