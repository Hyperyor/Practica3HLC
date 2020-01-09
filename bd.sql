CREATE TABLE usuario (
    nombre varchar(100) NOT NULL,
    apellido varchar(100),
    email varchar(100) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
	victorias INT,
	derrotas INT,
    PRIMARY KEY (email)   
);
