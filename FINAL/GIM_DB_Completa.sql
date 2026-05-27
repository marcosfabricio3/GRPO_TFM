-- =============================================
-- BASE DE DATOS GIMNASIO
-- =============================================

CREATE DATABASE GimnasioBD;

USE GimnasioBD;

-- 1. INSTRUCTORES
CREATE TABLE Instructores (
    InstructorID INT IDENTITY(1,1) PRIMARY KEY,
    Nombre NVARCHAR(100) NOT NULL,
    Especialidad NVARCHAR(80) NOT NULL,
    Email NVARCHAR(100) UNIQUE,
    Telefono NVARCHAR(20),
    Activo BIT NOT NULL DEFAULT 1,
    FechaAlta DATETIME2 NOT NULL DEFAULT GETDATE()
);


-- 2. SOCIOS
CREATE TABLE Socios (
    SocioID INT IDENTITY(1,1) PRIMARY KEY,
    Nombre NVARCHAR(100) NOT NULL,
    DocumentoIdentidad NVARCHAR(20) NOT NULL UNIQUE,
    Email NVARCHAR(100) UNIQUE,
    Telefono NVARCHAR(20),
    FechaNacimiento DATE,
    FechaAlta DATETIME2 NOT NULL DEFAULT GETDATE(),
    Activo BIT NOT NULL DEFAULT 1
);


-- 3. MEMBRESIAS
CREATE TABLE Membresias (
    MembresiaID INT IDENTITY(1,1) PRIMARY KEY,
    Tipo NVARCHAR(50) NOT NULL 
        CHECK (Tipo IN ('Mensual', 'Trimestral', 'Anual', 'Clase Suelta')),

    Precio DECIMAL(10,2) NOT NULL 
        CHECK (Precio > 0),

    CantidadClasesIncluidas INT NULL 
        CHECK (CantidadClasesIncluidas > 0 
        OR CantidadClasesIncluidas IS NULL),

    Descripcion NVARCHAR(200)
);


-- 4. INSCRIPCIONES
CREATE TABLE Inscripciones (
    InscripcionID INT IDENTITY(1,1) PRIMARY KEY,

    SocioID INT NOT NULL,
    MembresiaID INT NOT NULL,

    FechaInicio DATE NOT NULL,
    FechaVencimiento DATE NOT NULL,

    Estado NVARCHAR(20) NOT NULL DEFAULT 'Activa'
        CHECK (Estado IN ('Activa', 'Vencida', 'Cancelada')),

    FechaCreacion DATETIME2 NOT NULL DEFAULT GETDATE(),

    CONSTRAINT FK_Inscripciones_Socio
        FOREIGN KEY (SocioID)
        REFERENCES Socios(SocioID),

    CONSTRAINT FK_Inscripciones_Membresia
        FOREIGN KEY (MembresiaID)
        REFERENCES Membresias(MembresiaID)
);


-- 5. CLASES
CREATE TABLE Clases (
    ClaseID INT IDENTITY(1,1) PRIMARY KEY,

    Nombre NVARCHAR(100) NOT NULL,
    Tipo NVARCHAR(60) NOT NULL,

    InstructorID INT NOT NULL,

    DiasSemana NVARCHAR(50) NOT NULL,
    Horario TIME NOT NULL,

    CupoMaximo INT NOT NULL
        CHECK (CupoMaximo >= 1),

    Activa BIT NOT NULL DEFAULT 1,

    CONSTRAINT FK_Clases_Instructor
        FOREIGN KEY (InstructorID)
        REFERENCES Instructores(InstructorID)
);


-- 6. ASISTENCIAS
CREATE TABLE Asistencias (
    AsistenciaID BIGINT IDENTITY(1,1) PRIMARY KEY,

    SocioID INT NOT NULL,
    ClaseID INT NOT NULL,

    FechaEntrada DATETIME2 NOT NULL,
    FechaSalida DATETIME2 NULL,

    CONSTRAINT FK_Asistencias_Socio
        FOREIGN KEY (SocioID)
        REFERENCES Socios(SocioID),

    CONSTRAINT FK_Asistencias_Clase
        FOREIGN KEY (ClaseID)
        REFERENCES Clases(ClaseID)
);


