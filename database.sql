-- Active: 1685444645314@@127.0.0.1@3306@supermarket
USE supermarket; 

SHOW databases;

show tables;
CREATE DATABASE supermarket;

CREATE TABLE categorias(
    id INT primary key AUTO_INCREMENT,
    categoriaNombre VARCHAR (50) NOT NULL, 
    descripcion VARCHAR (50),
    imagen VARCHAR (50)
);

CREATE TABLE clientes(
    id INT primary key AUTO_INCREMENT,
    clienteNombre VARCHAR (50) NOT NULL, 
    celular VARCHAR (50),
    compañia VARCHAR (50)
);

CREATE TABLE empleado(
    id INT primary key AUTO_INCREMENT,
    empleadoNombre VARCHAR (50) NOT NULL,
    celular INT (20) NOT NULL,
    direccion VARCHAR (50) NOT NULL,
    imagen VARCHAR (50) NOT NULL
);

CREATE TABLE factura(
    id INT primary key AUTO_INCREMENT,
    id_empleado INT,
    id_cliente INT,
    fecha VARCHAR (50) NOT NULL,

    FOREIGN KEY (id_empleado) references empleado(id),
     FOREIGN KEY (id_cliente) references clientes(id)
);

CREATE TABLE proveedor(
    id INT primary key AUTO_INCREMENT,
    nombreProveedor VARCHAR (50) NOT NULL,
    telefono INT (20) NOT NULL,
    ciudad VARCHAR (50) NOT NULL
);

SELECT * FROM proveedor;

INSERT INTO clientes(id, clienteNombre, celular,compañia)
VALUES (1, "Juan", 3154317110, "Alkosto");

INSERT INTO empleado(id, empleadoNombre, celular ,direccion, imagen)
VALUES (1, "Juan", 315431, "Calle 20", "Imagen");

INSERT INTO factura(id, id_empleado, celular ,direccion, imagen)
VALUES (1, "Juan", 315431, "Calle 20", "Imagen");

SELECT factura.id, empleado.empleadoNombre, clientes.clienteNombre, factura.fecha FROM factura INNER JOIN empleado ON empleado.id=factura.id_empleado INNER JOIN clientes ON clientes.id=factura.id_empleado;

SELECT * FROM factura;

CREATE TABLE productos(

        id INT primary key AUTO_INCREMENT,
        nombreproducto VARCHAR(50),
        precioUnitario FLOAT,
        unidadesPedidas INT,
        stock INT,
        id_categoria INT,
        id_proveedor INT, 
        descontinuado VARCHAR (10),

    FOREIGN KEY (id_categoria) references categorias(id),
    FOREIGN KEY (id_proveedor) references proveedor(id),
);

CREATE TABLE registro(

    id INT PRIMARY KEY AUTO_INCREMENT, 
    id_usuario INT, 
    email VARCHAR (80) ,
    username VARCHAR (80) NOT NULL,
    password VARCHAR (60) NOT NULL,
    Foreign Key (id_usuario) REFERENCES empleado(id)

);

DESCRIBE registro;

show empleado;