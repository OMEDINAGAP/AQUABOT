<div class="highlight-phone" style="margin-top: 55px;" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 d-xl-flex align-items-xl-start">

                <!-- <img
                        class="img-fluid" src="assets/img/registro.png"
                        style="height: 100%;width: 100%;margin-left: 0px;"> -->
                <?php

$item = "Tipo";
$valor = "3";

$caracteristicas = ControladorCaracteristicas::ctrMostrarCaracteristicas($item, $valor);



# code...

# code...
echo '<div class="d-none d-md-block d-xl-flex iphone-mockup" style="transform: rotate(0deg);"><img class="img-fluid device" src="'.$caracteristicas["Ruta"].'" style="margin-left: 0px;"></div>';


 




    
    ?>

            </div>
            <div class="col-md-8 text-left d-lg-flex d-xl-flex justify-content-lg-end justify-content-xl-center">
                <div class="intro">
                    <h2 class="text-center text-sm-center d-lg-flex d-xl-flex justify-content-lg-center justify-content-xl-center"
                        style="font-family: 'Open Sans', sans-serif;">Excelente herramienta</h2>
                    <p class="text-justify d-lg-flex" style="font-family: 'Open Sans', sans-serif;">Obten una cuenta
                        <strong><em>&nbsp;explorador</em></strong>, y haz uso de la herramienta.</p><a
                        class="btn btn-primary" role="button" href="#contactolink"
                        style="font-family: 'Open Sans', sans-serif;margin-left: 35%;">Contactar</a>
                </div>
            </div>
        </div>
    </div>
</div>