-- 7. PAGOS
CREATE TABLE Pagos (
    PagoID INT IDENTITY(1,1) PRIMARY KEY,

    InscripcionID INT NOT NULL,

    Monto DECIMAL(10,2) NOT NULL
        CHECK (Monto > 0),

    FechaPago DATETIME2 NOT NULL DEFAULT GETDATE(),

    MedioPago NVARCHAR(20) NOT NULL
        CHECK (MedioPago IN ('Efectivo', 'Transferencia', 'Tarjeta')),

    CONSTRAINT FK_Pagos_Inscripcion
        FOREIGN KEY (InscripcionID)
        REFERENCES Inscripciones(InscripcionID)
);


-- 8. AUDITORIA
CREATE TABLE Auditoria (
    AuditoriaID BIGINT IDENTITY(1,1) PRIMARY KEY,

    Tabla NVARCHAR(50) NOT NULL,
    Operacion NVARCHAR(20) NOT NULL,
    RegistroID INT NOT NULL,

    Usuario NVARCHAR(100) NOT NULL DEFAULT SUSER_NAME(),

    Fecha DATETIME2 NOT NULL DEFAULT GETDATE(),

    Descripcion NVARCHAR(500)
);

----------------------------------------------------------------------------
-- INSERTS
----------------------------------------------------------------------------

INSERT INTO Instructores (Nombre, Especialidad, Email, Telefono)
VALUES
('Carlos Pereira', 'Musculación', 'carlos.pereira@gym.com', '099111001'),
('Lucia Fernandez', 'Yoga', 'lucia.fernandez@gym.com', '099111002'),
('Matias Rodriguez', 'Crossfit', 'matias.rodriguez@gym.com', '099111003'),
('Sofia Martinez', 'Pilates', 'sofia.martinez@gym.com', '099111004'),
('Diego Suarez', 'Funcional', 'diego.suarez@gym.com', '099111005'),
('Valentina Gomez', 'Spinning', 'valentina.gomez@gym.com', '099111006'),
('Martin Silva', 'Boxeo', 'martin.silva@gym.com', '099111007'),
('Camila Torres', 'Zumba', 'camila.torres@gym.com', '099111008'),
('Federico Lopez', 'Calistenia', 'federico.lopez@gym.com', '099111009'),
('Natalia Castro', 'Entrenamiento HIIT', 'natalia.castro@gym.com', '099111010');

INSERT INTO Socios (Nombre, DocumentoIdentidad, Email, Telefono, FechaNacimiento)
VALUES
('Juan Perez', '51234567', 'juan.perez@mail.com', '098200001', '1995-03-12'),
('Maria Lopez', '49876543', 'maria.lopez@mail.com', '098200002', '1992-07-25'),
('Andres Silva', '47654321', 'andres.silva@mail.com', '098200003', '1988-11-10'),
('Valeria Gomez', '52345678', 'valeria.gomez@mail.com', '098200004', '2000-01-15'),
('Pablo Martinez', '53456789', 'pablo.martinez@mail.com', '098200005', '1997-05-09'),
('Camila Fernandez', '54567890', 'camila.fernandez@mail.com', '098200006', '1999-09-30'),
('Nicolas Suarez', '55678901', 'nicolas.suarez@mail.com', '098200007', '1994-12-18'),
('Florencia Diaz', '56789012', 'florencia.diaz@mail.com', '098200008', '1991-08-22'),
('Sebastian Torres', '57890123', 'sebastian.torres@mail.com', '098200009', '1985-04-14'),
('Martina Castro', '58901234', 'martina.castro@mail.com', '098200010', '2002-06-05'),

-- NUEVOS SOCIOS
('Lucas Romero', '60000001', 'lucas.romero@mail.com', '099100001', '1998-02-10'),
('Sofia Pereira', '60000002', 'sofia.pereira@mail.com', '099100002', '1996-05-18'),
('Mateo Alvarez', '60000003', 'mateo.alvarez@mail.com', '099100003', '2001-09-22'),
('Julieta Ramos', '60000004', 'julieta.ramos@mail.com', '099100004', '1997-11-30'),
('Bruno Silva', '60000005', 'bruno.silva@mail.com', '099100005', '1995-06-14');

INSERT INTO Membresias (Tipo, Precio, CantidadClasesIncluidas, Descripcion)
VALUES
('Mensual', 2500, NULL, 'Acceso ilimitado por un mes'),
('Trimestral', 6500, NULL, 'Acceso ilimitado por tres meses'),
('Anual', 22000, NULL, 'Acceso ilimitado por un año'),
('Clase Suelta', 400, 1, 'Una sola clase');

