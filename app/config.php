<?php

define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('PASSWORD', '');
define('BD', 'parqueo');

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    // echo "la concexion a la base de datos fue exitosa";
} catch(PDOException $e) {
    echo "error de conexion";
}

date_default_timezone_set("America/Argentina/Buenos_Aires");
$fechaHora = date('Y-m-d H:i:s');
$dia_actual = date('d');
$mes_actual = date('m');
$ano_actual = date('Y');

$URL = "http://localhost/www.sisparqueo.com";
$estado_del_registro = '1';

?>