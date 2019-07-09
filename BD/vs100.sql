-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2019 a las 15:40:45
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
-- Estructura de tabla para la tabla `participante`
--

CREATE TABLE `participante` (
  `ID_Participante` int(11) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_bin NOT NULL,
  `Cedula` varchar(11) COLLATE utf8_bin NOT NULL,
  `Correo` varchar(40) COLLATE utf8_bin NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `Aleatorio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `participante`
--

INSERT INTO `participante` (`ID_Participante`, `Nombre`, `Cedula`, `Correo`, `FechaRegistro`, `Aleatorio`) VALUES
(2, 'Pablo', '12728036', 'pcabeza7@gmail.com', '0000-00-00 00:00:00', 400357107),
(4, 'Mariana', '11', 'mm@mm', '2018-12-08 00:00:00', 0),
(10, 'Silvia', '11111', 'veronica@gmail.com', '2019-05-27 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes_pruebas`
--

CREATE TABLE `participantes_pruebas` (
  `ID_PP` int(11) NOT NULL,
  `ID_Participante` int(11) NOT NULL,
  `ID_Prueba` int(11) NOT NULL,
  `Tema` varchar(15) COLLATE utf8_bin NOT NULL,
  `Deposito` varchar(20) COLLATE utf8_bin NOT NULL,
  `Prueba_Pagada` int(1) NOT NULL DEFAULT '0',
  `Prueba_Activa` int(1) NOT NULL DEFAULT '0',
  `Prueba_Cerrada` int(11) NOT NULL DEFAULT '0',
  `Puntos` decimal(10,3) NOT NULL DEFAULT '0.000',
  `posicion` int(11) NOT NULL,
  `Fecha_pago` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `participantes_pruebas`
--

INSERT INTO `participantes_pruebas` (`ID_PP`, `ID_Participante`, `ID_Prueba`, `Tema`, `Deposito`, `Prueba_Pagada`, `Prueba_Activa`, `Prueba_Cerrada`, `Puntos`, `posicion`, `Fecha_pago`) VALUES
(128, 10, 38, 'Hogar_Madre', 'gg', 1, 1, 0, '0.000', 1, '2019-06-09 18:49:09'),
(134, 2, 38, 'Hogar_Madre', 'uu', 1, 1, 0, '0.000', 0, '2019-06-09 18:55:41'),
(141, 2, 1, 'Biblia_Genesis', 'Exonerado', 1, 1, 0, '0.000', 0, '2019-06-11 10:40:26'),
(149, 2, 3, 'Biblia_Jeremias', 'Exonerado', 1, 1, 0, '0.000', 0, '2019-06-11 11:46:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante_demo`
--

CREATE TABLE `participante_demo` (
  `ID_PD` int(11) NOT NULL,
  `usuario` varchar(20) COLLATE utf8_bin NOT NULL,
  `fecha_Registro` datetime NOT NULL,
  `puntos` decimal(11,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `participante_demo`
--

INSERT INTO `participante_demo` (`ID_PD`, `usuario`, `fecha_Registro`, `puntos`) VALUES
(19, 'llll', '2019-05-27 22:23:51', '37.232'),
(20, 'hhhhh', '2019-05-29 20:50:31', '44.904'),
(21, 'Prueba', '2019-05-30 09:24:30', '0.000'),
(22, 'lola', '2019-05-30 12:37:53', '-12.880'),
(23, 'Don Juan', '2019-05-30 14:18:11', '0.000'),
(24, 'DOña Juana', '2019-05-30 14:23:57', '5.000'),
(25, 'Sr Ganador', '2019-06-02 09:51:43', '28.010'),
(26, 'Sra. Perfecta', '2019-06-02 10:25:06', '42.264'),
(27, 'De nuevo', '2019-06-02 11:26:12', '9.106'),
(28, 'Javier', '2019-06-02 18:15:13', '29.314'),
(29, 'qwerty', '2019-06-04 21:38:28', '0.000'),
(30, 'qwer', '2019-06-05 09:45:58', '0.000'),
(31, 'Que tal', '2019-06-13 21:29:51', '14.328');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posicion_prueba`
--

CREATE TABLE `posicion_prueba` (
  `ID_PosicionPrueba` int(11) NOT NULL,
  `ID_Prueba` int(11) NOT NULL,
  `ID_Participante` int(11) NOT NULL,
  `posicion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

CREATE TABLE `pruebas` (
  `ID_Prueba` int(11) NOT NULL,
  `Tema` varchar(30) COLLATE utf8_bin NOT NULL,
  `CupoMax` varchar(11) COLLATE utf8_bin NOT NULL DEFAULT 'vacio',
  `Aleatorio` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `pruebas`
--

INSERT INTO `pruebas` (`ID_Prueba`, `Tema`, `CupoMax`, `Aleatorio`) VALUES
(35, 'Hogar_Madre', '1', 461743611),
(36, 'Hogar_Madre', '1', 207603358),
(38, 'Hogar_Madre', 'vacio', 592432699);

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
(37, 'ii', 'ii', 'ii', 'Hogar_Madre', '2019-06-09 14:31:54'),
(47, 'qq', 'qq', 'qq', 'Hogar_Madre', '2019-06-09 14:47:57'),
(48, 'mm', 'mm', 'mm', 'Hogar_Madre', '2019-06-09 14:49:26'),
(49, 'll', 'll', 'll', 'Hogar_Madre', '2019-06-09 14:50:32'),
(50, 'nn', 'nn', 'nn', 'Hogar_Madre', '2019-06-09 16:50:19'),
(53, 'ññ', 'ññ', 'ññ', 'Colombia', '2019-06-09 16:58:37'),
(54, 'pp', 'pp', 'pp', 'Colombia', '2019-06-09 17:02:57'),
(55, 'oo', 'oo', 'oo', 'Colombia', '2019-06-09 17:07:02'),
(63, 'jj', 'jj', 'jj', 'Hogar_Madre', '2019-06-09 17:24:07'),
(77, 'kk', 'kk', 'kk', 'Hogar_Madre', '2019-06-09 17:45:30'),
(91, 'gg', 'gg', 'gg', 'Hogar_Madre', '2019-06-09 18:47:31'),
(94, 'hh', 'hh', 'hh', 'Hogar_Madre', '2019-06-09 18:50:04'),
(95, 'ff', 'ff', 'ff', 'Hogar_Madre', '2019-06-09 18:50:45'),
(97, 'yy', 'yy', 'yy', 'Hogar_Madre', '2019-06-09 18:55:13'),
(98, 'uu', 'uu', 'uu', 'Hogar_Madre', '2019-06-09 18:55:41');

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
  `HoraMaximo` datetime NOT NULL,
  `puntoGanado` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_demo`
--

CREATE TABLE `respuestas_demo` (
  `ID_Respuesta` int(11) NOT NULL,
  `ID_PD` int(11) NOT NULL,
  `ID_Pregunta` int(11) NOT NULL,
  `Correcto` varchar(15) COLLATE utf8_bin NOT NULL DEFAULT 'Sin_Respuesta',
  `Tema` varchar(15) COLLATE utf8_bin NOT NULL,
  `Hora_Pregunta` datetime NOT NULL,
  `Hora_Respuesta` datetime NOT NULL,
  `HoraMaximo` datetime NOT NULL,
  `puntoGanado` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_Registro` int(11) NOT NULL,
  `ID_Participante` int(11) NOT NULL,
  `clave` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_Registro`, `ID_Participante`, `clave`) VALUES
(7, 2, '$2y$10$CGULYtjfKm6F1xW6SHR9Zu3Ib2qO0e9nCdcfye7sWKHiNCpDFdEdW'),
(8, 12, '$2y$10$MlXq2QxgVogE6gXKjZVhSOIlgZhBYa2ah0aWGBliDOSH.qSzqjMXa'),
(9, 12, '$2y$10$0Av7Rh2/12M2yME8GZw6veg81dLh3/eoSCBpkEpjS12n.bNnMqEIa'),
(10, 12, '$2y$10$pmOQ5YYOhDFBbOO4p9oMAe56a02AQSSdM7OsIbJcV5afciTNBbWaa'),
(11, 12, '$2y$10$6ApMO/ejvUs5Qent8YV2pOBaF60FJHBGsd04utE6YUGJh0rwhGa1u'),
(12, 12, '$2y$10$SbPfPb8SggzgyuOtf/WwAuibdIV01wkUuaWcHsi7fuZWcapSx48sy'),
(13, 12, '$2y$10$1i0hhS1UXeI42lPpTxFLXu6M5ELSw8lGjRta6RAuKVpf.P1Rt0OdW'),
(14, 12, '$2y$10$2wf1MsKWCege1Pem7KIFa.UCdmG8tx35pEgNOffJ0DJ4DqLZ88sTm'),
(15, 19, '$2y$10$OXUfu9LJ.I3QKdBn/pWk1OnZu9ynwxGYED4Q8zHNbpEvB270um2nq'),
(16, 4, '$2y$10$Wiysm7UfDsef23gJpujbjOC2iB9ybnYDioShRNq4swFUipYukmK3C'),
(17, 21, '$2y$10$wDVuSanEAF8aZ7fsXXFSre0CySSUmshPhacdA7ZM/ZiLsXxAUxGXK');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `participante`
--
ALTER TABLE `participante`
  ADD PRIMARY KEY (`ID_Participante`),
  ADD UNIQUE KEY `Correo` (`Correo`),
  ADD UNIQUE KEY `Cedula` (`Cedula`);

--
-- Indices de la tabla `participantes_pruebas`
--
ALTER TABLE `participantes_pruebas`
  ADD PRIMARY KEY (`ID_PP`),
  ADD KEY `PruebasInscritas` (`ID_Participante`);

--
-- Indices de la tabla `participante_demo`
--
ALTER TABLE `participante_demo`
  ADD PRIMARY KEY (`ID_PD`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `posicion_prueba`
--
ALTER TABLE `posicion_prueba`
  ADD PRIMARY KEY (`ID_PosicionPrueba`);

--
-- Indices de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD PRIMARY KEY (`ID_Prueba`);

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
  ADD PRIMARY KEY (`ID_Respuesta`),
  ADD KEY `RespuestaDada` (`ID_PP`);

--
-- Indices de la tabla `respuestas_demo`
--
ALTER TABLE `respuestas_demo`
  ADD PRIMARY KEY (`ID_Respuesta`),
  ADD KEY `RespDem` (`ID_PD`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_Registro`),
  ADD UNIQUE KEY `clave` (`clave`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `participante`
--
ALTER TABLE `participante`
  MODIFY `ID_Participante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `participantes_pruebas`
--
ALTER TABLE `participantes_pruebas`
  MODIFY `ID_PP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT de la tabla `participante_demo`
--
ALTER TABLE `participante_demo`
  MODIFY `ID_PD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `posicion_prueba`
--
ALTER TABLE `posicion_prueba`
  MODIFY `ID_PosicionPrueba` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  MODIFY `ID_Prueba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `registro_pago`
--
ALTER TABLE `registro_pago`
  MODIFY `ID_Deposito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `ID_Respuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuestas_demo`
--
ALTER TABLE `respuestas_demo`
  MODIFY `ID_Respuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `participantes_pruebas`
--
ALTER TABLE `participantes_pruebas`
  ADD CONSTRAINT `PruebasInscritas` FOREIGN KEY (`ID_Participante`) REFERENCES `participante` (`ID_Participante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `RespuestaDada` FOREIGN KEY (`ID_PP`) REFERENCES `participantes_pruebas` (`ID_PP`);

--
-- Filtros para la tabla `respuestas_demo`
--
ALTER TABLE `respuestas_demo`
  ADD CONSTRAINT `RespDem` FOREIGN KEY (`ID_PD`) REFERENCES `participante_demo` (`ID_PD`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
