<?php

     class Usuario {

        private $nombre;
        private $pass;
        private $tipo_usuario;

        function __construct($nombre,$pass,$tipo_usuario)
        {
            
            $this->nombre = $nombre;
            $this->pass = $pass;
            $this->tipo_usuario = $tipo_usuario;

        }
          
        function getNombre(){
            return $this->nombre;
        }
      
        function setNombre($nombre){
      
        return $this->nombre = $nombre;
      
        }
        function getPass(){
            return $this->pass;
        }
      
        function setPass($pass){
      
        return $this->pass = $pass;
      
        }
        function getTipo(){
            return $this->tipo_usuario;
        }
      
        function setTipo($tipo_usuario){
      
        return $this->tipo_usuario = $tipo_usuario;
      
        }

     }




?>