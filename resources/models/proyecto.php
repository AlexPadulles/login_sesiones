<?php

     class Proyecto {

        private $nombreProyecto;
        

        function __construct($nombreProyecto)
        {
            
            $this->nombreProyecto = $nombreProyecto;
          

        }
          
        function getNombreProyecto(){
            return $this->nombreProyecto;
        }
      
        function setNombreProyecto($nombreProyecto){
      
        return $this->nombreProyecto = $nombreProyecto;
      
        }
       
     }

?>