-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2014 a las 23:31:08
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Estructura de tabla para la tabla `competencia_programa`
--

CREATE TABLE IF NOT EXISTS `competencia_programa` (
  `id_competencia` int(11) NOT NULL,
  `denominacion` varchar(500) NOT NULL,
  `cantidad_horas` int(11) NOT NULL,
  `programaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `competencia_programa`
--

TRUNCATE TABLE `competencia_programa`;
--
-- Volcado de datos para la tabla `competencia_programa`
--

INSERT INTO `competencia_programa` (`id_competencia`, `denominacion`, `cantidad_horas`, `programaid`) VALUES
(1, 'DESARROLLO DE PROYECTO', 80, 12345),
(2, 'mAMES', 50, 12345),
(3, 'asdfas', 125, 12345),
(4, 'asdfasd', 12, 12345),
(5, 'sdfasdfa', 12, 12345),
(23165, 'stiven piñeros', 6, 5),
(231456, 'mames', 2, 2),
(324324, 'vocero', 8, 7),
(546456, 'oscar', 5, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `competencia_programa`
--
ALTER TABLE `competencia_programa`
 ADD PRIMARY KEY (`id_competencia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
