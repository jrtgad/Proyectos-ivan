-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2016 a las 19:44:22
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `champions`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE IF NOT EXISTS `equipos` (
  `id` int(11) NOT NULL,
  `equipo` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `equipo`) VALUES
(1, 'a'),
(2, 'b'),
(3, 'c'),
(4, 'd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadas`
--

CREATE TABLE IF NOT EXISTS `jornadas` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `state` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jornadas`
--

INSERT INTO `jornadas` (`id`, `fecha`, `state`) VALUES
(1, '2014-11-02', '0'),
(2, '2014-11-09', '0'),
(3, '2014-11-16', '0'),
(4, '2014-11-23', '0'),
(5, '2014-11-30', '0'),
(6, '2014-12-07', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE IF NOT EXISTS `partidos` (
  `id` int(11) NOT NULL,
  `equipoL` varchar(25) NOT NULL,
  `equipoV` varchar(25) NOT NULL,
  `golL` int(11) DEFAULT NULL,
  `golV` int(11) DEFAULT NULL,
  `id_jornada` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id`, `equipoL`, `equipoV`, `golL`, `golV`, `id_jornada`) VALUES
(1, 'a', 'd', NULL, NULL, 1),
(2, 'b', 'c', NULL, NULL, 1),
(3, 'a', 'c', NULL, NULL, 2),
(4, 'd', 'b', NULL, NULL, 2),
(5, 'a', 'b', NULL, NULL, 3),
(6, 'c', 'd', NULL, NULL, 3),
(7, 'd', 'a', NULL, NULL, 4),
(8, 'c', 'b', NULL, NULL, 4),
(9, 'c', 'a', NULL, NULL, 5),
(10, 'b', 'd', NULL, NULL, 5),
(11, 'b', 'a', NULL, NULL, 6),
(12, 'd', 'c', NULL, NULL, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `pass`) VALUES
(1, 'a', 'a');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
