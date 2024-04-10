CREATE DATABASE IF NOT EXISTS controlingreso;
USE controlingreso;

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

CREATE TABLE `articulos` (
  `id_articulo` int(3) NOT NULL,
  `nombre_articulo` varchar(20) DEFAULT NULL,
  `nombre_articulo_2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `instructores` (
  `id_instructor` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `contacto` int(13) NOT NULL,
  `titulada` varchar(255) NOT NULL,
  `ficha` varchar(11) NOT NULL,
  `ambiente` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `registro` (
  `id_registro` int(3) NOT NULL,
  `id_aprendiz` int(3) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `hora_registro` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `relacion_instructor_aprendiz` (
  `id_relacion` int(11) NOT NULL,
  `id_instructor` int(11) NOT NULL,
  `nombre_aprendiz` varchar(255) NOT NULL,
  `titulada` varchar(255) NOT NULL,
  `ficha` varchar(11) NOT NULL,
  `ambiente` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `tituladas` (
  `id_titulada` int(3) NOT NULL,
  `nombre_titulada` varchar(50) NOT NULL,
  `ficha_titulada` int(10) DEFAULT NULL,
  `jornada` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `id_instructor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `permisosdata`
--
ALTER TABLE `permisosdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `relacion_instructor_aprendiz`
--
ALTER TABLE `relacion_instructor_aprendiz`
  MODIFY `id_relacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tituladas`
--
ALTER TABLE `tituladas`
  MODIFY `id_titulada` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


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

INSERT INTO `usuarios`(`tipoDoc_usuario`, `documento_usuario`, `nombre_usuario`, `apellido_usuario`, `correo_usuario`, `usuario_usuario`, `clave_usuario`, `rol_usuario`) VALUES ('Cedula de Ciudadania','123456789','Administrador','Administrador','admin@correo.com','administrador','$2y$10$Kr2gFCee3aXhZLHjYSQR9OWC/E0DPJ2RnawPytY339dr2/2DKcD8a','Administrador')

INSERT INTO `articulos` (`nombre_articulo`, `nombre_articulo_2`) VALUES ( 'Moto', 'Computador');
INSERT INTO `articulos` (`nombre_articulo`, `nombre_articulo_2`) VALUES ( 'Bicicleta', 'Computador');
INSERT INTO `articulos` (`nombre_articulo`, `nombre_articulo_2`) VALUES ( 'Carro', 'Computador');
INSERT INTO `articulos` (`nombre_articulo`, `nombre_articulo_2`) VALUES ( 'Moto', '');
INSERT INTO `articulos` (`nombre_articulo`, `nombre_articulo_2`) VALUES ( 'Carro', '');
INSERT INTO `articulos` (`nombre_articulo`, `nombre_articulo_2`) VALUES ( 'Bicicleta', '');


INSERT INTO `tituladas`(`nombre_titulada`, `ficha_titulada`, `jornada`) VALUES ('Analisis y desarrollo de sofware','2557736','Mañana');
INSERT INTO `tituladas`(`nombre_titulada`, `ficha_titulada`, `jornada`) VALUES ('Tecnico de cocina','2546234','Tarde');
INSERT INTO `tituladas`(`nombre_titulada`, `ficha_titulada`, `jornada`) VALUES ('Analisis de datos','3456265','Noche');

INSERT INTO `aprendices` (`id_usuario`, `id_titulada`, `tipoDoc_aprendiz`, `documento`, `nombre_aprendiz`, `apellido_aprendiz`, `email_aprendiz`, `celular`, `serial_articulo_1`, `descrpcion_articulo_1`, `serial_articulo_2`, `descrpcion_articulo_2`, `fecha`, `id_articulo`) VALUES
(1, 1, 'Cedula de Ciudadania', '1124989349', 'Eduar', 'Cardenas', 'eduar@correo.com', '3245641537', '1122', 'Color gris con placas ARF-28F', '2233', 'Color Gris Con Cargador Marca HP', '2023-12-12', 1);

INSERT INTO `instructores` (`id_instructor`, `nombre`, `contacto`, `titulada`, `ficha`, `ambiente`) VALUES
(17, 'Hector Mauricio Camargo Gamba', 2147483647, 'Adso', '2557736', 'E105'),
(18, 'Cristian Adel de Armas Iturriago', 2147483647, 'Cocina', '112233', 'E108');

INSERT INTO `permisosdata` (`id`, `usuario`, `nombreUsuario`, `apellidoUsuario`, `hora_permiso`, `fecha_permiso`, `nombre_instructor_permiso`, `nombre_aprendiz_permiso`, `titulada_permiso`, `ficha_permiso`, `ambiente_permiso`, `motivo_permiso`, `creado`) VALUES
(1, '', '', '', '08:44:41', '2024-02-01', 'Hector Mauricio Camargo Gamba', 'Tatiana Andrea Guzman Galindo', 'Adso', '2557736', 'E105', 'Dolor de cabeza', '2024-02-01 13:44:41'),
(2, '', '', '', '09:16:28', '2024-02-01', 'Hector Mauricio Camargo Gamba', 'Tatiana Andrea Guzman Galindo', 'Adso', '2557736', 'E105', 'cita medica', '2024-02-01 14:16:28');

INSERT INTO `relacion_instructor_aprendiz` (`id_relacion`, `id_instructor`, `nombre_aprendiz`, `titulada`, `ficha`, `ambiente`) VALUES
(1, 17, 'Tatiana Andrea Guzman Galindo', 'Adso', '2557736', 'E105'),
(2, 18, 'Demian Fabian Gutierrez Roa', 'Cocina', '112233', 'E108');
