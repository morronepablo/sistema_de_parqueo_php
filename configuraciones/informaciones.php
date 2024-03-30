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
            <h2>Listado de Informaciones</h2>

            <br>
            <a href="create_informaciones.php" class="btn btn-primary">Registrar nuevo</a> <br><br>
            <table border="1" class="table table-bordered table-sm table-striped table-responsive-sm">
                <th><center>Nro</center></th>
                <th><center>Nombre del parqueo</center></th>
                <th><center>Actividad de la empresa</center></th>
                <th><center>Sucursal</center></th>
                <th><center>Dirección</center></th>
                <th><center>Zona</center></th>
                <th><center>Teléfonos</center></th>
                <th><center>Provincia</center></th>
                <th><center>Pais</center></th>
                <th><center>Acción</center></th>

                <?php

                $query_informaciones = $pdo->prepare("SELECT * FROM tb_informaciones WHERE estado = '1'");
                $query_informaciones->execute();
                $informaciones = $query_informaciones->fetchAll(PDO::FETCH_ASSOC);
                $contador_informaciones = 0;
                foreach ($informaciones as $informacione) {
                    $contador_usuario   = $contador_informaciones + 1;
                    $id_informacion     = $informacione['id_informacion'];
                    $nombre_parqueo     = $informacione['nombre_parqueo'];
                    $actividad_empresa  = $informacione['actividad_empresa'];
                    $sucursal           = $informacione['sucursal'];
                    $direccion          = $informacione['direccion'];
                    $zona               = $informacione['zona'];
                    $telefono           = $informacione['telefono'];
                    $provincia          = $informacione['provincia'];
                    $pais               = $informacione['pais'];
                    ?>
                    <tr>
                        <td><center><?=$contador_usuario;?></center></td>
                        <td><?=$nombre_parqueo;?></td>
                        <td><?=$actividad_empresa;?></td>
                        <td><?=$sucursal;?></td>
                        <td><?=$direccion;?></td>
                        <td><?=$zona;?></td>
                        <td><?=$telefono;?></td>
                        <td><?=$provincia;?></td>
                        <td><?=$pais;?></td>
                        <td>
                            <center>
                                <a href="update_configuraciones.php?id=<?=$id_informacion;?>" class="btn btn-success">Editar</a>
                                <a href="delete.php?id=<?=$id_informacion;?>" class="btn btn-danger">Eliminar</a>
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