--liquibase formatted sql
--changeset lizandro.alipazaga:202502202304
--comment Se agrega la columna ubigeo_reniec a la tabla personas
ALTER TABLE `audimed2`.`personas` ADD COLUMN `ubigeo_reniec` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL;

--rollback ALTER TABLE personas DROP COLUMN ubigeo_reniec;

--changeset lizandro.alipazaga:202502202305
--comment Se agrega la columna confirmado a la tabla usuarios
ALTER TABLE `audimed2`.`usuarios` ADD COLUMN `confirmado` smallint DEFAULT 0;

--rollback ALTER TABLE usuarios DROP COLUMN confirmado;

--changeset lizandro.alipazaga:202502202306
--comment Se agrega la columna createdat a la tabla auditoria
ALTER TABLE `audimed2`.`auditoria` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;

--rollback ALTER TABLE auditoria DROP COLUMN createdat;

--changeset lizandro.alipazaga:202502202307
--comment Se elimina la columna fcreated de la tabla auditoria
ALTER TABLE `audimed2`.`auditoria` DROP COLUMN `fcreated`;

--rollback ALTER TABLE auditoria ADD COLUMN fcreated datetime DEFAULT CURRENT_TIMESTAMP;