--liquibase formatted sql
--changeset lizandro.alipazaga:202502202207
--comment Se crea la tabla aseguradora_producto
create table aseguradora_producto (
  idaseguradora int(6) not null,
  idproducto int(6) not null,
  activo int(1) not null,
  fechaultmod datetime DEFAULT current_timestamp,
  usuarioreg varchar(100) not null
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE aseguradora_producto;

--changeset lizandro.alipazaga:202502202208
--comment Se insertan datos en la tabla aseguradora_producto
INSERT INTO audimed2.aseguradora_producto (idaseguradora, idproducto, activo, usuarioreg) VALUES(1, 1, 1, 'RJUAREZ');
INSERT INTO audimed2.aseguradora_producto (idaseguradora, idproducto, activo, usuarioreg) VALUES(1, 2, 1, 'RJUAREZ');
INSERT INTO audimed2.aseguradora_producto (idaseguradora, idproducto, activo, usuarioreg) VALUES(1, 3, 1, 'RJUAREZ');
INSERT INTO audimed2.aseguradora_producto (idaseguradora, idproducto, activo, usuarioreg) VALUES(1, 4, 1, 'RJUAREZ');
INSERT INTO audimed2.aseguradora_producto (idaseguradora, idproducto, activo, usuarioreg) VALUES(2, 1, 1, 'RJUAREZ');
INSERT INTO audimed2.aseguradora_producto (idaseguradora, idproducto, activo, usuarioreg) VALUES(2, 2, 1, 'RJUAREZ');
INSERT INTO audimed2.aseguradora_producto (idaseguradora, idproducto, activo, usuarioreg) VALUES(2, 3, 1, 'RJUAREZ');
INSERT INTO audimed2.aseguradora_producto (idaseguradora, idproducto, activo, usuarioreg) VALUES(2, 4, 1, 'RJUAREZ');
INSERT INTO audimed2.aseguradora_producto (idaseguradora, idproducto, activo, usuarioreg) VALUES(3, 1, 1, 'RJUAREZ');
INSERT INTO audimed2.aseguradora_producto (idaseguradora, idproducto, activo, usuarioreg) VALUES(3, 2, 1, 'RJUAREZ');
INSERT INTO audimed2.aseguradora_producto (idaseguradora, idproducto, activo, usuarioreg) VALUES(3, 3, 1, 'RJUAREZ');
INSERT INTO audimed2.aseguradora_producto (idaseguradora, idproducto, activo, usuarioreg) VALUES(3, 4, 1, 'RJUAREZ');

--rollback DELETE FROM audimed2.aseguradora_producto WHERE idaseguradora = 1 AND idproducto = 1 AND activo = 1 AND usuarioreg = 'RJUAREZ';
--rollback DELETE FROM audimed2.aseguradora_producto WHERE idaseguradora = 1 AND idproducto = 2 AND activo = 1 AND usuarioreg = 'RJUAREZ';
--rollback DELETE FROM audimed2.aseguradora_producto WHERE idaseguradora = 1 AND idproducto = 3 AND activo = 1 AND usuarioreg = 'RJUAREZ';
--rollback DELETE FROM audimed2.aseguradora_producto WHERE idaseguradora = 1 AND idproducto = 4 AND activo = 1 AND usuarioreg = 'RJUAREZ';
--rollback DELETE FROM audimed2.aseguradora_producto WHERE idaseguradora = 2 AND idproducto = 1 AND activo = 1 AND usuarioreg = 'RJUAREZ';
--rollback DELETE FROM audimed2.aseguradora_producto WHERE idaseguradora = 2 AND idproducto = 2 AND activo = 1 AND usuarioreg = 'RJUAREZ';
--rollback DELETE FROM audimed2.aseguradora_producto WHERE idaseguradora = 2 AND idproducto = 3 AND activo = 1 AND usuarioreg = 'RJUAREZ';
--rollback DELETE FROM audimed2.aseguradora_producto WHERE idaseguradora = 2 AND idproducto = 4 AND activo = 1 AND usuarioreg = 'RJUAREZ';
--rollback DELETE FROM audimed2.aseguradora_producto WHERE idaseguradora = 3 AND idproducto = 1 AND activo = 1 AND usuarioreg = 'RJUAREZ';
--rollback DELETE FROM audimed2.aseguradora_producto WHERE idaseguradora = 3 AND idproducto = 2 AND activo = 1 AND usuarioreg = 'RJUAREZ';
--rollback DELETE FROM audimed2.aseguradora_producto WHERE idaseguradora = 3 AND idproducto = 3 AND activo = 1 AND usuarioreg = 'RJUAREZ';
--rollback DELETE FROM audimed2.aseguradora_producto WHERE idaseguradora = 3 AND idproducto = 4 AND activo = 1 AND usuarioreg = 'RJUAREZ';