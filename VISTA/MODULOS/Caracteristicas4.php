<div class="highlight-phone" style="margin-top: 50px;margin-bottom: 50px;" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="intro">
                    <h2 class="text-center" style="font-family: 'Open Sans', sans-serif;">Vigila</h2>
                    <p class="text-justify" style="font-family: 'Open Sans', sans-serif;">Observa de cerca a bañistas
                        que disfruten de la playa alejados de la orilla, hasta 1 Km de distancia.</p>
                    <p class="text-justify" style="font-family: 'Open Sans', sans-serif;">Realiza
                        <strong>avistamientos</strong> de cualquier tipo dentro del mar.</p>
                    <p class="text-justify" style="font-family: 'Open Sans', sans-serif;">Todo esto y mucho más, desde
                        la orilla de la playa.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <!--  <div class="d-none d-md-block iphone-mockup imagenvigila" style="transform: rotate(0deg);"><img
                        class="img-fluid device" src="assets/img/photo-1472108591690-92fca4e29244.jpg"
                        style="width: 150%;margin-top: 20%;margin-left: 0px;"></div> -->
                <?php

                $item = "Tipo";
                $valor = "4";

                $caracteristicas = ControladorCaracteristicas::ctrMostrarCaracteristicas($item, $valor);


    # code...
 
        # code...
        echo '<div class="d-none d-md-block iphone-mockup imagenvigila" style="transform: rotate(0deg);"><img
        class="img-fluid device" src="'.$caracteristicas["Ruta"].'" style="margin-left: 0px;"></div>';

    
 





                    
                    ?>

            </div>
        </div>
    </div>
</div>