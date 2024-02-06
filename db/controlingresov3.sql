-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2024 a las 17:37:15
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
-- Estructura de tabla para la tabla `aprendices`
--

CREATE TABLE `aprendices` (
  `id_aprendiz` int(3) NOT NULL,
  `id_usuario` int(3) NOT NULL,
  `id_titulada` int(3) NOT NULL,
  `tipoDoc_aprendiz` varchar(20) NOT NULL,
  `documento` varchar(20) NOT NULL,
  `nombre_aprendiz` varchar(20) NOT NULL,
  `apellido_aprendiz` varchar(20) NOT NULL,
  `email_aprendiz` varchar(50) NOT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `serial_articulo_1` varchar(20) DEFAULT NULL,
  `descrpcion_articulo_1` varchar(100) DEFAULT NULL,
  `serial_articulo_2` varchar(20) DEFAULT NULL,
  `descrpcion_articulo_2` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_articulo` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aprendices`
--

INSERT INTO `aprendices` (`id_aprendiz`, `id_usuario`, `id_titulada`, `tipoDoc_aprendiz`, `documento`, `nombre_aprendiz`, `apellido_aprendiz`, `email_aprendiz`, `celular`, `serial_articulo_1`, `descrpcion_articulo_1`, `serial_articulo_2`, `descrpcion_articulo_2`, `fecha`, `id_articulo`) VALUES
(1, 1, 1, 'Cedula de Ciudadania', '1124989349', 'Tatiana', 'Guzman Galindo', 'tg@gmail.com', '3245641537', '1122', 'Blanca con rojo', '2233', 'Toyota Blanca', '2023-12-12', 1),
(2, 1, 1, 'Cedula de Ciudadania', '1223445678', 'Jorge Eliecer', 'Morales Hugo', 'hugomj@gmail.com', '3242556676', '850001', 'Rojo', '850007', 'Beige', '2023-12-13', 2),
(3, 1, 1, 'Cedula de Ciudadania', '123443255', 'Julian Camilo', 'Rojas Castañeda', 'castaneda@gmail.com', '322464465', '3456', 'No', '3455', 'No', '2023-12-13', 1),
(4, 1, 1, 'Cedula de Ciudadania', '133112345', 'Edwin Santiago', 'Acevedo', 'acvd@gmail.com', '3231466456', '53356', 'No', '45668', 'No', '2023-12-13', 1),
(5, 1, 1, '', '123455678', 'Demian', 'Monrroy Guzmán', 'monrroy@gmail.com', '3245641537', '7272', 'No', '2233', 'No', '2023-12-13', 1),
(6, 1, 1, 'Cedula de Ciudadania', '93341778', 'Leo', 'Guzman Viviesca', 'leo123@gmail.com', '3107567278', '4545', 'Roja gris', '444', 'Verde', '2024-02-01', 1),
(7, 1, 2, '', '555446454', 'Laura', 'Ladino', 'laura@gmail.com', '4545487787', '5445454545', 'Dvrrvt', '454545', 'Sdcdfdffd', '2024-02-01', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_articulo` int(3) NOT NULL,
  `nombre_articulo` varchar(20) DEFAULT NULL,
  `nombre_articulo_2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulo`, `nombre_articulo`, `nombre_articulo_2`) VALUES
(1, 'Bici', 'Computador'),
(2, 'Patineta', 'Carro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructores`
--

CREATE TABLE `instructores` (
  `id_instructor` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `contacto` int(13) NOT NULL,
  `titulada` varchar(255) NOT NULL,
  `ficha` varchar(11) NOT NULL,
  `ambiente` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `instructores`
--

INSERT INTO `instructores` (`id_instructor`, `nombre`, `contacto`, `titulada`, `ficha`, `ambiente`) VALUES
(17, 'Hector Mauricio Camargo Gamba', 2147483647, 'Adso', '2557736', 'E105'),
(18, 'Cristian Adel de Armas Iturriago', 2147483647, 'Cocina', '112233', 'E108');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisosdata`
--

CREATE TABLE `permisosdata` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `nombreUsuario` varchar(20) NOT NULL,
  `apellidoUsuario` varchar(20) NOT NULL,
  `hora_permiso` time NOT NULL,
  `fecha_permiso` date NOT NULL,
  `nombre_instructor_permiso` varchar(255) NOT NULL,
  `nombre_aprendiz_permiso` varchar(255) NOT NULL,
  `titulada_permiso` varchar(255) NOT NULL,
  `ficha_permiso` varchar(11) NOT NULL,
  `ambiente_permiso` varchar(7) NOT NULL,
  `motivo_permiso` varchar(255) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permisosdata`
--

INSERT INTO `permisosdata` (`id`, `usuario`, `nombreUsuario`, `apellidoUsuario`, `hora_permiso`, `fecha_permiso`, `nombre_instructor_permiso`, `nombre_aprendiz_permiso`, `titulada_permiso`, `ficha_permiso`, `ambiente_permiso`, `motivo_permiso`, `creado`) VALUES
(1, '', '', '', '08:44:41', '2024-02-01', 'Hector Mauricio Camargo Gamba', 'Tatiana Andrea Guzman Galindo', 'Adso', '2557736', 'E105', 'Dolor de cabeza', '2024-02-01 13:44:41'),
(2, '', '', '', '09:16:28', '2024-02-01', 'Hector Mauricio Camargo Gamba', 'Tatiana Andrea Guzman Galindo', 'Adso', '2557736', 'E105', 'cita medica', '2024-02-01 14:16:28'),
(3, '', '', '', '09:46:18', '2024-02-01', 'Hector Mauricio Camargo Gamba', 'Tatiana Andrea Guzman Galindo', 'Adso', '2557736', 'E105', 'emergencia familiar', '2024-02-01 14:46:18'),
(4, '', '', '', '09:48:37', '2024-02-01', 'Hector Mauricio Camargo Gamba', 'Tatiana Andrea Guzman Galindo', 'Adso', '2557736', 'E105', 'lololo', '2024-02-01 14:48:37'),
(5, '', '', '', '10:20:01', '2024-02-01', 'Hector Mauricio Camargo Gamba', 'Tatiana Andrea Guzman Galindo', 'Adso', '2557736', 'E105', 'cita medica', '2024-02-01 15:20:01'),
(6, '', '', '', '07:23:34', '2024-02-05', 'Hector Mauricio Camargo Gamba', 'Tatiana Andrea Guzman Galindo', 'Adso', '2557736', 'E105', 'dolor de cabeza.', '2024-02-05 12:23:35'),
(7, '', '', '', '09:43:00', '2024-02-05', 'Hector Mauricio Camargo Gamba', 'Tatiana Andrea Guzman Galindo', 'Adso', '2557736', 'E105', 'dsbhvrhbrftvtvbtybtyy', '2024-02-05 14:43:00'),
(9, '', '', '', '11:21:00', '2024-02-05', 'Hector Mauricio Camargo Gamba', 'Tatiana Andrea Guzman Galindo', 'Adso', '2557736', 'E105', 'juhuhhu', '2024-02-05 16:21:00'),
(10, '', '', '', '11:21:48', '2024-02-05', 'Hector Mauricio Camargo Gamba', 'Tatiana Andrea Guzman Galindo', 'Adso', '2557736', 'E105', 'nuevo', '2024-02-05 16:21:49'),
(11, '', '', '', '11:35:03', '2024-02-05', 'Hector Mauricio Camargo Gamba', 'Tatiana Andrea Guzman Galindo', 'Adso', '2557736', 'E105', 'nuevo pt2', '2024-02-05 16:35:04'),
(12, '', '', '', '06:56:52', '2024-02-06', 'Hector Mauricio Camargo Gamba', 'Tatiana Andrea Guzman Galindo', 'Adso', '2557736', 'E105', 'diligencia familiar', '2024-02-06 11:56:53'),
(13, '', '', '', '09:33:37', '2024-02-06', 'Hector Mauricio Camargo Gamba', 'Tatiana Andrea Guzman Galindo', 'Adso', '2557736', 'E105', 'noooo', '2024-02-06 14:33:38'),
(14, '1', '', '', '09:37:17', '2024-02-06', 'Hector Mauricio Camargo Gamba', 'Tatiana Andrea Guzman Galindo', 'Adso', '2557736', 'E105', 'emergencia', '2024-02-06 14:37:17'),
(15, 'tguzman', '', '', '09:38:53', '2024-02-06', 'Hector Mauricio Camargo Gamba', 'Tatiana Andrea Guzman Galindo', 'Adso', '2557736', 'E105', 'yukuyg', '2024-02-06 14:38:54'),
(16, 'tguzman', 'Tatiana', 'Guzman', '10:33:05', '2024-02-06', 'Hector Mauricio Camargo Gamba', 'Tatiana Andrea Guzman Galindo', 'Adso', '2557736', 'E105', 'dfgrfdhbfgtr', '2024-02-06 15:33:06'),
(17, 'tguzman', 'Tatiana', 'Guzman', '10:35:07', '2024-02-06', 'Hector Mauricio Camargo Gamba', 'Tatiana Andrea Guzman Galindo', 'Adso', '2557736', 'E105', 'prueba', '2024-02-06 15:35:07'),
(18, 'tguzman', 'Tatiana', 'Guzman', '10:35:58', '2024-02-06', 'Hector Mauricio Camargo Gamba', 'Tatiana Andrea Guzman Galindo', 'Adso', '2557736', 'E105', 'lolo', '2024-02-06 15:35:59'),
(19, 'agiguz', 'Angie Daniela', 'Guzman', '10:40:19', '2024-02-06', 'Cristian Adel de Armas Iturriago', 'Demian Fabian Gutierrez Roa', 'Cocina', '112233', 'E108', 'fiebre', '2024-02-06 15:40:20'),
(20, 'tguzman', 'Tatiana Andrea', 'Guzman', '10:41:38', '2024-02-06', 'Cristian Adel de Armas Iturriago', 'Demian Fabian Gutierrez Roa', 'Cocina', '112233', 'E108', 'emegencia', '2024-02-06 15:41:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id_registro` int(3) NOT NULL,
  `id_aprendiz` int(3) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `hora_registro` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id_registro`, `id_aprendiz`, `fecha_registro`, `hora_registro`) VALUES
(1, 1, '2023-12-13', '09:49:06'),
(2, 1, '2023-12-13', '09:49:14'),
(5, 1, '2023-12-13', '09:52:40'),
(6, 1, '2023-12-13', '09:52:53'),
(7, 1, '2023-12-13', '09:52:57'),
(8, 1, '2023-12-13', '09:54:58'),
(9, 1, '2023-12-13', '09:55:16'),
(10, 1, '2023-12-13', '09:55:40'),
(11, 1, '2023-12-13', '09:56:23'),
(12, 1, '2023-12-13', '09:57:55'),
(13, 1, '2023-12-13', '09:59:19'),
(14, 1, '2023-12-13', '09:59:22'),
(15, 1, '2023-12-13', '09:59:23'),
(16, 1, '2023-12-13', '09:59:49'),
(17, 1, '2023-12-13', '10:00:05'),
(18, 1, '2023-12-13', '10:00:40'),
(20, 1, '2023-12-13', '10:01:26'),
(21, 1, '2023-12-13', '10:01:28'),
(25, 1, '2023-12-13', '10:02:43'),
(26, 1, '2023-12-13', '10:03:03'),
(27, 1, '2024-01-13', '16:11:51'),
(29, 1, '2024-01-13', '16:13:51'),
(30, 1, '2024-01-13', '16:16:20'),
(31, 1, '2024-01-13', '17:11:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_instructor_aprendiz`
--

CREATE TABLE `relacion_instructor_aprendiz` (
  `id_relacion` int(11) NOT NULL,
  `id_instructor` int(11) NOT NULL,
  `nombre_aprendiz` varchar(255) NOT NULL,
  `titulada` varchar(255) NOT NULL,
  `ficha` varchar(11) NOT NULL,
  `ambiente` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `relacion_instructor_aprendiz`
--

INSERT INTO `relacion_instructor_aprendiz` (`id_relacion`, `id_instructor`, `nombre_aprendiz`, `titulada`, `ficha`, `ambiente`) VALUES
(1, 17, 'Tatiana Andrea Guzman Galindo', 'Adso', '2557736', 'E105'),
(2, 18, 'Demian Fabian Gutierrez Roa', 'Cocina', '112233', 'E108');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tituladas`
--

CREATE TABLE `tituladas` (
  `id_titulada` int(3) NOT NULL,
  `nombre_titulada` varchar(50) NOT NULL,
  `ficha_titulada` int(10) DEFAULT NULL,
  `jornada` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tituladas`
--

INSERT INTO `tituladas` (`id_titulada`, `nombre_titulada`, `ficha_titulada`, `jornada`) VALUES
(1, 'Adso', 2557736, 'Mañana'),
(2, 'Cocina', 112233, 'Mañana'),
(3, 'Manipulación De Alimentos Familiares', 111111, 'Mañana'),
(4, 'Información Perfil De La Empresa Y Log', 13324, 'Mañana'),
(5, 'Aaaaaaaaaaaadñ Daaaaaaartvf', 1122345, 'Mañana'),
(6, 'Revrtvgtrgtr', 54545, 'Mañana'),
(7, 'Rerreerererere', 665443, 'Mañana'),
(8, 'Dylan Que Se De Que No Llego A', 356755, 'Mañana'),
(9, 'Técnico En El Sena Relleno', 45677, 'Mañana'),
(10, 'Análisis Y Desarrollo De Software', 467865, 'Mañana'),
(11, 'Ffhhgfgj', 55667, 'Mañana'),
(12, 'Dtyxitxiydoyfoyxoyxoydogxpyxpoydoydpyfoy', 87799, 'Mañana'),
(13, 'Fdbtfgbyt', 55555, 'Mañana'),
(14, 'Yutyu', 555, 'Mañana'),
(15, 'Wwweffdd Drew Erefgfdfffgg', 3333, 'Mañana'),
(16, 'Frffgfrfyhgffy Jjk Jgoytt Hhlu', 7777, 'Mañana'),
(17, 'Asssdfgg Hjikkhhh Hhkhvjk Jjghkk Hjki', 77789, 'Mañana'),
(18, 'Asssdfgg Hjikkhhh Hhkhvjk Jjghkk Hjki', 98989, 'Mañana'),
(19, 'Asssdfgg Hjikkhhh Hhkhvjk Jjghkk Hjkibtr', 5555, 'Mañana'),
(20, 'Ma Dongeok Sangkoyk Hb Jm Uvuvibk', 57577, 'Mañana'),
(21, 'Tarea Viejita Pt Donde Tocaba Imaginarme', 78997, 'Mañana'),
(22, 'Gugugih', 5790, 'Mañana'),
(23, 'Ggjk', 998, 'Mañana'),
(24, 'Fyu', 2765, 'Mañana'),
(25, 'Ffffh', 446, 'Mañana'),
(26, 'Rcchkku', 667, 'Mañana'),
(27, 'Fjkvcb', 678, 'Mañana'),
(28, 'Ftgtgyjij', 46767, 'Mañana'),
(29, 'Ugucouc', 879, 'Mañana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(3) NOT NULL,
  `tipoDoc_usuario` varchar(30) NOT NULL,
  `documento_usuario` varchar(15) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `apellido_usuario` varchar(20) NOT NULL,
  `correo_usuario` varchar(30) NOT NULL,
  `usuario_usuario` varchar(20) NOT NULL,
  `clave_usuario` varchar(65) NOT NULL,
  `rol_usuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `tipoDoc_usuario`, `documento_usuario`, `nombre_usuario`, `apellido_usuario`, `correo_usuario`, `usuario_usuario`, `clave_usuario`, `rol_usuario`) VALUES
(1, 'Cedula de Ciudadania', '1124989349', 'Tatiana Andrea', 'Guzman', 'tgz57031@gmail.com', 'tguzman', '$2y$10$gO0Yrx3HOxHGCzD0e6OAx.kj3YqHS7H/N4RbcCzHNeIri18QH5dd.', 'Administrador'),
(2, 'Cedula de Ciudadania', '1125455', 'Angie Daniela', 'Guzman', 'angi@gmail.com', 'agiguz', '$2y$10$jieTvyQGBFARyBAiq0NB/.dhg/sI3VM7NCwBm2Hc0pzam.j8cZyri', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  ADD PRIMARY KEY (`id_aprendiz`),
  ADD KEY `fk_aprendiz_usuario` (`id_usuario`),
  ADD KEY `fk_aprendiz_titulada` (`id_titulada`),
  ADD KEY `fk_aprendiz_articulo` (`id_articulo`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `instructores`
--
ALTER TABLE `instructores`
  ADD PRIMARY KEY (`id_instructor`);

--
-- Indices de la tabla `permisosdata`
--
ALTER TABLE `permisosdata`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `fk_registro_aprendiz` (`id_aprendiz`);

--
-- Indices de la tabla `relacion_instructor_aprendiz`
--
ALTER TABLE `relacion_instructor_aprendiz`
  ADD PRIMARY KEY (`id_relacion`),
  ADD KEY `id_instructor` (`id_instructor`);

--
-- Indices de la tabla `tituladas`
--
ALTER TABLE `tituladas`
  ADD PRIMARY KEY (`id_titulada`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  MODIFY `id_aprendiz` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `instructores`
--
ALTER TABLE `instructores`
  MODIFY `id_instructor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `permisosdata`
--
ALTER TABLE `permisosdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `relacion_instructor_aprendiz`
--
ALTER TABLE `relacion_instructor_aprendiz`
  MODIFY `id_relacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tituladas`
--
ALTER TABLE `tituladas`
  MODIFY `id_titulada` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aprendices`
--
ALTER TABLE `aprendices`
  ADD CONSTRAINT `fk_aprendiz_articulo` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id_articulo`),
  ADD CONSTRAINT `fk_aprendiz_titulada` FOREIGN KEY (`id_titulada`) REFERENCES `tituladas` (`id_titulada`),
  ADD CONSTRAINT `fk_aprendiz_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `fk_registro_aprendiz` FOREIGN KEY (`id_aprendiz`) REFERENCES `aprendices` (`id_aprendiz`);

--
-- Filtros para la tabla `relacion_instructor_aprendiz`
--
ALTER TABLE `relacion_instructor_aprendiz`
  ADD CONSTRAINT `fk_id_instructor` FOREIGN KEY (`id_instructor`) REFERENCES `instructores` (`id_instructor`),
  ADD CONSTRAINT `relacion_instructor_aprendiz_ibfk_1` FOREIGN KEY (`id_instructor`) REFERENCES `instructores` (`id_instructor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
