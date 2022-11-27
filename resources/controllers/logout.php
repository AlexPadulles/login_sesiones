<?php
include_once('../teamplates/header.php');
session_start();
session_destroy();
echo "<div class=' container mx-auto pt-24 text-center'>";
echo "<span class='text-xl text-center'>Te has desconectado correctamente. <a class=' text-blue-500' href='/'>Volver al login</a></span>";
echo " <img
src='https://carolinadevell.files.wordpress.com/2013/06/hastaprontocartel.jpg'
class='w-2/4 h-2/4 mx-auto pt-10'
alt='Sample image'
/>
</div>";
echo "</div>";
include_once('../teamplates/footer.php');
