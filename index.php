<?php

/* 
		Include_once "todosloscontroladores";
		Include_once "todoslosModelos";
		Include_once "plantilla";

*/

		include_once "CONTROLADOR/Plantilla.Controlador.php";
		include_once "CONTROLADOR/Controlador.Contacto.php";
		include_once "CONTROLADOR/Controlador.Caracteristicas.php";
		include_once "MODELO/Modelo.Caracteristicas.php";
		include_once "MODELO/Modelo.Contacto.php";
		include_once "MODELO/PHPMailer.php";
		include_once "MODELO/SMTP.php";
		include_once "MODELO/Exception.php";
		include_once "VISTA/Plantilla.php";
		

		$plantilla = new ControladorPlantilla();
		$plantilla -> CtrPlantilla();

	