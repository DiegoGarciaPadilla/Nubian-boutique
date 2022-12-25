-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2020 a las 06:02:11
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `clasificacion_id` int(11) NOT NULL,
  `clasificacion_nombre` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `clasificacion`
--

INSERT INTO `clasificacion` (`clasificacion_id`, `clasificacion_nombre`) VALUES
(1, 'ropa'),
(2, 'sneakers'),
(3, 'bolsas'),
(4, 'accesorios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `telefono_cliente` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `email_cliente` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre_cliente`, `telefono_cliente`, `email_cliente`) VALUES
(1, 'Frederick Starks', '2122000578', 'frederick.starks@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `detalle_id` int(11) NOT NULL,
  `detalle_venta` int(11) NOT NULL,
  `detalle_producto` varchar(30) COLLATE utf8_bin NOT NULL,
  `detalle_importe` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`detalle_id`, `detalle_venta`, `detalle_producto`, `detalle_importe`) VALUES
(1, 7, '14751040', 11999),
(2, 8, '14138527', 32226),
(3, 9, '14774157', 7500),
(4, 10, '15449035', 4574),
(5, 11, '14664805', 15090),
(6, 12, '14774157', 7500),
(7, 13, '14774157', 7500),
(8, 14, '14774157', 15000),
(9, 15, '14138527', 161130),
(10, 16, '13159066', 84111),
(11, 17, '13159066', 84111),
(12, 18, '13159066', 84111),
(13, 19, '13159066', 252333),
(14, 20, '13159066', 84111),
(15, 21, '13159066', 84111),
(16, 22, '13159066', 504666),
(17, 23, '13159066', 504666),
(18, 24, '13159066', 252333),
(19, 25, '14138527', 64452),
(20, 26, '14664805', 45270);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo_barras` varchar(30) COLLATE utf8_bin NOT NULL,
  `nombre_producto` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `clasificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo_barras`, `nombre_producto`, `stock`, `precio`, `imagen`, `clasificacion`) VALUES
('13159066', 'NIKE X OFF-WHITE AIR JORDAN 1', 17, 84111, '../plantilla/imagenes/nike_off_white_air_jordan_1.jpg', 2),
('13404370', 'BALENCIAGA TRIPLE S', 20, 18500, '../plantilla/imagenes/balenciaga_triple_s.jpg', 2),
('14138527', 'SUPREME PLAYERA SPLIT BOX', 30, 32226, '../plantilla/imagenes/supreme_split_box.jpg', 1),
('14574725', 'SAINT LAURENT TOTE', 19, 23950, '../plantilla/imagenes/saint_laurent_tote.jpg', 3),
('14574765', 'SAINT LAURENT KATE 99', 14, 35865, '../plantilla/imagenes/saint_laurent_kate_99.jpg', 3),
('14664805', 'BALENCIAGA SPEED', 71, 15090, '../plantilla/imagenes/balenciaga_speed.jpg', 2),
('14751040', 'OFF-WHITE SUDADERA CARAVAGGIO', 42, 11999, '../plantilla/imagenes/off_white_sudadera_caravaggio .jpg', 1),
('14774141', 'BALENCIAGA TOTE EVERYDAY', 15, 18030, '../plantilla/imagenes/balenciaga_everyday.jpg', 3),
('14774157', 'BALENCIAGA GORRA UNIFORM', 47, 7500, '../plantilla/imagenes/balenciaga_gorra.jpg', 4),
('15322197', 'BURBERRY GABARDINA LARGA CHELS', 12, 39990, '../plantilla/imagenes/burberry_chelsea_heritage.jpg', 1),
('15361052', 'FEDERICA TOSI ARETES LARGOS', 69, 3310, '../plantilla/imagenes/federica_tosi_aretes_largos.jpg', 4),
('15449035', 'GIVENCHY MASCADA', 16, 4574, '../plantilla/imagenes/givenchy_mascada.jpg', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario_nombre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `usuario_password` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_nombre`, `usuario_password`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `venta_id` int(11) NOT NULL,
  `venta_fecha` date DEFAULT NULL,
  `venta_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`venta_id`, `venta_fecha`, `venta_cliente`) VALUES
(5, '2020-06-01', 1),
(6, '2020-06-01', 1),
(7, '2020-06-01', 1),
(8, '2020-06-01', 1),
(9, '2020-06-01', 1),
(10, '2020-06-01', 1),
(11, '2020-06-01', 1),
(12, '2020-06-01', 1),
(13, '2020-06-01', 1),
(14, '2020-06-01', 1),
(15, '2020-06-01', 1),
(16, '2020-06-01', 1),
(17, '2020-06-01', 1),
(18, '2020-06-01', 1),
(19, '2020-06-01', 1),
(20, '2020-06-01', 1),
(21, '2020-06-01', 1),
(22, '2020-06-01', 1),
(23, '2020-06-01', 1),
(24, '2020-06-01', 1),
(25, '2020-06-01', 1),
(26, '2020-06-01', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD PRIMARY KEY (`clasificacion_id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`detalle_id`),
  ADD KEY `fk_detalle_venta` (`detalle_venta`),
  ADD KEY `fk_detalle_producto` (`detalle_producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo_barras`),
  ADD KEY `fk_clasificacion_producto` (`clasificacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`venta_id`),
  ADD KEY `fk_venta_cliente` (`venta_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  MODIFY `clasificacion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `detalle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `venta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `fk_detalle_producto` FOREIGN KEY (`detalle_producto`) REFERENCES `producto` (`codigo_barras`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_venta` FOREIGN KEY (`detalle_venta`) REFERENCES `venta` (`venta_id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_clasificacion_producto` FOREIGN KEY (`clasificacion`) REFERENCES `clasificacion` (`clasificacion_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_cliente` FOREIGN KEY (`venta_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
