<?php
   
    function comparaUsuario($con){
        $resultado = mysqli_query($con, "select id, nombre, pass, tipo_usuario, id from usuario ");
	    return $resultado;
    }
    function traerProyectos($con){
        $resultado = mysqli_query($con, "select * from proyecto ");
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
       
        $resultado = mysqli_query($con, "insert into tarea(usuario,proyecto,nombre,estado) values('$id_usuario', '$id_proyecto', '$descripcion', '$estado')");
        
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
    function actualizarTarea($con,$nombreT,$id_usuario){
       
        $resultado = mysqli_query($con, "update tarea set nombre='$nombreT' where proyecto='$id_usuario'");
        
        return $resultado;
    }
    

?>