-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2020 a las 07:51:57
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
-- Base de datos: `recetario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(40) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`) VALUES
(1, 'Repostería'),
(3, 'Ensaladas'),
(5, 'Postres'),
(17, 'Bebidas'),
(18, 'Pastas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleingrediente`
--

CREATE TABLE `detalleingrediente` (
  `idReceta` int(11) NOT NULL,
  `idIngrediente` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `detalleingrediente`
--

INSERT INTO `detalleingrediente` (`idReceta`, `idIngrediente`, `cantidad`) VALUES
(76, 3, 150),
(76, 15, 5),
(76, 16, 15),
(76, 20, 5),
(80, 4, 10),
(80, 20, 200),
(80, 28, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrediente`
--

CREATE TABLE `ingrediente` (
  `idIngrediente` int(11) NOT NULL,
  `nombreIngrediente` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `unidadMedida` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `ingrediente`
--

INSERT INTO `ingrediente` (`idIngrediente`, `nombreIngrediente`, `unidadMedida`) VALUES
(3, 'Leche', 'ml'),
(4, 'Azúcar', 'gr'),
(5, 'Harina', 'gr'),
(6, 'Vainilla', 'ml'),
(7, 'Sal', 'gr'),
(8, 'Pollo', 'gr'),
(10, 'Zanahoria', 'gr'),
(15, 'Café', 'gr'),
(16, 'Jarabe de maíz', 'ml'),
(17, 'Chocolate Blanco', 'gr'),
(18, 'Pavo', 'gr'),
(19, 'Papa', 'gr'),
(20, 'Agua', 'ml'),
(21, 'Naranja', 'gr'),
(22, 'Chícharos', 'gr'),
(23, 'Huevo', 'Unidad'),
(24, 'Mantequilla', 'gr'),
(25, 'Leche Evaporada', 'ml'),
(26, 'Leche Condensada', 'ml'),
(28, 'Naranja', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `idPais` int(11) NOT NULL,
  `nombrePais` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idPais`, `nombrePais`) VALUES
(1, 'México'),
(7, 'España'),
(28, 'Italia'),
(37, 'Francia'),
(38, 'Portugal'),
(42, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `idReceta` int(11) NOT NULL,
  `nombreReceta` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `instrucciones` varchar(1500) COLLATE utf8_bin DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `idUsr` int(11) DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `foto` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `idPais` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`idReceta`, `nombreReceta`, `instrucciones`, `fecha`, `idUsr`, `idCategoria`, `foto`, `idPais`) VALUES
(76, 'Capuccino', 'fghj', '2020-06-13', 1, 17, 'capf.jpg', 28),
(80, 'Infusión', 'Luego de tener los ingredientes, es cuestión de mezclarlos con agua y dejarlos reposar al menos 1 hora. Mientras más tiempo se deja, más se desarrollan los sabores. Solo hay que estar pendiente de no dejar los ingredientes en el agua por más de un día, ya que comienzan a deteriorarse.\r\n\r\nEste termo para infusiones frutales es muy útil, ya que es portátil, tiene un compartimiento para poner los ingredientes y ¡hasta unos divertidos mensajes para animarte a seguir tomando agua! Igualmente, si quieres hacer cantidades mayores, esta jarra no solo se usa para hacer infusiones de frutas, sino que también para preparar té.', '2020-08-24', 1, 17, 'in.jpg', 28),
(81, 'Capuccino', 'sdfghsdfgdfg', '2020-11-08', 1, 5, 'aa2.png', 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsr` int(11) NOT NULL,
  `pwd` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `tipoUsr` char(1) COLLATE utf8_bin DEFAULT NULL,
  `nombreUsr` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `usr` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsr`, `pwd`, `tipoUsr`, `nombreUsr`, `usr`) VALUES
(1, '12345', NULL, 'Iván Cardel', 'ivanc'),
(2, '54321', NULL, 'ivans', 'ivans');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `detalleingrediente`
--
ALTER TABLE `detalleingrediente`
  ADD PRIMARY KEY (`idReceta`,`idIngrediente`),
  ADD KEY `fkIngredienteDetalle` (`idIngrediente`);

--
-- Indices de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`idIngrediente`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idPais`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`idReceta`),
  ADD KEY `fkUsuarioReceta` (`idUsr`),
  ADD KEY `fkCategoria` (`idCategoria`),
  ADD KEY `fkPaisReceta` (`idPais`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsr`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `idIngrediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `idPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `idReceta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleingrediente`
--
ALTER TABLE `detalleingrediente`
  ADD CONSTRAINT `fkIngredienteDetalle` FOREIGN KEY (`idIngrediente`) REFERENCES `ingrediente` (`idIngrediente`),
  ADD CONSTRAINT `fkRecetaDetalle` FOREIGN KEY (`idReceta`) REFERENCES `receta` (`idReceta`);

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `fkCategoria` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `fkPaisReceta` FOREIGN KEY (`idPais`) REFERENCES `pais` (`idPais`),
  ADD CONSTRAINT `fkUsuarioReceta` FOREIGN KEY (`idUsr`) REFERENCES `usuario` (`idUsr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
