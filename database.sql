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



