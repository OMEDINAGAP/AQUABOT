<div id="conocenos" class="team-boxed" style="padding-top: 80px;padding-bottom: 80px;">
    <div class="container">
        <div class="intro" data-aos="fade-up">
            <h2 class="text-center">Conócenos<a href="#" id="conocenoslink"></a></h2>
        </div>
        <div class="row people">
            <!-- <div class="col-md-6 col-lg-4 item"> -->
            <!-- <div class="box"><img class="rounded-circle" src="assets/img/1.jpg">
                    <h3 class="name">Agustín Medina</h3>
                    <p class="title">Estudiante</p>
                    <p class="description">medinaf098@hotmail.com</p>
                    <div class="social"><a href="https://www.facebook.com/agus.medinafonseca" target="_blank"><i
                                class="fa fa-facebook-official"></i></a><a
                            href="https://www.instagram.com/medinaf98/?hl=en" target="_blank"><i
                                class="fa fa-instagram"></i></a></div>
                </div> -->
            <?php

$item = "Tipo";
$valor = "7";

$caracteristicas = ControladorCaracteristicas::ctrMostrarCaracteristicas($item, $valor);

echo '<div class="col-md-6 col-lg-4 item" data-aos="flip-left" data-aos-duration="1000">
<div class="box"><img class="rounded-circle" src="'.$caracteristicas["Ruta"].'">
<h3 class="name">Agustín Medina</h3>
<p class="title">Estudiante</p>
<p class="description">medinaf098@hotmail.com</p>
<div class="social"><a href="https://www.facebook.com/agus.medinafonseca" target="_blank"><i
            class="fa fa-facebook-official"></i></a><a
        href="https://www.instagram.com/medinaf98/?hl=en" target="_blank"><i
            class="fa fa-instagram"></i></a></div>
            </div></div>';

?>

            <?php

$item = "Tipo";
$valor = "8";

$caracteristicas = ControladorCaracteristicas::ctrMostrarCaracteristicas($item, $valor);

echo '<div class="col-md-6 col-lg-4 item" data-aos="flip-left" data-aos-duration="2000">
<div class="box"><img class="rounded-circle" src="'.$caracteristicas["Ruta"].'">
<h3 class="name">Jesus Lozano</h3>
<p class="title">Estudiante</p>
<p class="description">jesus.lozano.aquino@hotmail.com</p>
<div class="social"><a href="https://www.facebook.com/jesus.lozano.aquino" target="_blank"><i
            class="fa fa-facebook-official"></i></a><a
        href="https://www.instagram.com/jesus_lozano_aquino/?hl=en" target="_blank"><i
            class="fa fa-instagram"></i></a></div>
</div></div>';

?>


            <?php

$item = "Tipo";
$valor = "9";

$caracteristicas = ControladorCaracteristicas::ctrMostrarCaracteristicas($item, $valor);

echo '<div class="col-md-6 col-lg-4 item" data-aos="flip-left" data-aos-duration="3000">
<div class="box 1"><img class="rounded-circle" src="'.$caracteristicas["Ruta"].'">
<h3 class="name">Jonathan Mendieta</h3>
<p class="title">Estudiante</p>
<p class="description">jonamrx88@hotmail.com</p>
<div class="social"><a href="https://www.facebook.com/jonathan.mendietarosas.1"><i
            class="fa fa-facebook-official"></i></a><a
        href="https://www.instagram.com/jona_mendieta01/?hl=en"><i class="fa fa-instagram"></i></a>
</div>
</div>
</div>';
?>

        </div>
    </div>
</div>
</div>