
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
drop table categorias;
select * from categorias;
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT
);
INSERT INTO categorias (nombre, descripcion) VALUES
('Celulares y Tablets', 'Categoría de celulares y tablets'),
('Computadoras y Laptops', 'Categoría de computadoras y laptops'),
('Audio y Video', 'Categoría de equipos de audio y video'),
('Accesorios', 'Categoría de accesorios para dispositivos electrónicos'),
('Cámaras y Fotografía', 'Categoría de cámaras y equipos de fotografía'),
('Gaming', 'Categoría de equipos y accesorios para videojuegos'),
('Redes y Conectividad', 'Categoría de equipos de redes y conectividad'),
('Impresoras y Escáneres', 'Categoría de impresoras y escáneres'),
('Almacenamiento', 'Categoría de dispositivos de almacenamiento'),
('Proyectores y Pantallas', 'Categoría de proyectores y pantallas');

drop table usuarios;
select * from usuarios;
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    imagen TEXT, -- Aquí almacenamos la ruta o el nombre del archivo de la imagen
    categoria_id int,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);
CREATE TABLE administradores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(255) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL,
    dni CHAR(8) UNIQUE NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    apellido_paterno VARCHAR(255) NOT NULL,
    apellido_materno VARCHAR(255) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    ciudad VARCHAR(255)
);
INSERT INTO administradores (
    correo, contraseña, dni, nombre, apellido_paterno, apellido_materno,
    fecha_nacimiento, direccion, ciudad
) VALUES (
    'tardidaw@gmail.com', 'admin1234', '74822352', 'Carlos',
    'Q', 'Q', '12005-04-30', 'Calle Ejemplo 123',
    'cusco'
);
select * from productos;