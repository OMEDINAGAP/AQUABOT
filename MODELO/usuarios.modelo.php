<?php
require_once "conexion.php";
 
class ModeloUsuarios
{

    //FIXME Mostrar Usuarios

    static public function mdlMostrarUsuarios($tabla, $item, $valor)
    {
        /* NOTE VALIDAMOS SI REGRESA UN VALOR O TODOS */
        
        if ($item != null) {
            # Enviamos un Registro...
            # Creamos la consulta a la Base de Datos...
            $stmt   =   Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            # Enlazamos los valores..
            $stmt   ->  bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt   ->  execute();

            # Regresamos Un solo valos con fetch..
            return $stmt    ->  fetch();
        }else {
            # Enviamos todos los Registros...
            # Creamos la consulta a la Base de Datos...
            $stmt   =   Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt   ->  execute();

            # Regresamos Un solo valos con fetch..
            return $stmt    ->  fetchAll();
        }




      
        # Cerramos la conexion
        $stmt -> close();
        # Se vuelve null para soltar la memoria
        $stmt = null;

    }

    //FIXME Mostrar Usuarios Asignados

    static public function mdlMostrarAsignados($tabla, $item, $valor)
    {
        /* NOTE VALIDAMOS SI REGRESA UN VALOR O TODOS */
        
        if ($item != null) {
            # Enviamos un Registro...
            # Creamos la consulta a la Base de Datos...
            $stmt   =   Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND asignacion = '1'");
            # Enlazamos los valores..
            $stmt   ->  bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt   ->  execute();

            # Regresamos Un solo valos con fetch..
            return $stmt    ->  fetch();
        }else {
            # Enviamos todos los Registros...
            # Creamos la consulta a la Base de Datos...
            $stmt   =   Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE asignacion = '1'");
            $stmt   ->  execute();

            # Regresamos Un solo valos con fetch..
            return $stmt    ->  fetchAll();
        }




      
        # Cerramos la conexion
        $stmt -> close();
        # Se vuelve null para soltar la memoria
        $stmt = null;

    }


    //FIXME REGISTRO DE USUARIOS

    static public function mdlIngresarUsuario($tabla, $datos)
    {
        # Creamos la consulta a la Base de Datos...
        $stmt   =   Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, area, puesto, foto) VALUES (:nombre, :usuario, :password, :perfil, :area,:puesto, :foto)");
    
        # Enlazamos los valores..
        $stmt   ->  bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt   ->  bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt   ->  bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt   ->  bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt   ->  bindParam(":area", $datos["area"], PDO::PARAM_STR);
        $stmt   ->  bindParam(":puesto", $datos["puesto"], PDO::PARAM_STR);
        $stmt   ->  bindParam(":foto", $datos["foto"], PDO::PARAM_STR);     

         # Ejecutamos..
         if($stmt -> execute()) {
            # Regresamos ok...
            return "ok";
        }else{
            return "error";
        }

        # Cerramos la conexion
        $stmt -> close();
        # Se vuelve null para soltar la memoria
        $stmt = null;

    }

/* 
     # Regresamos ok...
             # Creamos la consulta para los permisos...
            
             $sear   =   Conexion::conectar()->prepare("select id from usuarios ORDER BY id DESC LIMIT 1)");
             if($sear -> execute()) {
                 foreach ($sear as $key => $value) {
                     # code...
     
                         # Creamos la consulta a la Base de Datos...
                         $perm   =   Conexion::conectar()->prepare("INSERT INTO permisos(id_usuario, id_area, agregar, editar, eliminar, consultar, avisos, asignaciones, resguardos, estatus) VALUES (:id_usuario, :id_area, :agregar, :editar, :eliminar, :consultar, :avisos, :asignaciones, :resguardos, :estatus)");
                     
                         # Enlazamos los valores..
                         $perm   ->  bindParam(":id_usuario", $value["id"], PDO::PARAM_STR);
                         $perm   ->  bindParam(":id_area", $datos["area"], PDO::PARAM_STR);
                         $perm   ->  bindParam(":agregar", "0", PDO::PARAM_STR);   
                         $perm   ->  bindParam(":editar", "0", PDO::PARAM_STR);   
                         $perm   ->  bindParam(":eliminar", "0", PDO::PARAM_STR);   
                         $perm   ->  bindParam(":consultar", "0", PDO::PARAM_STR);   
                         $perm   ->  bindParam(":avisos", "0", PDO::PARAM_STR);   
                         $perm   ->  bindParam(":asignaciones", "0", PDO::PARAM_STR);   
                         $perm   ->  bindParam(":resguardos", "0", PDO::PARAM_STR);   
                         $perm   ->  bindParam(":estatus", "1", PDO::PARAM_STR);   
     
                          # Ejecutamos..
                         if($perm -> execute()) {
                             # Regresamos ok...
                             return "ok";
                         }else{
                             return "error";
                         }
     
                          # Cerramos la conexion
                         $perm -> close();
                         # Se vuelve null para soltar la memoria
                         $perm = null;
                 }
             }else{
                 return "error";
             }
               
 
               # Cerramos la conexion
               $sear -> close();
               # Se vuelve null para soltar la memoria
               $sear = null;
              */
    
    //FIXME EDITAR USUARIOS

    static public function mdlEditarUsuario($tabla, $datos)
    {
        # Creamos la consulta a la Base de Datos...
        $stmt   =   Conexion::conectar()->prepare("UPDATE $tabla 
        SET nombre = :nombre, password = :password, perfil = :perfil, foto = :foto 
        WHERE usuario = :usuario");
    
        # Enlazamos los valores..
        $stmt   ->  bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt   ->  bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt   ->  bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt   ->  bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt   ->  bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
     
        # Ejecutamos..
        if($stmt -> execute()) {
            # Regresamos ok...
            return "ok";
        }else{
            return "error";
        }

        # Cerramos la conexion
        $stmt -> close();
        # Se vuelve null para soltar la memoria
        $stmt = null;

    }

    //FIXME ACTUALIZAR USUARIOS

    static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2)
    {
        # Generamos un Update...
        # Creamos la consulta a la Base de Datos...
        $stmt   =   Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

         # Enlazamos los valores..
         $stmt   ->  bindParam(":".$item1, $valor1, PDO::PARAM_STR);
         $stmt   ->  bindParam(":".$item2, $valor2, PDO::PARAM_STR);

         # Ejecutamos..
        if($stmt -> execute()) {
            # Regresamos ok...
            return "ok";
        }else{
            return "error";
        }

        # Cerramos la conexion
        $stmt -> close();
        # Se vuelve null para soltar la memoria
        $stmt = null;

    }



     //FIXME BORRAR USUARIOS

     static public function mdlBorrarUsuarios($tabla, $datos)
     {
      
        # Creamos la consulta a la Base de Datos...
        $stmt   =   Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        # Enlazamos los valores..
        $stmt   ->  bindParam(":id", $datos, PDO::PARAM_STR);

        # Ejecutamos..
       if($stmt -> execute()) {
           # Regresamos ok...
           return "ok";
       }else{
           return "error";
       }

       # Cerramos la conexion
       $stmt -> close();
       # Se vuelve null para soltar la memoria
       $stmt = null;
     }


    
}