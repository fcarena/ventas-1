-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2016 a las 21:55:50
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `idcliente` int(11) NOT NULL,
  `idtienda` int(11) NOT NULL,
  `nombrecliente` varchar(45) NOT NULL,
  `telcliente` varchar(45) NOT NULL,
  `dircliente` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcliente`, `idtienda`, `nombrecliente`, `telcliente`, `dircliente`) VALUES
(1, 8, 'leo', '3', '3'),
(8888, 4, 'leonel', '904545', 'asdfasdf'),
(12345, 7, 'Prueba nombre', '3008559528', 'k'),
(1044427792, 4, 'leonel gomez', '3008559528', 'K 10 E No. 12-65 Puerto Colombia - Atlantico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventas`
--

CREATE TABLE IF NOT EXISTS `detalleventas` (
`iddetalleventa` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idtienda` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `valorventa` int(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `detalleventas`
--

INSERT INTO `detalleventas` (`iddetalleventa`, `idventa`, `idcliente`, `idtienda`, `descripcion`, `valorventa`) VALUES
(1, 1, 1044427792, 4, 'prestamo', 10000),
(2, 2, 1044427792, 4, 'Anulada', 0),
(3, 3, 12345, 7, 'zapatos', 800000),
(4, 4, 12345, 7, 'a', 10000),
(5, 5, 12345, 7, 'a', 100000),
(6, 6, 12345, 7, 'Anulada', 0),
(7, 7, 1, 8, 'prestamo de un millon de psesos', 1000000),
(8, 8, 1044427792, 4, 'venta de zapatos', 100000),
(9, 9, 1, 8, 'zapatos', 50),
(10, 10, 1, 8, '52.000', 52),
(11, 11, 1, 8, 'valor', 52),
(12, 12, 1, 8, '52.000', 52),
(13, 13, 1, 8, 'a\r\n', 53),
(14, 14, 1, 8, 'asd', 52000),
(15, 15, 8888, 4, 'sdfgdf', 886925);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deudas`
--

CREATE TABLE IF NOT EXISTS `deudas` (
`iddeuda` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `valordeuda` int(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `deudas`
--

INSERT INTO `deudas` (`iddeuda`, `idcliente`, `valordeuda`) VALUES
(1, 1044427792, 50000),
(2, 12345, 0),
(3, 1, 952259),
(4, 8888, 886925);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `rol` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `pass` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`rol`, `usuario`, `pass`) VALUES
(1, 1, '12345'),
(1, 1044427792, 'leonel122122');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
`idpago` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `valorpagado` int(20) NOT NULL,
  `valorpendiente` int(20) NOT NULL,
  `fechapago` date NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`idpago`, `idcliente`, `valorpagado`, `valorpendiente`, `fechapago`, `descripcion`) VALUES
(1, 1044427792, 10000, 0, '2016-08-11', 'pago 1'),
(2, 1044427792, 0, 100000, '2016-08-11', 'Anulado'),
(3, 12345, 50000, 750000, '2016-08-12', 'pago'),
(4, 12345, 0, 760000, '2016-08-12', 'Anulado'),
(5, 12345, 600000, 160000, '2016-08-12', 'pago'),
(6, 12345, 0, 260000, '2016-08-12', 'Anulado'),
(7, 12345, 260000, 0, '2016-08-12', 'pago total'),
(8, 1, 100000, 900000, '2016-08-12', 'pago 1'),
(9, 1, 0, 900000, '2016-08-12', 'Anulado'),
(10, 1044427792, 50000, 50000, '2016-08-12', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE IF NOT EXISTS `tiendas` (
`idtienda` int(11) NOT NULL,
  `nombretienda` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tiendas`
--

INSERT INTO `tiendas` (`idtienda`, `nombretienda`) VALUES
(4, 'Tigo Murillo'),
(7, 'prueba'),
(8, 'Tigo Portal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
`idventa` int(11) NOT NULL,
  `idtienda` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `fechaventa` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idventa`, `idtienda`, `idcliente`, `fechaventa`) VALUES
(1, 4, 1044427792, '2016-08-11'),
(2, 4, 1044427792, '2016-08-11'),
(3, 7, 12345, '2016-08-12'),
(4, 7, 12345, '2016-08-12'),
(5, 7, 12345, '2016-08-12'),
(6, 7, 12345, '2016-08-12'),
(7, 8, 1, '2016-08-12'),
(8, 4, 1044427792, '2016-08-12'),
(9, 8, 1, '2016-08-12'),
(10, 8, 1, '2016-08-12'),
(11, 8, 1, '2016-08-12'),
(12, 8, 1, '2016-08-12'),
(13, 8, 1, '2016-08-12'),
(14, 8, 1, '2016-08-12'),
(15, 4, 8888, '2016-09-09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
 ADD PRIMARY KEY (`idcliente`), ADD KEY `idtienda` (`idtienda`);

--
-- Indices de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
 ADD PRIMARY KEY (`iddetalleventa`), ADD KEY `dventas_idventas` (`idventa`), ADD KEY `dcli_idclie` (`idcliente`), ADD KEY `idtienda` (`idtienda`);

--
-- Indices de la tabla `deudas`
--
ALTER TABLE `deudas`
 ADD PRIMARY KEY (`iddeuda`), ADD KEY `idcliente` (`idcliente`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`usuario`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
 ADD PRIMARY KEY (`idpago`), ADD KEY `pcli_cliid` (`idcliente`);

--
-- Indices de la tabla `tiendas`
--
ALTER TABLE `tiendas`
 ADD PRIMARY KEY (`idtienda`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
 ADD PRIMARY KEY (`idventa`), ADD KEY `idtienda` (`idtienda`), ADD KEY `idcliente` (`idcliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
MODIFY `iddetalleventa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `deudas`
--
ALTER TABLE `deudas`
MODIFY `iddeuda` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
MODIFY `idpago` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tiendas`
--
ALTER TABLE `tiendas`
MODIFY `idtienda` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`idtienda`) REFERENCES `tiendas` (`idtienda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
ADD CONSTRAINT `detalleventas_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `detalleventas_ibfk_3` FOREIGN KEY (`idtienda`) REFERENCES `tiendas` (`idtienda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `deudas`
--
ALTER TABLE `deudas`
ADD CONSTRAINT `deudas_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`idtienda`) REFERENCES `tiendas` (`idtienda`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
