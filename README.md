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
drop table productos;
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
select * from productos;
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
CREATE TABLE transacciones (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    producto_id INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    tarjeta VARCHAR(16) NOT NULL,
    vencimiento VARCHAR(7) NOT NULL,
    cvv VARCHAR(4) NOT NULL,
    fecha DATETIME NOT NULL,
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);
select * from pedidos;
CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
-- Crear tabla de detalles del pedido
CREATE TABLE detalles_pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT NOT NULL,
    producto_id INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    cantidad INT NOT NULL,
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);
select * from transacciones ;
