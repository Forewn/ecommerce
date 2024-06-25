-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2024 a las 14:12:59
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
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL,
  `cargo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `cargo`) VALUES
(1, 'administrador'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE `carritos` (
  `id_carrito` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_actualizacion` date NOT NULL,
  `subtotal` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carritos`
--

INSERT INTO `carritos` (`id_carrito`, `id_usuario`, `fecha_actualizacion`, `subtotal`) VALUES
(12, 29699505, '0000-00-00', 4.43);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`) VALUES
(1, 'Carnes'),
(2, 'Salsa'),
(3, 'Cereales'),
(4, 'Reposteria'),
(5, 'Confiteria'),
(6, 'Electricidad'),
(7, 'Higiene'),
(8, 'jhgjhvjhnjkml'),
(9, 'prueba'),
(10, 'Electrodomesticos'),
(11, 'plasticos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_carrito`
--

CREATE TABLE `detalles_carrito` (
  `id_detalles` int(11) NOT NULL,
  `id_carrito` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `costo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalles_carrito`
--

INSERT INTO `detalles_carrito` (`id_detalles`, `id_carrito`, `id_producto`, `cantidad`, `costo`) VALUES
(36, 12, 1007, 1, 2.23),
(37, 12, 1006, 1, 2.2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_factura`
--

CREATE TABLE `detalles_factura` (
  `id_detalles_factura` int(11) NOT NULL,
  `id_factura` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `costo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalles_factura`
--

INSERT INTO `detalles_factura` (`id_detalles_factura`, `id_factura`, `id_producto`, `cantidad`, `costo`) VALUES
(18, 11, 1002, 2, 143.308),
(19, 11, 1007, 1, 81.1107),
(20, 11, 1006, 4, 320.078),
(21, 11, 1005, 1, 53.8313),
(25, 12, 1002, 2, 143.308),
(26, 12, 1003, 2, 145.49),
(27, 12, 1006, 2, 160.039),
(28, 13, 1004, 1, 342.265),
(29, 13, 1005, 1, 53.8313),
(30, 13, 1234, 1, 122.575);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `cedula_usuario` int(11) NOT NULL,
  `total` float NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `pagado` int(11) NOT NULL DEFAULT 0,
  `referencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `cedula_usuario`, `total`, `fecha`, `pagado`, `referencia`) VALUES
(11, 29699505, 598.328, '2024-06-13', 1, '4321'),
(12, 29699505, 448.837, '2024-06-25', 0, '2222'),
(13, 29699505, 518.672, '2024-06-25', 0, '9999');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_inventario_discreto` int(11) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_inventario_discreto`, `codigo_producto`, `cantidad`) VALUES
(0, 1234, 5),
(1, 1002, 7),
(2, 1001, 4),
(3, 1003, 2),
(4, 1004, 11),
(5, 1005, 1),
(6, 1006, 1),
(7, 0, 1),
(8, 1007, 1),
(9, 1233, 1),
(10, 1111, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedas`
--

CREATE TABLE `monedas` (
  `id_moneda` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `tasa_dolar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `monedas`
--

INSERT INTO `monedas` (`id_moneda`, `nombre`, `tasa_dolar`) VALUES
(1, 'Dolar', 1),
(2, 'Bolivar', 0),
(3, 'Pesos', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigo_producto` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` float NOT NULL,
  `foto_producto` text DEFAULT NULL,
  `top` tinyint(1) NOT NULL DEFAULT 0,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo_producto`, `nombre`, `descripcion`, `precio`, `foto_producto`, `top`, `id_categoria`) VALUES
(0, 'aa', 'asdas', 23, 'images/productos/aa.png', 1, 1),
(1001, 'Salsa de Maiz', 'Pue pa comer', 3.33, 'images/productos/1101.png', 1, 2),
(1002, 'Ketchup', 'Lo mejor que hay', 1.97, 'images/productos/ketchup_PNG31.png', 1, 2),
(1003, 'Arroz', 'hasdjfhajkd', 2, 'images/productos/1003.png', 1, 3),
(1004, 'Pollo', 'El kilo', 9.41, 'images/productos/1004.webp', 1, 1),
(1005, 'Flips 50gr', 'si, sapo', 1.48, 'images/productos/1005.png', 1, 3),
(1006, 'Harina pan', 'jkdsjkadjaskldjaskl', 2.2, 'images/productos/1006.png', 1, 1),
(1007, 'Toallitas Wanita', 'Ya te imaginas para que sirve', 2.23, 'images/productos/1007.jpg', 1, 7),
(1111, 'Jarra', 'Una jarra para cargar liquidos', 23.33, 'images/productos/1111.jpg', 1, 11),
(1233, 'DFSGSDD', 'SU', 2.33, 'images/productos/1233.png', 1, 1),
(1234, 'Mayonesa', 'dfasdfjkasfjaksl', 3.37, 'images/productos/1234.png', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Cedula` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Usuario` varchar(45) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Contrasena` varchar(61) NOT NULL,
  `Ultima_conexion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Cedula`, `Nombre`, `Apellido`, `Usuario`, `Email`, `Contrasena`, `Ultima_conexion`, `id_cargo`) VALUES
(22222222, 'Tomas', 'Sarraute', 'aaaa', '1234@gmail.com', '$2y$10$6uef5rI4IgQZAz27yVT.jelrBNvx0nSc2BV0i6gl/fqWrgfcjZ6o.', '2024-05-07 01:59:20', 1),
(29699505, 'Jhosmar', 'Suarez', 'forewn', 'jhosmardsuarezc961@gmail.com', '$2y$10$koWWEEztbbvKH3QjJ/7guu2H4eQ4Z6MF8us5qOKMN/LVoBDYrpBSC', '2024-06-17 22:50:06', 2),
(99999999, 'angelo', 'toscano', 'abc', 'bc@gmail.com', '$2y$10$ZEOB.6uiGCUFOOCsWQiCiOaoZNk9DyM4FNRifMbakYTzinPSW.rtK', '2024-05-07 02:01:46', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `detalles_carrito`
--
ALTER TABLE `detalles_carrito`
  ADD PRIMARY KEY (`id_detalles`),
  ADD KEY `id_carrito` (`id_carrito`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  ADD PRIMARY KEY (`id_detalles_factura`),
  ADD KEY `fk_factura_detalles` (`id_factura`),
  ADD KEY `fk_factura_producto` (`id_producto`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `fk_factura_usuario` (`cedula_usuario`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_inventario_discreto`),
  ADD KEY `existencia_productod` (`codigo_producto`);

--
-- Indices de la tabla `monedas`
--
ALTER TABLE `monedas`
  ADD PRIMARY KEY (`id_moneda`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo_producto`),
  ADD KEY ` categoria_producto` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Cedula`),
  ADD KEY `usuario_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carritos`
--
ALTER TABLE `carritos`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `detalles_carrito`
--
ALTER TABLE `detalles_carrito`
  MODIFY `id_detalles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  MODIFY `id_detalles_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`Cedula`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_carrito`
--
ALTER TABLE `detalles_carrito`
  ADD CONSTRAINT `detalles_carrito_ibfk_1` FOREIGN KEY (`id_carrito`) REFERENCES `carritos` (`id_carrito`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalles_carrito_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`codigo_producto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  ADD CONSTRAINT `fk_factura_detalles` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_factura_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`codigo_producto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_factura_usuario` FOREIGN KEY (`cedula_usuario`) REFERENCES `usuarios` (`Cedula`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `existencia_productod` FOREIGN KEY (`codigo_producto`) REFERENCES `productos` (`codigo_producto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT ` categoria_producto` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuario_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id_cargo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
