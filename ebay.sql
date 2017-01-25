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

CREATE TABLE `articulos` (
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

INSERT INTO `articulos` (`id`, `Nombre`, `Descripcion`, `Precio`, `FK_Seccion`, `FK_Sub_Seccion`) VALUES
(1, 'Prueba backoffice', 'So guud', 100, 2, 1),
(2, '123', '123', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Articulo_Usuario`
--

CREATE TABLE `articulo_usuario` (
  `idArticulo` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Articulo_Usuario`
--

INSERT INTO `articulo_usuario` (`idArticulo`, `idUsuario`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
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
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id`, `Pais`, `Direccion`, `CodigoPostal`, `Ciudad`, `ComunidadAutonoma`, `Telefono`, `FK_Usuario`) VALUES
(1, 'Probando back office', '123', 123, '123', '123', 123, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `FK_Imagen_Articulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `imagen`, `titulo`, `FK_Imagen_Articulo`) VALUES
(1, 'probando back office', '1234', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_pedido`
--

CREATE TABLE `linea_pedido` (
  `id` int(11) NOT NULL,
  `importe` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `FK_Pedido` int(11) NOT NULL,
  `FK_Articulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `linea_pedido`
--

INSERT INTO `linea_pedido` (`id`, `importe`, `cantidad`, `FK_Pedido`, `FK_Articulo`) VALUES
(1, 0, 123, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opinion`
--

CREATE TABLE `opinion` (
  `id` int(11) NOT NULL,
  `mensaje` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `FK_Usuario` int(11) NOT NULL,
  `FK_Articulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `opinion`
--

INSERT INTO `opinion` (`id`, `mensaje`, `fecha`, `FK_Usuario`, `FK_Articulo`) VALUES
(1, 'Transaccion perfecta!', '2017-01-02', 1, 1),
(2, '1111', '2017-01-04', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pedido`
--

CREATE TABLE `pedido` (
  `numpedido` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `FK_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Pedido`
--

INSERT INTO `pedido` (`numpedido`, `fecha`, `FK_Usuario`) VALUES
(1, '2017-01-11', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Seccion`
--

CREATE TABLE `seccion` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Seccion`
--

INSERT INTO `seccion` (`id`, `Nombre`) VALUES
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
-- Estructura de tabla para la tabla `sub_seccion`
--

CREATE TABLE `sub_seccion` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(250) NOT NULL,
  `FK_Seccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sub_seccion`
--

INSERT INTO `sub_seccion` (`id`, `Nombre`, `FK_Seccion`) VALUES
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

CREATE TABLE `usuario` (
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

INSERT INTO `usuario` (`id`, `Username`, `Password`, `Email`, `Telefono`, `admin`) VALUES
(1, 'david', '1234', 'david@david.com', 12345, 0),
(2, 'admin', 'admin', 'admin@ebay.es', 123123, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Articulo_Usuario`
--
ALTER TABLE `articulo_usuario`
  ADD PRIMARY KEY (`idArticulo`,`idUsuario`),
  ADD KEY `FK_Usuario` (`idUsuario`),
  ADD KEY `idArticulo` (`idArticulo`),
  ADD KEY `idArticulo_2` (`idArticulo`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`,`imagen`);

--
-- Indices de la tabla `linea_pedido`
--
ALTER TABLE `linea_pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`numpedido`),
  ADD KEY `numpedido` (`numpedido`);

--
-- Indices de la tabla `Seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sub_seccion`
--
ALTER TABLE `sub_seccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `linea_pedido`
--
ALTER TABLE `linea_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `opinion`
--
ALTER TABLE `opinion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `Pedido`
--
ALTER TABLE `pedido`
  MODIFY `numpedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `Seccion`
--
ALTER TABLE `seccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `sub_seccion`
--
ALTER TABLE `sub_seccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
