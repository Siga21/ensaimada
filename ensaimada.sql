-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-03-2012 a las 20:13:07
-- Versión del servidor: 5.1.54
-- Versión de PHP: 5.3.5-1ubuntu7.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ensaimada`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE IF NOT EXISTS `articulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `familia_id_id` int(11) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  `ean13` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_69E94E91B8ABCAFA` (`familia_id_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id`, `familia_id_id`, `nombre`, `precio`, `descripcion`, `vigente`, `ean13`, `imagen`) VALUES
(1, 1, 'Torta de chocolate', '10.00', 'Riquisima torta recubierta de exquisito chocolate. ! Te chuparás los dedos ¡', 1, 1234567890, 'FotoTortaChoco'),
(2, 1, 'Torta de nata', '9.00', 'Riquisima torta recubierta de fresca nata ! Un placer de dioses ¡', 1, 121314, 'FotoTortaNata'),
(3, 2, 'Tarta amor', '25.00', 'Tarta semifria de fresa y nata. ! Un regalo para los sentidos ¡', 1, 1234, 'FotoAmor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `telefono2` varchar(50) NOT NULL,
  `correo` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `password`, `salt`, `direccion`, `telefono`, `telefono2`, `correo`) VALUES
(1, 'roca67', 'clavetorta', '121212', 'AV. Martinez Garrido 24 5º A', '986374920', '630319364', 'roca67@gmail.com'),
(2, 'jroca72', 'diostorta', '313131', 'Bouzapanda Budiño Salceda de Caselas', '986346105', '639432504', 'jroca72@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE IF NOT EXISTS `familia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `familia`
--

INSERT INTO `familia` (`id`, `nombre`) VALUES
(1, 'Tortas'),
(2, 'Semifrios'),
(3, 'Pasteles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoc`
--

CREATE TABLE IF NOT EXISTS `pedidoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id_id` int(11) DEFAULT NULL,
  `tienda_id_id` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `importe` decimal(10,2) NOT NULL,
  `observaciones` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7AA1DCCEACC9C364` (`cliente_id_id`),
  KEY `IDX_7AA1DCCEE9B17B23` (`tienda_id_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `pedidoc`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidod`
--

CREATE TABLE IF NOT EXISTS `pedidod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedidoc_id_id` int(11) DEFAULT NULL,
  `articulo_id_id` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `importe` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E4C5496D3E2A0CB1` (`pedidoc_id_id`),
  KEY `IDX_E4C5496D28F4AF18` (`articulo_id_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `pedidod`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE IF NOT EXISTS `tienda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(75) NOT NULL,
  `poblacion` varchar(75) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`id`, `password`, `salt`, `nombre`, `direccion`, `poblacion`, `provincia`, `pais`, `telefono`, `fax`, `email`) VALUES
(1, 'dori', '121212', 'Pasteleria Imperial', 'Av. Aeropuerto 118', 'Vigo', 'Pontevedra', 'España', '986280881', '986280881', 'imperial@gmail.com'),
(2, 'jose', '12112', 'La Torta Porriño', 'Torneiros 32 Ribeira', 'Porriño', 'Pontevedra', 'España', '986348855', '986348855', 'tortaporriño@gmail.com'),
(3, 'chapela', '1414114', 'La Torta Chapela', 'Av. Redondela 69', 'Chapela', 'Pontevedra', 'España', '986450330', '986450330', 'TortaChapela@gmail.com'),
(4, 'tui', '1515151', 'La Torta Tui', 'C/ Oia nº 8 Local 10', 'Tuy', 'Pontevedra', 'España', '986601323', '986601323', 'tortatuy@gmail.com'),
(5, 'picho', '1616161', 'Panaderia Picho', 'Av. de Madrid s/n', 'Vigo', 'Pontevedra', 'España', '986418237', '986418237', 'PanaderiaPicho@gmail.com'),
(6, 'tudense', '171717171', 'Panaderia La Tudense', 'Ciguñeiras nº 12', 'Guillarei  (Tuy)', 'Pontevedra', 'España', '986601368', '986601368', 'PanaderiaLaTudense@gmail.com');

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `FK_69E94E91B8ABCAFA` FOREIGN KEY (`familia_id_id`) REFERENCES `familia` (`id`);

--
-- Filtros para la tabla `pedidoc`
--
ALTER TABLE `pedidoc`
  ADD CONSTRAINT `FK_7AA1DCCEACC9C364` FOREIGN KEY (`cliente_id_id`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `FK_7AA1DCCEE9B17B23` FOREIGN KEY (`tienda_id_id`) REFERENCES `tienda` (`id`);

--
-- Filtros para la tabla `pedidod`
--
ALTER TABLE `pedidod`
  ADD CONSTRAINT `FK_E4C5496D28F4AF18` FOREIGN KEY (`articulo_id_id`) REFERENCES `articulo` (`id`),
  ADD CONSTRAINT `FK_E4C5496D3E2A0CB1` FOREIGN KEY (`pedidoc_id_id`) REFERENCES `pedidoc` (`id`);
