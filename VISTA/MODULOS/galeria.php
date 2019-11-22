<div id="galeria" class="photo-gallery"
    style="margin-top: 50px;background-color: rgb(241,247,252);margin-bottom: 50px;padding-bottom: 50px;"
    data-aos="fade-up" data-aos-anchor-placement="top-bottom">
    <div class="container">
        <div class="intro">
            <h2 class="text-center d-xl-flex justify-content-xl-center" style="color: rgb(0,0,0);">&nbsp;AquaBOT<a
                    href="#" id="galerialink"></a></h2>
            <p class="text-center" style="color: rgb(0,0,0);">Galeria de algunas de las actividades que ha realizado el
                prototipo <em>explorer </em>de AquaBOT en playas de Los Cabos. </p>
        </div>
        <div class="row photos"
            style="background-color: #000000;padding-top: 20px;padding-right: 20px;padding-left: 20px;"
            data-aos="flip-left">
            <!-- <div class="col-sm-6 col-md-4 col-lg-3 item"><a
                    href="assets/img/73458980_10156541781116884_7414551447817158656_o.jpg" data-lightbox="photos"><img
                        class="img-fluid" src="assets/img/73458980_10156541781116884_7414551447817158656_o.jpg"
                        style="height: 100%;margin-left: 0px;width: 100%;"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item"><a
                    href="assets/img/72963758_10156541782831884_204246010120110080_o.jpg" data-lightbox="photos"><img
                        class="img-fluid" src="assets/img/72963758_10156541782831884_204246010120110080_o.jpg"
                        style="height: 100%;margin-left: 0px;width: 100%;"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item"><a
                    href="assets/img/72571991_10156541782661884_245079054477164544_o.jpg" data-lightbox="photos"><img
                        class="img-fluid" src="assets/img/72571991_10156541782661884_245079054477164544_o.jpg"
                        style="height: 100%;margin-left: 0px;width: 100%;"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item"><a
                    href="assets/img/72741038_10156541780986884_8825891904739606528_o.jpg" data-lightbox="photos"><img
                        class="img-fluid" src="assets/img/72741038_10156541780986884_8825891904739606528_o.jpg"
                        style="height: 100%;margin-left: 0px;width: 100%;"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item"><a
                    href="assets/img/72525927_10156541781556884_3486083778588180480_o.jpg" data-lightbox="photos"><img
                        class="img-fluid" src="assets/img/72525927_10156541781556884_3486083778588180480_o.jpg"
                        style="height: 100%;margin-left: 0px;width: 100%;"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="assets/img/photo-1472715148636-92e348325950.jpg"
                    data-lightbox="photos"><img class="img-fluid" src="assets/img/photo-1472715148636-92e348325950.jpg"
                        style="height: 100%;margin-left: 0px;width: 100%;"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="assets/img/photo-1504010277680-57fdcb91f65c.jpg"
                    data-lightbox="photos"><img class="img-fluid" src="assets/img/photo-1504010277680-57fdcb91f65c.jpg"
                        style="height: 100%;margin-left: 0px;width: 100%;"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="assets/img/photo-1487253096619-4ab6f24d5bbe.jpg"
                    data-lightbox="photos"><img class="img-fluid" src="assets/img/photo-1487253096619-4ab6f24d5bbe.jpg"
                        style="height: 100%;margin-left: 0px;width: 100%;"></a></div> -->

            <?php

$item = null;
$valor = null;

$caracteristicas = ControladorCaracteristicas::ctrMostrarGaleria($item, $valor);




