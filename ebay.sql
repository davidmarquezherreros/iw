-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-01-2017 a las 20:06:38
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ebay`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Articulos`
--

CREATE TABLE `Articulos` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(250) NOT NULL,
  `Descripcion` varchar(250) NOT NULL,
  `Precio` float NOT NULL,
  `FK_Seccion` int(11) NOT NULL,
  `FK_Sub_Seccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Articulos`
--

INSERT INTO `Articulos` (`id`, `Nombre`, `Descripcion`, `Precio`, `FK_Seccion`, `FK_Sub_Seccion`) VALUES
(1, 'Prueba backoffice', 'So guud', 100, 2, 1),
(2, '123', '123', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Articulo_Usuario`
--

CREATE TABLE `Articulo_Usuario` (
  `idArticulo` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Articulo_Usuario`
--

INSERT INTO `Articulo_Usuario` (`idArticulo`, `idUsuario`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Direcciones`
--

CREATE TABLE `Direcciones` (
  `id` int(11) NOT NULL,
  `Pais` varchar(250) NOT NULL,
  `Direccion` varchar(250) NOT NULL,
  `CodigoPostal` int(11) NOT NULL,
  `Ciudad` varchar(250) NOT NULL,
  `ComunidadAutonoma` varchar(250) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `FK_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Direcciones`
--

INSERT INTO `Direcciones` (`id`, `Pais`, `Direccion`, `CodigoPostal`, `Ciudad`, `ComunidadAutonoma`, `Telefono`, `FK_Usuario`) VALUES
(1, 'Probando back office', '123', 123, '123', '123', 123, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Imagenes`
--

CREATE TABLE `Imagenes` (
  `id` int(11) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `FK_Imagen_Articulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Imagenes`
--

INSERT INTO `Imagenes` (`id`, `imagen`, `titulo`, `FK_Imagen_Articulo`) VALUES
(1, 'probando back office', '1234', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Linea_pedido`
--

CREATE TABLE `Linea_pedido` (
  `id` int(11) NOT NULL,
  `importe` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `FK_Pedido` int(11) NOT NULL,
  `FK_Articulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Linea_pedido`
--

INSERT INTO `Linea_pedido` (`id`, `importe`, `cantidad`, `FK_Pedido`, `FK_Articulo`) VALUES
(1, 0, 123, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Opinion`
--

CREATE TABLE `Opinion` (
  `id` int(11) NOT NULL,
  `mensaje` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `FK_Usuario` int(11) NOT NULL,
  `FK_Articulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Opinion`
--

INSERT INTO `Opinion` (`id`, `mensaje`, `fecha`, `FK_Usuario`, `FK_Articulo`) VALUES
(1, 'Transaccion perfecta!', '2017-01-02', 1, 1),
(2, '1111', '2017-01-04', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pedido`
--

CREATE TABLE `Pedido` (
  `numpedido` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `FK_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Pedido`
--

INSERT INTO `Pedido` (`numpedido`, `fecha`, `FK_Usuario`) VALUES
(1, '2017-01-11', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Seccion`
--

CREATE TABLE `Seccion` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Seccion`
--

INSERT INTO `Seccion` (`id`, `Nombre`) VALUES
(2, 'Electrónica'),
(3, 'Casa y jardin'),
(4, 'Moda'),
(5, 'Motor'),
(6, 'Deportes'),
(7, 'Ocio'),
(8, 'Coleccionismo'),
(9, 'Vinos y gastronomía'),
(10, 'Segunda mano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Sub_seccion`
--

CREATE TABLE `Sub_seccion` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(250) NOT NULL,
  `FK_Seccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Sub_seccion`
--

INSERT INTO `Sub_seccion` (`id`, `Nombre`, `FK_Seccion`) VALUES
(1, 'Móviles y telefonía', 2),
(2, 'Consolas y videojuegos', 2),
(3, 'Informática y tablets', 2),
(4, 'Imagen y sonido', 2),
(5, 'Camaras y fotografía', 2),
(6, 'Electrodomésticos', 2),
(7, 'Realidad virtual', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `id` int(11) NOT NULL,
  `Username` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id`, `Username`, `Password`, `Email`, `Telefono`, `admin`) VALUES
(1, 'david', '1234', 'david@david.com', 12345, 0),
(2, 'admin', 'admin', 'admin@ebay.es', 123123, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Articulos`
--
ALTER TABLE `Articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Articulo_Usuario`
--
ALTER TABLE `Articulo_Usuario`
  ADD PRIMARY KEY (`idArticulo`,`idUsuario`),
  ADD KEY `FK_Usuario` (`idUsuario`),
  ADD KEY `idArticulo` (`idArticulo`),
  ADD KEY `idArticulo_2` (`idArticulo`);

--
-- Indices de la tabla `Direcciones`
--
ALTER TABLE `Direcciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Imagenes`
--
ALTER TABLE `Imagenes`
  ADD PRIMARY KEY (`id`,`imagen`);

--
-- Indices de la tabla `Linea_pedido`
--
ALTER TABLE `Linea_pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Opinion`
--
ALTER TABLE `Opinion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Pedido`
--
ALTER TABLE `Pedido`
  ADD PRIMARY KEY (`numpedido`),
  ADD KEY `numpedido` (`numpedido`);

--
-- Indices de la tabla `Seccion`
--
ALTER TABLE `Seccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Sub_seccion`
--
ALTER TABLE `Sub_seccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Articulos`
--
ALTER TABLE `Articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `Direcciones`
--
ALTER TABLE `Direcciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Imagenes`
--
ALTER TABLE `Imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Linea_pedido`
--
ALTER TABLE `Linea_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Opinion`
--
ALTER TABLE `Opinion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `Pedido`
--
ALTER TABLE `Pedido`
  MODIFY `numpedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `Seccion`
--
ALTER TABLE `Seccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `Sub_seccion`
--
ALTER TABLE `Sub_seccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
