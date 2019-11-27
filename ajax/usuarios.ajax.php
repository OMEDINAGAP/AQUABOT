<?php
/* Tenemos que requerir nuevamente el controlador y el modelo  */
/* ya que ajax hace una conexion en segundo plano  */
require_once "../controlador/usuarios.controlador.php";
require_once "../modelo/usuarios.modelo.php";

class AjaxUsuarios 
{


    //------------------------------------------------
    //----------- NOTE EDITAR USUARIO --------
    //------------------------------------------------

    public $idUsuario;

        public function ajaxEditarUsuario()
        {
            # Solicitamos al Modelo los Usuarios... 
            $item = "id";
            $valor = $this -> idUsuario;
            $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

            echo json_encode($respuesta);
        }

    //------------------------------------------------
    //----------- NOTE ACTIVAR USUARIO --------
    //------------------------------------------------


    public $activarUsuario;
    public $activarId;

    public function ajaxActivarUsuario()
    {

        $tabla = "usuarios";
        
        $item1 = "estado";
        $valor1 = $this -> activarUsuario;

        $item2 = "id";
        $valor2 = $this -> activarId;

        $respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

    }

    //------------------------------------------------
    //----------- NOTE VALIDAR NO REPETIR USUARIO --------
    //------------------------------------------------

    public $validarUsuario;
    public function ajaxValidarUsuario()
    {
        # Muestra usuario que coincida con el usuario de ValidarUsuario...
        $item = "usuario";
        $valor = $this -> validarUsuario;
        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta);

    }

}
  





    //------------------------------------------------
    //----------- NOTE EDITAR USUARIO --------
    //------------------------------------------------

    /* Para MUsar la clase se tienen que seguir los pasos siguientes: */

    if (isset($_POST["idUsuario"])) {
        # Si hay una Variable Post llamada IdUsuario...
         /* 1.- Creamos un objeto de clase Declarada */
        $editar = new AjaxUsuarios();
        /* 2.- Asignamos Valor a la Variables Publicas declaradas en la clase para su funcionamiento */
        $editar -> idUsuario = $_POST["idUsuario"]; 
        /* 3.- Ejecutamos la funcion */
        $editar -> ajaxEditarUsuario();
     
    }



    //------------------------------------------------
    //----------- NOTE OBJETOS PARA ACTIVAR USUARIO --------
    //------------------------------------------------

    /* ESTOS RECIBIRAN LAS VARIABLES POST */
   
    
    /* Para MUsar la clase se tienen que seguir los pasos siguientes: */

    if (isset($_POST["activarUsuario"])) {
        # Si hay una Variable Post llamada activarUsuario...
         /* 1.- Creamos un objeto de clase Declarada */
        $activarUsuario = new AjaxUsuarios();
        /* 2.- Asignamos Valor a la Variables Publicas declaradas en la clase para su funcionamiento */
        $activarUsuario -> activarUsuario = $_POST["activarUsuario"]; 
        $activarUsuario -> activarId = $_POST["activarId"]; 
        /* 3.- Ejecutamos la funcion */
        $activarUsuario -> ajaxActivarUsuario();
     
    }

    //------------------------------------------------
    //----------- NOTE OBJETOS PARA NO REPETIR USUARIO --------
    //------------------------------------------------

    /* ESTOS RECIBIRAN LAS VARIABLES POST */
   
    
    /* Para MUsar la clase se tienen que seguir los pasos siguientes: */

    if (isset($_POST["validarUsuario"])) {
        # Si hay una Variable Post llamada activarUsuario...
         /* 1.- Creamos un objeto de clase Declarada */
        $valUsuario = new AjaxUsuarios();
        /* 2.- Asignamos Valor a la Variables Publicas declaradas en la clase para su funcionamiento */
        $valUsuario -> validarUsuario = $_POST["validarUsuario"]; 
        /* 3.- Ejecutamos la funcion */
        $valUsuario -> ajaxValidarUsuario();
     
    }