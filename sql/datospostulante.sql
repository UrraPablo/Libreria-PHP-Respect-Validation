-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2022 a las 18:38:22
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `datospostulante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulante`
--

CREATE TABLE `postulante` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Dni` int(11) NOT NULL,
  `Mail` varchar(80) NOT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Imagen` varchar(300) DEFAULT NULL,
  `Estudios` varchar(50) DEFAULT NULL,
  `Titulo` varchar(50) DEFAULT NULL,
  `Experiencia` varchar(600) DEFAULT NULL,
  `InglesEscrito` varchar(20) DEFAULT NULL,
  `InglesHablado` varchar(20) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `Letra` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `postulante`
--

INSERT INTO `postulante` (`Id`, `Nombre`, `Apellido`, `FechaNacimiento`, `Dni`, `Mail`, `Telefono`, `Imagen`, `Estudios`, `Titulo`, `Experiencia`, `InglesEscrito`, `InglesHablado`, `link`, `color`, `Letra`) VALUES
(1, 'Jose', 'Gonzales', '1989-10-20', 37123456, 'jose@gmail.com', 2147483647, 'fotoPerfil.jpg', 'Terciario', 'Tecnico Electromecanico', 'Mantenimiento de motores en company SA', 'Basico', 'Basico', 'https://linkedin.com/jose', '#ff0047', 'serif'),
(2, 'Daniela', 'Contreras', '1985-09-17', 42000777, 'daniela.contreras@gmail.com', 2147483647, 'cv.png', 'Secundario', 'Tecnico Informatico', 'Mantenimiento de Servidores en IT SA', 'Intermedio', 'Intermedio', 'https://github.com/contreras', '#0000f6', 'cursive');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `postulante`
--
ALTER TABLE `postulante`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `postulante`
--
ALTER TABLE `postulante`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
