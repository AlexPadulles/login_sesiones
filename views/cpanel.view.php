<?php session_start();
$nombreproyecto = $_SESSION['nombreproyecto'] ?? null;

require_once('../autoload.php');
include_once('../resources/teamplates/header.php');
require_once('../resources/function_connect/connect.php');

if(isset($_SESSION['nombre'])){

   $nombreSesion = $_SESSION['nombre']; 

}else { header('Location: ../../index.php');}


$c = new Conexion();
$b = new Basedatos();
$con = $c->conectando();
mysqli_select_db($con,$b->db_name);
 
?>

 <div class=" container mx-auto w-screen mb-10 ">

       <div class=" mt-5 pb-5 text-center">
                  <a href="../resources/controllers/logout.php">
                      <button type="button" class="text-green-300 hover:text-white border border-green-200 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-400 dark:text-green-400 dark:hover:text-white dark:hover:bg-green-300 dark:focus:ring-green-800">Desconectar</button>
                  </a>
        </div>
       <!-- Damos de alta un nuevo usuario -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 bg-gray-300  border-2 border-gray-900"> 
                            <div class=" mx-auto border-2 col-span-2 border-gray-900 hover:border-slate-500 mx-3 my-3 text-center">
                                <section>
                                    <h2 class="text-center text-xl text-green-500 my-5">Da de alta al usuario</h2>
                                        <form action="../resources/controllers/cpanel.php" method="POST">
                                          <div class=" mb-3">
                                          <label class="form-label" ><p class="h4">Inserta el nombre de usurio</p></label>
                                          <input name="nombre" class="form-control w-3/4" type="text" placeholder="nombre" required>
                                          </div>
                                          <div class=" mb-3">
                                          <label class="form-label"><p class="h4">Inserta la contraseña</p></label>
                                          <input name="pw" class="form-control w-3/4" type="text" placeholder="contraseña" required>
                                          </div>
                                          <div class=" mb-3">
                                          <label class="form-label"><p class="h4">Tipo de acceso ( 0 o 1 )</p></label>
                                          <input name="acceso" class="form-control w-3/4" type="number" min="0" max="1" placeholder="acceso" required>
                                          </div>
                                          <div class=" my-5">
                                          <button name="submit" class="text-green-300 hover:text-white border border-green-200 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-400 dark:text-green-400 dark:hover:text-white dark:hover:bg-green-300 dark:focus:ring-green-800" type="submit">
                                          Registrar
                                          </button>
                                          </div>
                                        </form>
                                </section>
                            </div>
         <!--  Damos de alta un nuevo proyecto -->
                         <div class=" mx-auto border-2 col-span-2 border-gray-900 hover:border-slate-500 mx-3 my-3 text-center">
                           <h2 class="text-center text-xl text-green-500 my-5">Da de alta el proyecto</h2>
                              <form action="../resources/controllers/cpanel.php" method="POST">
                                        <div class=" mb-3">
                                        <label class="form-label"><p class="h4">Nombre proyecto</p></label>
                                        <input name="proyecto" class="form-control w-3/4" type="text" placeholder="nombre" required>
                                        </div>
                                        <div class=" mb-3">
                                        <label class="form-label"><p class="h4">Tipo de tarea</p></label>
                                        <input name="descripcion" class="form-control w-3/4" type="text" placeholder="descripción" required>
                                        </div>
                                        <div class="mb-3 w-3/4 grid grid-cols-3 mx-auto my-3">
                                            
                                                      <div>
                                                            <input type="radio" id="contactChoice1" name="estado" value="1" checked/>
                                                            <label for="contactChoice1">Pendiente</label>
                                                      </div>
                                                      <div>
                                                            <input type="radio" id="contactChoice2" name="estado" value="2" />
                                                            <label for="contactChoice2">En Progreso</label><br>
                                                      </div>
                                                      <div>
                                                            <input type="radio" id="contactChoice2" name="estado" value="3" />
                                                            <label for="contactChoice2">Finalizada</label>
                                                      </div>
                                            
                                        </div>
                                        <div class=" mb-3">
                                                    <label class="form-label"><p class="h4">Asigne el proyecto</p></label>
                                                    <select name="id_select">
                                                          <?php
                                                          $datos = comparaUsuario($con);
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
             <!-- Modificamos los usuarios -->
                        <div class="  border-2 col-span-2 border-gray-900 hover:border-slate-500 mx-3 my-3 text-center">
                              <h2 class="text-center text-xl text-green-500 my-5">Modificar usuario</h2>
                                 <form action="../resources/controllers/cpanel.php" method="POST">
                                         <div class=" mb-3 ">
                                                    <label class="form-label"><p class="h4">Seleccione usuario</p></label>
                                                    <select class="w-2/4" name="id_select2">
                                                          <?php
                                                          $datos2 = comparaUsuario($con);
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
                                                    <input name="nombreModificar" class="form-control w-3/4" type="text" placeholder=" nuevo nombre" required>
                                                    </div>
                                                    <div class=" mb-3">
                                                    <label class="form-label"><p class="h4">Nueva contraseña</p></label>
                                                    <input name="pwModificar" class="form-control w-3/4" type="text" placeholder=" nueva contraseña" required>
                                                    </div>
                                                    <div class=" mb-3">
                                                    <label class="form-label"><p class="h4">Nuevo tipo de acceso ( 0 o 1 )</p></label>
                                                    <input name="accesoModificar" class="form-control w-3/4" type="number" min="0" max="1" placeholder=" nuevo acceso" required>
                                            </div>
                                          
                                 </form>   
                         </div>  
                              
             <!--Mostramos la tabla de susarios y borramos desde aquí  -->
                         <div class="border-2 col-span-2 border-gray-900 hover:border-slate-500 mx-3 my-3 text-center">
                           <h2 class="text-center text-xl text-green-500 my-5">Tabla de usuarios</h2>
                           
                            <table  class=" mx-auto px-2 py-2 mt-7  border-2 border-green-400">
                               <form method='post' action='../resources/controllers/borrar.php'>
                                    <tr class=" border-2 border-green-400 px-2 py-2 ">
                                    <tbody  style="display: block; border: 1px solid green; height: 210px; overflow-y: scroll">
                                    <td class='border-2 border-green-400 px-2 py-2'>NOMBRE</td>
                                    <td class='border-2 border-green-400 px-2 py-2'>CONTRASEÑA</td>
                                    <td class='border-2 border-green-400 px-2 py-2'>ACCESO</td>
                                    <td class='border-2 border-green-400 px-2 py-2'>BORRAR</td>
                                                            
                                   <?php
                                   $datos3 = comparaUsuario($con);
                                   while($ok = obtener_resultados($datos3)){
                                    extract($ok);
                                    echo "<tr class='border-2 border-green-400 px-2 py-2'><td class='border-2 border-green-400 px-2 py-2'>$nombre</td><td class='border-2 border-green-400 px-2 py-2'>$pass</td><td class='border-2 border-green-400 px-2 py-2'>$tipo_usuario</td></td><td class='border-2 border-green-400 px-2 py-2 text-center'><input type='checkbox' name='borrar[]' value='$id'</td>";
                                    }
                                    ?>
                                    </tbody>
                                    <tr><td colspan='5' class='border-2 border-green-400 px-2 py-2 text-center' ><input class="text-green-300 hover:text-white border border-green-200 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5  text-center mr-2 mb-1 mt-1 dark:border-green-400 dark:text-green-400 dark:hover:text-white dark:hover:bg-green-300 dark:focus:ring-green-800" type='submit' name="borrado2" value='Borrar'/></td></tr> 
                               </table>
                           </form>
                        </div>
             <!-- Modificamos los proyectos  -->
                     <div class=" mx-auto col-span-2 border-2 border-gray-900 hover:border-slate-500 mx-3 my-3 text-center">
                                 
                              <h2 class="text-center text-xl text-green-500 my-5">Modificar Proyecto</h2>
                                 <form action="../resources/controllers/cpanel.php" method="POST">
                                        
                                               <div>   
                                                   <label class="form-label"><p class="h4">Seleccione un proyecto</p></label>
                                                    <select class="w-2/4" name="id_select4">
                                                          <?php
                                                          $proyectos = traerProyectos($con);
                                                          while($ok = obtener_resultados($proyectos)){
                                                          extract($ok);
                                                          echo '<option value="'.$id.'">'.$nombre.'</option>';
                                                          }
                                                          ?>
                                                    </select>
                                                    
                                                <button name="submit7" class="text-green-300 hover:text-white border mt-4 border-green-200 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-400 dark:text-green-400 dark:hover:text-white dark:hover:bg-green-300 dark:focus:ring-green-800" type="submit">
                                                Modificar
                                                </button>
                                               </div> 
                                              
                                            

                                          <div class=" mb-3 mt-10">
                                                    <div>
                                                        <label class="form-label"><p class="h4">Nuevo nombre proyecto</p></label>
                                                        <input name="proyectoModificar" class="form-control w-3/4" type="text" placeholder="proyecto"  >
                                                    </div>
                                                
                                                    
                                          </div>
                                         
                                           
                                   </form>
                                    
                          </div> 
      <!-- Mostramos la tabla de los proyectos y borramos desde aqui  -->
                        <div class="border-2 col-span-2 border-gray-900 hover:border-slate-500 mx-3 my-3 text-center">
                           <h2 class="text-center text-xl text-green-500 my-5">Tabla de proyecto</h2>
                           
                             <table  class=" mx-auto px-2 py-2 mt-7 mb-10  border-2 border-green-400">
                                <form method='post' action='../resources/controllers/borrar.php'>
                                    <tr class=" border-2 border-green-400 px-2 py-2 ">
                                         <tbody  style="display: block; border: 1px solid green; height: 190px; overflow-y: scroll">
                                                <td class='border-2 border-green-400 px-2 py-2'>ID</td>
                                                <td class='border-2 border-green-400 px-2 py-2'>NOMBRE</td>
                                                <td class='border-2 border-green-400 px-2 py-2'>BORRAR</td>
                                                
                                                                  
                                          <?php
                                          $proyectos_para_tabla =  traerProyectos($con);
                                          while($ok = obtener_resultados($proyectos_para_tabla)){
                                                extract($ok);
                                                echo "<tr class='border-2 border-green-400 px-2 py-2'><td class='border-2 border-green-400 px-2 py-2'>$id</td><td class='border-2 border-green-400 px-2 py-2'>$nombre</td></td><td class='border-2 border-green-400 px-2 py-2 text-center'><input type='checkbox' name='borrar2[]' value='$id'</td>";
                                          }
                                          ?>
                                          </tbody>
                                    <tr><td colspan='5' class='border-2 border-green-400 px-2 py-2 text-center' ><input class="text-green-300 hover:text-white border border-green-200 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5  text-center mr-2 mb-1 mt-1 dark:border-green-400 dark:text-green-400 dark:hover:text-white dark:hover:bg-green-300 dark:focus:ring-green-800" type='submit' name="borrado" value='Borrar'/></td></tr> 
                              </table>
                           </form>
                        </div> 
        <!-- Modificamos la tarea -->
                   <div class=" mx-auto col-span-2 border-2 border-gray-900 hover:border-slate-500 mx-3 my-3 text-center">
                                 
                              <h2 class="text-center text-xl text-green-500 my-5">Modificar Tarea</h2>
                                 <form action="../resources/controllers/cpanel.php" method="POST">
                                        
                                                 
                                                   <label class="form-label"><p class="h4">Seleccione un proyecto</p></label>
                                                    <select class="w-2/4" name="id_select6">
                                                          <?php
                                                          $proyectos2 = traerProyectos($con);
                                                          while($ok = obtener_resultados($proyectos2)){
                                                          extract($ok);
                                                          echo '<option value="'.$id.'">'.$nombre.'</option>';
                                                          }
                                                          ?>
                                                    </select>
                                                    <button name="submit6" class="text-green-300 hover:text-white border mt-4 border-green-200 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-400 dark:text-green-400 dark:hover:text-white dark:hover:bg-green-300 dark:focus:ring-green-800" type="submit">
                                                    Modificar
                                                      </button>
                                          
                                         

                                          <div class=" mb-3">
                                                   
                                                    <div class=" mb-3">
                                                        <label class="form-label"><p class="h4">Tarea</p></label>
                                                        <input name="tareaModificar" class="form-control w-3/4" type="text" placeholder=" nueva tarea" >
                                                    </div>
                                                    
                                          </div>
                                          <div class="my-5 w-3/4 grid grid-cols-3 mx-auto my-3">
                                            
                                                      <div>
                                                            <input type="radio" id="contactChoice1" name="estado1" value="1" checked/>
                                                            <label for="contactChoice1">Pendiente</label>
                                                      </div>
                                                      <div>
                                                            <input type="radio" id="contactChoice2" name="estado1" value="2" />
                                                            <label for="contactChoice2">En Progreso</label><br>
                                                      </div>
                                                      <div>
                                                            <input type="radio" id="contactChoice2" name="estado1" value="3" />
                                                            <label for="contactChoice2">Finalizada</label>
                                                      </div>
                                            
                                          </div>
                                                  
                                                   
                                   </form>
                           </div> 
        <!-- mostramos la tabla de la tarea seleccionada -->
                    <div class="border-2 col-span-2 border-gray-900 hover:border-slate-500 mx-3 my-3 text-center">
                       <h2 class="text-center text-xl text-green-500 my-5">Tabla de proyectos/tarea</h2>
                         <form method='post' action='<?php echo $_SERVER['PHP_SELF'];?>'>
                           <label class="form-label"><p class="h4">Seleccione un proyecto</p></label>
                              <select name="id_select5">
                                 <?php
                                $proyectos3 = traerProyectos($con);                  
                                while($ok = obtener_resultados($proyectos3)){
                                extract($ok);
                                echo '<option value="'.$id.'">'.$nombre.'</option>';
                                }                
                                ?>
                              </select>
                              
                             <button name="submit5" class="text-green-300 hover:text-white border border-green-200 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-400 dark:text-green-400 dark:hover:text-white dark:hover:bg-green-300 dark:focus:ring-green-800" type="submit">
                              Cargar Tabla
                             </button>
                         </form>
                        <form method='post' action='/resources/controllers/borrar.php'>
                              <table  class=" mx-auto px-2 py-2 mt-7  border-2 border-green-400">
                               
		                          <tr class=" border-2 border-green-400 px-2 py-2 ">
                                <td class='border-2 border-green-400 px-2 py-2'>NOMBRE</td>
                                <td class='border-2 border-green-400 px-2 py-2'>TAREA</td>
                                <td class='border-2 border-green-400 px-2 py-2'>ESTADO</td>
                                
                                <?php
                                 if(isset($_POST['submit5'])){

                                    $cargarTabla = $_POST['id_select5'];
                                    $proyecto = traerProyecto($con,$cargarTabla);
                                    while($ok = obtener_resultados($proyecto)){
                                    extract($ok);
                                    echo "<tr class='border-2 border-green-400 px-2 py-2'><td class='border-2 border-green-400 px-2 py-2'>$usuario</td><td class='border-2 border-green-400 px-2 py-2'>$tarea</td><td class='border-2 border-green-400 px-2 py-2'>$estado</td>";
                                  }}
                                ?>
                               
                            
                                </table>
                         </form>
                      </div>    
                  </div>
 </div>
  
 <?php
 require_once('../resources/teamplates/footer.php');
?>