<div class="contact-clean">
    <form method="POST" id="FormContacto" data-aos="flip-down">
        <p class="text-center" style="font-family: 'Open Sans', sans-serif;">Tecnología para ayudar. Los Cabos como
            <strong>destino turistico inteligente</strong>.</p>
        <h2 class="text-center" style="margin-top: 50px;">Contáctanos<a href="#" id="contactolink"></a></h2>
        <div class="form-group"><input class="form-control" type="text" name="name" required="" placeholder="Nombre">
        </div>
        <div class="form-group"> <input class="form-control" type="text" name="tel_contacto"
                placeholder="Telefono Móvil" maxlength="10" minlength="10" required> </div>
        <!--  pattern="[0-9]+" -->

        <div class="form-group"><input class="form-control" type="email" name="correo" required="" placeholder="Correo"
                autocomplete="on"></div>
        <div class="form-group"><textarea class="form-control" rows="14" name="message"
                placeholder="Mensaje"></textarea></div>
        <div
            class="form-group d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center">
            <button class="btn btn-primary d-md-flex" type="submit" id="enviar">Enviar</button></div>

        <?php

                $enviarContacto = new ControladorContacto();
                $enviarContacto -> ctrCrearContacto();

            ?>
    </form>
</div>