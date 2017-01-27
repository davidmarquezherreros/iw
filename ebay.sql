-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-01-2017 a las 12:14:49
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
-- Estructura de tabla para la tabla `articulos`
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
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `Nombre`, `Descripcion`, `Precio`, `FK_Seccion`, `FK_Sub_Seccion`) VALUES
(6, '3+32GB 5.0" XIAOMI Redmi', ' 	Radio, Sensor de identidad por huella dactilar, Videollamada, Cámara, Dual SIM, Email, Grabación de vídeo en 4K, MMS, Pantalla en color, Pantalla táctil', 154.99, 2, 1),
(7, 'Alfombra de triangulos', 'Esta alfombra con estampado geométrico añadirá un bonito toque de color y fantasía al suelo de una habitación o de un cuarto de baño.', 59.99, 3, 8),
(8, 'Chaqueta Montaña Negra', 'Olvídate del frío con la chaqueta de montaña THE NORTH FACE que la marca te propone en color negro. Un diseño impermeable muy completo que incluye tejido DryVent impermeable, transpirable y costuras selladas.', 110.99, 4, 18),
(9, 'Energy Sistem Car', 'Reproductor MP3 para coche con transmisor FM. Disfruta de tu música en la radio de tu coche sin cables y con multiconexión. Dispone de lector de tarjetas SD/SDHC, lector USB, entrada de línea para conectar tu reproductor.', 14.95, 5, 22),
(10, 'NIKE STRIKE - LFP 17', 'Balón fútbol que cuenta con una cámara de aire de goma y un llamativo estampado en contraste para ofrecer un tacto uniforme y facilitar su seguimiento visual.', 25.99, 6, 25),
(11, 'Death Star Lego Star Wars', '\r\n\r\nModelo: 75159', 505, 7, 28),
(12, 'Coleccion de monedas', 'Monedas variadas', 134.95, 8, 31),
(13, 'Aceite de Oliva Virgen Extra', '5 Litros.', 24.25, 9, 34),
(14, 'IPhone 7', 'Telefono de apple 128Gb', 839, 2, 1),
(15, 'IPhone 6s', 'Telefono de apple 16Gb', 609, 2, 1),
(16, 'IPhone 5s', 'Telefono de apple 16Gb', 319, 2, 1),
(17, 'IPhone SE', 'Telefono de apple 64Gb', 499, 2, 1),
(18, 'ZTE Blade L5 Plus', 'Blanco Libre', 69.95, 2, 1),
(19, 'ZTE Blade L5', 'Gris Libre', 59.95, 2, 1),
(20, 'Bq Aquaris U Lite', '4G 2GB/16GB Negro Libre', 139, 2, 1),
(21, 'Leotec Titanium', '2T355 4G 16GB Blanco', 99.95, 2, 1),
(22, 'LG K5', '8GB Negro Libre', 119, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo_usuario`
--

CREATE TABLE `articulo_usuario` (
  `idArticulo` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deseo_Articulos`
--

CREATE TABLE `deseo_Articulos` (
  `FK_Articulos` int(11) NOT NULL,
  `FK_Lista_Desear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `deseo_Articulos`
--

INSERT INTO `deseo_Articulos` (`FK_Articulos`, `FK_Lista_Desear`) VALUES
(1, 1),
(1, 2);

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
(10, 'España', 'Universidad de Alicante', 0, 'Alicante', 'Alicante', 123456789, 2),
(11, 'España', 'C/ Falsa Nº1', 2801, 'Madrid', 'Madrid', 987654321, 2),
(12, 'España', 'C/ Falsa 123', 0, 'Alicante', 'Alicante', 123456789, 6);

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
(2, 'https://d2giyh01gjb6fi.cloudfront.net/phone_front/0001/28/thumb_27431_phone_front_big.jpeg', 'Imagen 1', 6),
(3, 'http://xiaomimobile.cz/2376-large_default/xiaomi-redmi-3.jpg', 'Imagen 2', 6),
(4, 'http://china-sale.com.ua/image/cache/data/Xiaomi/Redmi-3/Xiaomi-Redmi-3-01-300x300.jpg', 'Imagen 3', 6),
(5, 'http://cdn.maisonsdumonde.com/img/alfombra-con-motivo-de-triangulos-de-algodon-120-x-180-cm-gaston-500-13-5-159864_5.jpg', 'Imagen 1', 7),
(6, 'http://www.maisonsdumonde.com/img/alfombra-con-motivo-de-triangulos-de-algodon-120-x-180-cm-gaston-500-13-5-159864_3.jpg', 'Imagen 2', 7),
(7, 'https://images.sprinter.es/539x539/products/0190300/0190300_00_4_2794729141.jpg?2794729141', 'Imagen 1', 8),
(8, 'https://images.sprinter.es/539x539/products/0190300/0190300_03_4_1805280400.jpg?1805280400', 'Imagen 2', 8),
(9, 'https://thumb.pccomponentes.com/w-530-530/articles/8/87397/energy-sistem-car-mp3-f2-racing-red.jpg', 'Imagen 1', 9),
(10, 'https://thumb.pccomponentes.com/w-530-530/articles/8/87397/energy-sistem-car-mp3-f2-racing-red-1.jpg', 'Imagen 2', 9),
(11, 'http://www.forumsport.com/img/productos/1000x1000/NIKE%20BAL%C3%93N%20FUTBOL%20STRIKE%20-%20LFP%2017-410600_00.jpg', 'Imagen 1', 10),
(12, '', '', 0),
(13, 'http://www.forumsport.com/img/productos/1000x1000/NIKE%20BAL%C3%93N%20FUTBOL%20STRIKE%20-%20LFP%2017-410600_00.jpg', 'Imagen 1', 10),
(14, 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSw4557iyhH2J8VLDrtTnb43SEPDYdMt5irmH50IGZHdAQF4H3d', 'Imagen 1', 11),
(15, 'https://i0.wp.com/elcatalejo.es/wp-content/uploads/2016/09/75159c.jpg', 'Imagen 2', 11),
(16, 'http://cloud10.todocoleccion.online/monedas-antiguas-europa/tc/2011/01/26/24288647.jpg', 'Imagen 1', 12),
(17, 'http://www.orodelguadalquivir.com/65-large_default/garrafa-5-litros-aceite-de-oliva-virgen-extra.jpg', 'Imagen 1', 13),
(18, 'https://thumb.pccomponentes.com/w-530-530/articles/6/62275/apple-iphone-5s-16gb-silver-libre.jpg', 'Imagen 1', 16),
(19, 'https://thumb.pccomponentes.com/w-530-530/articles/8/88944/apple-iphone-6s-16gb-rosa-dorado.jpg', 'Imagen 1', 15),
(20, 'https://thumb.pccomponentes.com/w-530-530/articles/8/88944/apple-iphone-6s-16gb-rosa-dorado-1.jpg', 'Imagen 2', 15),
(21, 'https://thumb.pccomponentes.com/w-530-530/articles/10/104224/7.jpg', 'Imagen 1', 14),
(22, 'https://thumb.pccomponentes.com/w-530-530/articles/10/104224/8.jpg', 'Imagen 2', 14),
(23, 'https://thumb.pccomponentes.com/w-530-530/articles/9/97737/apple-iphone-se-16gb-gris-espacial.jpg', 'Imagen 1', 17),
(24, 'https://thumb.pccomponentes.com/w-530-530/articles/9/97737/apple-iphone-se-16gb-gris-espacial-3.jpg', 'Imagen 2', 17),
(25, 'https://thumb.pccomponentes.com/w-530-530/articles/9/97737/apple-iphone-se-16gb-gris-espacial-2.jpg', 'Imagen 3', 17),
(26, 'https://thumb.pccomponentes.com/w-530-530/articles/11/116090/1.jpg', 'Imagen 1', 22),
(27, 'https://thumb.pccomponentes.com/w-530-530/articles/10/105839/1.jpg', 'Imagen 1', 18),
(28, 'https://thumb.pccomponentes.com/w-530-530/articles/10/107700/a04.jpg', 'Imagen 1', 19),
(29, 'https://thumb.pccomponentes.com/w-530-530/articles/10/107124/1.jpg', 'Imagen 1', 20),
(30, 'https://thumb.pccomponentes.com/w-530-530/articles/10/105013/lesph5507k-a.jpg', 'Imagen 1', 21);

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
(14, 154.99, 2, 17, 6),
(15, 59.99, 3, 17, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_desear`
--

CREATE TABLE `lista_desear` (
  `id` int(11) NOT NULL,
  `FK_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lista_desear`
--

INSERT INTO `lista_desear` (`id`, `FK_Usuario`) VALUES
(1, 1),
(2, 2),
(3, 6);

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
(11, 'Funciona muy bien!', '2017-01-27', 6, 6),
(12, 'Funciona de maravilla!', '2017-01-27', 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `numpedido` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `FK_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`numpedido`, `fecha`, `FK_Usuario`) VALUES
(17, '2017-01-27', 6),
(18, '0000-00-00', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seccion`
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
(7, 'Realidad virtual', 2),
(8, 'Alfombras y moquetas', 3),
(9, 'Artesania y manualidades', 3),
(10, 'Baño', 3),
(11, 'Bebes', 3),
(12, 'Bricolaje', 3),
(13, 'Bricolaje', 3),
(14, 'Chimeneas y accesorios', 3),
(15, 'Cocina', 3),
(16, 'Chimeneas y accesorios', 3),
(17, 'Ropa de cama', 3),
(18, 'Ropa de hombre', 4),
(19, 'Ropa de mujer', 4),
(20, 'Ropa de niño', 4),
(21, 'Calzado', 4),
(22, 'Para coche', 5),
(23, 'Para moto', 5),
(24, 'Recambios', 5),
(25, 'Futbol', 6),
(26, 'Baloncesto', 6),
(27, 'Ciclismo', 6),
(28, 'Juguetes', 7),
(29, 'Libros', 7),
(30, 'Musica', 7),
(31, 'Sellos', 8),
(32, 'Banderas', 8),
(33, 'Imanes', 8),
(34, 'Aceites', 9),
(35, 'Embutidos', 9),
(36, 'Conservas', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
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
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `Username`, `Password`, `Email`, `Telefono`, `admin`) VALUES
(1, 'david', '12341234', 'david@david.com', 12345, 0),
(2, 'admin', 'admin', 'admin@ebay.es', 12346789, 1),
(6, 'davidm', 'DavidM1234', 'david@gmail.com', 123456789, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `articulo_usuario`
--
ALTER TABLE `articulo_usuario`
  ADD PRIMARY KEY (`idArticulo`,`idUsuario`),
  ADD KEY `FK_Usuario` (`idUsuario`),
  ADD KEY `idArticulo` (`idArticulo`),
  ADD KEY `idArticulo_2` (`idArticulo`);

--
-- Indices de la tabla `deseo_Articulos`
--
ALTER TABLE `deseo_Articulos`
  ADD PRIMARY KEY (`FK_Articulos`,`FK_Lista_Desear`);

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
-- Indices de la tabla `lista_desear`
--
ALTER TABLE `lista_desear`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`numpedido`),
  ADD KEY `numpedido` (`numpedido`);

--
-- Indices de la tabla `seccion`
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
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `linea_pedido`
--
ALTER TABLE `linea_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `lista_desear`
--
ALTER TABLE `lista_desear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `opinion`
--
ALTER TABLE `opinion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `numpedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `sub_seccion`
--
ALTER TABLE `sub_seccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
