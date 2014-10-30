-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2014 a las 03:18:01
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_sigho`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `idmenu` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(45) NOT NULL,
  `menuid` int(11) DEFAULT NULL,
  `href` varchar(255) NOT NULL DEFAULT '#',
  `icono` varchar(150) DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idmenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idmenu`, `menu`, `menuid`, `href`, `icono`, `visible`) VALUES
(1, 'Inicio', NULL, 'home.php', NULL, 1),
(2, 'Usuario', NULL, 'home.php?pac=102', NULL, 1),
(3, 'Horario', NULL, 'home.php?pac=103', NULL, 1),
(4, 'Administrador', NULL, 'home.php?pac=104', NULL, 1),
(5, 'Crear', 2, 'home.php?pac=102', NULL, 1),
(6, 'Modificar', 2, 'home.php?pac=105', NULL, 1),
(7, 'Cambiar Contraseña', 2, 'home.php?pac=107', NULL, 1),
(8, 'Competencia', 2, 'home.php?pac=108', NULL, 1),
(9, 'Disponibilidad', 2, 'home.php?pac=109', NULL, 1),
(10, 'Crear', 3, 'home.php?pac=110', NULL, 1),
(11, 'Ver', 3, 'home.php?pac=111', NULL, 1),
(12, 'Area', 4, 'home.php?pac=104', NULL, 1),
(13, 'Programa', 4, 'home.php?pac=106', NULL, 1),
(14, 'Ficha', 4, 'home.php?pac=112', NULL, 1),
(15, 'Grupo', 4, 'home.php?pac=113', NULL, 1),
(16, 'Sede', 4, 'home.php?pac=119', NULL, 1),
(17, 'Ambiente', 4, 'home.php?pac=115', NULL, 1),
(18, 'Jornada', 4, 'home.php?pac=116', NULL, 1),
(20, 'Parámetro - Valor', 4, 'home.php?pac=118', NULL, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
