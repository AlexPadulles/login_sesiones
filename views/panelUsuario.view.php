<?php
session_start();
include_once('../resources/teamplates/header.php');


if(isset($_SESSION['nombre'])){

   $nombre = $_SESSION['nombre']; 

}else

     header('Location: ../../index.php');

?>

<div  class="container mx-auto pt-24">


<table class="default">


    <tr>

        <th>Elemento</th>

        <th>Descripción</th>

    </tr>

    <tr>

        <td>html</td>

        <td>Es el contenedor para todos los elementos de un documento</td>

    </tr>

    <tr>

        <td>head</td>

        <td>Contiene el título e información relacional acerca del documento</td>

    </tr>

    <tr>

        <td>title</td>

        <td>Provee un título para el documento</td>

    </tr>

    <tr>

        <td>body</td>

        <td>Es la sección donde se encuentra el contenido del documento</td>

    </tr>

    <tr>

        <td>h1-h6</td>

        <td>Representa un encabezado</td>

    </tr>

    <tr>

        <td>p</td>

        <td>Representa un párrafo</td>

    </tr>

</table>
<div class=" mt-16 text-center">
     <a href="../resources/controllers/logout.php">
         <button type="button" class="text-green-300 hover:text-white border border-green-200 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-400 dark:text-green-400 dark:hover:text-white dark:hover:bg-green-300 dark:focus:ring-green-800">Volver al login</button>
     </a>
  </div>
</div> 
<?php
include_once('../resources/teamplates/footer.php');
?>