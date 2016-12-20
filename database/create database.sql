-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-12-2016 a las 20:05:16
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
  `Precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Articulo_Usuario`
--

CREATE TABLE `Articulo_Usuario` (
  `idArticulo` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Linea_pedido`
--

CREATE TABLE `Linea_pedido` (
  `id` int(11) NOT NULL,
  `importe` float NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Opinion`
--

CREATE TABLE `Opinion` (
  `id` int(11) NOT NULL,
  `mensaje` varchar(250) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pedido`
--

CREATE TABLE `Pedido` (
  `numpedido` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Seccion`
--

CREATE TABLE `Seccion` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Sub_seccion`
--

CREATE TABLE `Sub_seccion` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `id` int(11) NOT NULL,
  `Username` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Direcciones`
--
ALTER TABLE `Direcciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Imagenes`
--
ALTER TABLE `Imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `Linea_pedido`
--
ALTER TABLE `Linea_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Opinion`
--
ALTER TABLE `Opinion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Pedido`
--
ALTER TABLE `Pedido`
  MODIFY `numpedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Seccion`
--
ALTER TABLE `Seccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Sub_seccion`
--
ALTER TABLE `Sub_seccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Articulo_Usuario`
--
ALTER TABLE `Articulo_Usuario`
  ADD CONSTRAINT `FK_Articulos` FOREIGN KEY (`idArticulo`) REFERENCES `Articulos` (`id`),
  ADD CONSTRAINT `FK_Usuario` FOREIGN KEY (`idUsuario`) REFERENCES `Usuario` (`id`);

--
-- Filtros para la tabla `Direcciones`
--
ALTER TABLE `Direcciones`
  ADD CONSTRAINT `FK_UsuarioDireccion` FOREIGN KEY (`id`) REFERENCES `Usuario` (`id`);

--
-- Filtros para la tabla `Imagenes`
--
ALTER TABLE `Imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Articulos` (`id`);

--
-- Filtros para la tabla `Linea_pedido`
--
ALTER TABLE `Linea_pedido`
  ADD CONSTRAINT `FK_Articulo` FOREIGN KEY (`id`) REFERENCES `Articulos` (`id`),
  ADD CONSTRAINT `FK_Pedido` FOREIGN KEY (`id`) REFERENCES `Pedido` (`numpedido`);

--
-- Filtros para la tabla `Opinion`
--
ALTER TABLE `Opinion`
  ADD CONSTRAINT `FK_UsuarioOpinion` FOREIGN KEY (`id`) REFERENCES `Usuario` (`id`);

--
-- Filtros para la tabla `Pedido`
--
ALTER TABLE `Pedido`
  ADD CONSTRAINT `FK_UsuarioPedido` FOREIGN KEY (`numpedido`) REFERENCES `Usuario` (`id`);

--
-- Filtros para la tabla `Sub_seccion`
--
ALTER TABLE `Sub_seccion`
  ADD CONSTRAINT `FK_Seccion` FOREIGN KEY (`id`) REFERENCES `Seccion` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
