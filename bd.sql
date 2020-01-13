CREATE TABLE usuario (
    nombre varchar(100) NOT NULL,
    apellido varchar(100),
    email varchar(100) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
	victorias INT,
	derrotas INT,
    PRIMARY KEY (email)   
);

create table palabras
(
    palabra varchar(50) not null
);

insert into palabras values('primo');
insert into palabras values('ejemplo');
insert into palabras values('programacion');
insert into palabras values('dormir');
