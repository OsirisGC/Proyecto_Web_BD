Drop database if exists noWayHome;
create database noWayHome;
set sql_safe_updates = 0;
use noWayHome;

drop table if exists usuarios;
create table usuarios(
	id int not null primary key auto_increment,
    nombre varchar(20) not null,
    primer_apellido varchar(20) not null,
    segundo_apellido varchar(20) not null,
    email varchar(20) not null,
    nacimiento date not null,
    passkey varchar(40),
    tipo_cuenta varchar(20) not null default 'verified'
)Engine=innodb;

drop table if exists reportes;
create table reportes(
	id	int not null primary key auto_increment,
    titulo varchar(20) not null,
    descripcion varchar(20),
    fecha date,
    ubicacion varchar(20) not null,
    peligro int not null,
    estatus varchar(20) not null default 'enviado'
)Engine=innodb;

drop procedure if exists sp_registrar_usuario;
DELIMITER $$
    create procedure sp_registrar_usuario(IN nombre varchar(20), IN primer_apellido varchar(20),
    IN segundo_apellido varchar(20),IN email varchar(20),IN nacimiento date,IN passkey varchar(20))
	begin 
		insert into usuarios(nombre,primer_apellido,segundo_apellido,email,nacimiento,passkey) values
        (nombre,primer_apellido,segundo_apellido,email,nacimiento,md5(passkey));
    end$$
DELIMITER ; 

drop procedure if exists sp_llenar_reporte;
DELIMITER $$
	
    create procedure sp_llenar_reporte(IN titulo varchar(20), IN descripcion varchar(20),IN fecha datetime, IN ubicacion varchar(20),IN peligro varchar(20))
    begin
		insert into reportes(titulo,descripcion,fecha,ubicacion,peligro) values
        (titulo,descripcion,fecha,ubicacion,peligro);
    end$$

DELIMITER ;

drop procedure if exists sp_select_usuarios;
DELIMITER $$
	create procedure sp_select_usuarios()
    
    begin
		select *
        from usuarios;
    end$$
DELIMITER ;

drop procedure if exists sp_select_reportes;
DELIMITER $$
	create procedure sp_select_reportes()
    
    begin
		select *
        from reportes;
    end$$
DELIMITER ;

drop procedure if exists sp_update_estatus_usuario;
DELIMITER $$
	create procedure sp_update_estatus_usuario(IN id_user int,IN estatus varchar(20))
    begin
		update usuarios
        set tipo_cuenta = estatus
        where id = id_user;
    end $$
DELIMITER ;

drop procedure if exists sp_update_estatus_reportes;
DELIMITER $$
	create procedure sp_update_estatus_reportes(IN id_reporte varchar(20),IN estatus varchar(20))
    begin
		update reportes
        set estatus = estatus
        where id = id_reporte;
    end $$
DELIMITER ;

drop trigger if exists t_validar_email;
DELIMITER $$
create trigger t_validar_email
before insert on usuarios
for each row

begin
	if new.email not like '%_@__%.__%' or '%@%' then
		set	new.email = concat(new.email,"@database.com");
    end if;
end$$ 

DELIMITER ;


-- pruebas!!! no ejecutar con el codigo completo

Call sp_registrar_usuario("Admin","lastname","lastname2","admin@database.com","1970-01-01","root");
call sp_select_usuarios();
call sp_llenar_reporte("zona sur","prueba","2021-01-01","la paz mx",2);
call sp_select_reportes();
call sp_update_estatus_usuario(1,"verified");
call sp_select_usuarios();
call sp_update_estatus_usuario(1,"admin");
call sp_select_usuarios();
call sp_update_estatus_reportes(1,"aceptado");