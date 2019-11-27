<div class="register-photo" style="margin-top: 0px;margin-bottom: 0px;">
    <div class="form-container" style="max-height: auto;">
        <div class="image-holder"
            style="background-image: url(assets/img/photo-1532877590696-69a157b92b78.jpg);background-position: center;background-size: cover;background-repeat: no-repeat;">
        </div>
        <form role="form" method="post" enctype="multipart/form-data">

            <h2 class="text-center"><strong>Crear</strong>&nbsp;una cuenta.</h2>

            <div class="form-group"><input class="form-control" type="email" name="nuevoemail" placeholder="Correo"
                    autofocus="" require></div>
            <div class="form-group"><input class="form-control" type="password" name="nuevoPassword"
                    placeholder="Contraseña" require></div>
            <div class="form-group"><input class="form-control" type="text" name="nuevoNombre" placeholder="Nombre"
                    require>
            </div>
            <div class="form-group"><input class="form-control" type="text" name="nuevoUsuario" id="nuevoUsuario"
                    placeholder="Usuario" require></div>
            <div class="form-group"><input class="form-control" type="tel" name="nuevotelefono"
                    placeholder="Telefono Móvil" require>
            </div>

            <!-- STUB SUBIR FOTOGRAFIA -->
            <div class=" form-group text-center">
                <div class="panel">Foto de Perfil</div>
                <input type="file" class="nuevaFoto" accept="image/x-png, image/jpeg" name="nuevaFoto">
                <p class="help-block">Peso Maximo 2Mb</p>
                <img src="vista/img/usuarios/default/anonymous.png" alt="Foto Perfil"
                    class="img-thumbnail previsualizar" width="100px">
            </div>

            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Crear Cuenta</button></div>
            <a href="login" class="already">Ya tienes una cuenta? Accede desde aquí.</a>

            <?php

$crearUsuario = new ControladorUsuarios();
$crearUsuario -> ctrCrearUsuario();

?>

        </form>

    </div>
</div>
<footer id="myFooter" style="padding: 0px;margin-top: 0px;">
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-12">
                <ul class="list-unstyled">
                    <li><a href="inicio#conocenos">Conocenos</a></li>
                    <li><a href="inicio#contacto">Contactanos</a></li>
                    <li><a href="inicio#galeria">Galeria</a></li>
                    <li><a href="inicio">AquaBot</a></li>
                </ul>
                <p class="footer-copyright">Proyecto diseñado por &nbsp;<a href="#">Agustin Medina - Jesus Lozano -
                        Jonathan Mendieta</a></p>
            </div>
            <div class="col footer-social"><a href="#" class="social-icons"><i class="fa fa-facebook"
                        data-bs-hover-animate="pulse"></i></a><a href="#" class="social-icons"><i
                        class="fa fa-google-plus" data-bs-hover-animate="pulse"></i></a><a href="#"
                    class="social-icons"><i class="fa fa-twitter" data-bs-hover-animate="pulse"></i></a>
                <a href="#" class="social-icons"><i class="fa fa-linkedin" data-bs-hover-animate="pulse"></i></a>
            </div>
        </div>
    </div>
</footer>

<script src="vista/js/usuarios.js"></script>