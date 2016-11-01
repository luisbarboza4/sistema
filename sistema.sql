-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2016 a las 01:56:58
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `circuito`
--

CREATE TABLE `circuito` (
  `id_circuito` int(11) NOT NULL,
  `nombre_circuito` varchar(30) NOT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `circuito`
--

INSERT INTO `circuito` (`id_circuito`, `nombre_circuito`, `id_estado`) VALUES
(40, 'Maracaibo 1', 1),
(41, 'San Francisco', 1),
(43, 'Luis Beltran', 1),
(44, 'Maracaibo Circuito 1', 1),
(45, 'Prueba', 1),
(47, 'Circuito 4', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `ciudad`, `id_estado`) VALUES
(1, 'Maracaibo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegio`
--

CREATE TABLE `colegio` (
  `id_colegio` int(11) NOT NULL,
  `nombre_colegio` varchar(45) DEFAULT NULL,
  `direccion_colegio` varchar(45) DEFAULT NULL,
  `id_parroquia` int(11) DEFAULT NULL,
  `id_circuito` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `colegio`
--

INSERT INTO `colegio` (`id_colegio`, `nombre_colegio`, `direccion_colegio`, `id_parroquia`, `id_circuito`) VALUES
(15, 'Norman Prieto Ram', 'Detras de URBE', 8, 40),
(17, 'U.E Ricaurte', 'La Pomona', 1, 40),
(18, 'Nazareth', 'EL barrio del caucho', 11, 43),
(19, 'juana de avila', 'san jacinto', 13, 40),
(20, 'Rosmini', 'El milagro', 8, 44),
(21, 'U.E Marcos Perez Jimenez', 'La NASA', 5, 43),
(22, 'Antonio Arraiz', 'Maracaibo', 8, 45),
(23, 'asdasda', 'asdasdasd', 2, 40),
(24, 'Norman Prieto', 'El Naranjal', 8, 47);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conversation`
--

CREATE TABLE `conversation` (
  `id_conversation` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `mensaje` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_circuito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `conversation`
--

INSERT INTO `conversation` (`id_conversation`, `username`, `mensaje`, `time`, `id_circuito`) VALUES
(1, 'Jose', 'hola', '2016-09-27 19:31:08', 40),
(2, 'Jose', 'hola grupo', '2016-09-27 19:31:11', 40),
(3, 'Jose', 'asdasda', '2016-09-27 19:32:09', 40),
(4, 'Jose', 'asdasdasd', '2016-09-27 19:32:11', 40),
(5, 'Jose', 'asdasdasd', '2016-09-27 19:32:12', 40),
(10, 'Jose', 'asdasdasd', '2016-09-27 19:33:39', 40),
(11, 'Jose', 'asdasdasd', '2016-09-27 19:34:26', 40),
(12, 'Jose', 'asdasdasd', '2016-09-27 19:34:28', 40),
(13, 'Jose', 'asdasdasdasdasdas', '2016-09-27 19:34:32', 40),
(14, 'Jose', 'asdasdasd', '2016-09-27 19:35:02', 40),
(15, 'Jose', 'asdasdasd', '2016-09-27 19:35:03', 40),
(16, 'Jose', 'asdasdasdasdasdasd', '2016-09-27 19:35:05', 40),
(17, 'Jose', 'holaholahola', '2016-09-27 19:35:09', 40),
(18, 'Jose', 'asdasdasd', '2016-09-27 19:35:28', 40),
(19, 'Jose', 'asdasdasd', '2016-09-27 19:35:30', 40),
(20, 'joseperez', 'asdasdasdasd', '2016-09-27 19:36:36', 40),
(21, 'joseperez', 'asdasdasd', '2016-09-27 19:36:38', 40),
(22, 'joseperez', 'asdasdad', '2016-09-27 19:36:40', 40),
(23, 'joseperez', 'asdasdasd', '2016-09-27 19:36:52', 40),
(24, 'Jose', 'asdasdasd', '2016-09-27 19:38:27', 40),
(25, 'Jose', 'asdasdasdasd', '2016-09-27 19:38:29', 40),
(26, 'joseperez', 'asdasdasdasd', '2016-09-27 19:38:42', 40),
(27, 'joseperez', 'hola grupo', '2016-09-27 19:39:22', 40),
(28, 'joseperez', 'como estan!', '2016-09-27 19:39:28', 40),
(29, 'eferrer', 'hola', '2016-09-27 20:21:36', 43),
(30, 'eferrer', 'asdasdasd\r\n', '2016-09-27 20:21:40', 43),
(31, 'joseperez', 'hola', '2016-09-27 23:05:20', 40),
(32, 'eferrer', 'hola', '2016-09-27 23:06:11', 43),
(33, 'eferrer', 'asdasdasdasd', '2016-09-27 23:06:17', 43),
(34, 'joseperez', 'asdasd', '2016-09-27 23:07:08', 40),
(35, 'joseperez', 'sdasdsdasd', '2016-09-27 23:07:49', 40),
(36, 'joseperez', 'hola', '2016-09-27 23:16:20', 40),
(37, 'joseperez', '', '2016-09-27 23:16:27', 40),
(38, 'steve', 'epale', '2016-09-27 23:16:31', 40),
(39, 'steve', 'bien bien', '2016-09-27 23:16:35', 40),
(40, 'joseoropeza', 'hola', '2016-09-27 23:16:39', 40),
(41, 'steve', 'asdasd', '2016-09-27 23:16:43', 40),
(42, 'joseperez', 'hola grupo :)', '2016-09-28 00:11:08', 40),
(43, 'ricardo', 'buenos dias grupo', '2016-09-28 00:52:37', 45),
(44, 'luisb', 'epale profe', '2016-09-28 00:52:49', 45),
(45, 'luisb', 'sdasdas', '2016-09-28 00:52:53', 45),
(46, 'ricardo', 'adasdasd', '2016-09-28 00:52:58', 45),
(47, 'ricardo', 'dsqwdasdasdasdsdasdsd', '2016-09-28 00:54:16', 45),
(48, 'ricardo', 'asdasdasdasd\r\n', '2016-09-28 00:54:21', 45),
(49, 'andante', 'buenos dias grupo', '2016-09-29 21:35:29', 47),
(50, 'luis', 'holacomo estas', '2016-09-29 21:35:37', 47),
(51, 'andante', 'hasasdasdas', '2016-09-29 21:36:00', 47),
(53, 'luis', 'xd', '2016-10-07 21:12:01', 47),
(54, 'luis', 'xd', '2016-10-07 21:12:03', 47),
(55, 'luis', 'jaja', '2016-10-07 21:12:04', 47),
(56, 'luis', 'xd', '2016-10-07 21:12:06', 47),
(57, 'luis', 'xd', '2016-10-07 21:12:06', 47),
(58, 'luis', 'xd', '2016-10-07 21:12:07', 47),
(59, 'luis', 'd', '2016-10-07 21:12:08', 47),
(60, 'luis', 'd', '2016-10-07 21:12:08', 47),
(61, 'luis', 'd', '2016-10-07 21:12:08', 47),
(62, 'luis', 'd', '2016-10-07 21:12:08', 47),
(63, 'luis', 'd', '2016-10-07 21:12:08', 47),
(64, 'luis', 'd', '2016-10-07 21:12:09', 47),
(83, 'luis', '123456', '2016-10-07 21:18:15', 47),
(85, 'luis', '123', '2016-10-07 21:26:19', 47),
(86, 'luis', '1', '2016-10-07 21:31:53', 47),
(87, 'luis', '2', '2016-10-07 21:32:01', 47),
(88, 'luis', '2', '2016-10-07 21:49:36', 47),
(89, 'luis', '5', '2016-10-07 21:49:39', 47),
(90, 'luis', '1', '2016-10-07 21:50:32', 47),
(91, 'luis', '2', '2016-10-07 22:00:13', 47),
(92, 'luis', '1', '2016-10-07 22:06:50', 47),
(93, 'eferrer', 'hola', '2016-10-17 21:12:07', 43),
(94, 'eferrer', '.', '2016-10-17 21:12:11', 43),
(95, 'eferrer', 'hola', '2016-10-17 21:13:16', 43);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id_documento` int(11) NOT NULL,
  `nombre_documento` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) NOT NULL,
  `extension` varchar(45) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`id_documento`, `nombre_documento`, `descripcion`, `extension`, `fecha`, `id_usuario`) VALUES
(2, 'carta', 'esta es una carta prueba', 'pdf', '2016-09-29 05:01:04 pm', 1),
(4, 'yoghfhg', 'yofghdfg', 'pdf', '2016-10-13 04:50:34 pm', 71);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`) VALUES
(1, 'Zulia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `url` varchar(150) NOT NULL,
  `class` varchar(45) NOT NULL DEFAULT 'event-important',
  `start` varchar(15) NOT NULL,
  `end` varchar(15) NOT NULL,
  `inicio_normal` varchar(50) NOT NULL,
  `final_normal` varchar(50) NOT NULL,
  `id_circuito` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `body`, `url`, `class`, `start`, `end`, `inicio_normal`, `final_normal`, `id_circuito`) VALUES
(26, 'Reunion general del grupo', 'Hola llevar comida', 'http://localhost/sistema/views/descripcion_evento.php?id=26', 'event-important', '1475265960000', '1475265960000', '30/09/2016 15:36', '30/09/2016 15:36', 47),
(28, 'hola', 'hola', 'http://localhost/sistema/views/descripcion_evento.php?id=28', 'event-success', '1475273400000', '1475273400000', '30/09/2016 17:40', '30/09/2016 17:40', 47),
(29, 'asdasda', 'asdasdasd', 'http://localhost/sistema/views/descripcion_evento.php?id=29', 'event-info', '1475273400000', '1475273400000', '30/09/2016 17:40', '30/09/2016 17:40', 47),
(32, 'hola', 'hola', 'http://localhost/sistema/views/descripcion_evento.php?id=32', 'event-info', '1475959560000', '1475959560000', '08/10/2016 16:46', '08/10/2016 16:46', 47),
(33, '1', '2', 'http://localhost/sistema/views/descripcion_evento.php?id=33', 'event-info', '1475959680000', '1475959680000', '08/10/2016 16:48', '08/10/2016 16:48', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquia`
--

CREATE TABLE `parroquia` (
  `id_parroquia` int(11) NOT NULL,
  `parroquia` varchar(45) DEFAULT NULL,
  `id_ciudad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parroquia`
--

INSERT INTO `parroquia` (`id_parroquia`, `parroquia`, `id_ciudad`) VALUES
(1, 'Cristo de Aranza', 1),
(2, 'Antonio Borjas Romero', 1),
(3, 'Bolivar', 1),
(4, 'Cacique Mara', 1),
(5, 'Caracciolo Parra Perez', 1),
(6, 'Cecilio Acosta', 1),
(7, 'Chiquinquira', 1),
(8, 'Coquivacoa', 1),
(9, 'Francisco Eugenio Bustamante', 1),
(10, 'Idelfonso Vasquez', 1),
(11, 'Juana de Avila', 1),
(12, 'Manuel Dagnino', 1),
(13, 'Olegario Villalobos', 1),
(14, 'Raul Leoni', 1),
(15, 'San Isidro', 1),
(16, 'Santa Lucia', 1),
(17, 'Venancio Pulgar', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(45) DEFAULT NULL,
  `apellido_usuario` varchar(45) DEFAULT NULL,
  `email_usuario` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `pass_usuario` varchar(45) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL,
  `pregunta_secreta` varchar(45) DEFAULT NULL,
  `respuesta_secreta` varchar(45) DEFAULT NULL,
  `id_circuito` int(11) DEFAULT NULL,
  `id_colegio` int(11) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `email_usuario`, `username`, `pass_usuario`, `level`, `pregunta_secreta`, `respuesta_secreta`, `id_circuito`, `id_colegio`, `telefono`) VALUES
(1, 'Marianela', 'Camarillo', 'mararianelaca@gmail.com', 'mcamarillo', '8cb2237d0679ca88db6464eac60da96345513964', '0', 'nombre de mi perro', 'guao', NULL, NULL, '04121234567'),
(67, 'Jose', 'Peraz', 'joseperez@gmail.com', 'joseperez', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1', 'Â¿Vino favorito?', 'gato negro', 40, NULL, NULL),
(68, 'Jose', 'Oropeza', 'josoro@hotmail.com', 'joseoropeza', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2', 'asdasss', 'asdasd', 40, 15, NULL),
(69, 'Steves', 'Jobs', 'steve@gmail.com', 'steve', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2', 'Â¿Nombre de mi perro?', 'steve', 40, 17, NULL),
(70, 'Esbert', 'Montiel', 'esbert@hotmail.com', 'esbert', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1', NULL, NULL, 41, NULL, NULL),
(71, 'Ellery', 'Ferrer', 'ellery@gmail.com', 'eferrer', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1', 'que paso?', 'no se', 43, NULL, NULL),
(72, 'Chori', 'Vuelas', 'chroi@chori.com', 'chvuelvas', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2', NULL, NULL, 43, 18, NULL),
(73, 'Iris', 'Mora', 'licirish@hotmail.com', 'irishmora', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1', 'Nombre de mi papa', 'arnulfo', 44, NULL, NULL),
(74, 'Alfredo', 'Mora', 'alfredo@hotmail.com', 'alfredomora', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2', 'adsdsad', 'asdasd', 44, 20, NULL),
(75, 'Arnold', 'Schwarzenegger', 'arnold@gmail.com', 'arnold', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2', NULL, NULL, 43, 21, NULL),
(76, 'Ricardo', 'Caraballo', 'ricardo@gmail.com', 'ricardo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1', 'mascota', 'hola', 45, NULL, NULL),
(77, 'Luis', 'Barboza', 'luisb@hotmail.com', 'luisb', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2', NULL, NULL, 45, 22, NULL),
(79, 'Luis', 'Barboza', 'luis@hotmail.com', 'luis', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2', 'yo', 'luis', 47, 24, '04126634553');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `circuito`
--
ALTER TABLE `circuito`
  ADD PRIMARY KEY (`id_circuito`),
  ADD UNIQUE KEY `nombre_circuito` (`nombre_circuito`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_circuito` (`id_circuito`),
  ADD KEY `nombre_circuito_2` (`nombre_circuito`),
  ADD KEY `id_estado_2` (`id_estado`),
  ADD KEY `nombre_circuito_3` (`nombre_circuito`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_ciudad` (`id_ciudad`),
  ADD KEY `id_estado_2` (`id_estado`);

--
-- Indices de la tabla `colegio`
--
ALTER TABLE `colegio`
  ADD PRIMARY KEY (`id_colegio`),
  ADD UNIQUE KEY `nombre_colegio` (`nombre_colegio`),
  ADD KEY `fk_Escuela/Colegio_Circuito1_idx` (`id_circuito`),
  ADD KEY `id_parroquia` (`id_parroquia`),
  ADD KEY `id_colegio` (`id_colegio`),
  ADD KEY `nombre_colegio_2` (`nombre_colegio`),
  ADD KEY `id_parroquia_2` (`id_parroquia`),
  ADD KEY `id_circuito` (`id_circuito`),
  ADD KEY `nombre_colegio_3` (`nombre_colegio`);

--
-- Indices de la tabla `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id_conversation`),
  ADD KEY `id_circuito` (`id_circuito`),
  ADD KEY `id_circuito_2` (`id_circuito`),
  ADD KEY `id_conversation` (`id_conversation`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `fk_Documento_Usuarios1_idx` (`id_usuario`),
  ADD KEY `id_documento` (`id_documento`),
  ADD KEY `nombre_documento` (`nombre_documento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_circuito` (`id_circuito`);

--
-- Indices de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD PRIMARY KEY (`id_parroquia`),
  ADD KEY `id_ciudad` (`id_ciudad`),
  ADD KEY `id_parroquia` (`id_parroquia`),
  ADD KEY `id_ciudad_2` (`id_ciudad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email_usuario_UNIQUE` (`email_usuario`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_Usuarios_Colegio1_idx` (`id_colegio`),
  ADD KEY `id_circuito` (`id_circuito`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `email_usuario` (`email_usuario`),
  ADD KEY `username_2` (`username`),
  ADD KEY `id_circuito_2` (`id_circuito`),
  ADD KEY `id_colegio` (`id_colegio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `circuito`
--
ALTER TABLE `circuito`
  MODIFY `id_circuito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `colegio`
--
ALTER TABLE `colegio`
  MODIFY `id_colegio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id_conversation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  MODIFY `id_parroquia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `circuito`
--
ALTER TABLE `circuito`
  ADD CONSTRAINT `circuito_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `colegio`
--
ALTER TABLE `colegio`
  ADD CONSTRAINT `colegio_ibfk_1` FOREIGN KEY (`id_parroquia`) REFERENCES `parroquia` (`id_parroquia`),
  ADD CONSTRAINT `fk_Escuela/Colegio_Circuito1` FOREIGN KEY (`id_circuito`) REFERENCES `circuito` (`id_circuito`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `conversation_ibfk_1` FOREIGN KEY (`id_circuito`) REFERENCES `circuito` (`id_circuito`);

--
-- Filtros para la tabla `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `fk_Documento_Usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_circuito`) REFERENCES `circuito` (`id_circuito`);

--
-- Filtros para la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD CONSTRAINT `parroquia_ibfk_1` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_Usuarios_Colegio1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_circuito`) REFERENCES `circuito` (`id_circuito`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
