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
            <h2>Listado de Roles</h2>

            <br>
            <table border="1" class="table table-bordered table-sm table-striped table-responsive-sm">
                <th><center>Nro</center></th>
                <th><center>Nombre de rol</center></th>
                <th><center>Acción</center></th>

                <?php

                $query_roles = $pdo->prepare("SELECT * FROM tb_roles WHERE estado = '1'");
                $query_roles->execute();
                $roles = $query_roles->fetchAll(PDO::FETCH_ASSOC);
                $contador_roles = 0;
                foreach ($roles as $role) {
                    $contador_roles = $contador_roles + 1;
                    $id_rol         = $role['id_rol'];
                    $nombre         = $role['nombre'];
                    ?>
                    <tr>
                        <td><center><?=$contador_roles;?></center></td>
                        <td><?=$nombre;?></td>
                        <td>
                            <center>
                                <a href="delete.php?id=<?=$id_rol;?>" class="btn btn-danger">Eliminar</a>
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