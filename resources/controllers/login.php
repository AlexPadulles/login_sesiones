<?php
session_start();

require_once('../../autoload.php');
require_once('../function_connect/connect.php');


 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombreLogin = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];
    $_SESSION['nombre'] = $nombreLogin;



    $c = new Conexion();
    $b = new Basedatos();
    $con = $c->conectando();
    mysqli_select_db($con,$b->db_name);
    $datos = comparaUsuario($con);
    
    
    while($ok = obtener_resultados($datos)){
        extract($ok);
        if($nombre == $nombreLogin && $pass == $contraseña && $tipo_usuario == 0 ){
             
             header('Location: ../../views/cpanel.view.php');
            
        } else if($nombre == $nombreLogin && $pass == $contraseña && $tipo_usuario == 1){  
            
             header('Location: panelUsuario.php');
         
        }
          
    }
  
    }

?>