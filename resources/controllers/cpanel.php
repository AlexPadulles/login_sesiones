<?php
session_start();
require_once('../../autoload.php');
require_once('../function_connect/connect.php');

// variables de los formularios
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  //alta usuario
$user = new Usuario($_POST['nombre']?? null,$_POST['pw']?? null,$_POST['acceso']?? null);
$userModificar = new Usuario($_POST['nombreModificar']?? null,$_POST['pwModificar']?? null,$_POST['accesoModificar']?? null);
$idSelect2 = $_POST['id_select2']?? null;
  //alta proyecto
$proyecto = new Proyecto($_POST['proyecto']?? null);
$proyectoModificar = new Proyecto($_POST['proyectoModificar']?? null);
$idSelect4 = $_POST['id_select4']?? null;

  // Creacion tarea tabla tarea
$tarea = new Tarea($_POST['id_select']?? null,0,$_POST['descripcion']?? null,$_POST['estado']?? null); 
$tareaActualizar = new Tarea($_POST['id_select3']?? null,$_POST['id_select4']?? null,$_POST['tareaModificar']?? null,$_POST['estado1']?? null); 
// $modificarTarea = $_POST['tareaModificar'];

//accedemos a la conexion
$c = new Conexion();
$b = new Basedatos();
$con = $c->conectando();
mysqli_select_db($con,$b->db_name);

// comprobamos que boton del submit se ha pulsado
  if(isset($_POST['submit'])){

          insertarUsuarios($con,$user->getNombre(),$user->getPass(),$user->getTipo());
          header('Location: ../../views/cpanel.view.php');
         }
  
  if(isset($_POST['submit2'])){
         
         insertarProyecto($con,$proyecto->getNombreProyecto());// insertamos el proyecto
         $id_proyecto = obtenerIdProyecto($con,$proyecto->getNombreProyecto());// recuperamos la id del proyecto insertado
         $tarea->setIdProyect($id_proyecto);
         insertarTarea($con,$tarea->getIdUsuario(),$tarea->getIdProyect(),$tarea->getDescripcion(),$tarea->getEstado()); // insertamos en la tabla asociada los datos
         header('Location: ../../views/cpanel.view.php');
         
      }
  if(isset($_POST['submit3'])){
         
         actualizarUsuario($con,$userModificar->getNombre(),$userModificar->getPass(),$userModificar->getTipo(),$idSelect2);
         header('Location: ../../views/cpanel.view.php');
         
      }
 
  if(isset($_POST['submit5'])){
         
    
    
    header('Location: ../../views/cpanel.view.php');
         
      }
  if(isset($_POST['submit7'])){
 
   
   $consulta = modificaProyecto($con,$_POST['id_select4']);
   $consulta = obtener_resultados($consulta);
   extract($consulta);
   $_SESSION['id']= $id;
   $_SESSION['nombreproyecto'] = $nombre;
   actualizarProyecto($con,$_POST['proyectoModificar'],$id);
  
   header('Location: ../../views/cpanel.view.php');

  }    
  if(isset($_POST['submit6'])){
 
    $tarea = $_POST['tareaModificar'];
    $estado = $_POST['estado1'];
    $id_proyecto = $_POST['id_select6'];
   
    actualizarTarea($con,$tarea,$estado,$id_proyecto);
    header('Location: ../../views/cpanel.view.php');

  }    

    
} else {
  header('Location: ../../index.php');
}

?>