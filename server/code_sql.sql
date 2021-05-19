-- creando base de datos
CREATE DATABASE rgb_system;

-- Cargando base de datos
USE rgb_system;

-- Mostrando las tablas que contiene mi base de datos
SHOW TABLES;

-- Eliminando tablas usuarios e inventario
DROP TABLE usuarios;
DROP TABLE inventario;

-- alterando la tabla inventario para que el id inicie desde el numero 1001.
ALTER TABLE inventario AUTO_INCREMENT=1001;