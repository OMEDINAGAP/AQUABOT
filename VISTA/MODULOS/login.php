<div id="back"></div>
<div class="login-box">
    <div class="login-logo">
        <img src="vista/img/plantilla/logo-blanco-bloque.png" class="img-responsive"
            style="padding: 50px 100px 0px 100px">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Ingresar al Sistema</p>

        <form method="post">


            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>



            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>



            <div class="row">

                <!-- /.col -->
                <div class="col-xs-4 btn-block">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                </div>


                <div class="col-xs-12 btn-block center-block">
                    <a href="recuperar">Olvidaste tus datos, No te preocupes. <strong>Recupera tu cuenta </strong></a>

                </div>

                <div class="col-xs-12 btn-block center-block">
                    <a href="inicio">Regresar al Inicio</a>

                </div>
                <!-- /.col -->

            </div>

            <?php
                $login = new ControladorUsuarios();
                $login -> ctrIngresoUsuario();
            ?>

        </form>


    </div>

</div>
<!-- /.login-box -->