<?php

//REVIEW  ControladorUsuarios
class ControladorUsuarios
{
    //--------------------------------
    //NOTE INGRESO DE USUARIO
    //--------------------------------

    static public function ctrIngresoUsuario()
    {
        # Validamos si existe una peticion Post...
        if (isset($_POST["ingUsuario"])) {
            # si es así, validamos los caracteres...

            #Pregmatch Usuario y Password para evitar SQL Injection
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

                /*  NOTE  Desencriptamos la Contraseña */
                 #crypt(CampoAencriptar, SALT)
                $capsula = '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$';
                $encriptar =  crypt($_POST["ingPassword"], $capsula);

                # Si se cumple la condicion...
                # Enviamos los datos a la Tabla Usuarios

                $tabla  =   "usuarios";
                $item   =   "usuario";
                $valor  =   strtolower ($_POST["ingUsuario"]);

                $respuesta  =   ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

               
                # FIXME Validacion
                # Se comparan los valores de la DB y del Formulario..
                  if($respuesta["usuario"] == $valor && $respuesta["password"] == $encriptar)
                  {


                    # FIXME Validacion Si el usuario esta activo
                
                    if ($respuesta["estado"] == 1) {

                        # Puede Iniciar...
                        
                        # Si paso la validacion..
                        # VARIABLES DE SESSION...
                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["id"] = $respuesta["id"];
                        $_SESSION["nombre"] = $respuesta["nombre"];
                        $_SESSION["usuario"] = $respuesta["usuario"];
                        $_SESSION["fecha"] = $respuesta["fecha"];
                        $_SESSION["foto"] = $respuesta["foto"];
                        $_SESSION["perfil"] = $respuesta["perfil"];
                        $_SESSION["puesto"] = $respuesta["puesto"];
                        $_SESSION["area"] = $respuesta["area"];
                        $_SESSION['start'] = time();
                        $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);

                     
                        /* REVIEW REGISTRAR FECHA Y HORA DE LOGIN */
                     
                        date_default_timezone_set('America/Chihuahua');
                        # Capturamos fecha Actual
                        $fecha = date('Y-m-d');
                        # Capturamos Hora Actual
                        $hora = date('H:i:s');

                        $fechaActual = $fecha.' '.$hora;
                        
                        # Mandamos al modelo los parametros para guardar los datos en la DB
                        $item1 = "ultimo_login";
                        $valor1 = $fechaActual;

                        $item2 = "id";
                        $valor2 = $respuesta["id"];
                        # Se hace la llamada al Modelo
                        $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);
                     
                        if ($ultimoLogin == "ok") {
                            # Podemos Iniciar...
                            # Redireccionamos con un JS..
                            echo '<script> window.location = "Admin"; </script>';
                          

                        }
                        
                        
                        
                        
                        
                        else {
                            # Error Inesperado...
                            echo '<script> 
                            swal({
                                type: "error",
                                title: "¡Error Desconocido!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false

                            });
                        </script>';
                        }
                        


                        

                    } else {
                        # Usuario Desactivado...
                        echo '<script> 
                                swal({
                                    type: "error",
                                    title: "¡Usuario Desactivado!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false

                                });
                            </script>';   
                    }
                    



                  }else{
                      # De lo Contrario..
                    echo '<br><div class="alert alert-danger">Error al Ingresar, Vuelve a Intentarlo</div>';
                  }
 

            }

        }

    }

    //--------------------------------
    //NOTE AGREGAR USUARIO
    //--------------------------------
    
    static public function ctrCrearUsuario()
    {
        # Si viene una variable $_POST con nombre NuevoUsuario ...
        if(isset($_POST["nuevoUsuario"])){

            #Pregmatch para Permitir Caracteres especiales Tildes Excepto el usuario...
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"]))
            {

                 /* NOTE VALIDAMOS LA IMAGEN */

                 $ruta = "";

                        if (isset($_FILES["nuevaFoto"]["tmp_name"])) {
                            
                            # ANCHOR Recortamos la imagen 500x500...
                            # Tomamos ancho y alto
                            list($ancho, $alto) = getImagesize($_FILES["nuevaFoto"]["tmp_name"]);
                            
                            # Redimensionamos con los valores nuevos ...
                            $nuevoAncho = 500;
                            $nuevoAlto = 500;

                            # ANCHOR RCREAMOS LA CARPETA DONDE SE GUARDARA LA IMAGEN...
                            $directorio = "vistas/img/usuarios/".$_POST["nuevoUsuario"];

                            #Directorio, permisos Lectura y Escritura (0755)
                            mkdir($directorio, 0755);

                            /* ANCHOR METODO PARA GUARDAR EN JPEG  */
                            if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

                                $aleatorio = mt_rand(100,999);
                                # Guardamos imagen en directorio JPEG
                                $ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

                                #Cortamos la imagen
                                $origen     = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);   
                                # Manener el color real despues de cortar, sin perder calidad 
                                $destino    = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                                /* imagecopyresized(destino, origen, DestinoCorteX, DestinoCorteY, OrigenCorteX, OrigenCorteY, AnchoDestino, AltoDestino, AnchoOrigen, AltoOrigen); */
                                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                                # Guardamos la foto en la Ruta
                                imagejpeg($destino, $ruta);
                            }


                            /* ANCHOR METODO PARA GUARDAR EN PNG  */
                            if($_FILES["nuevaFoto"]["type"] == "image/png"){

                                $aleatorio = mt_rand(100,999);
                                # Guardamos imagen en directorio PNG
                                $ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

                                #Cortamos la imagen
                                $origen     = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);   
                                # Manener el color real despues de cortar, sin perder calidad 
                                $destino    = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                                /* imagecopyresized(destino, origen, DestinoCorteX, DestinoCorteY, OrigenCorteX, OrigenCorteY, AnchoDestino, AltoDestino, AnchoOrigen, AltoOrigen); */
                                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                                # Guardamos la foto en la Ruta
                                imagepng($destino, $ruta);
                            }
                        

                        }

                 /* ANCHOR  FINALIZA LA VALIDACION DE IMAGEN */



                 /* ANCHOR  GUARDAMOS EN LA DB */

                 /*   Encriptamos la Contraseña */
                 #crypt(CampoAencriptar, SALT)
                $capsula = '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$';
                $encriptar =  crypt($_POST["nuevoPassword"], $capsula);

                    
                $tabla  =   "usuarios";
                $datos  =   array("nombre" => $_POST["nuevoNombre"],
                                  "usuario" => $_POST["nuevoUsuario"],
                                  "password" => $encriptar,
                                  "perfil" => $_POST["nuevoPerfil"],
                                  "area" => $_POST["nuevoArea"],
                                  "puesto" => $_POST["nuevoPuesto"],
                                  "foto" => $ruta);

                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                if ($respuesta == "ok") {
                    # Responde la DB con OK...
                    echo '<script> 
                    swal({
                    type: "success",
                    title: "¡El usuario se a guardado Correctamente!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false

                    }).then((result)=>{
                        
                        if(result.value){
                            window.location = "usuarios";
                        }
                    });
                    </script>';
                }
               
            }else{
                echo '<script> 
                swal({
                    type: "error",
                    title: "¡El usuario no puede ir vacío o con caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false

                  }).then((result)=>{
                        
                        if(result.value){
                            window.location = "usuarios";
                        }
                  });
                </script>';
            } 
        }


    }


    //--------------------------------
    //NOTE MOSTRAR USUARIO ASIGNADOS
    //--------------------------------

    static public function ctrMostrarAsignados($item, $valor)
    {
        # Enviamos los datos a la Tabla Usuarios

        $tabla = "usuarios";
        $respuesta = ModeloUsuarios::mdlMostrarAsignados($tabla, $item, $valor);

        return $respuesta;
    }
    
    //--------------------------------
    //NOTE MOSTRAR USUARIO
    //--------------------------------

    static public function ctrMostrarUsuarios($item, $valor)
    {
        # Enviamos los datos a la Tabla Usuarios

        $tabla = "usuarios";
        $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }

    //--------------------------------
    //NOTE MOSTRAR AREA
    //--------------------------------

    static public function ctrMostrarArea($item, $valor)
    {
        # Enviamos los datos a la Tabla Usuarios

        $tabla = "areas";
        $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }

    //--------------------------------
    //NOTE MOSTRAR PUESTO
    //--------------------------------

    static public function ctrMostrarPuesto($item, $valor)
    {
        # Enviamos los datos a la Tabla Usuarios

        $tabla = "puesto";
        $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }



    //--------------------------------
    //NOTE EDITAR USUARIO
    //--------------------------------

    static public function ctrEditarUsuario()
    {
        # Si viene una variable $_POST con nombre editarUsuario ...
        if(isset($_POST["editarUsuario"])){

             #Pregmatch para Permitir Caracteres especiales Tildes Excepto el usuario...
             if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]))
             {

                                 /* NOTE VALIDAMOS LA IMAGEN */

                                 $ruta = $_POST["fotoActual"];

                                 if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {
                            
                                    # ANCHOR Recortamos la imagen 500x500...
                                    # Tomamos ancho y alto
                                    list($ancho, $alto) = getImagesize($_FILES["editarFoto"]["tmp_name"]);
                                    
                                    # Redimensionamos con los valores nuevos ...
                                    $nuevoAncho = 500;
                                    $nuevoAlto = 500;
        
                                    # ANCHOR RCREAMOS LA CARPETA DONDE SE GUARDARA LA IMAGEN...
                                    $directorio = "vistas/img/usuarios/".$_POST["editarUsuario"];

                                    # NOTE  VALIDAMOS SI EXISTE OTRA IMAGEN EN LA DB
                                    if(!empty($_POST["fotoActual"]))
                                    {
                                        #Si la variable POST trae una foto, Borra el directorio
                                        unlink($_POST["fotoActual"]);
                                    }else{
                                        #Si no trae, creamos un directorio, permisos Lectura y Escritura (0755)
                                        mkdir($directorio, 0755);
                                    }       

        
                                    /* ANCHOR METODO PARA GUARDAR EN JPEG  */
                                    if($_FILES["editarFoto"]["type"] == "image/jpeg"){
        
                                        $aleatorio = mt_rand(100,999);
                                        # Guardamos imagen en directorio JPEG
                                        $ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";
        
                                        #Cortamos la imagen
                                        $origen     = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);   
                                        # Manener el color real despues de cortar, sin perder calidad 
                                        $destino    = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
        
                                        /* imagecopyresized(destino, origen, DestinoCorteX, DestinoCorteY, OrigenCorteX, OrigenCorteY, AnchoDestino, AltoDestino, AnchoOrigen, AltoOrigen); */
                                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
        
                                        # Guardamos la foto en la Ruta
                                        imagejpeg($destino, $ruta);
                                    }
        
        
                                    /* ANCHOR METODO PARA GUARDAR EN PNG  */
                                    if($_FILES["editarFoto"]["type"] == "image/png"){
        
                                        $aleatorio = mt_rand(100,999);
                                        # Guardamos imagen en directorio PNG
                                        $ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";
        
                                        #Cortamos la imagen
                                        $origen     = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);   
                                        # Manener el color real despues de cortar, sin perder calidad 
                                        $destino    = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
        
                                        /* imagecopyresized(destino, origen, DestinoCorteX, DestinoCorteY, OrigenCorteX, OrigenCorteY, AnchoDestino, AltoDestino, AnchoOrigen, AltoOrigen); */
                                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
        
                                        # Guardamos la foto en la Ruta
                                        imagepng($destino, $ruta);
                                    }
                                
        
                                }
                                
                # Si se cumple la condicion...
                # Enviamos los datos a la Tabla Usuarios

                $tabla  =   "usuarios";

                if ($_POST["editarPassword"] != "") {
                    # Si la Contraseña Cambia...

                    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])) {
                        # code...

                        /*  NOTE  Encriptamos la Contraseña */
                        #crypt(CampoAencriptar, SALT)
                        $capsula = '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$';
                        $encriptar =  crypt($_POST["editarPassword"], $capsula);

                    }else{
                        echo '<script> 
                        swal({
                            type: "error",
                            title: "¡Contraseña no puede ir vacío o con caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
        
                          }).then((result)=>{
                                
                                if(result.value){
                                    window.location = "usuarios";
                                }
                          });
                        </script>';
                    }



                } else {
                    # Si no Modifican la Contraseña...
                    $encriptar =  $_POST["passwordActual"];;
                }

                
                $datos  =   array("nombre" => $_POST["editarNombre"],
                                  "usuario" => $_POST["editarUsuario"],
                                  "password" => $encriptar,
                                  "perfil" => $_POST["editarPerfil"],
                                  "foto" => $ruta);

                $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);
                
                if ($respuesta == "ok") {
                    # Responde la DB con OK...
                    echo '<script> 
                    swal({
                    type: "success",
                    title: "¡El usuario ha sido editado Correctamente!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false

                    }).then((result)=>{
                        
                        if(result.value){
                            window.location = "usuarios";
                        }
                    });
                    </script>';
                }



             }else {
                 # code...
                 echo '<script> 
                 swal({
                     type: "error",
                     title: "¡El Usuario no puede ir vacío o con caracteres especiales!",
                     showConfirmButton: true,
                     confirmButtonText: "Cerrar",
                     closeOnConfirm: false
 
                   }).then((result)=>{
                         
                         if(result.value){
                             window.location = "usuarios";
                         }
                   });
                 </script>';
             }
        }

    }    

    //--------------------------------
    //NOTE BORRAR USUARIO
    //--------------------------------

    static public function ctrBorrarUsuarios()
    {
        # si viene una variable por GET llamada idUsuario..
        if (isset($_GET["idUsuario"])) {
            # code...         
        
            $tabla = "usuarios";
            $datos = $_GET["idUsuario"];

            /* Si la variable $_GET["fotoUsuario"] no viene vacia, eliminamos el directorio.. */
            if ($_GET["fotoUsuario"] != "") {
                # Eliminamos Direcotrio...
                unlink($_GET["fotoUsuario"]);
                rmdir('vistas/img/usuarios/'.$_GET["usuario"]);

            }

            $respuesta = ModeloUsuarios::mdlBorrarUsuarios($tabla, $datos);

            if ($respuesta == "ok") {
                # Si el modelo realiza la accion...
                echo '<script> 
                swal({
                type: "success",
                title: "¡El usuario ha sido borrado Correctamente!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
                closeOnConfirm: false

                }).then((result)=>{
                    
                    if(result.value){
                        window.location = "usuarios";
                    }
                });
                </script>';
            }

        }
    }




    
}