-- ER/Studio 8.0 SQL Code Generation
-- Company :      UNAM
-- Project :      Basesita
-- Author :       Alexis Sánchez
--
-- Date Created : Friday, May 31, 2024 01:05:49
-- Target DBMS : MySQL 5.x
--
-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS ecobstDB;
USE ecobstDB;

-- 
-- TABLE: PRODUCTO 
--

CREATE TABLE PRODUCTO(
    id_producto           INT AUTO_INCREMENT NOT NULL,
    nombre_producto       VARCHAR(50)        NOT NULL,
    precio_unidad         DECIMAL(10,2)      NOT NULL,
    existencias_producto  INT                NOT NULL,
    PRIMARY KEY (id_producto)
);

-- 
-- TABLE: USUARIO 
--

CREATE TABLE USUARIO(
    id_usuario          INT AUTO_INCREMENT NOT NULL,
    nombre_usuario      VARCHAR(100)       NOT NULL,
    correo_usuario      VARCHAR(100)       NOT NULL UNIQUE,
    contrasena_usuario  VARCHAR(100)       NOT NULL,
    PRIMARY KEY (id_usuario)
);

-- 
-- TABLE: VENTAS 
--

CREATE TABLE VENTAS(
    id_venta        INT AUTO_INCREMENT NOT NULL,
    fecha           TIMESTAMP          DEFAULT CURRENT_TIMESTAMP,
    cantidad        INT                NOT NULL,
    precio_total    DECIMAL(10,2)      NOT NULL,
    id_usuario      INT                NOT NULL,
    id_producto     INT                NOT NULL,
    PRIMARY KEY (id_venta),
    FOREIGN KEY (id_usuario) REFERENCES USUARIO(id_usuario),
    FOREIGN KEY (id_producto) REFERENCES PRODUCTO(id_producto)
);

-- 
-- INDEX: Ref79 
--

CREATE INDEX Ref79 ON VENTAS(id_usuario);

-- 
-- INDEX: Ref511 
--

CREATE INDEX Ref511 ON VENTAS(id_producto);

-- 
-- Foreign Key Constraints (already included in table creation)
--

-- No need to use ALTER TABLE for the foreign key constraints as they are already defined in the table creation
insert into PRODUCTO (nombre_producto, existencias_producto, precio_unidad)
values ("maracuya", 100, 17);
insert into PRODUCTO (nombre_producto, existencias_producto, precio_unidad)
values ("dragonfruit", 100, 20);
insert into PRODUCTO (nombre_producto, existencias_producto, precio_unidad)
values ("mango", 100, 25);
insert into PRODUCTO (nombre_producto, existencias_producto, precio_unidad)
values ("platano", 100, 15);
insert into PRODUCTO (nombre_producto, existencias_producto, precio_unidad)
values ("frutos rojos", 100, 2);
insert into PRODUCTO (nombre_producto, existencias_producto, precio_unidad)
values ("sandia", 100, 40);
insert into PRODUCTO (nombre_producto, existencias_producto, precio_unidad)
values ("melón", 100, 35);
insert into PRODUCTO (nombre_producto, existencias_producto, precio_unidad)
values ("fresa", 100, 3);
insert into PRODUCTO (nombre_producto, existencias_producto, precio_unidad)
values ("guanabana", 100, 22);
insert into PRODUCTO (nombre_producto, existencias_producto, precio_unidad)
values ("manzana", 100, 12);

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `correo_usuario`, `contrasena_usuario`) VALUES (NULL, 'Alexis Sanchez', 'alexis@mail.com', 'parabola');
