CREATE DATABASE IF NOT EXISTS Ingreso_Registro;
USE Ingreso_Registro;

/**
* Creación de tabla RolUsuario
* Rol 0 = Administrador
* Rol 1 = Empleado
* Rol 2 = Usuario
*/
create table rolusuario(
	rol_id int PRIMARY KEY, 
	rol_desc VARCHAR(15)
);

/**
* Creación de tabla Persona
*/
create table persona(
	pers_id int PRIMARY KEY AUTO_INCREMENT,
	pers_nombres VARCHAR(15), 
	pers_apellidos VARCHAR(30),
	pers_documento VARCHAR(12),
	pers_email VARCHAR(60),
	pers_password VARCHAR(30),
	pers_estado BOOLEAN,
	rol_id int,
	FOREIGN KEY (rol_id) REFERENCES RolUsuario (rol_id)
);

/**
* Creación de tabla Equipo
*/
create table equipo(
	equ_id int PRIMARY KEY AUTO_INCREMENT, 
	equ_marca VARCHAR(15), 
	equ_serial VARCHAR(30),
	equ_fecha_ingreso DATETIME NOT NULL, 
	equ_fecha_salida DATETIME NOT NULL,
	equ_estado BOOLEAN,
	pers_id int,
	FOREIGN KEY (pers_id) REFERENCES Persona (pers_id)
);

INSERT INTO rolusuario (rol_id,rol_desc) VALUES (0,'Administrador');
INSERT INTO rolusuario (rol_id,rol_desc) VALUES (1,'Empleado');
INSERT INTO rolusuario (rol_id,rol_desc) VALUES (2,'Usuario');

INSERT INTO persona (pers_id,pers_nombres,pers_apellidos,pers_documento,pers_email,pers_password,pers_estado,rol_id) VALUES (
	NULL,'Carlos','Ballarta','1000103641','carBalla@outlook.com','Cami12345',1,1
);

INSERT INTO equipo (equ_id,equ_marca,equ_serial,equ_fecha_ingreso,equ_fecha_salida,equ_estado,pers_id) VALUES (
	NULL,'ASUS','ROG0114','2019-06-24 07:50:47','2019-06-24 16:45:47',1,1
);
INSERT INTO equipo (equ_id, equ_marca, equ_serial, equ_fecha_ingreso, equ_fecha_salida, equ_estado,pers_id) VALUES (
	NULL, 'ASUS', 'ROB1458', '2019-06-14 07:09:10', '2019-06-14 15:08:15',1,1
);