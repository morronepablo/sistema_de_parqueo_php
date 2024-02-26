<?php

global $URL;
include ('app/config.php');
include ('layout/admin/datos_usuario_sesion.php');

session_start();
if(isset($_SESSION['usuario_sesion'])) {
    // echo "existe sesion";
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
                Bienvenido administrador
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
    <?php
} else {
    echo "para ingresar a esta plataforma debe iniciar sesion";
}

// echo "Bienvenido administrador";

?>



