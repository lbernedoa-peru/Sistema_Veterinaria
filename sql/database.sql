-- Base de datos para sistema de veterinaria

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
    contraseña VARCHAR(255)
);

-- Tabla mascota
CREATE TABLE mascota (
    id_mascota INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    especie VARCHAR(50) NOT NULL,
    raza VARCHAR(50),
    edad INT,
    sexo ENUM('Macho', 'Hembra')
);

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
);

-- Tabla cliente (relaciona mascota con dueño)
CREATE TABLE cliente (
    id_cliente INT PRIMARY KEY AUTO_INCREMENT,
    id_mascota INT NOT NULL,
    id_dueño INT NOT NULL,
    f_registro DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (id_mascota) REFERENCES mascota(id_mascota) ON DELETE CASCADE,
    FOREIGN KEY (id_dueño) REFERENCES dueño(id_dueño) ON DELETE CASCADE
);

-- Tabla atención
CREATE TABLE atencion (
    id_atencion INT PRIMARY KEY AUTO_INCREMENT,
    id_empleado INT NOT NULL,
    id_cliente INT NOT NULL,
    f_registro DATETIME DEFAULT CURRENT_TIMESTAMP,
    tipo_servicio VARCHAR(100),
    descripcion TEXT,
    costo DECIMAL(10, 2),
    FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado) ON DELETE RESTRICT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente) ON DELETE CASCADE
);

-- Índices para mejorar el rendimiento de busqueda
CREATE INDEX idx_empleado_dni ON empleado(dni);
CREATE INDEX idx_dueño_dni ON dueño(dni);
CREATE INDEX idx_cliente_mascota ON cliente(id_mascota);
CREATE INDEX idx_cliente_dueño ON cliente(id_dueño);
CREATE INDEX idx_atencion_fecha ON atencion(f_registro);
CREATE INDEX idx_atencion_empleado ON atencion(id_empleado);
CREATE INDEX idx_atencion_cliente ON atencion(id_cliente);