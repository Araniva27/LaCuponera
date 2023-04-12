-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2023 a las 19:34:56
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
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `dui` varchar(10) NOT NULL,
  `telefono` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombres`, `apellidos`, `correo`, `direccion`, `dui`, `telefono`) VALUES
(1, 'Erick', 'Cornejo', 'cornejoerick7@gmail.com', 'san salvador', '12345678-9', '7867-4625'),
(3, 'Fabi', 'Martinez', 'melisaramirez_25@hotmail.com', 'soya', '01805710-8', '7039-2267'),
(4, 'Andrés', 'Martinez', 'andreslopezj02@gmail.com', 'londres', '11111111-9', '7896-5421'),
(6, 'Fabi', 'Lopez', 'fabiolamartinez190201@gmail.com', 'soya', '06174301-9', '7039-2268'),
(7, 'Manuel', 'Araniva', 'manuelaraniva07@gmail.com', 'Mejicanos', '02785296-9', '7374-2058');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupon`
--

CREATE TABLE `cupon` (
  `idCupon` int(11) NOT NULL,
  `codigoCupon` varchar(50) NOT NULL,
  `estadoCupon` int(11) NOT NULL,
  `idDetalleFactura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cupon`
--

INSERT INTO `cupon` (`idCupon`, `codigoCupon`, `estadoCupon`, `idDetalleFactura`) VALUES
(1, 'PC0125-5104445', 1, 1),
(2, 'PC0125-2447589', 1, 2),
(3, 'PH0456-3433788', 1, 3),
(4, 'PC0125-4071167', 1, 4),
(5, 'PC0125-1641522', 1, 4),
(6, 'PC0125-4409993', 1, 4),
(7, 'PC0125-7426839', 1, 5),
(8, 'PC0125-7644020', 1, 6),
(11, 'PC0125-3272810', 1, 7),
(12, 'PC0125-3576879', 1, 8),
(13, 'PC0125-3790008', 1, 9),
(14, 'PC0125-3788001', 1, 9),
(15, 'PC0125-5521658', 1, 10),
(16, 'PC0125-2872363', 1, 11),
(17, 'PC0125-5990939', 1, 11),
(18, 'PC0125-1167507', 0, 12),
(19, 'PC0125-4606420', 1, 13),
(20, 'PC0125-5128522', 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE `detallefactura` (
  `idDetalleFactura` int(11) NOT NULL,
  `idFactura` int(11) NOT NULL,
  `idPromocion` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallefactura`
--

INSERT INTO `detallefactura` (`idDetalleFactura`, `idFactura`, `idPromocion`, `cantidad`) VALUES
(1, 1, 2, 1),
(2, 1, 3, 1),
(3, 2, 5, 1),
(4, 3, 2, 3),
(5, 4, 2, 1),
(6, 5, 7, 3),
(7, 6, 2, 1),
(8, 7, 2, 1),
(9, 8, 2, 2),
(10, 9, 2, 1),
(11, 10, 2, 2),
(12, 10, 4, 1),
(13, 11, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallerechazo`
--

CREATE TABLE `detallerechazo` (
  `idRechazo` int(11) NOT NULL,
  `descripcionRechazo` varchar(40) NOT NULL,
  `fechaRechazo` date NOT NULL,
  `usuarioRechazo` date NOT NULL,
  `idPromocion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `codigoEmpresa` varchar(6) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `nombreContacto` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `comision` float NOT NULL,
  `idRubro` int(11) NOT NULL,
  `img` varchar(100) NOT NULL DEFAULT 'no_disponible.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `nombre`, `codigoEmpresa`, `direccion`, `nombreContacto`, `telefono`, `correo`, `comision`, `idRubro`, `img`) VALUES
(1, 'Pollo Campero', 'PC0125', 'San Salvador', 'Ana Martínez', '2298-7451', 'pollocampero@gmail.com', 0.5, 1, 'polloCampero.png'),
(3, 'Pizza Hut', 'PH0456', 'San Salvador, San Miguel', 'Alejandro Ventura', '2298-7451', 'pizzahut.sv@gmail.com', 0.5, 1, 'pizza_hut.png'),
(4, 'Burguer King', 'BK0789', 'San Salvador', 'Melisa Rosales', '2298-7451', 'bk_sv@gmail.com', 0.5, 1, 'burguer_king.png'),
(5, 'Studio Herrera', 'SH8752', '85 va norte paseo general escalón #4360 local 3-4 Colonia Escalon, San Salvador 0016800', 'Valentina Saravia', '2596-7896', 'studio_herrera@hotmail.com', 0.8, 2, 'studio_herrera.jpg'),
(6, 'Taller Gran Turismo', 'TG7852', 'Calle Chiltiupán y 9ª calle oriente #1, Colonia Santa Mónica, Santa Tecla 0016-800', 'Vladimir Hernández', '7896-5485', 'granturismo@outlook.com', 0.4, 3, 'gran_turismo.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `total` float NOT NULL,
  `idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idFactura`, `fecha`, `total`, `idCliente`) VALUES
(1, '2023-04-08', 15.98, 1),
(2, '2023-04-08', 20.99, 1),
(3, '2023-04-08', 23.97, 3),
(4, '2023-04-08', 7.99, 4),
(5, '2023-04-08', 38.97, 4),
(6, '2023-04-12', 7.99, 4),
(7, '2023-04-12', 7.99, 4),
(8, '2023-04-12', 15.98, 4),
(9, '2023-04-12', 7.99, 4),
(10, '2023-04-12', 36.97, 4),
(11, '2023-04-12', 15.98, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

CREATE TABLE `promocion` (
  `idPromocion` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `estadoActivo` int(11) NOT NULL,
  `estadoAprobacion` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `promocion`
--

INSERT INTO `promocion` (`idPromocion`, `titulo`, `precio`, `fechaInicio`, `fechaFin`, `cantidad`, `descripcion`, `estadoActivo`, `estadoAprobacion`, `idEmpresa`) VALUES
(1, 'Camperitos al 2x1', 7.99, '2023-03-10', '2023-04-07', 100, 'Dos combos de camperitos por el precio de uno.', 1, 1, 1),
(2, 'Hamburguesa clásica 5.99', 5.99, '2023-03-10', '2023-04-02', 86, 'Hamburguesa clásica de pollo con papas y bebida a 5.99.', 1, 1, 1),
(3, 'Boneless barbacoa', 4.99, '2023-03-10', '2023-04-20', 99, 'Combo de 5 boneless como entrada a 4.99', 1, 1, 3),
(4, 'Dúo My Box', 11, '2023-03-10', '2023-04-20', 99, '2 My Box, cada una incluye: Pan Pizza rectangular (6 porciones) + 4 Palitroques personales + soda de lata', 1, 1, 1),
(5, 'My Box Tropical', 6.5, '2023-03-10', '2023-04-20', 99, 'Pan Pizza rectangular (6 porciones) + 4 Palitroques Personales + Soda lata', 1, 1, 3),
(6, 'Big king', 4.99, '2023-03-10', '2023-04-10', 100, 'Doble carne de res de 2 oz. Queso americano, el toque singular de nuestra salsa stacker y vegetales;', 1, 1, 4),
(7, 'Ultra king Steakhouse', 12.99, '2023-03-22', '2023-04-15', 2, 'Deliciosa combinación de carne de res de 7 oz, salchicha premium, tocino ahumado, queso americano, salsa steakhouse y pan de la casa', 1, 1, 1),
(8, 'Uñas acrílicas (french, naturales o cover de color) por 9.50', 9.5, '2023-04-02', '2023-04-30', 78, 'El set de uñas acrílicas te dará uñas largas ¡al instante!... ', 1, 1, 5),
(9, 'Polarizado automotriz + pulido de silvines', 62.99, '2023-04-01', '2023-05-27', 100, 'El polarizado completo de tu auto te hará sentir más seguro cuando no estés en él, al dificultar un un poco la vista hacia adentro, proteges de alguna forma las cosas que sueles dejar en tu carro ¡Y tiene garantía de 6 meses!\r\n\r\n ', 1, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro`
--

CREATE TABLE `rubro` (
  `idRubro` int(11) NOT NULL,
  `nombreRubro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rubro`
--

INSERT INTO `rubro` (`idRubro`, `nombreRubro`) VALUES
(1, 'Alimentos'),
(2, 'Belleza'),
(3, 'Autos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `token`
--

CREATE TABLE `token` (
  `idToken` int(11) NOT NULL,
  `token` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `token`
--

INSERT INTO `token` (`idToken`, `token`, `correo`) VALUES
(1, '26490180', 'fabiolamartinez190201@gmail.com'),
(2, '47370180', 'melisaramirez_25@hotmail.com'),
(3, '38101111', 'andreslopezj02@gmail.com'),
(4, '3800617', 'fabiolamartinez190201@gmail.com'),
(5, '42830617', 'fabiolamartinez190201@gmail.com'),
(6, '10850278', 'manuelaraniva07@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` varchar(100) NOT NULL,
  `usuario` varbinary(100) NOT NULL,
  `contra` text NOT NULL,
  `nivel` varchar(10) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `contra`, `nivel`, `estado`) VALUES
('01805710-8', 0x6d656c69736172616d6972657a5f323540686f746d61696c2e636f6d, '123', '1', 1),
('02785296-9', 0x6d616e75656c6172616e697661303740676d61696c2e636f6d, 'Manuel123$', '1', 1),
('06174301-9', 0x666162696f6c616d617274696e657a31393032303140676d61696c2e636f6d, 'Fabi190201$', '1', 1),
('11111111-9', 0x616e647265736c6f70657a6a303240676d61696c2e636f6d, '123', '1', 1),
('12345678-9', 0x636f726e656a6f657269636b3740676d61696c2e636f6d, '123', '1', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `dui` (`dui`),
  ADD UNIQUE KEY `telefono` (`telefono`);

--
-- Indices de la tabla `cupon`
--
ALTER TABLE `cupon`
  ADD PRIMARY KEY (`idCupon`),
  ADD KEY `fk_cupon_detalle` (`idDetalleFactura`);

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD PRIMARY KEY (`idDetalleFactura`),
  ADD KEY `fk_detalle_promocion` (`idPromocion`),
  ADD KEY `fk_detalle_factura` (`idFactura`);

--
-- Indices de la tabla `detallerechazo`
--
ALTER TABLE `detallerechazo`
  ADD PRIMARY KEY (`idRechazo`),
  ADD KEY `fk_detalleRechazo_promocion` (`idPromocion`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `fk_empleado_empresa` (`idEmpresa`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD KEY `fk_empresa_rubro` (`idRubro`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `fk_factura_cliente` (`idCliente`);

--
-- Indices de la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD PRIMARY KEY (`idPromocion`),
  ADD KEY `fk_promocion_empresa` (`idEmpresa`);

--
-- Indices de la tabla `rubro`
--
ALTER TABLE `rubro`
  ADD PRIMARY KEY (`idRubro`);

--
-- Indices de la tabla `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`idToken`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cupon`
--
ALTER TABLE `cupon`
  MODIFY `idCupon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  MODIFY `idDetalleFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `detallerechazo`
--
ALTER TABLE `detallerechazo`
  MODIFY `idRechazo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `promocion`
--
ALTER TABLE `promocion`
  MODIFY `idPromocion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `rubro`
--
ALTER TABLE `rubro`
  MODIFY `idRubro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `token`
--
ALTER TABLE `token`
  MODIFY `idToken` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cupon`
--
ALTER TABLE `cupon`
  ADD CONSTRAINT `fk_cupon_detalle` FOREIGN KEY (`idDetalleFactura`) REFERENCES `detallefactura` (`idDetalleFactura`);

--
-- Filtros para la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD CONSTRAINT `fk_detalle_factura` FOREIGN KEY (`idFactura`) REFERENCES `factura` (`idFactura`),
  ADD CONSTRAINT `fk_detalle_promocion` FOREIGN KEY (`idPromocion`) REFERENCES `promocion` (`idPromocion`);

--
-- Filtros para la tabla `detallerechazo`
--
ALTER TABLE `detallerechazo`
  ADD CONSTRAINT `fk_detalleRechazo_promocion` FOREIGN KEY (`idPromocion`) REFERENCES `promocion` (`idPromocion`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_empleado_empresa` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`);

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_empresa_rubro` FOREIGN KEY (`idRubro`) REFERENCES `rubro` (`idRubro`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_factura_cliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

--
-- Filtros para la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD CONSTRAINT `fk_promocion_empresa` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
