<?php
session_start();

require_once('../../autoload.php');
require_once('../function_connect/connect.php');


 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombreLogin = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];
    



    $c = new Conexion();
    $b = new Basedatos();
    $con = $c->conectando();
    mysqli_select_db($con,$b->db_name);

    
    

    $datos = login($con,$nombreLogin,$contraseña);
    $tipo_dato = obtener_resultados($datos);
    $tipo_usuario = $tipo_dato[3]?? null;
    $_SESSION['id_user'] = $tipo_dato[0]?? null;
    $_SESSION['nombre'] = $nombreLogin;
    $rows = $datos->num_rows;

     
    if($rows == 1 && $tipo_usuario == 0){
     header('Location: ../../views/cpanel.view.php');
    }else if($rows == 1 && $tipo_usuario == 1){
     header('Location: ../../views/panelUsuario.view.php');
    }else if($rows == 0){
     header('Location: ../../index.php');
    }

 }
       
?>