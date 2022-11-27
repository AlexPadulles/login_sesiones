<?php session_start();
require_once('../autoload.php');
include_once('../resources/teamplates/header.php');
require_once('../resources/function_connect/connect.php');

$c = new Conexion();
$b = new Basedatos();
$con = $c->conectando();
mysqli_select_db($con,$b->db_name);
$datos = comparaUsuario($con);
$datos2 = comparaUsuario($con);
$proyectos = traerProyectos($con);


if(isset($_SESSION['nombre'])){

   $nombreSesion = $_SESSION['nombre']; 

}else

     header('Location: ../../index.php');

?>

 <div class=" container mx-auto w-3/4 ">
      
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 bg-gray-300 mt-14 border-2 border-gray-900"> 
                            <div class=" mx-auto border-2 border-gray-900 hover:border-slate-500 mx-3 my-3 text-center">
                                <section>
                                    <h2 class="text-center text-xl text-green-500 my-5">Da de alta al usuario</h2>
                                        <form action="../resources/controllers/cpanel.php" method="POST">
                                          <div class=" mb-3">
                                          <label class="form-label"><p class="h4">Inserta el nombre de usurio</p></label>
                                          <input name="nombre" class="form-control" type="text" placeholder="nombre" required>
                                          </div>
                                          <div class=" mb-3">
                                          <label class="form-label"><p class="h4">Inserta la contraseña</p></label>
                                          <input name="pw" class="form-control" type="text" placeholder="contraseña" required>
                                          </div>
                                          <div class=" mb-3">
                                          <label class="form-label"><p class="h4">Tipo de acceso ( 0 o 1 )</p></label>
                                          <input name="acceso" class="form-control" type="number" min="0" max="1" placeholder="acceso" required>
                                          </div>
                                          <div class=" my-5">
                                          <button name="submit" class="text-green-300 hover:text-white border border-green-200 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-400 dark:text-green-400 dark:hover:text-white dark:hover:bg-green-300 dark:focus:ring-green-800" type="submit">
                                          Registrar
                                          </button>
                                          </div>
                                        </form>
                                </section>
                            </div>
                            
                         <div class=" mx-auto border-2 border-gray-900 hover:border-slate-500 mx-3 my-3 text-center">
                           <h2 class="text-center text-xl text-green-500 my-5">Da de alta el proyecto</h2>
                              <form action="../resources/controllers/cpanel.php" method="POST">
                                        <div class=" mb-3">
                                        <label class="form-label"><p class="h4">Nombre proyecto</p></label>
                                        <input name="proyecto" class="form-control" type="text" placeholder="nombre" required>
                                        </div>
                                        <div class=" mb-3">
                                        <label class="form-label"><p class="h4">Tipo de tarea</p></label>
                                        <input name="descripcion" class="form-control" type="text" placeholder="descripción" required>
                                        </div>
                                        <div class="mb-3">
                                            
                                                      <div>
                                                            <input type="radio" id="contactChoice1" name="estado" value="1" checked/>
                                                            <label for="contactChoice1">Pendiente</label>

                                                            <input type="radio" id="contactChoice2" name="estado" value="2" />
                                                            <label for="contactChoice2">En Progreso</label><br>

                                                            <input type="radio" id="contactChoice2" name="estado" value="3" />
                                                            <label for="contactChoice2">Finalizada</label>
                                                      </div>
                                            
                                        </div>
                                        <div class=" mb-3">
                                                    <label class="form-label"><p class="h4">Asigne el proyecto</p></label>
                                                    <select name="id_select">
                                                          <?php
                                                  
                                                          while($ok = obtener_resultados($datos)){
                                                          extract($ok);
                                                          echo '<option value="'.$id.'">'.$nombre.'</option>';
                                                          }
                                                          ?>
                                                    </select>
                                                    <button name="submit2" class="text-green-300 ml-1 hover:text-white border border-green-200 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-400 dark:text-green-400 dark:hover:text-white dark:hover:bg-green-300 dark:focus:ring-green-800" type="submit">
                                                    Asignar
                                                    </button>
                     
                                        </div> 
                                </form>
                        </div>
                        <div class=" mx-auto border-2 border-gray-900 hover:border-slate-500 mx-3 my-3 text-center">
                              <h2 class="text-center text-xl text-green-500 my-5">Modificar usuario</h2>
                                 <form action="../resources/controllers/cpanel.php" method="POST">
                                         <div class=" mb-3">
                                                    <label class="form-label"><p class="h4">Seleccione usuario</p></label>
                                                    <select name="id_select2">
                                                          <?php
                                                  
                                                          while($ok = obtener_resultados($datos2)){
                                                          extract($ok);
                                                          echo '<option value="'.$id.'">'.$nombre.'</option>';
                                                          }
                                                          ?>
                                                    </select>
                                                    <button name="submit3" class="text-green-300 hover:text-white border border-green-200 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-400 dark:text-green-400 dark:hover:text-white dark:hover:bg-green-300 dark:focus:ring-green-800" type="submit">
                                                     Modificar
                                                    </button>
                                          </div> 
                                          <div class=" mb-3">
                                                    <label class="form-label"><p class="h4">Nuevo nombre de usuario</p></label>
                                                    <input name="nombreModificar" class="form-control" type="text" placeholder=" nuevo nombre" required>
                                                    </div>
                                                    <div class=" mb-3">
                                                    <label class="form-label"><p class="h4">Nueva contraseña</p></label>
                                                    <input name="pwModificar" class="form-control" type="text" placeholder=" nueva contraseña" required>
                                                    </div>
                                                    <div class=" mb-3">
                                                    <label class="form-label"><p class="h4">Nuevo tipo de acceso ( 0 o 1 )</p></label>
                                                    <input name="accesoModificar" class="form-control" type="number" min="0" max="1" placeholder=" nuevo acceso" required>
                                            </div>
                                          
                                 </form>   
                         </div>  
                        
                        <div class=" mx-auto border-2 border-gray-900 hover:border-slate-500 mx-3 my-3 text-center">
                                     
                              <h2 class="text-center text-xl text-green-500 my-5">Modificar Proyecto</h2>
                                 <form action="../resources/controllers/cpanel.php" method="POST">
                                         <div class=" mb-3">
                                                    <label class="form-label"><p class="h4">Seleccione un proyecto</p></label>
                                                    <select name="id_select3">
                                                          <?php
                                                  
                                                          while($ok = obtener_resultados($proyectos)){
                                                          extract($ok);
                                                          echo '<option value="'.$id.'">'.$nombre.'</option>';
                                                          }
                                                          ?>
                                                    </select>
                                                    <button name="submit4" class="text-green-300 hover:text-white border border-green-200 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-400 dark:text-green-400 dark:hover:text-white dark:hover:bg-green-300 dark:focus:ring-green-800" type="submit">
                                                     Modificar
                                                    </button>
                                          </div> 
                                          <div class=" mb-3">
                                                    <div>
                                                        <label class="form-label"><p class="h4">Nuevo nombre proyecto</p></label>
                                                        <input name="proyectoModificar" class="form-control" type="text" placeholder=" nuevo proyecto" required>
                                                    </div>
                                                    <div class=" mb-3">
                                                        <label class="form-label"><p class="h4">Nueva tarea</p></label>
                                                        <input name="tareaModificar" class="form-control" type="text" placeholder=" nueva tarea" required>
                                                    </div>
                                                    
                                          </div>
                                   </form>
                                    
                          </div>  
                          
                    
              
              
      </div>
    
 </div>
   <div class=" mt-10 pb-10 text-center">
     <a href="../resources/controllers/logout.php">
         <button type="button" class="text-green-300 hover:text-white border border-green-200 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-400 dark:text-green-400 dark:hover:text-white dark:hover:bg-green-300 dark:focus:ring-green-800">Desconectar</button>
     </a>
  </div>
 <?php
 require_once('../resources/teamplates/footer.php');
?>