<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>DISEÑO</title>
    <!--     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css"> -->
    <!--     <-- Bootstrap 3.3.7 --
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <-- Font Awesome --
    <link rel="stylesheet" href="AdminLTE-2.4.2/bower_components/font-awesome/css/font-awesome.min.css">

    <-- Ionicons --
    <link rel="stylesheet" href="AdminLTE-2.4.2/bower_components/Ionicons/css/ionicons.min.css"> -->


    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Bold-BS4-Footer-Simple.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/Highlight-Phone.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Map-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button-1.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Projects-Horizontal.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo-1.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/Slider_Carousel_webalgustocom-1.css">
    <link rel="stylesheet" href="assets/css/Slider_Carousel_webalgustocom-2.css">
    <link rel="stylesheet" href="assets/css/Slider_Carousel_webalgustocom.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Team-Boxed.css">

    <!--     <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
 -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!--     

    <link rel="stylesheet" href="AdminLTE-2.4.2/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="AdminLTE-2.4.2/dist/css/skins/_all-skins.min.css"> -->


    <!--   <link rel="stylesheet" href="AdminLTE-2.4.2/bower_components/Ionicons/css/ionicons.min.css"> -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>

    <?php include_once "modulos/admin/inclucion.php"; ?>
    <style>
    * {
        outline: none !important;
        scroll-behavior: smooth;
    }
    </style>

</head>

<body style="background-color: rgb(255,255,255);"
    class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">

    <?php

    if (!isset($_GET["ruta"])) {
      # code...
      $_GET["ruta"]="inicio";
    }

   

    

   

     # SECTION  Usuario Normal que no se han logueado...
           
            if ($_GET["ruta"] == "inicio") {
              # code...
              
            include_once "modulos/navbar.php";
            include_once "modulos/portada.php";
            include_once "modulos/puntos1.php";
            include_once "modulos/caracteristicas2.php";
            include_once "modulos/caracteristicas3.php";
            include_once "modulos/caracteristicas4.php";
            include_once "modulos/Slider5.php";
            include_once "modulos/mapa.php";
            include_once "modulos/galeria.php";
            include_once "modulos/quienes.somos.php";
            include_once "modulos/contacto.php";
            include_once "modulos/footer.php";

            } elseif ($_GET["ruta"] == "login") {
              # code...
              ?>
    <link rel="stylesheet" href="AdminLTE-2.4.2/bower_components/bootstrap/dist/css/bootstrap.min.css">


    <?php
              include_once "modulos/login.php";
              include_once "modulos/admin/Admin-footer.php";
            }
            

            #usuarios Normales Que tienen un BOT ----------------
             elseif ($_GET["ruta"] == "recuperar") {
              # Crear Cuenta...              
              include_once "modulos/users/".$_GET["ruta"].".php";
            }
            #----------------------------------------------------
            
            
            elseif ($_GET["ruta"] == "salir") {
              # code...             
              include_once "modulos/salir.php";
            }
            
            
            else if ($_GET["ruta"] == "Admin" ||  
                     $_GET["ruta"] == "Admin-inicio" ||          
                     $_GET["ruta"] == "cuenta" ||          
                     $_GET["ruta"] == "Admin-state") {
              # code...
                            if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == "ok") {

                              $now = time();
                              if($now > $_SESSION['expire']) {
                                  # Responde la DB con OK...
                  
                                  echo '<script>
                                  swal({
                                  type: "error",
                                  title: "Oops...",
                                  text: "¡Tu sesion a Expirado!",
                                  footer: "<a href>Iniciar Sesion..</a>"
                                    }).then((result)=>{
                                        
                                      if(result.value){
                                          window.location = "salir";
                                      }
                                  });
                                  </script>';
                  
                              } 


                              
                              # Usuario Logueado...
                              include_once "modulos/admin/inclucion.php";
                              include_once "modulos/admin/Admin-menu.php";
                              include_once "modulos/admin/Admin-header.php";
                              include_once "modulos/admin/".$_GET["ruta"].".php";
                              include_once "modulos/admin/Admin-footer.php";







                            } else {
                              # Redireccionamos al Login a usuarios que no tienen sesion Iniciada...                                
                              echo '<link rel="stylesheet" href="AdminLTE-2.4.2/bower_components/bootstrap/dist/css/bootstrap.min.css">';
                              include_once "modulos/login.php";
                            }
                            
              
        
        
            }










            
            
            else {              
              # code...
              include "modulos/navbar.php";
              include_once "modulos/404.php";
              include_once "modulos/footer.php";
            }

        
        

      

      


    ?>



    <!--  SECTION  Enlazamos ls archivos JS LOCALES... -->








    <!-- Inicializar Sweet Scroll AOS -->
    <script>
    AOS.init();
    </script>

    <!--  SECTION  Enlazamos ls archivos JS... -->

    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
    <script src="assets/js/Slider_Carousel_webalgustocom.js"></script>

    <!-- Sweet Scroll AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>



</body>

</html>