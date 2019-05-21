-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2019 a las 18:34:55
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vs100`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `demo`
--

CREATE TABLE `demo` (
  `ID_Demo` int(11) NOT NULL,
  `usuario` varchar(20) COLLATE utf8_bin NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `puntos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante`
--

CREATE TABLE `participante` (
  `ID_Participante` int(11) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_bin NOT NULL,
  `Apellido` varchar(20) COLLATE utf8_bin NOT NULL,
  `Cedula` varchar(11) COLLATE utf8_bin NOT NULL,
  `Telefono` varchar(14) COLLATE utf8_bin NOT NULL,
  `Correo` varchar(40) COLLATE utf8_bin NOT NULL,
  `Departamento` varchar(20) COLLATE utf8_bin NOT NULL,
  `Password` varchar(10) COLLATE utf8_bin NOT NULL,
  `FechaRegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `participante`
--

INSERT INTO `participante` (`ID_Participante`, `Nombre`, `Apellido`, `Cedula`, `Telefono`, `Correo`, `Departamento`, `Password`, `FechaRegistro`) VALUES
(2, 'Pablo', 'Cabeza', '12728036', '', 'pcabeza7@gmail.com', 'Norte de Santander', 'ppcc', '0000-00-00'),
(3, 'jj', 'jj', '', '', 'jj@jj', 'Mexico', 'jj', '2018-12-08'),
(4, 'Mariana', 'mm', '11', '', 'mm@mm', 'Venezuela', 'mm', '2018-12-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes_pruebas`
--

CREATE TABLE `participantes_pruebas` (
  `ID_PP` int(11) NOT NULL,
  `ID_Participante` int(11) NOT NULL,
  `Tema` varchar(15) COLLATE utf8_bin NOT NULL,
  `Deposito` varchar(20) COLLATE utf8_bin NOT NULL,
  `Prueba_Pagada` int(1) NOT NULL DEFAULT '0',
  `Prueba_Activa` int(1) NOT NULL DEFAULT '0',
  `Prueba_Cerrada` int(11) NOT NULL DEFAULT '0',
  `Puntos` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `participantes_pruebas`
--

INSERT INTO `participantes_pruebas` (`ID_PP`, `ID_Participante`, `Tema`, `Deposito`, `Prueba_Pagada`, `Prueba_Activa`, `Prueba_Cerrada`, `Puntos`) VALUES
(1, 2, 'Venezuela', 'qwe1234', 1, 0, 1, '149.75'),
(2, 4, 'Venezuela', '11', 0, 0, 0, '0'),
(3, 2, 'Venezuela', '99', 1, 0, 1, '14.75');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_pago`
--

CREATE TABLE `registro_pago` (
  `ID_Deposito` int(11) NOT NULL,
  `cedula` varchar(12) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(14) COLLATE utf8_bin NOT NULL,
  `deposito` varchar(20) COLLATE utf8_bin NOT NULL,
  `tema` varchar(20) COLLATE utf8_bin NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `registro_pago`
--

INSERT INTO `registro_pago` (`ID_Deposito`, `cedula`, `telefono`, `deposito`, `tema`, `fecha_registro`) VALUES
(1, '127280136', '23123123', '12312312', 'Venezuela', '2019-05-17 17:44:16'),
(2, '12728036', '23452342', 'qwe1234', 'Venezuela', '2019-05-18 16:38:32'),
(3, '11', '11', '11', 'Venezuela', '2019-05-19 08:10:28'),
(4, '99', '99', '99', 'Venezuela', '2019-05-19 20:11:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `ID_Respuesta` int(11) NOT NULL,
  `ID_PP` int(11) NOT NULL,
  `ID_Participante` int(11) NOT NULL,
  `ID_Pregunta` int(11) NOT NULL,
  `Correcto` varchar(15) COLLATE utf8_bin NOT NULL DEFAULT 'Sin_Respuesta',
  `Tema` varchar(15) COLLATE utf8_bin NOT NULL,
  `Hora_Pregunta` datetime NOT NULL,
  `Hora_Respuesta` datetime NOT NULL,
  `HoraMaximo` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`ID_Respuesta`, `ID_PP`, `ID_Participante`, `ID_Pregunta`, `Correcto`, `Tema`, `Hora_Pregunta`, `Hora_Respuesta`, `HoraMaximo`) VALUES
(180, 1, 2, 1, '1', 'Venezuela', '2019-05-19 17:24:23', '2019-05-19 17:27:28', '2019-05-19 17:26:23'),
(181, 1, 2, 2, '1', 'Venezuela', '2019-05-19 17:28:38', '2019-05-19 17:28:42', '2019-05-19 17:30:38'),
(182, 1, 2, 3, '1', 'Venezuela', '2019-05-19 17:29:00', '2019-05-19 17:43:09', '2019-05-19 17:31:00'),
(183, 1, 2, 4, '1', 'Venezuela', '2019-05-19 19:18:42', '2019-05-19 19:18:46', '2019-05-19 19:20:42'),
(184, 1, 2, 5, '1', 'Venezuela', '2019-05-19 19:21:57', '2019-05-19 19:22:13', '2019-05-19 19:23:57'),
(185, 1, 2, 6, '1', 'Venezuela', '2019-05-19 19:22:25', '2019-05-19 19:22:45', '2019-05-19 19:24:25'),
(186, 1, 2, 7, '1', 'Venezuela', '2019-05-19 19:22:57', '2019-05-19 19:23:00', '2019-05-19 19:24:57'),
(187, 1, 2, 8, '1', 'Venezuela', '2019-05-19 19:23:02', '2019-05-19 19:23:06', '2019-05-19 19:25:02'),
(188, 1, 2, 9, '1', 'Venezuela', '2019-05-19 19:23:08', '2019-05-19 19:23:50', '2019-05-19 19:25:08'),
(190, 1, 2, 10, '1', 'Venezuela', '2019-05-19 19:24:13', '2019-05-19 19:24:16', '2019-05-19 19:26:13'),
(207, 3, 2, 1, '0', 'Venezuela', '2019-05-20 09:15:14', '2019-05-20 10:09:05', '2019-05-20 09:17:14'),
(210, 3, 2, 1, '0', 'Venezuela', '0000-00-00 00:00:00', '2019-05-20 10:09:25', '0000-00-00 00:00:00'),
(211, 3, 2, 1, '1', 'Venezuela', '0000-00-00 00:00:00', '2019-05-20 10:09:42', '0000-00-00 00:00:00'),
(212, 3, 2, 2, '1', 'Venezuela', '2019-05-20 10:22:09', '2019-05-20 10:36:51', '2019-05-20 10:24:09'),
(213, 3, 2, 3, '1', 'Venezuela', '2019-05-20 10:37:49', '2019-05-20 10:37:55', '2019-05-20 10:39:49'),
(214, 3, 2, 4, '1', 'Venezuela', '2019-05-20 10:38:11', '2019-05-20 10:38:16', '2019-05-20 10:40:11'),
(215, 3, 2, 5, '1', 'Venezuela', '2019-05-20 10:38:19', '2019-05-20 10:38:22', '2019-05-20 10:40:19'),
(216, 3, 2, 6, '1', 'Venezuela', '2019-05-20 10:38:53', '2019-05-20 10:38:58', '2019-05-20 10:40:53'),
(217, 3, 2, 7, '0', 'Venezuela', '2019-05-20 10:39:02', '2019-05-20 10:39:37', '2019-05-20 10:41:02'),
(218, 3, 2, 7, '0', 'Venezuela', '0000-00-00 00:00:00', '2019-05-20 10:39:51', '0000-00-00 00:00:00'),
(219, 3, 2, 7, '0', 'Venezuela', '0000-00-00 00:00:00', '2019-05-20 10:39:55', '0000-00-00 00:00:00'),
(220, 3, 2, 7, '1', 'Venezuela', '0000-00-00 00:00:00', '2019-05-20 10:40:12', '0000-00-00 00:00:00'),
(221, 3, 2, 8, '1', 'Venezuela', '2019-05-20 10:40:33', '2019-05-20 10:40:36', '2019-05-20 10:42:33'),
(222, 3, 2, 9, '1', 'Venezuela', '2019-05-20 10:40:41', '2019-05-20 10:40:46', '2019-05-20 10:42:41'),
(223, 3, 2, 10, '1', 'Venezuela', '2019-05-20 10:40:48', '2019-05-20 10:40:51', '2019-05-20 10:42:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `ID_Tema` int(11) NOT NULL,
  `prueba` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`ID_Tema`, `prueba`) VALUES
(1, 'Matematica'),
(2, 'Geografia'),
(3, 'Cultura_general'),
(4, 'Programación'),
(5, 'Venezuela');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`ID_Demo`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `participante`
--
ALTER TABLE `participante`
  ADD PRIMARY KEY (`ID_Participante`);

--
-- Indices de la tabla `participantes_pruebas`
--
ALTER TABLE `participantes_pruebas`
  ADD PRIMARY KEY (`ID_PP`);

--
-- Indices de la tabla `registro_pago`
--
ALTER TABLE `registro_pago`
  ADD PRIMARY KEY (`ID_Deposito`),
  ADD UNIQUE KEY `deposito` (`deposito`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`ID_Respuesta`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`ID_Tema`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `demo`
--
ALTER TABLE `demo`
  MODIFY `ID_Demo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `participante`
--
ALTER TABLE `participante`
  MODIFY `ID_Participante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `participantes_pruebas`
--
ALTER TABLE `participantes_pruebas`
  MODIFY `ID_PP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registro_pago`
--
ALTER TABLE `registro_pago`
  MODIFY `ID_Deposito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `ID_Respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `ID_Tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
