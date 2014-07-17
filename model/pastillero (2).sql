-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2014 a las 15:22:06
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pastillero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historicomedicaciones`
--

DROP TABLE IF EXISTS `historicomedicaciones`;
CREATE TABLE IF NOT EXISTS `historicomedicaciones` (
  `idHistorico` int(11) NOT NULL AUTO_INCREMENT,
  `idMedicamento` int(11) NOT NULL,
  `dosis` int(11) DEFAULT NULL,
  `horarioTomado` datetime NOT NULL,
  PRIMARY KEY (`idHistorico`),
  KEY `historicomedicaciones_ibfk_1` (`idMedicamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

DROP TABLE IF EXISTS `medicamentos`;
CREATE TABLE IF NOT EXISTS `medicamentos` (
  `idMedicamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`idMedicamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planmedicaciones`
--

DROP TABLE IF EXISTS `planmedicaciones`;
CREATE TABLE IF NOT EXISTS `planmedicaciones` (
  `idPlanMedicaciones` int(11) NOT NULL AUTO_INCREMENT,
  `idMedicamento` int(11) NOT NULL,
  `fechayHora` datetime NOT NULL,
  `dosis` int(11) NOT NULL,
  `seRepite` bit(1) NOT NULL,
  `fechaFin` datetime DEFAULT NULL,
  PRIMARY KEY (`idPlanMedicaciones`),
  KEY `planmedicaciones_ibfk_1` (`idMedicamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `tipoRol` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(250) NOT NULL,
  `nombreUsuario` varchar(250) NOT NULL,
  `idRol` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `usuario_ibfk_1` (`idRol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historicomedicaciones`
--
ALTER TABLE `historicomedicaciones`
  ADD CONSTRAINT `historicomedicaciones_ibfk_1` FOREIGN KEY (`idMedicamento`) REFERENCES `medicamentos` (`idMedicamento`);

--
-- Filtros para la tabla `planmedicaciones`
--
ALTER TABLE `planmedicaciones`
  ADD CONSTRAINT `planmedicaciones_ibfk_1` FOREIGN KEY (`idMedicamento`) REFERENCES `medicamentos` (`idMedicamento`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
