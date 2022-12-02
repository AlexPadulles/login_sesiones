<?php
   
    function comparaUsuario($con){
        $resultado = mysqli_query($con, "select id, nombre, pass, tipo_usuario, id from usuario ");
	    return $resultado;
    }
    function traerProyectos($con){
        $resultado = mysqli_query($con, "select * from proyecto ");
	    return $resultado;
    }
    function modificaProyecto($con,$id_proyecto){
        $resultado = mysqli_query($con, "select id,nombre from proyecto where id='$id_proyecto' ");
	    return $resultado;
    }
    
    function obtener_resultados($resultado){
        return mysqli_fetch_array($resultado);// busca filas y almacena como una matriz
    }
    
    function insertarUsuarios($con,$nom,$pw,$acc){
        $resultado = mysqli_query($con, "insert into usuario(nombre, pass, tipo_usuario) values('$nom', '$pw', $acc )");
        return $resultado;
    }

    function insertarProyecto($con,$proyecto){

        $resultado = mysqli_query($con, "insert into proyecto(nombre) values('$proyecto')");

        return $resultado;
    }

    function obtenerIdProyecto($con,$proyecto){
       
        $id_proyecto = mysqli_query($con, "select id from proyecto where nombre='$proyecto'");
        if ($row = $id_proyecto->fetch_assoc()) {
            extract($row);
            return $id;
        }
       return"";
    }

    function insertarTarea($con,$id_usuario,$id_proyecto,$descripcion,$estado){
       
        $resultado = mysqli_query($con, "insert into tarea(usuario,proyecto,tarea,estado) values('$id_usuario', '$id_proyecto', '$descripcion', '$estado')");
        
        return $resultado;
    }

    function actualizarUsuario($con,$nombreM,$passM,$tipoM,$id_usuario){
       
        $resultado = mysqli_query($con, "update usuario set nombre='$nombreM',pass='$passM',tipo_usuario='$tipoM' where id='$id_usuario'");
        
        return $resultado;
    }
    function actualizarProyecto($con,$nombreP,$id_usuario){
       
        $resultado = mysqli_query($con, "update proyecto set nombre='$nombreP' where id='$id_usuario'");
        
        return $resultado;
    }
    function actualizarTarea($con,$tarea,$estado,$id_proyecto){
       
        $resultado = mysqli_query($con, "update tarea set tarea='$tarea',estado='$estado' where proyecto='$id_proyecto'");
        
        return $resultado;
    }
    function insertarTarea2($con,$id_usuario,$id_proyecto,$descripcion,$estado){
       
        $resultado = mysqli_query($con, "insert into tarea(usuario,proyecto,tarea,estado) values('$id_usuario', '$id_proyecto', '$descripcion', '$estado')");
        
        return $resultado;
    }
    function traerTareasProyectos($con){
       
        $resultado = mysqli_query($con, "SELECT t1.id, t1.nombre, t2.tarea,t2.estado FROM proyecto t1
        INNER JOIN  tarea t2 ON t1.id=t2.proyecto") 
        or die();
        return $resultado;
    }
    function traerProyecto($con,$id_proyecto){
       
        $resultado = mysqli_query($con, "SELECT  usuario, tarea, estado FROM tarea WHERE
        proyecto='$id_proyecto'") 
        or die();
        return $resultado;
    }
    function traerTareas($con,$id_proyecto){
       
        $resultado = mysqli_query($con, "SELECT  usuario, tarea, estado FROM tarea WHERE
        usuario='$id_proyecto'") 
        or die();
        return $resultado;
    }
    function borrarUsuario($con,$id){

        $resultado = mysqli_query($con, "DELETE FROM usuario WHERE id='$id'");
        return $resultado;
    }
    function borrarProyecto($con,$id){

        $resultado = mysqli_query($con, "DELETE FROM proyecto WHERE id='$id'");
        return $resultado;
    }
    function cerrar_conexion($con){
        mysqli_close($con);
    }
    function login($con,$nombre,$pass){
        $resultado = mysqli_query($con, "select id,nombre,pass,tipo_usuario from usuario where nombre='$nombre' and pass='$pass' ");
	    return $resultado;
    }

?>