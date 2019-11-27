<!-- <nav class="navbar navbar-light navbar-expand-md fixed-top navigation-clean-button"
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
</nav> -->


<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
        <a href="/LOGIN/dashboard/index.php" class="navbar-brand">LDS Los Cabos</a>
        <button class="navbar-toggler" data-target="#navbarCollapse" data-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item px-2">
                    <a href="/LOGIN/dashboard/index.php" class="nav-link active">Home</a>
                </li>
                <li class="nav-item px-2">
                    <a href="#" class="nav-link">Post</a>
                </li>
                <li class="nav-item px-2">
                    <a href="#" class="nav-link">Categories</a>
                </li>
                <li class="nav-item px-2">
                    <a href="/LOGIN/dashboard/users.php" class="nav-link">Usuarios</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown mr-3">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i> Welcome <?php echo  $_SESSION['username'];?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-user-circle"></i> Profile <?php echo  $_SESSION['IDKey'];?>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-cog"></i> Settings
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="/LOGIN/src/users/logout.php" class="nav-link">
                        <i class="fa fa-user-times"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>