create database jj;
use jj;

create table usuarios(
	id int(10) primary key auto_increment,
    correo varchar(100) not null,
    nombre varchar(50),
    apellido varchar(50),
    codigo enum('1', '2', '3') not null
);

select * from usuarios;