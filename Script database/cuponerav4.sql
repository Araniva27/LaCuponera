-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2023 a las 19:29:44
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cuponera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` varchar(100) NOT NULL,
  `usuario` varbinary(100) NOT NULL,
  `contra` varbinary(100) NOT NULL,
  `nivel` varchar(10) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `contra`, `nivel`, `estado`) VALUES
('01805710-8', 0x6d656c69736172616d6972657a5f323540686f746d61696c2e636f6d, 0x313233, '1', 1),
('02785296-9', 0x6d616e75656c6172616e697661303740676d61696c2e636f6d, 0x4d616e75656c31323324, '1', 1),
('06174301-9', 0x666162696f6c616d617274696e657a31393032303140676d61696c2e636f6d, 0x4661626931393032303124, '1', 1),
('11111111-9', 0x616e647265736c6f70657a6a303240676d61696c2e636f6d, 0x313233, '1', 1),
('12345678-9', 0x636f726e656a6f657269636b3740676d61696c2e636f6d, 0x313233, '1', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
