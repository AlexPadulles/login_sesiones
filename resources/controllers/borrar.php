<?php
 session_start();
 require_once('../../autoload.php');
 require_once('../function_connect/connect.php');
 $c = new Conexion();
 $b = new Basedatos();
 $con = $c->conectando();
 mysqli_select_db($con,$b->db_name);

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(isset($_POST['borrado2'])){
    $id_user = $_POST['borrar'];
    

    foreach($id_user as $id){
      
        borrarUsuario($con,$id);
    }


    cerrar_conexion($con);

    header('Location: ../../views/cpanel.view.php');}

    if(isset($_POST['borrado'])){

        $id_proyecto = $_POST['borrar2'];
      
        foreach($id_proyecto as $id){
            
            borrarProyecto($con,$id);

    }
    cerrar_conexion($con);

    header('Location: ../../views/cpanel.view.php');
    
    }
 }



?>