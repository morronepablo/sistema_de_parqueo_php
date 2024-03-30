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
            $query_usuario = $pdo->prepare("SELECT * FROM tb_usuarios WHERE id = '$id_get' AND estado = '1'");
            $query_usuario->execute();
            $usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
            $contador_usuario = 0;
            foreach ($usuarios as $usuario) {
                $contador_usuario = $contador_usuario + 1;
                $id             = $usuario['id'];
                $nombres        = $usuario['nombres'];
                $email          = $usuario['email'];
                $password_user  = $usuario['password_user'];
            }
            ?>

            <h2>Eliminación del usuario</h2>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">

                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">¿Está seguro de eliminar el usuario?</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <input type="text" class="form-control" id="nombres" value="<?=$nombres;?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" id="email" value="<?=$email;?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" class="form-control" id="password_user" value="<?=$password_user;?>" disabled>
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
        var id_user         = '<?=$id_get;?>';

        var url = 'controller_delete.php';
        $.get(url, {
            id_user:id_user
        }, function (datos) {
            $('#respuesta').html(datos);
        });

    });
</script>