--liquibase formatted sql
--changeset lizandro.alipazaga:202502201831
--comment Se agrega la columna firma a la tabla medicoauditor
ALTER TABLE `audimed2`.`medicoauditor` 
ADD COLUMN `firma` varchar(255) NULL AFTER `email`;

--rollback ALTER TABLE medicoauditor DROP COLUMN firma;