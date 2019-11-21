-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-11-2019 a las 21:50:30
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bot`
--

DROP TABLE IF EXISTS `bot`;
CREATE TABLE IF NOT EXISTS `bot` (
  `ID_bot` int(4) NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  `Fecha_inicio_servicio` timestamp NOT NULL,
  `Observacion_bot` text NOT NULL,
  PRIMARY KEY (`ID_bot`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas1`
--

DROP TABLE IF EXISTS `caracteristicas1`;
CREATE TABLE IF NOT EXISTS `caracteristicas1` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Actualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Ruta` text NOT NULL,
  `ID_usuario` int(11) NOT NULL,
  `Tipo` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `caracteristicas1`
--

INSERT INTO `caracteristicas1` (`ID`, `Fecha`, `Actualizacion`, `Ruta`, `ID_usuario`, `Tipo`) VALUES
(1, '2019-11-05 21:35:13', '2019-11-05 23:31:56', 'assets/img/photo-1532877590696-69a157b92b78.jpg', 1, 2),
(2, '2019-11-05 23:32:16', '2019-11-05 23:32:16', 'assets/img/registro.png', 1, 3),
(3, '2019-11-05 23:40:05', '2019-11-05 23:40:05', 'assets/img/photo-1472108591690-92fca4e29244.jpg', 1, 4),
(4, '2019-11-06 19:28:52', '2019-11-06 19:28:52', 'assets/img/photo-1472715148636-92e348325950.jpg', 1, 5),
(5, '2019-11-06 19:28:52', '2019-11-06 19:28:52', 'assets/img/photo-1487253096619-4ab6f24d5bbe.jpg', 1, 5),
(6, '2019-11-06 19:28:52', '2019-11-06 19:28:52', 'assets/img/photo-1504010277680-57fdcb91f65c.jpg', 1, 5),
(7, '2019-11-06 23:26:24', '2019-11-06 23:26:24', 'assets/img/73458980_10156541781116884_7414551447817158656_o.jpg', 1, 6),
(8, '2019-11-06 23:26:24', '2019-11-06 23:26:24', 'assets/img/72963758_10156541782831884_204246010120110080_o.jpg', 1, 6),
(9, '2019-11-06 23:26:24', '2019-11-06 23:26:24', 'assets/img/72571991_10156541782661884_245079054477164544_o.jpg', 1, 6),
(10, '2019-11-06 23:26:24', '2019-11-06 23:26:24', 'assets/img/72741038_10156541780986884_8825891904739606528_o.jpg', 1, 6),
(11, '2019-11-06 23:26:24', '2019-11-06 23:26:24', 'assets/img/72525927_10156541781556884_3486083778588180480_o.jpg', 1, 6),
(12, '2019-11-06 23:26:24', '2019-11-06 23:26:24', 'assets/img/photo-1472715148636-92e348325950.jpg', 1, 6),
(13, '2019-11-06 23:26:24', '2019-11-06 23:26:24', 'assets/img/photo-1504010277680-57fdcb91f65c.jpg', 1, 6),
(14, '2019-11-06 23:26:24', '2019-11-06 23:26:24', 'assets/img/photo-1487253096619-4ab6f24d5bbe.jpg', 1, 6),
(15, '2019-11-07 20:48:28', '2019-11-07 20:48:28', 'assets/img/mia.jpg', 1, 7),
(16, '2019-11-07 20:48:28', '2019-11-07 20:48:28', 'assets/img/lozano.jpg', 1, 8),
(17, '2019-11-07 20:48:28', '2019-11-07 20:48:28', 'assets/img/jona.jpg', 1, 9),
(18, '2019-11-10 03:30:46', '2019-11-10 03:30:46', 'assets/img/72843920_10156541783636884_2123555234142748672_o.jpg', 1, 10),
(19, '2019-11-10 03:30:46', '2019-11-10 03:30:46', 'assets/img/72571991_10156541782661884_245079054477164544_o.jpg', 1, 10),
(20, '2019-11-10 03:30:46', '2019-11-10 03:30:46', 'assets/img/72741038_10156541780986884_8825891904739606528_o.jpg', 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

DROP TABLE IF EXISTS `contacto`;
CREATE TABLE IF NOT EXISTS `contacto` (
  `ID_Contacto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Contacto` text NOT NULL,
  `Tel_Contacto` text NOT NULL,
  `Email_Contacto` text NOT NULL,
  `Mensaje_Contacto` text NOT NULL,
  PRIMARY KEY (`ID_Contacto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_usuario`
--

DROP TABLE IF EXISTS `cuenta_usuario`;
CREATE TABLE IF NOT EXISTS `cuenta_usuario` (
  `ID_usuario` int(4) NOT NULL,
  `Usuario` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Contraseña` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Fecha_Creacion` timestamp(6) NOT NULL,
  PRIMARY KEY (`ID_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

DROP TABLE IF EXISTS `reporte`;
CREATE TABLE IF NOT EXISTS `reporte` (
  `ID_reporte` int(4) NOT NULL,
  `Fecha_Creacion_Reporte` timestamp NOT NULL,
  `Archivo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`ID_reporte`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_usuario` int(4) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` int(50) NOT NULL,
  PRIMARY KEY (`ID_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;