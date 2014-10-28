-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2014 a las 22:36:45
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
CREATE DATABASE IF NOT EXISTS `db_sigho` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_sigho`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambiente`
--

CREATE TABLE IF NOT EXISTS `ambiente` (
`idambiente` int(11) NOT NULL,
  `ambiente` varchar(45) NOT NULL,
  `especializado` tinyint(1) NOT NULL DEFAULT '0',
  `observacion` varchar(255) DEFAULT NULL,
  `sedeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE IF NOT EXISTS `area` (
`idarea` int(11) NOT NULL,
  `area` varchar(45) NOT NULL,
  `usuarioid` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`idarea`, `area`, `usuarioid`) VALUES
(1, 'Sistemas', 1),
(2, 'Contabilidad', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencia`
--

CREATE TABLE IF NOT EXISTS `competencia` (
`idcompetencia` int(11) NOT NULL,
  `usuarioid` int(11) NOT NULL,
  `programaid` int(11) NOT NULL,
  `calificado` tinyint(1) DEFAULT '0' COMMENT 'Si un instructor esta apto puede formar el 100% del programa.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
`iddepartamento` int(11) NOT NULL,
  `departamento` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`iddepartamento`, `departamento`) VALUES
(1, 'Cundinamarca'),
(2, 'Boyaca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponiblidad`
--

CREATE TABLE IF NOT EXISTS `disponiblidad` (
`iddisponiblidad` int(11) NOT NULL,
  `jornadaid` int(11) NOT NULL,
  `usuarioid` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `disponible` tinyint(1) NOT NULL DEFAULT '1',
  `grupoid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE IF NOT EXISTS `ficha` (
  `idficha` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `oferta` int(11) NOT NULL,
  `programaid` int(11) NOT NULL,
  `jornadaid` int(11) NOT NULL,
  `cant_aprendices` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_grupo`
--

CREATE TABLE IF NOT EXISTS `ficha_grupo` (
`idficha_grupo` int(11) NOT NULL,
  `grupoid` int(11) NOT NULL,
  `fichaid` int(11) NOT NULL,
  `cant_aprendices` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
`idgrupo` int(11) NOT NULL,
  `grupo` varchar(45) NOT NULL,
  `agendado` tinyint(1) NOT NULL DEFAULT '0',
  `vigente` tinyint(1) NOT NULL DEFAULT '1',
  `director` int(11) NOT NULL,
  `ambienteid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE IF NOT EXISTS `horario` (
`idhorario` int(11) NOT NULL,
  `grupoid` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `jornadaid` int(11) NOT NULL,
  `usuarioid` int(11) DEFAULT NULL,
  `agendado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE IF NOT EXISTS `jornada` (
`idjornada` int(11) NOT NULL,
  `jornada` varchar(45) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `horas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`idmenu` int(11) NOT NULL,
  `menu` varchar(45) NOT NULL,
  `menuid` int(11) DEFAULT NULL,
  `href` varchar(255) NOT NULL DEFAULT '#',
  `icono` varchar(150) DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idmenu`, `menu`, `menuid`, `href`, `icono`, `visible`) VALUES
(1, 'Inicio', NULL, 'home.php', NULL, 1),
(2, 'Usuarios', NULL, 'home.php?pac=102', NULL, 1),
(3, 'Roles', NULL, 'home.php?pac=103', NULL, 1),
(4, 'Programas', NULL, 'home.php?pac=104', NULL, 1),
(5, 'Listar', 2, 'home.php?pac=102', NULL, 1),
(6, 'Crear', 2, 'vista/vFormRol.php', NULL, 1),
(7, 'Parametros', NULL, '#', NULL, 1),
(8, 'Crear', 7, 'home.php?pac=107', NULL, 1),
(9, 'Listar', 7, 'home.php?pac=108', NULL, 1),
(10, 'Grupos', NULL, '#', NULL, 1),
(11, 'Crear', 10, 'home.php?pac=110', NULL, 1),
(12, 'Sedes', NULL, '#', NULL, 1),
(13, 'Crear', 12, 'home.php?pac=113', NULL, 1),
(14, 'Listar', 12, 'home.php?pac=114', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
`idmunicipio` int(11) NOT NULL,
  `municipio` varchar(45) NOT NULL,
  `departamentoid` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`idmunicipio`, `municipio`, `departamentoid`) VALUES
(1, 'Bogota', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro`
--

CREATE TABLE IF NOT EXISTS `parametro` (
`idparametro` int(11) NOT NULL,
  `parametro` varchar(45) NOT NULL,
  `editable` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `parametro`
--

INSERT INTO `parametro` (`idparametro`, `parametro`, `editable`) VALUES
(1, 'Nivel Formación', 1),
(2, 'Tipo Documento', 0),
(3, 'Genero', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
`idperfil` int(11) NOT NULL,
  `perfil` varchar(45) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idperfil`, `perfil`, `activo`) VALUES
(1, 'Administrador', 1),
(2, 'Instructor', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE IF NOT EXISTS `permiso` (
`idpermiso` int(11) NOT NULL,
  `perfilid` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE IF NOT EXISTS `programa` (
  `idprograma` int(11) NOT NULL,
  `programa` varchar(100) NOT NULL,
  `version` float NOT NULL,
  `areaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`idprograma`, `programa`, `version`, `areaid`) VALUES
(0, 'programa de prueba', 2, 1),
(12345, 'programa 1', 0, 1),
(520606, 'adsi', 1, 1),
(987654, 'programa de prueba', 1, 1),
(6544444, 'programa de prueba', 2, 2),
(6545215, 'adsi', 2, 2),
(123456789, 'programa 2', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE IF NOT EXISTS `sede` (
`idsede` int(11) NOT NULL,
  `sede` varchar(45) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `municipioid` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`idsede`, `sede`, `direccion`, `telefono`, `municipioid`, `estado`) VALUES
(1, 'cd b', 'calle 32', '123546', 1, 0),
(2, 'sede c', 'calle 45', '231455654', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`idusuario` int(11) NOT NULL,
  `identificacion` int(11) NOT NULL,
  `email_sena` varchar(100) DEFAULT NULL,
  `email_misena` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(100) NOT NULL,
  `municipioid` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `nivel_formacion` int(11) NOT NULL,
  `tipo_documento` int(11) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `fecha_documento` date NOT NULL,
  `fecha_expiracion` date NOT NULL,
  `perfilid` int(11) NOT NULL,
  `horas_formacion` int(11) NOT NULL,
  `genero` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `identificacion`, `email_sena`, `email_misena`, `email`, `celular`, `telefono`, `direccion`, `municipioid`, `nombres`, `apellidos`, `nivel_formacion`, `tipo_documento`, `clave`, `fecha_documento`, `fecha_expiracion`, `perfilid`, `horas_formacion`, `genero`) VALUES
(1, 123, NULL, 'wamora22@misena.edu.co', 'alejandro_mora@outlook.com', '3002141460', NULL, 'Calle 89B # 116A-10 Int 57 Apt 103', 1, 'Wilfred Alejandro', 'Mora Contreras', 1, 3, '123', '2003-04-13', '2014-12-13', 2, 160, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor`
--

CREATE TABLE IF NOT EXISTS `valor` (
`idvalor` int(11) NOT NULL,
  `valor` varchar(160) NOT NULL,
  `editable` tinyint(1) NOT NULL DEFAULT '1',
  `parametroid` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `valor`
--

INSERT INTO `valor` (`idvalor`, `valor`, `editable`, `parametroid`) VALUES
(1, 'Profesional', 0, 1),
(2, 'Tecnologo', 0, 1),
(3, 'Cédula Ciudadania', 0, 2),
(4, 'Cédula Extranjeria', 0, 2),
(5, 'Masculino', 0, 3),
(6, 'Femenino', 0, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambiente`
--
ALTER TABLE `ambiente`
 ADD PRIMARY KEY (`idambiente`), ADD KEY `fk_sede_ambiente_idx` (`sedeid`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
 ADD PRIMARY KEY (`idarea`), ADD KEY `fk_usuario_area_idx` (`usuarioid`);

--
-- Indices de la tabla `competencia`
--
ALTER TABLE `competencia`
 ADD PRIMARY KEY (`idcompetencia`), ADD KEY `fk_usuario_competencia_idx` (`usuarioid`), ADD KEY `fk_programa_competencia_idx` (`programaid`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
 ADD PRIMARY KEY (`iddepartamento`);

--
-- Indices de la tabla `disponiblidad`
--
ALTER TABLE `disponiblidad`
 ADD PRIMARY KEY (`iddisponiblidad`), ADD KEY `fk_jornada_disponibilidad_idx` (`jornadaid`), ADD KEY `fk_usuario_disponibilidad_idx` (`usuarioid`), ADD KEY `fk_valor_dia_idx` (`dia`);

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
 ADD PRIMARY KEY (`idficha`), ADD KEY `fk_valor_oferta_idx` (`oferta`), ADD KEY `fk_programa_ficha_idx` (`programaid`), ADD KEY `fk_jornada_ficha_idx` (`jornadaid`);

--
-- Indices de la tabla `ficha_grupo`
--
ALTER TABLE `ficha_grupo`
 ADD PRIMARY KEY (`idficha_grupo`), ADD KEY `fk_ficha_grupo_idx` (`fichaid`), ADD KEY `fk_grupo_ficha_idx` (`grupoid`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
 ADD PRIMARY KEY (`idgrupo`), ADD KEY `fk_ambiente_grupo_idx` (`ambienteid`), ADD KEY `fk_director_grupo_idx` (`director`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
 ADD PRIMARY KEY (`idhorario`), ADD KEY `fk_grupo_horario_idx` (`grupoid`), ADD KEY `fk_valor_dia_idx` (`dia`), ADD KEY `fk_jornada_grupo_idx` (`jornadaid`);

--
-- Indices de la tabla `jornada`
--
ALTER TABLE `jornada`
 ADD PRIMARY KEY (`idjornada`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`idmenu`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
 ADD PRIMARY KEY (`idmunicipio`), ADD KEY `fk_depto_municipio_idx` (`departamentoid`);

--
-- Indices de la tabla `parametro`
--
ALTER TABLE `parametro`
 ADD PRIMARY KEY (`idparametro`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
 ADD PRIMARY KEY (`idperfil`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
 ADD PRIMARY KEY (`idpermiso`), ADD KEY `fk_perfil_menu_idx` (`perfilid`), ADD KEY `fk_menu_perfil_idx` (`menuid`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
 ADD PRIMARY KEY (`idprograma`), ADD KEY `fk_area_programa_idx` (`areaid`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
 ADD PRIMARY KEY (`idsede`), ADD KEY `fk_municipio_sede_idx` (`municipioid`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`idusuario`), ADD KEY `fk_municipio_usuario_idx` (`municipioid`), ADD KEY `fk_valor_nivel_formacion_idx` (`nivel_formacion`), ADD KEY `fk_valor_tipo_documento_idx` (`tipo_documento`), ADD KEY `fk_perfil_usuario_idx` (`perfilid`), ADD KEY `fk_valor_genero_idx` (`genero`);

--
-- Indices de la tabla `valor`
--
ALTER TABLE `valor`
 ADD PRIMARY KEY (`idvalor`), ADD KEY `fk_parametro_valor_idx` (`parametroid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ambiente`
--
ALTER TABLE `ambiente`
MODIFY `idambiente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
MODIFY `idarea` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `competencia`
--
ALTER TABLE `competencia`
MODIFY `idcompetencia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
MODIFY `iddepartamento` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `disponiblidad`
--
ALTER TABLE `disponiblidad`
MODIFY `iddisponiblidad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ficha_grupo`
--
ALTER TABLE `ficha_grupo`
MODIFY `idficha_grupo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
MODIFY `idgrupo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
MODIFY `idhorario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `jornada`
--
ALTER TABLE `jornada`
MODIFY `idjornada` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
MODIFY `idmunicipio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `parametro`
--
ALTER TABLE `parametro`
MODIFY `idparametro` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
MODIFY `idperfil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
MODIFY `idsede` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `valor`
--
ALTER TABLE `valor`
MODIFY `idvalor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ambiente`
--
ALTER TABLE `ambiente`
ADD CONSTRAINT `fk_sede_ambiente` FOREIGN KEY (`sedeid`) REFERENCES `sede` (`idsede`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `area`
--
ALTER TABLE `area`
ADD CONSTRAINT `fk_usuario_area` FOREIGN KEY (`usuarioid`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `competencia`
--
ALTER TABLE `competencia`
ADD CONSTRAINT `fk_programa_competencia` FOREIGN KEY (`programaid`) REFERENCES `programa` (`idprograma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_usuario_competencia` FOREIGN KEY (`usuarioid`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `disponiblidad`
--
ALTER TABLE `disponiblidad`
ADD CONSTRAINT `fk_jornada_disponibilidad` FOREIGN KEY (`jornadaid`) REFERENCES `jornada` (`idjornada`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_usuario_disponibilidad` FOREIGN KEY (`usuarioid`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_valor_dia` FOREIGN KEY (`dia`) REFERENCES `valor` (`idvalor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ficha`
--
ALTER TABLE `ficha`
ADD CONSTRAINT `fk_jornada_ficha` FOREIGN KEY (`jornadaid`) REFERENCES `jornada` (`idjornada`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_programa_ficha` FOREIGN KEY (`programaid`) REFERENCES `programa` (`idprograma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_valor_oferta` FOREIGN KEY (`oferta`) REFERENCES `valor` (`idvalor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ficha_grupo`
--
ALTER TABLE `ficha_grupo`
ADD CONSTRAINT `fk_ficha_grupo` FOREIGN KEY (`fichaid`) REFERENCES `ficha` (`idficha`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_grupo_ficha` FOREIGN KEY (`grupoid`) REFERENCES `grupo` (`idgrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
ADD CONSTRAINT `fk_ambiente_grupo` FOREIGN KEY (`ambienteid`) REFERENCES `ambiente` (`idambiente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_director_grupo` FOREIGN KEY (`director`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
ADD CONSTRAINT `fk_grupo_horario` FOREIGN KEY (`grupoid`) REFERENCES `grupo` (`idgrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_jornada_grupo` FOREIGN KEY (`jornadaid`) REFERENCES `jornada` (`idjornada`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_valor_dia1` FOREIGN KEY (`dia`) REFERENCES `valor` (`idvalor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
ADD CONSTRAINT `fk_depto_municipio` FOREIGN KEY (`departamentoid`) REFERENCES `departamento` (`iddepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
ADD CONSTRAINT `fk_menu_perfil` FOREIGN KEY (`menuid`) REFERENCES `menu` (`idmenu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_perfil_menu` FOREIGN KEY (`perfilid`) REFERENCES `perfil` (`idperfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `programa`
--
ALTER TABLE `programa`
ADD CONSTRAINT `fk_area_programa` FOREIGN KEY (`areaid`) REFERENCES `area` (`idarea`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sede`
--
ALTER TABLE `sede`
ADD CONSTRAINT `fk_municipio_sede` FOREIGN KEY (`municipioid`) REFERENCES `municipio` (`idmunicipio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `fk_municipio_usuario` FOREIGN KEY (`municipioid`) REFERENCES `municipio` (`idmunicipio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_perfil_usuario` FOREIGN KEY (`perfilid`) REFERENCES `perfil` (`idperfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_valor_genero` FOREIGN KEY (`genero`) REFERENCES `valor` (`idvalor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_valor_nivel_formacion` FOREIGN KEY (`nivel_formacion`) REFERENCES `valor` (`idvalor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_valor_tipo_documento` FOREIGN KEY (`tipo_documento`) REFERENCES `valor` (`idvalor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `valor`
--
ALTER TABLE `valor`
ADD CONSTRAINT `fk_parametro_valor` FOREIGN KEY (`parametroid`) REFERENCES `parametro` (`idparametro`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
