<?php

     class Tarea {

        private $id_usuario;
        private $id_proyecto;
        private $descripcion;
        private $estado;

        function __construct($id_usuario,$id_proyecto,$descripcion,$estado)
        {
            
            $this->id_usuario = $id_usuario;
            $this->id_proyecto = $id_proyecto;
            $this->descripcion = $descripcion;
            $this->estado = $estado;

        }
          
        function getIdUsuario(){
            return $this->id_usuario;
        }
      
        function setIdUsuario($id_usuario){
      
        return $this->id_usuario = $id_usuario;
      
        }
        function getIdProyect(){
            return $this->id_proyecto;
        }
      
        function setIdProyect($id_proyecto){
      
        return $this->id_proyecto = $id_proyecto;
      
        }
        function getDescripcion(){
            return $this->descripcion;
        }
      
        function setDescripcion($descripcion){
      
        return $this->descripcion = $descripcion;
      
        }
        function getEstado(){
            return $this->estado;
        }
      
        function setEstado($estado){
      
        return $this->estado = $estado;
      
        }

     }




?>