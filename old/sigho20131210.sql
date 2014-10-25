-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2013 a las 20:47:04
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sigho`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones`
--

CREATE TABLE IF NOT EXISTS `acciones` (
  `id_accion` int(4) NOT NULL AUTO_INCREMENT,
  `nom_accion` varchar(10) NOT NULL,
  PRIMARY KEY (`id_accion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `acciones`
--

INSERT INTO `acciones` (`id_accion`, `nom_accion`) VALUES
(1, 'editar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia`
--

CREATE TABLE IF NOT EXISTS `dia` (
  `cod_dia` int(7) NOT NULL,
  `dia` varchar(10) NOT NULL,
  PRIMARY KEY (`cod_dia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias_titulacion`
--

CREATE TABLE IF NOT EXISTS `dias_titulacion` (
  `cod_titulacion` int(8) NOT NULL,
  `cod_dia` int(7) NOT NULL,
  KEY `fk_titulacion_dias` (`cod_dia`),
  KEY `fk_dias_titulacion` (`cod_titulacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias_usuario`
--

CREATE TABLE IF NOT EXISTS `dias_usuario` (
  `cod_dias_usuario` int(4) NOT NULL AUTO_INCREMENT,
  `doc_usuario` int(10) NOT NULL,
  `Cant_dias` int(2) NOT NULL,
  `cod_titulacion` int(8) NOT NULL,
  PRIMARY KEY (`cod_dias_usuario`),
  KEY `fk_dias_usuario` (`doc_usuario`),
  KEY `fk_dias_usuario_titulacion` (`cod_titulacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `dias_usuario`
--

INSERT INTO `dias_usuario` (`cod_dias_usuario`, `doc_usuario`, `Cant_dias`, `cod_titulacion`) VALUES
(1, 1036641795, 2, 430025);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE IF NOT EXISTS `horario` (
  `cod_horario` int(4) NOT NULL AUTO_INCREMENT,
  `doc_usuario` int(10) NOT NULL,
  `cod_titulacion` int(8) NOT NULL,
  `dia` varchar(9) NOT NULL,
  `cod_ubicacion` int(4) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  PRIMARY KEY (`cod_horario`),
  KEY `fk_usuario_horario` (`doc_usuario`),
  KEY `fk_titulacion_horario` (`cod_titulacion`),
  KEY `fk_ubicacion_horario` (`cod_ubicacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`cod_horario`, `doc_usuario`, `cod_titulacion`, `dia`, `cod_ubicacion`, `fecha_ini`, `fecha_fin`) VALUES
(1, 1036641795, 430025, 'Lunes', 100100102, '2013-11-21', '0000-00-00'),
(2, 1036641795, 430025, 'Martes', 100100102, '2013-11-22', '0000-00-00'),
(3, 1036641795, 430025, 'Miercoles', 100100102, '2013-11-23', '0000-00-00'),
(4, 1036641795, 250025, 'Jueves', 100100101, '2013-11-24', '0000-00-00'),
(5, 1036641795, 430025, 'Viernes', 100100102, '2013-11-25', '0000-00-00'),
(6, 1036641795, 250025, 'Domingo', 100100101, '2013-11-27', '0000-00-00'),
(7, 1036641795, 430025, 'Sabado', 100100102, '2013-11-26', '0000-00-00'),
(8, 41913317, 250025, 'Lunes', 100100101, '2013-11-09', '0000-00-00'),
(9, 41913317, 250025, 'Viernes', 100100101, '2013-11-15', '0000-00-00'),
(10, 41913317, 430025, 'Miercoles', 100100102, '2013-11-06', '0000-00-00'),
(11, 41913317, 430025, 'Domingo', 100100102, '2013-11-04', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE IF NOT EXISTS `jornada` (
  `cod_jornada` int(4) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(15) NOT NULL,
  `hora_ini` time NOT NULL,
  `hora_fin` time NOT NULL,
  PRIMARY KEY (`cod_jornada`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `jornada`
--

INSERT INTO `jornada` (`cod_jornada`, `descripcion`, `hora_ini`, `hora_fin`) VALUES
(1, 'tarde', '07:00:00', '01:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
  `id_modulo` int(4) NOT NULL AUTO_INCREMENT,
  `nom_modulo` varchar(10) NOT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`id_modulo`, `nom_modulo`) VALUES
(1, 'listar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
  `cod_nivel` int(4) NOT NULL AUTO_INCREMENT,
  `nom_nivel` varchar(15) NOT NULL,
  PRIMARY KEY (`cod_nivel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`cod_nivel`, `nom_nivel`) VALUES
(1, 'Tecnólogo'),
(2, 'Tecnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE IF NOT EXISTS `programas` (
  `cod_programa` int(10) NOT NULL,
  `nom_programa` varchar(100) NOT NULL,
  `cod_nivel` int(4) NOT NULL,
  PRIMARY KEY (`cod_programa`),
  KEY `fk_nivel_programa` (`cod_nivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`cod_programa`, `nom_programa`, `cod_nivel`) VALUES
(1, 'Analisis y Desarrollo de Sistemas de Informacion', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(4) NOT NULL AUTO_INCREMENT,
  `nom_rol` varchar(15) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nom_rol`) VALUES
(1, 'instructor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulacion`
--

CREATE TABLE IF NOT EXISTS `titulacion` (
  `cod_titulacion` int(8) NOT NULL,
  `cod_programa` int(4) NOT NULL,
  `cod_jornada` int(4) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `cod_ubicacion` int(4) NOT NULL,
  PRIMARY KEY (`cod_titulacion`),
  KEY `fk_titulacion_programa` (`cod_programa`),
  KEY `fk_jornada_titulacion` (`cod_jornada`),
  KEY `fk_ubicacion_titulacion` (`cod_ubicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `titulacion`
--

INSERT INTO `titulacion` (`cod_titulacion`, `cod_programa`, `cod_jornada`, `fecha_ini`, `fecha_fin`, `cod_ubicacion`) VALUES
(250025, 1, 1, '2013-11-12', '2013-11-30', 100100101),
(430025, 1, 1, '2013-01-21', '2014-07-21', 100100102);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE IF NOT EXISTS `ubicacion` (
  `cod_ubicacion` int(15) NOT NULL,
  `nom_ubicacion` varchar(50) NOT NULL,
  `depende` int(15) NOT NULL,
  PRIMARY KEY (`cod_ubicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`cod_ubicacion`, `nom_ubicacion`, `depende`) VALUES
(100, 'Chia', 0),
(101, 'Zipa', 0),
(100100, 'Sede A', 100),
(100200, 'Sede B', 100),
(101100, 'Sede A', 101),
(100100101, '101', 100100),
(100100102, '102 ADSI', 100100),
(100100103, '103', 100100),
(100100104, '104 Redes', 100100),
(100100105, '105 Animacion 3D', 100100),
(100100106, 'Manto. Electrico', 100100),
(100100107, 'Diseño de modas', 100100),
(100100108, 'Enfermería', 100100),
(100100109, 'Mecánica', 100100),
(100100110, 'Laboratorio', 100100),
(100100111, 'Mesa y Bar', 100100),
(100100112, 'Cocina', 100100),
(100200101, '101', 100200),
(100200102, '102', 100200),
(100200103, '103', 100200),
(100200104, '104', 100200),
(100200105, '105', 100200),
(101100101, '101', 101100),
(101100102, '102', 101100),
(101100103, '103', 101100),
(101100104, '104', 101100),
(101100105, '105', 101100),
(101100106, '106', 101100),
(101100107, '107', 101100),
(101100108, '108', 101100),
(101100109, '109', 101100),
(101100110, '110', 101100),
(101100111, '111', 101100);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `doc_usuario` int(10) NOT NULL,
  `nom_usuario` varchar(60) NOT NULL,
  `ape_usuario` varchar(60) NOT NULL,
  `clave` varchar(16) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`doc_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`doc_usuario`, `nom_usuario`, `ape_usuario`, `clave`, `email`) VALUES
(41913317, 'carmen', 'cifuentes', 'burbuja', 'carmencita.algo'),
(1036641795, 'mayra', 'durango', 'burbuja', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_roles_permisos`
--

CREATE TABLE IF NOT EXISTS `usuarios_roles_permisos` (
  `id_usuarios_roles_permisos` int(4) NOT NULL AUTO_INCREMENT,
  `id_usuario_rol` int(4) NOT NULL,
  `id_accion` int(4) NOT NULL,
  `id_modulo` int(4) NOT NULL,
  PRIMARY KEY (`id_usuarios_roles_permisos`),
  KEY `fk_usuario_usuario_permiso` (`id_usuario_rol`),
  KEY `fk_usuario_modulo_permiso` (`id_modulo`),
  KEY `fk_usuario_accion_permiso` (`id_accion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios_roles_permisos`
--

INSERT INTO `usuarios_roles_permisos` (`id_usuarios_roles_permisos`, `id_usuario_rol`, `id_accion`, `id_modulo`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

CREATE TABLE IF NOT EXISTS `usuario_rol` (
  `id_usuario_rol` int(4) NOT NULL AUTO_INCREMENT,
  `doc_usuario` int(10) NOT NULL,
  `id_rol` int(4) NOT NULL,
  PRIMARY KEY (`id_usuario_rol`),
  KEY `fk_usuario_rol` (`doc_usuario`),
  KEY `fk_rol_usuario` (`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuario_rol`
--

INSERT INTO `usuario_rol` (`id_usuario_rol`, `doc_usuario`, `id_rol`) VALUES
(1, 1036641795, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_titulacion`
--

CREATE TABLE IF NOT EXISTS `usuario_titulacion` (
  `cod_titulacion` int(8) NOT NULL,
  `doc_usuario` int(10) NOT NULL,
  KEY `fk_titulacion_usuario` (`cod_titulacion`),
  KEY `fk_usuario_titulacion` (`doc_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_titulacion`
--

INSERT INTO `usuario_titulacion` (`cod_titulacion`, `doc_usuario`) VALUES
(430025, 1036641795),
(250025, 1036641795),
(250025, 41913317);

create table dia_semana(
    cod_dia int(2) not null auto_increment,
    nombre_dia varchar(10),
    primary key(cod_dia)
    
);

create table dia_titulacion(
    cod_dia_titulacion int not null auto_increment,
    cod_titulacion int not null,
    cod_dia int not null,
    primary key(cod_dia_titulacion),
    foreign key(cod_titulacion) references titulacion(cod_titulacion),
    foreign key(cod_dia) references dia_semana(cod_dia)
);
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dias_titulacion`
--
ALTER TABLE `dias_titulacion`
  ADD CONSTRAINT `fk_dias_titulacion` FOREIGN KEY (`cod_titulacion`) REFERENCES `titulacion` (`cod_titulacion`),
  ADD CONSTRAINT `fk_titulacion_dias` FOREIGN KEY (`cod_dia`) REFERENCES `dia` (`cod_dia`);

--
-- Filtros para la tabla `dias_usuario`
--
ALTER TABLE `dias_usuario`
  ADD CONSTRAINT `fk_dias_usuario` FOREIGN KEY (`doc_usuario`) REFERENCES `usuario` (`doc_usuario`),
  ADD CONSTRAINT `fk_dias_usuario_titulacion` FOREIGN KEY (`cod_titulacion`) REFERENCES `titulacion` (`cod_titulacion`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk_titulacion_horario` FOREIGN KEY (`cod_titulacion`) REFERENCES `titulacion` (`cod_titulacion`),
  ADD CONSTRAINT `fk_ubicacion_horario` FOREIGN KEY (`cod_ubicacion`) REFERENCES `ubicacion` (`cod_ubicacion`),
  ADD CONSTRAINT `fk_usuario_horario` FOREIGN KEY (`doc_usuario`) REFERENCES `usuario` (`doc_usuario`);

--
-- Filtros para la tabla `programas`
--
ALTER TABLE `programas`
  ADD CONSTRAINT `fk_nivel_programa` FOREIGN KEY (`cod_nivel`) REFERENCES `nivel` (`cod_nivel`);

--
-- Filtros para la tabla `titulacion`
--
ALTER TABLE `titulacion`
  ADD CONSTRAINT `fk_jornada_titulacion` FOREIGN KEY (`cod_jornada`) REFERENCES `jornada` (`cod_jornada`),
  ADD CONSTRAINT `fk_titulacion_programa` FOREIGN KEY (`cod_programa`) REFERENCES `programas` (`cod_programa`),
  ADD CONSTRAINT `fk_ubicacion_titulacion` FOREIGN KEY (`cod_ubicacion`) REFERENCES `ubicacion` (`cod_ubicacion`);

--
-- Filtros para la tabla `usuarios_roles_permisos`
--
ALTER TABLE `usuarios_roles_permisos`
  ADD CONSTRAINT `fk_usuario_accion_permiso` FOREIGN KEY (`id_accion`) REFERENCES `acciones` (`id_accion`),
  ADD CONSTRAINT `fk_usuario_modulo_permiso` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id_modulo`),
  ADD CONSTRAINT `fk_usuario_usuario_permiso` FOREIGN KEY (`id_usuario_rol`) REFERENCES `usuario_rol` (`id_usuario_rol`);

--
-- Filtros para la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD CONSTRAINT `fk_rol_usuario` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`doc_usuario`) REFERENCES `usuario` (`doc_usuario`);

--
-- Filtros para la tabla `usuario_titulacion`
--
ALTER TABLE `usuario_titulacion`
  ADD CONSTRAINT `fk_tituacion_usuario` FOREIGN KEY (`cod_titulacion`) REFERENCES `titulacion` (`cod_titulacion`),
  ADD CONSTRAINT `fk_usuario_titulacion` FOREIGN KEY (`doc_usuario`) REFERENCES `usuario` (`doc_usuario`);

CREATE VIEW vieubica AS
SELECT cod_ubicacion, nom_ubicacion
FROM ubicacion
WHERE depende=0;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
