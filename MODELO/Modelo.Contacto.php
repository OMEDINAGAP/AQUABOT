<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// Import PHPMailer classes into the global namespace
        // These must be at the top of your script, not inside a function
        require 'MODELO/Exception.php';
        require 'MODELO/PHPMailer.php';
        require 'MODELO/SMTP.php';
        
        require_once "conexion.php";


class ModeloContacto
{
    
    
    static public function MdlGuardarContacto($tabla, $datos)
    {
         # code...
         if ($datos != null) {
            
            // Load Composer's autoloader
            require 'vendor/autoload.php';

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);
            
            try{           
            
          
                //Server settings
                /* $mail->SMTPDebug = SMTP::DEBUG_SERVER; */                // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'omedinagap@gmail.com';                 // SMTP username
                $mail->Password   = 'MEEDINA1820';                          // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
                $mail->Port       = 587;                                    // TCP port to connect to
                date_default_timezone_set("America/Mazatlan");
                $fechaI = date('l jS F Y, h:i A');
            
                //Recipients
                $mail->setFrom($datos["correo"], 'www.aquaBOT.com');
                $mail->addAddress('omedinagap@gmail.com', 'Admin AquaBOT');     // Add a recipient
                /* $mail->addAddress('ellen@example.com');               // Name is optional */
                /* $mail->addReplyTo('info@example.com', 'Information'); */
                /* $mail->addCC('cc@example.com'); */
                /* $mail->addBCC('bcc@example.com'); */
            
                // Attachments
                /* $mail->addAttachment('assets/img/explorer.png', 'new.png');         // Add attachments */
                /* $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name */
                $mail->AddEmbeddedImage("assets/img/explorer.png", "my-attach", "Explorer");   
            
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Contactame....';
                $message_completo = '<html>'.
                            '<br>'.
                            '<img alt="PHPMailer" src="cid:my-attach">'.
                            '<br>'.
                            '<h5 style="color:#2c2c54;"> Dear customer;</h5>'.
                            '<br>'.
                            '<h5 style="color:#2c2c54;"> We want to inform you that there is a new baggage delivery order</h5>'.                           
                            '<h5 style="color:#2c2c54;"> Please see more details below</h5>'.
                            '<h5 style="color:#2c2c54;"> Customer name:     ' . $datos["Nombre"] . '.</h5>'.
                            '<h5 style="color:#2c2c54;"> Contact number:    ' . $datos["telefono"] . '.</h5>'.
                            '<h5 style="color:#2c2c54;"> Date & time:       '. $fechaI . '.</h5>'.
                            '<h5 style="color:#2c2c54;"> E-Mail:            '. $datos["correo"] . '.</h5>'.
                            '<br>'.
                            '<h5 style="color:#2c2c54;"> Message:           '. $datos["mensaje"] . '.</h5>'.
                            '<br>'.
                            '<br>'.
                            '<h5 style="color:#2c2c54;"> Thanks & regards.</h5>'.
                            '<h5 style="color:#2c2c54;"> AquaBOT</h5>'.
                            '<h5 style="color:#2c2c54;"> Ites Los Cabos</h5>'.
                            '<br>'.
                            '</body>'.
                            '</html>';

                $mail->Body    = $message_completo;
               /*  $mail->Body    = 'This is the HTML message body <b>in bold!</b>'; */
                /* $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; */
            
                if($mail->send()){
                    # Guardamos en la base de datos...
                    
                        //code...
                       
                      # Creamos la consulta a la Base de Datos...
                        $stmt   =   Conexion::conectar()->prepare("INSERT INTO $tabla (Nombre_Contacto, Tel_Contacto, Email_Contacto, Mensaje_Contacto) VALUES (:Nombre_Contacto, :Tel_Contacto, :Email_Contacto, :Mensaje_Contacto)");

                        # Enlazamos los valores..
                        $stmt   ->  bindParam(":Nombre_Contacto", $datos["Nombre"], PDO::PARAM_STR);
                        $stmt   ->  bindParam(":Tel_Contacto", $datos["telefono"], PDO::PARAM_STR);
                        $stmt   ->  bindParam(":Email_Contacto", $datos["correo"], PDO::PARAM_STR);
                        $stmt   ->  bindParam(":Mensaje_Contacto", $datos["mensaje"], PDO::PARAM_STR);

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

                }else{
                    return 'error';
                }
                
            } catch (Exception $e) {
                return "Error: {$mail->ErrorInfo}";
            }




            
            
        }else {

            return "No hay nada";
            
           
        }
        

    }
}