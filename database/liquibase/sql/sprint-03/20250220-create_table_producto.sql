--liquibase formatted sql
--changeset lizandro.alipazaga:202502202204
--comment Se crea la tabla producto
create table producto
(
	idproducto INT AUTO_INCREMENT PRIMARY KEY,
	descripcion varchar(150) not null,
	activo int(1) not null,
	fechaultmod datetime default current_timestamp,
	usuarioreg varchar(100) not null
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE producto;

--changeset lizandro.alipazaga:202502202205
--comment Se insertan datos en la tabla producto
insert into producto (idproducto, descripcion,activo,usuarioreg) values (1, 'SOAT',1,'RJUAREZ');
insert into producto (idproducto, descripcion,activo,usuarioreg) values (2, 'AP',1,'RJUAREZ');
insert into producto (idproducto, descripcion,activo,usuarioreg) values (3, 'SCTR',1,'RJUAREZ');
insert into producto (idproducto, descripcion,activo,usuarioreg) values (4, 'OTROS',1,'RJUAREZ');

--rollback DELETE FROM producto WHERE idproducto IN (1,2,3,4)
