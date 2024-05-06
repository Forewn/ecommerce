-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2024 a las 09:30:40
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
(1, 'administrador');

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
(5, 'Confiteria');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `cedula_usuario` int(11) NOT NULL,
  `costo` float NOT NULL,
  `iva` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(6, 1006, 1);

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
(1001, 'Salsa de Maiz', 'Pue pa comer', 3.33, 'images/productos/1101.png', 1, 2),
(1002, 'Ketchup', 'Lo mejor que hay', 1.97, 'images/productos/ketchup_PNG31.png', 1, 2),
(1003, 'Arroz', 'hasdjfhajkd', 2, 'images/productos/1003.png', 1, 3),
(1004, 'Pollo', 'El kilo', 9.41, 'images/productos/1004.webp', 1, 1),
(1005, 'Flips 50gr', 'si, sapo', 1.48, 'images/productos/1005.png', 1, 3),
(1006, 'Harina pan', 'jkdsjkadjaskldjaskl', 2.2, 'images/productos/1006.png', 1, 1),
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
(29699505, 'Jhosmar', 'Suarez', 'forewn', 'jhosmardsuarezc961@gmail.com', '$2y$10$koWWEEztbbvKH3QjJ/7guu2H4eQ4Z6MF8us5qOKMN/LVoBDYrpBSC', '2024-04-15 07:05:58', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

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
-- Restricciones para tablas volcadas
--

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
