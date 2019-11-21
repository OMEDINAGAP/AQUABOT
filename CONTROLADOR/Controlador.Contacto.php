<?php
class ControladorContacto
{
    static public function ctrCrearContacto()
    {


            # code...
            if (isset($_POST["name"]) && $_POST["name"] != "") {
                # code...
                    /* if ($_POST["name"] != "") { */
                        # code...
                        if (preg_match('/^[0-9]+$/', $_POST["tel_contacto"])) {
                            # code...

                            $tabla = "contacto";
                            $datos = array(
                                    "Nombre"    => $_POST["name"],
                                    "telefono"  => $_POST["tel_contacto"],
                                    "correo"  => $_POST["correo"],
                                    "mensaje"  => $_POST["message"]
                            );


                            $respuesta = ModeloContacto::MdlGuardarContacto($tabla, $datos);

                            if ($respuesta == "ok") {
                                # code...
                                 # Si pasa la validacion del envio de correo y grardar la base de datos...
                               
                                echo '<script>Swal.fire({
                                    title: "Enviado!",
                                    text: "Pronto nos comunicaremo con usted.",
                                    imageUrl: "assets/img/sendEmail.gif",
                                    imageWidth: 400,
                                    imageHeight: 300,
                                    imageAlt: "Custom image",
                                  })</script>';
                                  
                                  //sleep for 3 seconds
                                  sleep(3);
                                  echo '<script> window.location = "inicio"; </script>';

                                  
                                
                            }
                            else if ($respuesta == "error"){
                                # Validacion del telefono...
                                echo '<script>Swal.fire({
                                title: "Disculpe las Molestias!",
                                text: "Tenemos un inconveniente, intente mas tarde.",
                                confirmButtonText: "OK"
                                })</script>';                
                            
                            }




                        }else {
                            # Validacion del telefono...
                            echo '<script>Swal.fire({
                            title: "Error!",
                            text: "Formato telefonico incorrecto",
                            confirmButtonText: "OK"
                            })</script>';                
                        
                        }


                        
                    /* }else {
                        # code...
                        echo "no hay nada que enviar";
                    } */
            }else {
                # code...
                /* echo "No tengo valores"; */
            } 
    }
}



/* Generador de Objeto Contacto */