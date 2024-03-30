<?php
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
            <h2>Creación de un nuevo usuario</h2>


            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h4>Nuevo usuario</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <input type="text" class="form-control" id="nombres">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" id="password_user">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" id="btn_guardar">Guardar</button>
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
    $('#btn_guardar').click(function () {
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
            var url = 'controller_create.php';
            $.get(url, {
                nombres:nombres,
                email:email,
                password_user:password_user
            }, function (datos) {
                $('#respuesta').html(datos);
            });
        }

    });
</script>