-- Base de datos
CREATE DATABASE IF NOT EXISTS Veterinaria CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE Veterinaria;

-- Tabla empleado
CREATE TABLE empleado (
    id_empleado INT PRIMARY KEY AUTO_INCREMENT,
    p_nombre VARCHAR(50) NOT NULL,
    s_nombre VARCHAR(50),
    p_apellido VARCHAR(50) NOT NULL,
    m_apellido VARCHAR(50),
    dni VARCHAR(20) UNIQUE NOT NULL,
    correo_electronico VARCHAR(100) UNIQUE,
    telefono VARCHAR(20),
    direccion VARCHAR(200),
    cargo VARCHAR(50),
    usuario VARCHAR(50) UNIQUE,
    contraseña VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- Tabla mascota
CREATE TABLE mascota (
    id_mascota INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    especie VARCHAR(50) NOT NULL,
    raza VARCHAR(50),
    edad INT,
    sexo ENUM('Macho', 'Hembra')
) ENGINE=InnoDB;

-- Tabla dueño
CREATE TABLE dueño (
    id_dueño INT PRIMARY KEY AUTO_INCREMENT,
    p_nombre VARCHAR(50) NOT NULL,
    s_nombre VARCHAR(50),
    p_apellido VARCHAR(50) NOT NULL,
    m_apellido VARCHAR(50),
    dni VARCHAR(20) UNIQUE NOT NULL,
    correo_electronico VARCHAR(100),
    telefono VARCHAR(20),
    direccion VARCHAR(200)
) ENGINE=InnoDB;

-- Tabla mascota_dueño (multi dueños por mascota)
CREATE TABLE mascota_dueño (
    id_relacion INT PRIMARY KEY AUTO_INCREMENT,
    id_mascota INT NOT NULL,
    id_dueño INT NOT NULL,
    tipo_relacion ENUM('Dueño','Autorizado') DEFAULT 'Dueño',
    f_registro DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (id_mascota) REFERENCES mascota(id_mascota) ON DELETE CASCADE,
    FOREIGN KEY (id_dueño) REFERENCES dueño(id_dueño) ON DELETE CASCADE,
    UNIQUE KEY uk_mascota_dueño (id_mascota, id_dueño)
) ENGINE=InnoDB;

-- Tabla atención
CREATE TABLE atencion (
    id_atencion INT PRIMARY KEY AUTO_INCREMENT,
    id_empleado INT NOT NULL,
    id_relacion INT NOT NULL, -- referencia a mascota_dueño
    id_responsable INT NOT NULL, -- quién trajo a la mascota
    f_registro DATETIME DEFAULT CURRENT_TIMESTAMP,
    tipo_servicio VARCHAR(100),
    descripcion TEXT,
    costo DECIMAL(10, 2),
    FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado),
    FOREIGN KEY (id_relacion) REFERENCES mascota_dueño(id_relacion) ON DELETE CASCADE,
    FOREIGN KEY (id_responsable) REFERENCES dueño(id_dueño)
) ENGINE=InnoDB;

-- Índices
CREATE INDEX idx_empleado_dni ON empleado(dni);
CREATE INDEX idx_dueño_dni ON dueño(dni);
CREATE INDEX idx_mascota_nombre ON mascota(nombre);
CREATE INDEX idx_mascota_dueño_mascota ON mascota_dueño(id_mascota);
CREATE INDEX idx_mascota_dueño_dueño ON mascota_dueño(id_dueño);
CREATE INDEX idx_atencion_fecha ON atencion(f_registro);
CREATE INDEX idx_atencion_empleado ON atencion(id_empleado);
