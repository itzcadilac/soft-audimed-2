--liquibase formatted sql
--changeset lizandro.alipazaga:202502241948
--comment Se agregan columnas a la tabla usuarios
ALTER TABLE `audimed2`.`usuarios` ADD COLUMN `retry` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`usuarios` ADD COLUMN `fretry` datetime;

--rollback ALTER TABLE `audimed2`.`usuarios` DROP COLUMN `retry`;
--rollback ALTER TABLE `audimed2`.`usuarios` DROP COLUMN `fretry`;

--changeset lizandro.alipazaga:202502241950
--comment Se actualiza el campo fretry
update `audimed2`.`usuarios` set fretry = null;

--rollback update `audimed2`.`usuarios` set fretry = null;

--changeset lizandro.alipazaga:202502241953
--comment Se agregan datos de prueba a la tabla usuario_aseguradora
INSERT INTO audimed2.usuario_aseguradora
(idaseguradora, idusuario, productos, activo, eliminado, estadoreg, createdat, updatedat, createdby, updatedby)
VALUES(1, 12, 'SOAT,ACP,SCTR', 1, 0, 0, current_timestamp(), NULL, NULL, NULL);

INSERT INTO audimed2.usuario_aseguradora
(idaseguradora, idusuario, productos, activo, eliminado, estadoreg, createdat, updatedat, createdby, updatedby)
VALUES(2, 12, 'SOAT,ACP', 1, 0, 0, current_timestamp(), NULL, NULL, NULL);

INSERT INTO audimed2.usuario_aseguradora
(idaseguradora, idusuario, productos, activo, eliminado, estadoreg, createdat, updatedat, createdby, updatedby)
VALUES(3, 12, 'SOAT,SEVEH', 1, 0, 0, current_timestamp(), NULL, NULL, NULL);

INSERT INTO audimed2.usuario_aseguradora
(idaseguradora, idusuario, productos, activo, eliminado, estadoreg, createdat, updatedat, createdby, updatedby)
VALUES(1, 11, 'SOAT,ACP,SCTR', 1, 0, 0, current_timestamp(), NULL, NULL, NULL);

--rollback DELETE FROM audimed2.usuario_aseguradora WHERE idaseguradora = 1 AND idusuario = 12;
--rollback DELETE FROM audimed2.usuario_aseguradora WHERE idaseguradora = 2 AND idusuario = 12;
--rollback DELETE FROM audimed2.usuario_aseguradora WHERE idaseguradora = 3 AND idusuario = 12;
--rollback DELETE FROM audimed2.usuario_aseguradora WHERE idaseguradora = 1 AND idusuario = 11;