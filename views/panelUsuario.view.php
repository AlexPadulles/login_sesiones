<?php
session_start();
if(isset($_SESSION['nombre'])){

   $nombre = $_SESSION['nombre']; 

}else{ 
header('Location: ../../index.php');  } 

require_once('../autoload.php');
include_once('../resources/teamplates/header.php');
require_once('../resources/function_connect/connect.php');
$c = new Conexion();
$b = new Basedatos();
$con = $c->conectando();
mysqli_select_db($con,$b->db_name);


?>
  
         <div class=" mx-auto pt-10">
                        <div class=" mt-5 pb-5 text-center">
                                <a href="../resources/controllers/logout.php">
                                    <button type="button" class="text-green-300 hover:text-white border border-green-200 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-400 dark:text-green-400 dark:hover:text-white dark:hover:bg-green-300 dark:focus:ring-green-800">Desconectar</button>
                                </a>
                        </div>
                <h2 class=" text-center text-2xl pt-10">Hola <?php echo $nombre?>, en esta tabla tienes tus tareas asignadas</h2>
                    <table  class=" mx-auto px-14 py-2 mt-7  border-2 border-green-400">
                               
                            <tr class=" border-2 border-green-400 px-2 py-2 ">
                             <td class='border-2 border-green-400 px-2 py-2'>NOMBRE</td>
                             <td class='border-2 border-green-400 px-2 py-2'>TAREA</td>
                             <td class='border-2 border-green-400 px-2 py-2'>ESTADO</td>
                             
                             <?php
                              
                                 $cargarTabla = $_SESSION['id_user'];
                                 $proyecto = traerTareas($con,$cargarTabla);
                                 while($ok = obtener_resultados($proyecto)){
                                 extract($ok);
                                 echo "<tr class='border-2 border-green-400 px-2 py-2'><td class='border-2 border-green-400 px-2 py-2'>$usuario</td><td class='border-2 border-green-400 px-2 py-2'>$tarea</td><td class='border-2 border-green-400 px-2 py-2'>$estado</td>";
                               }
                             ?>
                    </table>
         </div>

<?php
include_once('../resources/teamplates/footer.php');
?>