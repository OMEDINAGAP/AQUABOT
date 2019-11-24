<nav class="navbar navbar-light navbar-expand-md fixed-top navigation-clean-button"
    style="background-color: rgba(15,68,116,0.88);">

    <div class="container"><a class="navbar-brand" href="#portada"
            style="width: 150px;height: 40px;background-image: url(assets/img/explowhite.png);background-position: center;background-size: contain;background-repeat: no-repeat;"></a><button
            class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle
                navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item" role="presentation"><a class="nav-link" href="#portada"
                        style="color: rgb(255,255,255);font-family: 'Open Sans', sans-serif;">Explorer</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#puntos"
                        style="color: rgb(255,255,255);font-family: 'Open Sans', sans-serif;">Playas</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#galeria"
                        style="color: rgb(255,255,255);font-family: 'Open Sans', sans-serif;">Galeria</a></li>
                <li class="dropdown nav-item"><a class="dropdown-toggle nav-link" data-toggle="dropdown"
                        aria-expanded="false" href="#"
                        style="color: rgb(255,255,255);font-family: 'Open Sans', sans-serif;">Más acerca</a>
                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First
                            Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a
                            class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                </li>
            </ul>




            <div class="navbar-custom-menu">
                <span class="navbar-text actions"> <a href="#" class="btn btn-success action-button">
                        <?php echo $_SESSION["nombre"]; ?></a>
                </span>
                <span class="navbar-text actions"> <a href="salir" class="btn btn-light action-button">Cerrar
                        Sesion</a>


            </div>



        </div>
    </div>
</nav>