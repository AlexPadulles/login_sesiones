<?php

    class Conexion{
  
        public $host = "localhost";
        public  $user = "root";
        public  $pass = "";
       
        
       

        function conectando(){
        $con = mysqli_connect($this->host, $this->user, $this->pass);
        
        return $con; }

       
    
    }


?>

