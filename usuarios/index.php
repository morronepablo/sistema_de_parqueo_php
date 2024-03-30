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
            <h2>Listado de Usuarios</h2>

            <br>
            <table border="1" class="table table-bordered table-sm table-striped table-responsive-sm">
                <th><center>Nro</center></th>
                <th><center>Nombre de usuarios</center></th>
                <th><center>Email</center></th>
                <th><center>Acción</center></th>

                <?php

                $query_usuario = $pdo->prepare("SELECT * FROM tb_usuarios WHERE estado = '1'");
                $query_usuario->execute();
                $usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
                $contador_usuario = 0;
                foreach ($usuarios as $usuario) {
                    $contador_usuario = $contador_usuario + 1;
                    $id         = $usuario['id'];
                    $nombres    = $usuario['nombres'];
                    $email      = $usuario['email'];
                ?>
                    <tr>
                        <td><center><?=$contador_usuario;?></center></td>
                        <td><?=$nombres;?></td>
                        <td><?=$email;?></td>
                        <td>
                            <center>
                                <a href="update.php?id=<?=$id;?>" class="btn btn-success">Editar</a>
                                <a href="delete.php?id=<?=$id;?>" class="btn btn-danger">Eliminar</a>
                            </center>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
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