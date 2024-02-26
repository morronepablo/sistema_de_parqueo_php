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

$URL = "http://localhost/www.sisparqueo.com"

?>