INSERT INTO Inscripciones
(SocioID, MembresiaID, FechaInicio, FechaVencimiento, Estado)
VALUES
(1,1,'2026-01-01','2026-12-31','Activa'),
(2,2,'2026-02-01','2026-12-31','Activa'),
(3,3,'2026-01-15','2027-01-15','Activa'),
(5,1,'2026-02-20','2026-12-31','Activa'),
(6,1,'2026-01-05','2026-12-31','Activa'),
(7,1,'2026-01-01','2027-01-01','Activa'),
(10,1,'2026-01-20','2026-12-31','Activa'),

-- NUEVAS INSCRIPCIONES
(11,1,'2026-05-01','2026-12-31','Activa'),
(12,1,'2026-05-01','2026-12-31','Activa'),
(13,1,'2026-05-01','2026-12-31','Activa'),
(14,1,'2026-05-01','2026-12-31','Activa'),
(15,1,'2026-05-01','2026-12-31','Activa');

INSERT INTO Clases
(Nombre, Tipo, InstructorID, DiasSemana, Horario, CupoMaximo)
VALUES
('Power Gym', 'Musculación', 1, 'Lunes,Miércoles,Viernes', '08:00', 20),
('Zen Flow', 'Yoga', 2, 'Martes,Jueves', '09:30', 15),
('Cross Power', 'Crossfit', 3, 'Lunes,Miércoles', '18:00', 25),
('Pilates Core', 'Pilates', 4, 'Martes,Jueves', '10:00', 12),
('Funcional Max', 'Funcional', 5, 'Lunes,Viernes', '19:00', 18),
('Bike Energy', 'Spinning', 6, 'Miércoles,Sábado', '07:00', 22),

-- CLASE CON CUPO 5 PARA PROBAR TRIGGER
('Box Attack', 'Boxeo', 7, 'Martes,Jueves', '20:00', 5),

('Dance Fit', 'Zumba', 8, 'Lunes,Miércoles,Viernes', '17:00', 30),
('Street Workout', 'Calistenia', 9, 'Sábado', '16:00', 14),
('Burn HIIT', 'HIIT', 10, 'Domingo', '11:00', 20);

-------------------------------------------------------------------------
-- SPs
-------------------------------------------------------------------------

CREATE PROCEDURE sp_inscribir_socio
@SocioID INT,
@MembresiaID INT,
@FechaInicio DATE,
@FechaVencimiento DATE
AS
BEGIN
SET NOCOUNT ON;
BEGIN TRY
IF EXISTS(
SELECT 1
FROM Inscripciones
WHERE SocioID = @SocioID
AND Estado = 'Activa'
)
BEGIN
RAISERROR('El socio ya tiene una inscripcion', 16, 1);
RETURN;
END;

INSERT INTO Inscripciones (
SocioID,
MembresiaID,
FechaInicio,
FechaVencimiento,
Estado
)
VALUES(
@SocioID,
@MembresiaID,
@FechaInicio,
@FechaVencimiento,
'Activa'
);
END TRY
BEGIN CATCH
PRINT 'Error al inscribir socio: ' + ERROR_MESSAGE();
END CATCH
END;

-- USO de SP 
EXEC sp_inscribir_socio
    @SocioID = 4,
    @MembresiaID = 2,
    @FechaInicio = '2026-05-14',
    @FechaVencimiento = '2026-08-14';

-- Comprobar SP
SELECT *
FROM Inscripciones
WHERE SocioID = 4;

-- Probar error de SP
EXEC sp_inscribir_socio
    @SocioID = 1,
    @MembresiaID = 3,
    @FechaInicio = '2026-05-14',
    @FechaVencimiento = '2027-05-14';

-------------------------------------------------------------------------
-- Triggers
-------------------------------------------------------------------------

-- Trigger de auditoria
CREATE TRIGGER trg_auditoria_inscripcion
ON Inscripciones
AFTER INSERT, UPDATE, DELETE
AS
BEGIN
SET NOCOUNT ON;

IF exists(select * FROM inserted) and not exists (SELECT * FROM deleted)
BEGIN
INSERT INTO Auditoria (Tabla, Operacion, RegistroID, Descripcion)
SELECT 'Inscripciones', 'INSERT', InscripcionID, 'Nueva inscripción creada para: ' + CAST(SocioID AS NVARCHAR(10)) 
FROM inserted;
END;

IF EXISTS (SELECT * FROM inserted) AND EXISTS (SELECT * FROM deleted)
BEGIN
INSERT INTO Auditoria (Tabla, Operacion, RegistroID, Descripcion )
SELECT 'Inscripciones', 'CANCELACION', i.InscripcionID, 'Inscripción cancelada del socio: ' + CAST(i.SocioID AS NVARCHAR(10))
FROM inserted i JOIN deleted d ON i.InscripcionID = d.InscripcionID
WHERE d.Estado <> 'Cancelada' AND i.Estado = 'Cancelada';