foreach ($caracteristicas as $key => $value) {
    # code...
    echo '<div class="col-sm-6 col-md-4 col-lg-3 item"><a
href="'.$value["Ruta"].'" data-lightbox="photos"><img
    class="img-fluid" src="'.$value["Ruta"].'"
    style="height: 100%;margin-left: 0px;width: 100%;"></a></div>';


}
   












    
    ?>
            <div class="col d-xl-flex justify-content-xl-center">
                <div class="text-center d-xl-flex justify-content-xl-center"
                    style="background-color: #000000;/*border: solid 2px;*//*border-color: #fff;*/"><a
                        class="border rounded-circle" href="#"
                        style="background-color: #ffffff;margin-right: 15px;margin-left: 15px;font-size: 35px;"><i
                            class="fa fa-facebook-official"
                            style="font-size: 40px;margin-right: 10px;margin-top: 10px;margin-bottom: 10px;margin-left: 10px;"></i></a>
                    <a class="border rounded-circle" href="#" style="background-color: #ffffff;font-size: 35px;"><i
                            class="fa fa-instagram"
                            style="font-size: 40px;color: rgb(164,117,222);margin-right: 15px;margin-top: 10px;margin-bottom: 10px;margin-left: 15px;"></i></a><a
                        class="border rounded-circle" href="#"
                        style="background-color: #ffffff;margin-right: 15px;margin-left: 15px;font-size: 35px;"><i
                            class="fa fa-youtube-play"
                            style="font-size: 40px;color: rgb(231,29,29);margin-top: 10px;margin-right: 10px;margin-bottom: 10px;margin-left: 10px;"></i></a>
                </div>
            </div>
        </div>


        <div class="row d-sm-flex d-lg-flex">
            <div class="col d-sm-flex d-lg-flex"
                style="background-color: #000000;padding-left: 20px;padding-bottom: 20px;padding-top: 20px;padding-right: 20px;">
                <div class="d-sm-flex d-lg-flex" style="height: 300px;">
                    <div class="carousel slide d-sm-flex d-lg-flex" data-ride="carousel" id="carousel-1">
                        <div class="carousel-inner d-sm-flex d-xl-flex align-items-xl-center" role="listbox"
                            style="height: 300px;width: 100%;">
                            <!-- <div class="carousel-item"><img class="img-fluid w-100 d-block"
                                    src="assets/img/72843920_10156541783636884_2123555234142748672_o.jpg"
                                    alt="Slide Image"
                                    style="height: 100%;background-image: url(&quot;assets/img/72843920_10156541783636884_2123555234142748672_o.jpg&quot;);background-position: center;background-size: cover;margin-left: 0px;">
                            </div>
                            <div class="carousel-item"><img class="img-fluid w-100 d-block"
                                    src="assets/img/72571991_10156541782661884_245079054477164544_o.jpg"
                                    alt="Slide Image"
                                    style="background-image: url(&quot;assets/img/72525927_10156541781556884_3486083778588180480_o.jpg&quot;);background-position: center;background-size: cover;height: 100%;margin-left: 0px;">
                            </div>
                            <div class="carousel-item active"><img class="img-fluid w-100 d-block"
                                    src="assets/img/72741038_10156541780986884_8825891904739606528_o.jpg"
                                    alt="Slide Image"
                                    style="background-image: url(&quot;assets/img/72571991_10156541782661884_245079054477164544_o.jpg&quot;);background-position: center;background-size: cover;width: 100%;height: 100%;margin-left: 0px;">
                            </div> -->

                            <?php

                                            $imgitem = null;
                                            $imgvalor = null;
                                            $imagen =  ControladorCaracteristicas::ctrMostrarSliderGaleria($imgitem, $imgvalor);
                                            $activoC = "active";
                                            foreach ($imagen as $key => $value2) {
                                                # code...
                                                /* echo '<div class="carousel-item"><img class="img-fluid w-100 d-block" src="'.$value2["Ruta"].'" alt="Slide Image" style="height: 100%;background-image: url('.$value2["Ruta"].')"></div>'; */
                                                echo '<div class="carousel-item '.$activoC.'"><img class="img-fluid w-100 d-block"
                                                src="'.$value2["Ruta"].'"
                                                alt="Slide Image"
                                                style="background-image: url('.$value2["Ruta"].');background-position: center;background-size: cover;width: 100%;height: 100%;margin-left: 0px;">
                                        </div>';
                                        $activoC = "";
                                            }


                            ?>


                        </div>
                        <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span
                                    class="carousel-control-prev-icon"></span><span
                                    class="sr-only">Previous</span></a><a class="carousel-control-next"
                                href="#carousel-1" role="button" data-slide="next"><span
                                    class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a>
                        </div>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-1" data-slide-to="0"></li>
                            <li data-target="#carousel-1" data-slide-to="1"></li>
                            <li data-target="#carousel-1" data-slide-to="2" class="active"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>