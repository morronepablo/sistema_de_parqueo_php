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

            <h2>Actualización del usuario</h2>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">

                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Edición del usuario</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <input type="text" class="form-control" id="nombres" value="<?=$nombres;?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" id="email" value="<?=$email;?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" class="form-control" id="password_user" value="<?=$password_user;?>">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" id="btn_editar">Guardar</button>
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
    $('#btn_editar').click(function () {
        var id_user         = '<?=$id_get;?>';
        var nombres         = $('#nombres').val();
        var email           = $('#email').val();
        var password_user   = $('#password_user').val();

        if(nombres == "") {
            alert("Debe de completar el campo nombres");
            $('#nombres').focus();
        } else if(email == "") {
            alert("Debe de completar el campo email");
            $('#email').focus();
        } else if(password_user == "") {
            alert("Debe de completar el campo password");
            $('#password_user').focus();
        } else {
            var url = 'controller_update.php';
            $.get(url, {
                id_user:id_user,
                nombres:nombres,
                email:email,
                password_user:password_user
            }, function (datos) {
                $('#respuesta').html(datos);
            });
        }

    });
</script>