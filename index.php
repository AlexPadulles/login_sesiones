<?php
session_start();
//nos carga las clases necesarias
require_once('autoload.php');


//Cuerpo del index
include_once('resources/teamplates/header.php');
include_once('views/login.view.php');
include_once('resources/teamplates/footer.php');

//Hacemos la conexion, creamos la base de datos y las tablas
// $c = new Conexion();
// $con = $c->conectando();
// $b = new Basedatos();
// mysqli_select_db($con,$b->db_name);
// $b->crear_tabla_usuario($con);
// $b->crear_tabla_proyecto($con);
// $b->crear_tabla_tarea($con);  
// $b->aniadirAdmin($con);  

?>