INSERT INTO Auditoria ( Tabla, Operacion, RegistroID, Descripcion )
SELECT 'Inscripciones', 'UPDATE', i.InscripcionID, 'Inscripción modificada del socio: ' + CAST(i.SocioID AS NVARCHAR(10))
FROM inserted i JOIN deleted d ON i.InscripcionID = d.InscripcionID 
WHERE i.Estado <> 'Cancelada' AND (i.Estado <> d.Estado OR i.FechaVencimiento <> d.FechaVencimiento OR i.MembresiaID <> d.MembresiaID);
END;

IF NOT EXISTS (SELECT * FROM inserted) AND EXISTS (SELECT * FROM deleted) 
BEGIN
INSERT INTO Auditoria (Tabla, Operacion, RegistroID, Descripcion)
SELECT 'Inscripciones', 'DELETE', InscripcionID, 'Inscripción eliminada del socio: ' + CAST(SocioID AS NVARCHAR(10))
FROM deleted;
END
END;

--VER AUDITORIA
SELECT * FROM Auditoria
ORDER BY AuditoriaID DESC;

--ELIMINACION DEL TRIGGER
drop trigger trg_auditoria_inscripcion;

--PRUEBA INSERT
INSERT INTO Inscripciones(SocioID,MembresiaID,FechaInicio,FechaVencimiento,Estado)
VALUES (4,1,'2026-05-20','2026-06-20','Activa');

--PRUEBA UPDATE
UPDATE Inscripciones
SET MembresiaID = 2, FechaVencimiento = '2026-09-20'
WHERE InscripcionID = 13;

--PRUEBA DELETE
DELETE FROM Inscripciones
WHERE InscripcionID = 13;


-- Trigger de Validacion
CREATE TRIGGER trg_validacion_inscripcion
ON Asistencias
INSTEAD OF INSERT
AS 
BEGIN
SET NOCOUNT ON;

IF EXISTS (SELECT * FROM inserted i WHERE NOT EXISTS (SELECT 1 FROM Inscripciones ins WHERE ins.SocioID = i.SocioID AND ins.Estado = 'Activa' AND ins.FechaVencimiento >= GETDATE()))
BEGIN

RAISERROR('El socio no tiene una inscripcion activa', 16, 1);
RETURN;
END;

INSERT INTO Asistencias (SocioID, ClaseID, FechaEntrada, FechaSalida)
SELECT SocioID, ClaseID, FechaEntrada, FechaSalida
FROM inserted;
END;

drop trigger trg_validacion_inscripcion;

-------------------------------------------------------------
-- TRIGGER CONTROL DE CUPOS
-------------------------------------------------------------
CREATE TRIGGER trg_Aviso_Cupo_Clase
ON Asistencias
AFTER INSERT
AS
BEGIN

    SET NOCOUNT ON;

    DECLARE @ClaseID INT;
    DECLARE @CupoMaximo INT;
    DECLARE @CantidadActual INT;

    SELECT @ClaseID = ClaseID
    FROM inserted;

    SELECT @CupoMaximo = CupoMaximo
    FROM Clases
    WHERE ClaseID = @ClaseID;

    SELECT @CantidadActual = COUNT(*)
    FROM Asistencias
    WHERE ClaseID = @ClaseID;

    IF @CantidadActual >= (@CupoMaximo * 0.8)
       AND @CantidadActual < @CupoMaximo
    BEGIN

        PRINT 'AVISO: La clase está próxima a llenarse.';

    END;

    IF @CantidadActual = @CupoMaximo
    BEGIN

        PRINT 'AVISO: La clase alcanzó el cupo máximo.';

    END;

    IF @CantidadActual > @CupoMaximo
    BEGIN

        RAISERROR('No hay cupos disponibles para esta clase.',16,1);

        ROLLBACK TRANSACTION;

    END;

END;
GO

-------------------------------------------------------------
-- PRUEBA DEL TRIGGER
-------------------------------------------------------------


INSERT INTO Asistencias
(SocioID, ClaseID, FechaEntrada)
VALUES
(11,7,GETDATE()),
(12,7,GETDATE()),
(13,7,GETDATE()),
(14,7,GETDATE()),
(15,7,GETDATE());

-- SEXTO SOCIO (DEBE FALLAR)

INSERT INTO Asistencias
(SocioID, ClaseID, FechaEntrada)
VALUES
(1,7,GETDATE());