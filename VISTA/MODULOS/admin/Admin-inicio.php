<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $_SESSION["nombre"];?>
            <small>Panel de Control</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Main</li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">

                        <?php
                                        $item = "nuevo";
                                        $valor = "1";

                                        $nuevos = ControladorInicio::ctrMostrarNuevos($item, $valor);
                                        
                                            # code...
                                            echo ' <h3>'.$nuevos["Total"].'</h3>';
                                         
                        ?>

                        <p>Activos Nuevos</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <a href="productos-nuevos" class="small-box-footer">
                        Mas Información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->

            <?php
                if ($_SESSION["perfil"] == "Administrador") {
                    # code...
                    echo ' <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3 style="color: #fff;">
                                <i class="fa fa-gear"></i>
                            </h3>
    
                            <p>Permisos</p>
                        </div>
                        <div class="icon">
                            <!-- <i class="ion ion-stats-bars"></i> -->
                            <i class="ion ion-android-people"></i>
                        </div>
                        <a href="clientes" class="small-box-footer">
                            Mas Información <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">';
    
                            
                                            $item = null;
                                            $valor = null;
    
                                            $registrados = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                                           
                                                # code...
                                                echo ' <h3>'.count($registrados).'</h3>';
                                             
                            



                    echo '<p>Usuarios Registrados</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="usuarios" class="small-box-footer">
                                Mas Información <i class="fa fa-arrow-circle-right"></i>
                            </a>
                    </div>
                    </div>
                    <!-- ./col -->';
}
?>


            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">


                        <?php
                                        $item = null;
                                        $valor = null;

                                        $noLocalizados = ControladorProductos::ctrMostrarProductosNL($item, $valor);
                                       
                                            # code...
                                            echo ' <h3>'.count($noLocalizados).'</h3>';
                                         
                        ?>

                        <p>Activos No Localizados</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="productos-nl" class="small-box-footer">
                        Mas Información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- end first row -->



        <?php
            if ($_SESSION["perfil"] == "Administrador") {

                    echo '<div class="row">';

                    $userItem = null;
                    $userValor = null;
                    $usuariosActivos = ControladorUsuarios::ctrMostrarAsignados($userItem, $userValor);
        
                   
                        foreach ($usuariosActivos as $key => $value) {
        
                            /* Generamos un Random para el background de cada tarjeta */                    
                            $min = 248;
                            $max = 253;
                            $shad = 0.7;
                            $R = rand ( $min , $max );        /* Priorizamos que sean gama verde */
                            $G = rand ( $min , $max );
                            $B = rand ( $min , $max );
        
                            /* Asignamos formato a los nombres */
                            $lower = strtolower($value["nombre"]);
                            $nombrecss = ucwords($lower);
        
                            /* Mostramos el Area de cada Usuario */
                            $puestoitem   =   "id";
                            $puestovalor  =   $value["area"];
                            $areas = ControladorUsuarios::ctrMostrarArea($puestoitem, $puestovalor);
        
                            /* Contamos El total de activos de cada usuario */
                            $activoitem   =   "AREA";
                            $activovalor  =   $areas["descripcion"];
                            $activos = ControladorActivos::ctrMostrarTotal($activoitem, $activovalor);
        
        
                            /* Contamos El total de activos ubicados de cada usuario */
                            $ubicadositem   =   "AREA";
                            $ubicadosvalor  =   $areas["descripcion"];
                            $ubicados = ControladorActivos::ctrMostrarUbicados($activoitem, $activovalor);
        
        
                            /* Contamos El total de activos SIN ASIGNAR  de cada usuario */
                            $Nasignadositem   =   "AREA";
                            $Nasignadosvalor  =   $areas["descripcion"];
                            $Nasignados = ControladorActivos::ctrMostrarNAsignados($activoitem, $activovalor);
        
        
                            /* Contamos El total de activos NO LOCALIZADOS  de cada usuario */
                            $NLitem   =   "AREA";
                            $NLvalor  =   $areas["descripcion"];
                            $NL = ControladorActivos::ctrMostrarNL($activoitem, $activovalor);

                            echo '<div class="col-md-4">
                            <!-- Widget: user widget style 1 -->
                            <div class="box box-widget widget-user-2">
                              <!-- Add the bg color to the header using any of the bg-* classes -->
                              <div class="widget-user-header" style=" background: rgba('.$R.','.$G.','.$B.','.$shad.')">
                                <div class="widget-user-image">
                                  <img class="img-circle" src="'.$value["foto"].'" alt="User Avatar">
                                </div>
                                <!-- /.widget-user-image -->
                                <h3 class="widget-user-username">'.$nombrecss.'</h3>
                                <h5 class="widget-user-desc">'.$areas["descripcion"].'</h5>
                              </div>
                              <div class="box-footer no-padding">
                                <ul class="nav nav-stacked">
                                  <li><a href="#">Activos <span class="pull-right badge bg-blue">'.$activos["total"].'</span></a></li>
                                  <li><a href="#">Ubicados <span class="pull-right badge bg-aqua">'.$ubicados["total"].'</span></a></li>
                                  <li><a href="#">Sin Asignar <span class="pull-right badge bg-green">'.$Nasignados["total"].'</span></a></li>
                                  <li><a href="#">No Localizados <span class="pull-right badge bg-red">'.$NL["total"].'</span></a></li>
                                </ul>
                              </div>
                            </div>
                            <!-- /.widget-user -->
                          </div>';
                        }

                        echo '
                        </div>

                          <!-- end thirt row -->';

            }


        ?>




    </section>


    <!-- /.content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Estado de Inventario</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fa fa-minus"></i></button>

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th style="width: 10px; background: #4bcffa; text-align: center;">#</th>
                                    <th style="background: #4bcffa;">Nombre</th>
                                    <th style="background: #4bcffa;">Area</th>
                                    <th style="background: #4bcffa;">Progreso</th>
                                    <th style="width: 40px; background: #4bcffa; text-align: center;">Porcentaje</th>
                                </tr>

                                <?php

                                    $userItem = null;
                                    $userValor = null;
                                    $usuariosActivos = ControladorUsuarios::ctrMostrarAsignados($userItem, $userValor);


                                        foreach ($usuariosActivos as $key => $value) {


                                         /* Mostramos el Area de cada Usuario */
                                        $puestoitem   =   "id";
                                        $puestovalor  =   $value["area"];
                                        $areas = ControladorUsuarios::ctrMostrarArea($puestoitem, $puestovalor);

                                         /* Contamos El total de activos de cada usuario */
                                        $activoitem   =   "AREA";
                                        $activovalor  =   $areas["descripcion"];
                                        $activos = ControladorActivos::ctrMostrarTotal($activoitem, $activovalor);

                                        # Mostramos el estatus del inventario...
                                        $inventarioItem = "AREA";
                                        $inventarioValor = $areas["descripcion"];;
                                        $inventario = ControladorProductos::ctrMostrarInventario($activoitem, $activovalor);
                                        
                                        if ($inventario["total"] <= 0) {
                                            # code...
                                            $porcentje = "0";
                                        } else {
                                            # code...
                                            $porcentje = number_format(($inventario["total"] * 100) / $activos["total"], 2);
                                        }
                                        
                                        /* Asignamos formato a los nombres */
                                        $lowerDRC = strtolower($value["nombre"]);
                                        $nombreDRC = ucwords($lowerDRC);


                                        /* Generamos un Random para el background de cada tarjeta */
                                        $min = 100;
                                        $max = 200;
                                        $R = rand ( $min , $max );        /* Priorizamos que sean gama azul */
                                        $G = rand ( $min , $max );
                                        $B = rand ( 0 , 0 );

                                        if ($_SESSION["perfil"] == "Administrador") {
                                            # code...
                                            echo '  <tr>
                                                    <td>'.($key + 1).'.</td>
                                                    <td>'.$nombreDRC.'</td>
                                                    <td>'.ucwords(strtolower($areas["descripcion"])).'</td>
                                                    <td>
                                                        <div class="progress progress-xs">
                                                            <div class="progress-bar" style="width: '.$porcentje.'%; background: rgb('.$R.','.$G.','.$B.')"></div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge" style="background: rgb('.$R.','.$G.','.$B.')">'.$porcentje.'%</span></td>
                                                </tr>';
                                        } elseif ($_SESSION["area"] == $value["area"]) {
                                            # code...
                                             # code...
                                             echo '  <tr>
                                             <td>'.($key + 1).'.</td>
                                             <td>'.$nombreDRC.'</td>
                                             <td>'.ucwords(strtolower($areas["descripcion"])).'</td>
                                             <td>
                                                 <div class="progress progress-xs">
                                                     <div class="progress-bar" style="width: '.$porcentje.'%; background: rgb('.$R.','.$G.','.$B.')"></div>
                                                 </div>
                                             </td>
                                             <td><span class="badge" style="background: rgb('.$R.','.$G.','.$B.')">'.$porcentje.'%</span></td>
                                         </tr>';
                                            
                                        } 
                                        
                                        
                                        }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
            <div class="col-md-6">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Estado de Activos</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px; background: #4bcffa;">#</th>
                                    <th style="background: #4bcffa;">Estado</th>
                                    <th style="background: #4bcffa;">Progreso</th>
                                    <th style="width: 40px; background: #4bcffa;">Porcentaje</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                        $item = null;
                                        $valor = null;
                                        $estado = ControladorTipo::ctrMostrarEstados($item, $valor);

                                        /* Realizamos un Foreach para mostrar todos los estados */
                                        foreach ($estado as $key => $value) {

                                            /* Contaremos los productos que tienes el id del estado */
                                            $itemO = "OBSERVACIONES";
                                            $valorO = $value["id"];
                                            $productosO = ControladorProductos::ctrMostrarEstadoProductos($itemO, $valorO);

                                            /* Contaremos todos los productos */
                                            $itemP = null;
                                            $valorP = null;
                                            $productosP = ControladorProductos::ctrMostrarProductos($itemP, $valorP);
                                            $cuentaTotalO = count($productosP);
                                            /* echo '<br>';
                                            echo $value["descripcion"];
                                            echo '<br>';
                                            echo $cuentaTotalO;
                                            echo '<br>';
                                            echo $productosO["total"]; */
                                            
                                            
                                            if ($cuentaTotalO <= 0 || $productosO["total"] <= 0) {
                                                # code...
                                                $porcentjeO = "0";
                                            } else {
                                                # code...
                                                
                                                $porcentjeO = number_format(($productosO["total"] * 100) / $cuentaTotalO , 2);
                                            }
                                                # code... 
                                               

                                                if ($_SESSION["perfil"] == "Administrador") {
                                                    # code...
                                                    echo'<tr>
                                                    <td>'.($key + 1).'.</td>
                                                    <td>'.$value["descripcion"].'</td>
                                                    <td>
                                                        <div class="progress progress-xs">
                                                            <div class="progress-bar progress-bar-danger" style="width: '.$porcentjeO.'%; background: rgb('.$R.','.$G.','.$B.')"></div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge bg-red">'.$porcentjeO.'%</span></td>
                                                </tr>';
                                                } 
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>

    </section>
</div>