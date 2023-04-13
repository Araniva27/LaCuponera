create database cuponera;
use cuponera;

create table usuario
(
  idUsuario varchar(100) primary key,
  usuario varchar(100) not null unique,
  contra varchar(100) not null,
  nivel varchar(10) not null,
  estado int not null
);
INSERT INTO `usuario` (`idUsuario`, `usuario`, `contra`, `nivel`, `estado`) VALUES
("12345678-9",'cornejoerick7@gmail.com','$2y$10$jJY2ReIJAZa1K3pPsDU6VOA/Zg.FSqjeOTS/TlB8gPdwugkEvxYpa', "1", 1),
("06174301-9",'fabiolamartinez190201@gmail.com', '$2y$10$jJY2ReIJAZa1K3pPsDU6VOA/Zg.FSqjeOTS/TlB8gPdwugkEvxYpa', "1", 1),
("12345678-0",'andreslopezj02@gmail.com', '$2y$10$jJY2ReIJAZa1K3pPsDU6VOA/Zg.FSqjeOTS/TlB8gPdwugkEvxYpa', "1", 1),
("32165489-9",'manuelaraniva07@gmail.com', '$2y$10$jJY2ReIJAZa1K3pPsDU6VOA/Zg.FSqjeOTS/TlB8gPdwugkEvxYpa', "1", 1);


create table cliente
(
  idCliente int auto_increment primary key,
  nombres varchar(40) not null,
  apellidos varchar(40) not null,
  correo varchar(50) not null unique,
  direccion varchar(100) not null,
  dui varchar(10) not null unique,
  telefono varchar(9) not null unique
);
INSERT INTO `cliente` (`idCliente`, `nombres`, `apellidos`, `correo`, `direccion`, `dui`, `telefono`) VALUES
(null, 'Erick', "Cornejo", 'cornejoerick7@gmail.com', 'san salvador', "12345678-9", '7867-4625'),
(null, 'Fabiola', "Martinez", 'fabiolamartinez190201@gmail.com', 'san salvador', "06174301-9", '7039-2268'),
(null, 'Andrés', "López", 'andreslopezj02@gmail.com', 'santa ana', "12345678-0", '7039-2285'),
(null, 'Manuel', "Araniva", 'manuelaraniva07@gmail.com', 'santa salvador', "32165489-9", '7039-27412');

create table rubro
(
  idRubro int auto_increment primary key,
  nombreRubro varchar(100) not null
);
INSERT INTO `rubro` (`idRubro`, `nombreRubro`) VALUES
(1, 'Alimentos'),
(2, 'Belleza'),
(3, 'Autos');

create table empresa
(
  idEmpresa int auto_increment primary key,
  nombre varchar(100) not null,
  codigoEmpresa varchar(6) not null,
  direccion varchar(100) not null,
  nombreContacto varchar(100) not null,
  telefono varchar(100) not null,
  correo varchar(100) not null,
  comision float not null,
  idRubro int not null,
  constraint fk_empresa_rubro foreign key(idRubro) references rubro(idRubro),
  img varchar(100) not null
);
INSERT INTO `empresa` (`idEmpresa`, `nombre`, `codigoEmpresa`, `direccion`, `nombreContacto`, `telefono`, `correo`, `comision`, `idRubro`, `img`) VALUES
(1, 'Pollo Campero', 'PC0125', 'San Salvador', 'Ana Martínez', '2298-7451', 'pollocampero@gmail.com', 0.5, 1, 'polloCampero.png'),
(3, 'Pizza Hut', 'PH0456', 'San Salvador, San Miguel', 'Alejandro Ventura', '2298-7451', 'pizzahut.sv@gmail.com', 0.5, 1, 'pizza_hut.png'),
(4, 'Burguer King', 'BK0789', 'San Salvador', 'Melisa Rosales', '2298-7451', 'bk_sv@gmail.com', 0.5, 1, 'burguer_king.png'),
(5, 'Studio Herrera', 'SH8752', '85 va norte paseo general escalón #4360 local 3-4 Colonia Escalon, San Salvador 0016800', 'Valentina Saravia', '2596-7896', 'studio_herrera@hotmail.com', 0.8, 2, 'studio_herrera.jpg'),
(6, 'Taller Gran Turismo', 'TG7852', 'Calle Chiltiupán y 9ª calle oriente #1, Colonia Santa Mónica, Santa Tecla 0016-800', 'Vladimir Hernández', '7896-5485', 'granturismo@outlook.com', 0.4, 3, 'gran_turismo.jpg');



create table empleado
(
  idEmpleado int auto_increment primary key,
  nombres varchar(40) not null,
  apellidos varchar(40) not null,
  correo varchar(50) not null,
  idEmpresa int not null,
  constraint fk_empleado_empresa foreign key(idEmpresa) references Empresa(idEmpresa)
);

create table promocion
(
  idPromocion int auto_increment primary key,
  titulo varchar(100) not null,
  precio float not null,
  fechaInicio date not null,
  fechaFin date not null,
  cantidad int not null,
  descripcion text not null,
  estadoActivo int not null,
  estadoAprobacion int not null,
  idEmpresa int not null,
  constraint fk_promocion_empresa foreign key(idEmpresa) references empresa(idEmpresa)
);
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

create table factura
(
  idFactura int auto_increment primary key,
  fecha date not null,
  total float not null,
  idCliente int not null,
  constraint fk_factura_cliente foreign key(idCliente) references cliente(idCliente)
);
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

create table detallefactura
(
  idDetalleFactura int auto_increment primary key,
  idFactura int not null,
  idPromocion int not null,
  cantidad int not null,
  constraint fk_detalle_promocion foreign key(idPromocion) references promocion(idPromocion),
  constraint fk_detalle_factura foreign key(idFactura) references factura(idFactura)
);


create table cupon
(
  idCupon int auto_increment primary key,
  codigoCupon varchar(50) not null,
  estadoCupon int not null,
  idDetalleFactura int not null,
  constraint fk_cupon_detalle foreign key(idDetalleFactura) references detallefactura(idDetalleFactura)
);


create table detalleRechazo
(
  idRechazo int auto_increment primary key,
  descripcionRechazo varchar(40) not null,
  fechaRechazo date not null,
  usuarioRechazo date not null,
  idPromocion int not null,
  constraint fk_detalleRechazo_promocion foreign key(idPromocion) references promocion(idPromocion)
);

create table token
(
  idToken int auto_increment primary key,
  token varchar(100) not null,
  correo varchar(100) not null
);
INSERT INTO `token` (`idToken`, `token`, `correo`) VALUES
(1, '26490180', 'fabiolamartinez190201@gmail.com'),
(2, '38101111', 'andreslopezj02@gmail.com'),
(3, '10850278', 'manuelaraniva07@gmail.com');

select * from usuario