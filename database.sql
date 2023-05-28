CREATE DATABASE supermarket

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