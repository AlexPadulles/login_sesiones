<?php
  
  function autoload($clase){
   
     include "resources/models/" . $clase . ".php";
 
  }
       
       spl_autoload_register('autoload');
      
?>