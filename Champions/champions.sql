-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-01-2016 a las 12:46:09
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.5.30

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

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `equipo` varchar(25) NOT NULL,
  `puntos` int(11) NOT NULL,
  `golesF` int(11) NOT NULL,
  `golesC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `equipo`, `puntos`, `golesF`, `golesC`) VALUES
(1, 'Juventus', 0, 0, 0),
(2, 'Madrid', 0, 0, 0),
(3, 'Alcorcon', 0, 0, 0),
(4, 'Aleti', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadas`
--

CREATE TABLE `jornadas` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `state` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jornadas`
--

INSERT INTO `jornadas` (`id`, `fecha`, `state`) VALUES
(1, '2014-11-02', b'1'),
(2, '2014-11-09', b'1'),
(3, '2014-11-16', b'0'),
(4, '2014-11-23', b'1'),
(5, '2014-11-30', b'1'),
(6, '2014-12-07', b'0'),
(7, '2014-11-02', b'0'),
(8, '2014-11-02', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `id` int(11) NOT NULL,
  `equipoL` varchar(25) NOT NULL,
  `equipoV` varchar(25) NOT NULL,
  `golL` int(11) DEFAULT NULL,
  `golV` int(11) DEFAULT NULL,
  `id_jornada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id`, `equipoL`, `equipoV`, `golL`, `golV`, `id_jornada`) VALUES
(1, 'Juventus', 'Aleti', NULL, NULL, 1),
(2, 'Madrid', 'Alcorcon', NULL, NULL, 1),
(3, 'Juventus', 'Alcorcon', NULL, NULL, 2),
(4, 'Aleti', 'Madrid', NULL, NULL, 2),
(5, 'Juventus', 'Madrid', NULL, NULL, 3),
(6, 'Alcorcon', 'Aleti', NULL, NULL, 3),
(7, 'Aleti', 'Juventus', NULL, NULL, 4),
(8, 'Alcorcon', 'Madrid', NULL, NULL, 4),
(9, 'Alcorcon', 'Juventus', NULL, NULL, 5),
(10, 'Madrid', 'Aleti', NULL, NULL, 5),
(11, 'Madrid', 'Juventus', NULL, NULL, 6),
(12, 'Aleti', 'Alcorcon', NULL, NULL, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
