-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2020 a las 01:35:33
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `black_fire`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(9) NOT NULL,
  `id_usuario` int(9) NOT NULL,
  `id_producto` int(9) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `distrito` varchar(60) NOT NULL,
  `departamento` varchar(60) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(5) NOT NULL,
  `coste` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(9) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(120) NOT NULL,
  `precio` float(10,2) NOT NULL,
  `imagen` varchar(60) NOT NULL,
  `stock` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `stock`) VALUES
(14, 'Power Girl', 'polo solo para chicas y chicos trans', 50.00, 'polo-powergirl.jpg', 50),
(15, 'Camiseta Adidas', 'camiseta adidas color azul', 120.00, 'adidas2.jpg', 50),
(16, 'Polo Puma', 'polo puma color blanco', 80.00, 'puma.jpg', 50),
(17, 'Polo Adidas', 'polo adidas color blanco', 100.00, 'adidas1.jpg', 25),
(18, 'Polo adidas XR', 'polo achorado', 200.00, 'adidas 4.jpg', 20),
(19, 'Polo Adidas', 'polo adidas color negro', 85.00, 'adidas-polo.jpg', 54);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(9) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `contraseña`, `rol`) VALUES
(1, 'harold', 'alfaro', 'harold@gmail.com', '$2y$04$mKJo2V1HslndfEcNDkFVL.Qbho02qj7YSw2zDVdAyDdGJNfLcZdFC', 'admin'),
(2, 'crisa', 'alfaro', 'crisalida@gmail.com', '$2y$04$mkNeGMsIQ4AoVtnveM6DnOgf6oi/dqWQluBRu3oT3kfRYW3FnueKu', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_usuario_pedido` (`id_usuario`),
  ADD KEY `fk_id_producto_pedido` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_id_producto_pedido` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `fk_id_usuario_pedido` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
