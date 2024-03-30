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
            <h2>Asignación de roles a usuarios</h2>

            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Listado de usuarios</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body">
                            <table border="1" class="table table-bordered table-sm table-striped table-responsive-sm">
                                <th><center>Nro</center></th>
                                <th><center>Nombre de usuarios</center></th>
                                <th><center>Email</center></th>
                                <th><center>Asignación de rol</center></th>

                                <?php

                                $query_usuario = $pdo->prepare("SELECT * FROM tb_usuarios WHERE estado = '1'");
                                $query_usuario->execute();
                                $usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
                                $contador_usuario = 0;
                                foreach ($usuarios as $usuario) {
                                    $contador_usuario = $contador_usuario + 1;
                                    $id         = $usuario['id'];
                                    $nombres    = $usuario['nombres'];
                                    $rol        = $usuario['rol'];
                                    $email      = $usuario['email'];
                                    ?>
                                    <tr>
                                        <td><center><?=$contador_usuario;?></center></td>
                                        <td><?=$nombres;?></td>
                                        <td><?=$email;?></td>
                                        <td>
                                            <center>
                                                <?php
                                                    if($rol == "") {
                                                ?>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?=$id;?>">
                                                            Asignar
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal<?=$id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-success">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Asignar rol</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-left">
                                                                        <form action="controller.asignar.php" method="post">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label for="">Nombre del usuario</label>
                                                                                        <input type="text" name="nombre" class="form-control" value="<?=$nombres;?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label for="">Email</label>
                                                                                        <input type="text" name="email" class="form-control" value="<?=$email;?>">
                                                                                        <input type="text" name="id_user" value="<?=$id;?>" hidden>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label for="">Rol</label>
                                                                                        <select name="rol" id="" class="form-control">
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
                                                                                                <option value="<?=$nombre;?>"><?=$nombre;?></option>
                                                                                                <?php
                                                                                            }
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                                <button type="submit" class="btn btn-primary">Asignar rol</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php
                                                    } else {
                                                        echo $rol;
                                                    }
                                                ?>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
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