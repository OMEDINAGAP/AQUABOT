<nav class="navbar navbar-light navbar-expand-md navigation-clean-button navbar-fixed-top"
    style="background-color: rgba(15,68,116,0.88);">
    <div class="container"><a class="navbar-brand" href="#portada"
            style="width: 150px;height: 40px;background-image: url(assets/img/explowhite.png);background-position: center;background-size: contain;background-repeat: no-repeat;"></a>


        <div class="collapse navbar-collapse pull-right" id="navcol-1">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item" role="presentation"><a class="nav-link" href="#portada"
                        style="color: rgb(255,255,255);font-family: 'Open Sans', sans-serif;">Explorer</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#puntos"
                        style="color: rgb(255,255,255);font-family: 'Open Sans', sans-serif;">Playas</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#galeria"
                        style="color: rgb(255,255,255);font-family: 'Open Sans', sans-serif;">Galeria</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#conocenos"
                        style="color: rgb(255,255,255);font-family: 'Open Sans', sans-serif;">Conócenos</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#contacto"
                        style="color: rgb(255,255,255);font-family: 'Open Sans', sans-serif;">Contactanos</a></li>


            </ul>


            <?php
                        if(isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == "ok") 
                        { 
                                echo ' <div class="navbar-custom-menu">
                                <span class="navbar-text actions"><a href="Admin-inicio" class="btn btn-success action-button">Panel de Control</a>
                                </span>
                                <span class="navbar-text actions"> <a href="salir" class="btn btn-light action-button">Cerrar
                                        Sesion</a>

                                </div>';
                        
                        } else{
                                echo ' <span class="navbar-text actions"> <a class="btn btn-light action-button" role="button" href="login"
                                style="font-family: " Open Sans", sans-serif;">Iniciar Sesión</a></span>';
                        }

        ?>





        </div>
    </div>
</nav>