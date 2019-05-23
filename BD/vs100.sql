-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2019 a las 16:13:48
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

--
-- RELACIONES PARA LA TABLA `demo`:
--

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
-- RELACIONES PARA LA TABLA `participante`:
--

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
-- RELACIONES PARA LA TABLA `participantes_pruebas`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante_demo`
--

CREATE TABLE `participante_demo` (
  `ID_Participante` int(11) NOT NULL,
  `usuario` varchar(20) COLLATE utf8_bin NOT NULL,
  `fecha_Registro` datetime NOT NULL,
  `puntos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `participante_demo`:
--

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
-- RELACIONES PARA LA TABLA `registro_pago`:
--

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
-- RELACIONES PARA LA TABLA `respuestas`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_demo`
--

CREATE TABLE `respuestas_demo` (
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
-- RELACIONES PARA LA TABLA `respuestas_demo`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `ID_Tema` int(11) NOT NULL,
  `prueba` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `temas`:
--

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
-- Indices de la tabla `participante_demo`
--
ALTER TABLE `participante_demo`
  ADD PRIMARY KEY (`ID_Participante`),
  ADD UNIQUE KEY `usuario` (`usuario`);

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
-- Indices de la tabla `respuestas_demo`
--
ALTER TABLE `respuestas_demo`
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
  MODIFY `ID_Participante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `participantes_pruebas`
--
ALTER TABLE `participantes_pruebas`
  MODIFY `ID_PP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `participante_demo`
--
ALTER TABLE `participante_demo`
  MODIFY `ID_Participante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_pago`
--
ALTER TABLE `registro_pago`
  MODIFY `ID_Deposito` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `ID_Tema` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
