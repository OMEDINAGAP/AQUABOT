<div class="simple-slider" data-aos="zoom-in">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <!-- <div class="swiper-slide" style="background-image: url(assets/img/photo-1472715148636-92e348325950.jpg);max-height: 500px;"></div>
                <div class="swiper-slide" style="background-image: url(assets/img/photo-1487253096619-4ab6f24d5bbe.jpg);"></div>
                <div class="swiper-slide" style="background-image: url(assets/img/photo-1504010277680-57fdcb91f65c.jpg);"></div> -->
            <?php
                $imgitem = null;
                $imgvalor = null;
                $imagen =  ControladorCaracteristicas::ctrMostrarSlider($imgitem, $imgvalor);
           
                foreach ($imagen as $key => $value) {
                    # code...
                    echo '<div class="swiper-slide" style="background-image: url('.$value["Ruta"].');max-height: 500px;"></div>';
                }

                ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>