create database cuponera;
use cuponera;

create table usuario
(
  idUsuario varchar(100) primary key,
  usuario varbinary(100) not null,
  contra varbinary(100) not null,
  nivel varchar(10) not null
);

create table cliente
(
  idCliente int auto_increment primary key,
  nombres varchar(40) not null,
  apellidos varchar(40) not null,
  correo varchar(50) not null,
  direccion varchar(100) not null,
  dui varchar(10) not null
);

create table rubro
(
  idRubro int auto_increment primary key,
  nombreRubro varchar(100) not null
);

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
  constraint fk_empresa_rubro foreign key(idRubro) references rubro(idRubro)
);


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
  descripcion varchar(100) not null,
  estadoActivo int not null,
  estadoAprobacion int not null,
  idEmpresa int not null,
  constraint fk_promocion_empresa foreign key(idEmpresa) references empresa(idEmpresa)
);


create table factura
(
  idFactura int auto_increment primary key,
  fecha date not null,
  total float not null,
  idCliente int not null,
  constraint fk_factura_cliente foreign key(idCliente) references cliente(idCliente)
);


create table detallefactura
(
  idDetalleFactura int auto_increment primary key,
  idFactura int not null,
  idPromocion int not null,
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


