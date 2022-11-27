<?php

    class Basedatos extends Conexion{
  
       
        public $admin= "alex";
        public $pw= "1234";
        public $tipo= 0;
        public $db_name= "actividad04php";

        public function __construct()
        {
            $this->crear_bdd($this->conectando());
            
          
        }

             function crear_bdd($con){
            mysqli_query($con, "create database if not exists actividad04php;");
            }

             //creamos las tablas en la base de datos
             function crear_tabla_usuario($con){
            
                mysqli_query($con, "create table if not exists usuario(id int primary key auto_increment, nombre varchar(255), pass varchar(255), tipo_usuario tinyint);");
                
            }
    
            function crear_tabla_proyecto($con){
                mysqli_query($con, "create table if not exists proyecto(id int primary key auto_increment, nombre varchar(255));");
               
            }
    
            function crear_tabla_tarea($con){
                mysqli_query($con, "create table if not exists tarea(usuario int , proyecto int , nombre varchar(255), estado int, primary key(usuario, proyecto), 
                foreign key (usuario) references usuario(id), 
                foreign key (proyecto) references proyecto(id));");
                
            }
            function aniadirAdmin($con){
                $resultado = mysqli_query($con, "insert into usuario(nombre, pass, tipo_usuario) values('$this->admin', '$this->pw', $this->tipo )");
                return $resultado;
            }
            
        }
       
    


?>
