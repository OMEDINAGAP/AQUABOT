<header class="main-header">

    <!-- REVIEW LOGOTIPO -->

    <a href="Admin-inicio" class="logo" data-toggle="push-menu">

        <!-- STUB  Logo Mini -->
        <span class="logo-mini">
            <img src="vista/img/plantilla/logo-blanco.png" class="img-responsive" style="padding: 10px">
        </span>

        <!-- STUB  Logo Normal -->
        <span class="logo-lg">
            <img src="vista/img/plantilla/logo-blanco-lineal.png" class="img-responsive" style="padding: 10px 0px">
        </span>

    </a>


    <!-- REVIEW BARRA DE NAVEGACION -->

    <nav class="navbar navbar-static-top" role="navigation">

        <!-- REVIEW BOTON DE NAVEGACION -->

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <!-- VALIDAMOS LA FOTO CON LA SESSION INICIADA -->
                        <?php
                            if ($_SESSION["foto"] != ""){
                                echo '<img src="'.$_SESSION["foto"].'" class="user-image">';
                            }else{
                                echo '<img src="vista/img/usuarios/default/anonymous.png" class="user-image">';
                            }
                        ?>

                        <span class="hidden-xs"><?php echo $_SESSION["nombre"]; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">

                            <?php
                        
                            if ($_SESSION["foto"] != ""){
                                echo '<img src="'.$_SESSION["foto"].'" class="img-circle" alt="User Image">';
                            }else{
                                echo '<img src="vista/img/usuarios/default/anonymous.png" class="img-circle" alt="User Image">';
                            }
                        ?>


                            <p>
                                <small><?php echo $_SESSION["nombre"]; ?> - <?php echo $_SESSION["perfil"]; ?></small>
                                <small>Miembro desde <?php echo $_SESSION["fecha"]; ?></small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="perfil" class="btn btn-default btn-flat">Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="salir" class="btn btn-default btn-flat">Cerrar Sesion</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <!-- <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> -->
            </ul>
        </div>












    </nav>


</header>