
CREATE DATABASE sen_proyect_ventas;
USE sen_proyect_ventas;
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(255) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL,
    dni CHAR(8) UNIQUE,
    nombre VARCHAR(255),
    apellido_paterno VARCHAR(255),
    apellido_materno VARCHAR(255),
    fecha_nacimiento DATE,
    direccion VARCHAR(255),
    ciudad VARCHAR(255)
);
drop table usuarios;
select * from usuarios;
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    imagen TEXT, -- Aquí almacenamos la ruta o el nombre del archivo de la imagen
    categoria VARCHAR(255),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
select * from productos;