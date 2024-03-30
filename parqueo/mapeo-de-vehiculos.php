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
            <h2>Listado de espacios</h2>

            <br>
            <table border="1" class="table table-bordered table-sm table-striped table-responsive-sm">
                <th><center>Nro</center></th>
                <th><center>Nro espacio</center></th>
                <th><center>Acción</center></th>

                <?php

                $query_mapeos = $pdo->prepare("SELECT * FROM tb_mapeos WHERE estado = '1'");
                $query_mapeos->execute();
                $mapeos = $query_mapeos->fetchAll(PDO::FETCH_ASSOC);
                $contador_mapeos = 0;
                foreach ($mapeos as $mapeo) {
                    $contador_mapeos    = $contador_mapeos + 1;
                    $id_map             = $mapeo['id_map'];
                    $nro_espacio        = $mapeo['nro_espacio'];
                    ?>
                    <tr>
                        <td><center><?=$contador_mapeos;?></center></td>
                        <td><?=$nro_espacio;?></td>
                        <td>
                            <center>
                                <a href="delete.php?id=<?=$id_rol;?>" class="btn btn-danger btn-sm">Eliminar</a>
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