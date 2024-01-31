-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2024 a las 13:01:13
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `controlingreso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisosdata`
--

CREATE TABLE `permisosdata` (
  `id` int(11) NOT NULL,
  `hora_permiso` time NOT NULL,
  `fecha_permiso` date NOT NULL,
  `nombre_instructor_permiso` varchar(255) NOT NULL,
  `nombre_aprendiz_permiso` varchar(255) NOT NULL,
  `titulada_permiso` varchar(255) NOT NULL,
  `ficha_permiso` int(11) NOT NULL,
  `ambiente_permiso` varchar(255) NOT NULL,
  `motivo_permiso` varchar(255) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `permisosdata`
--
ALTER TABLE `permisosdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `permisosdata`
--
ALTER TABLE `permisosdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
