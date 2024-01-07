-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2024 a las 20:11:32
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
-- Base de datos: `primor_bbdd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `nombre`, `descripcion`) VALUES
(1, 'TEST', ''),
(2, 'Delicias del mar', ''),
(3, 'Sabores de la tierra', ''),
(4, 'Con un toque floral', ''),
(5, 'Sorpresas al paladar', ''),
(6, 'Dulces secretos', ''),
(7, 'Placeres veganos', ''),
(8, 'Clásicos infalibles', ''),
(9, 'Del mundo', ''),
(10, 'Mer À Versailles', ''),
(11, 'Ecrasant Des Feuilles', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credenciales`
--

CREATE TABLE `credenciales` (
  `user_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `credenciales`
--

INSERT INTO `credenciales` (`user_id`, `password`) VALUES
(1, '$2y$10$fSAsimsOtBKTdWGoUrxT1OUSybmcxIUaez/gjKKqhcdAavgolaqbS'),
(2, '$2y$10$9QCJedVXTSqPFtQs73RgO.BHAznofdWFOkB3fXHGKYze.pgNui622'),
(3, '$2y$10$y16/Ia6oxVhjnmkmg46ihusvdq9rwLLTuPkYE3H8aVniZ9OyZU0Ta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `codigo` varchar(255) NOT NULL,
  `descuento` decimal(2,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `descuentos`
--

INSERT INTO `descuentos` (`codigo`, `descuento`) VALUES
('ENERO10', 0.90);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `nombre`, `precio`, `stock`, `imagen`, `categoria_id`) VALUES
(1, 'Bouillabaisse con algas nori y pétalos de rosa', 15.95, 100, 'bouillabaisse.png', 10),
(2, 'Lotte con purée de manioc y lima', 15.95, 100, 'lotte.png', 10),
(3, 'Bouillon de langosta, algas y boletus', 15.95, 100, 'bouillon.png', 10),
(4, 'Mousse de marisco con mayonesa de rosa ', 15.95, 100, 'mousse.png', 10),
(5, 'Macaron espumoso de cacao y togarashi', 15.95, 100, 'macaron.png', 10),
(6, 'Créme de calabaza, manzana, nueces y pétalos de dália', 15.95, 100, 'creme.png', 11),
(7, 'Reducción de guiso de calabaza y remolacha', 13.95, 100, 'reduccion.png', 11),
(8, 'Raviolis de lenteja roja rellenos de boletus y trufa ', 16.95, 100, 'raviolis.png', 11),
(9, 'Bocaditos crujientes de boniato, trufa y cereal ', 16.95, 100, 'bocaditos.png', 11),
(10, 'Migas de galleta con castaña y zumo de mandarina', 8.95, 100, 'migas.png', 11),
(11, 'Pollo tandoori y hummus', 9.95, 100, 'pollo-tandoori.png', 2),
(12, 'Ternera con salsa nicoise y patatas al horno', 10.95, 100, 'ternera-nicoise.png', 2),
(13, 'Crema de pizza', 6.95, 100, 'crema-pizza.png', 5),
(14, 'Albondigas con salsa pouluette y verduras al vapor', 9.95, 100, 'albondigas-pouluette.png', 2),
(15, 'Almejas al wok con salsa verde', 13.95, 100, 'almejas.png', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` int(11) NOT NULL,
  `permisos_admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `usuario`, `email`, `nombre`, `apellidos`, `direccion`, `telefono`, `permisos_admin`) VALUES
(1, 'admin@primor.com', 'admin@primor.com', 'admin', 'admin', 'admin', 0, 1),
(2, 'maria@gmail.com', 'maria@gmail.com', 'Maria', 'Gisberto', 'Carrer Verdaguer 9D', 633221398, 0),
(3, 'isa@gmail.com', 'isa@gmail.com', 'Isa', 'Bel', 'C/ Tigresa nur', 640102030, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `credenciales`
--
ALTER TABLE `credenciales`
  ADD KEY `cliente_id` (`user_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `categoria` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `credenciales`
--
ALTER TABLE `credenciales`
  ADD CONSTRAINT `cliente_id` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`user_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`categoria_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
