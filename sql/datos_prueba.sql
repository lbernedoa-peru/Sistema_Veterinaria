-- Tabla empleado
INSERT INTO empleado (p_nombre, s_nombre, p_apellido, m_apellido, dni, correo_electronico, telefono, direccion, cargo, usuario, contraseña) VALUES
('Juan', 'Carlos', 'Ramírez', 'Lopez', '71234501', 'juan@vet.com', '912345678', 'Av. Siempre Viva 123', 'Veterinario', 'juan', '123'),
('Ana', 'Lucía', 'Morales', 'Perez', '71234502', 'ana@vet.com', '922345678', 'Calle Sol 456', 'Veterinaria', 'ana', '123'),
('Luis', 'Alberto', 'Fernandez', 'Quispe', '71234503', 'luis@vet.com', '932345678', 'Jr. Luna 789', 'Asistente', 'luis', '123'),
('María', NULL, 'Torres', 'Suarez', '71234504', 'maria@vet.com', '942345678', 'Av. Paz 321', 'Veterinaria', 'maria', '123'),
('Pedro', 'Miguel', 'Gomez', 'Ramos', '71234505', 'pedro@vet.com', '952345678', 'Calle Río 654', 'Recepcionista', 'pedro', '123'),
('Lucero', 'Andrea', 'Vega', 'Marin', '71234506', 'lucero@vet.com', '962345678', 'Av. Mar 987', 'Veterinaria', 'lucero', '123'),
('Carlos', 'Eduardo', 'Salazar', 'Diaz', '71234507', 'carlos@vet.com', '972345678', 'Calle Flor 159', 'Veterinario', 'csalazar', '123'),
('Paola', 'Esther', 'Cruz', 'Moya', '71234508', 'paola@vet.com', '982345678', 'Av. Sol 753', 'Asistente', 'paola', '123'),
('Ricardo', NULL, 'Paredes', 'Sandoval', '71234509', 'ricardo@vet.com', '991234567', 'Jr. Estrella 246', 'Veterinario', 'ricardo', '123'),
('Sofía', 'Milagros', 'Castro', 'Reyes', '71234510', 'sofia@vet.com', '901234567', 'Av. Luna 369', 'Veterinaria', 'sofia', '123');

-- Tabla dueño
INSERT INTO dueño (p_nombre, s_nombre, p_apellido, m_apellido, dni, correo_electronico, telefono, direccion) VALUES
('Carlos', 'Miguel', 'Lopez', 'Diaz', '76543210', 'carlos@mail.com', '987654321', 'Av. Lima 123'),
('Ana', 'Maria', 'Perez', 'Gomez', '76543211', 'ana@mail.com', '987654322', 'Av. Lima 456'),
('Luis', 'Fernando', 'Torres', 'Mendez', '76543212', 'luis@mail.com', '987654323', 'Av. Lima 789'),
('Rosa', 'Elena', 'Cruz', 'Salas', '76543213', 'rosa@mail.com', '987654324', 'Av. Lima 321'),
('Pedro', 'Jose', 'Ramirez', 'Lopez', '76543214', 'pedro@mail.com', '987654325', 'Av. Lima 654'),
('Juliana', 'Andrea', 'Quispe', 'Huanca', '76543215', 'juliana@mail.com', '987654326', 'Av. Cusco 987'),
('Miguel', 'Angel', 'Vega', 'Ramos', '76543216', 'miguel@mail.com', '987654327', 'Jr. Arequipa 159'),
('Lucia', NULL, 'Fernandez', 'Ruiz', '76543217', 'lucia@mail.com', '987654328', 'Av. Puno 753'),
('Carmen', 'Beatriz', 'Diaz', 'Paredes', '76543218', 'carmen@mail.com', '987654329', 'Jr. Tacna 246'),
('Diego', 'Alonso', 'Bravos', 'Marin', '76543219', 'diego@mail.com', '987654330', 'Av. Piura 369');

-- Tabla mascota
INSERT INTO mascota (nombre, especie, raza, edad, sexo) VALUES
('Firulais', 'Perro', 'Labrador', 3, 'Macho'),
('Mishi', 'Gato', 'Siames', 2, 'Hembra'),
('Rex', 'Perro', 'Pastor Alemán', 5, 'Macho'),
('Nala', 'Gato', 'Persa', 4, 'Hembra'),
('Pelusa', 'Conejo', 'Enano', 1, 'Hembra'),
('Max', 'Perro', 'Husky', 2, 'Macho'),
('Luna', 'Gato', 'Común', 3, 'Hembra'),
('Rocky', 'Perro', 'Pitbull', 4, 'Macho'),
('Toby', 'Perro', 'Chihuahua', 6, 'Macho'),
('Kira', 'Gato', 'Bengala', 2, 'Hembra');

--Tabla relacion mascota-dueño
INSERT INTO mascota_dueño (id_mascota, id_dueño, tipo_relacion) VALUES
(1, 1, 'Dueño'),
(2, 2, 'Dueño'),
(3, 3, 'Dueño'),
(4, 4, 'Dueño'),
(5, 5, 'Dueño'),
(6, 6, 'Autorizado'),
(7, 7, 'Autorizado'),
(8, 8, 'Autorizado'),
(9, 9, 'Autorizado'),
(10, 10, 'Autorizado');

--Tabla atenciones
INSERT INTO atencion (id_empleado, id_relacion, id_responsable, tipo_servicio, descripcion, costo) VALUES
(1, 1, 1, 'Vacunación', 'Vacuna antirrábica', 50.00),
(2, 2, 2, 'Desparasitación', 'Desparasitación interna', 40.00),
(3, 3, 3, 'Control general', 'Chequeo rutinario', 60.00),
(4, 4, 4, 'Cirugía', 'Esterilización', 200.00),
(5, 5, 5, 'Consulta', 'Revisión por diarrea', 30.00),
(6, 6, 6, 'Baño medicado', 'Tratamiento de piel', 45.00),
(7, 7, 7, 'Vacunación', 'Vacuna triple felina', 55.00),
(8, 8, 8, 'Radiografía', 'Radiografía de tórax', 120.00),
(9, 9, 9, 'Consulta', 'Tos y falta de apetito', 35.00),
(10, 10, 10, 'Hospitalización', 'Observación por fiebre', 300.00);
