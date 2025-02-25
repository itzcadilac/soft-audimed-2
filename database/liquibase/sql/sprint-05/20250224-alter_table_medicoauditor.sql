--liquibase formatted sql
--changeset lizandro.alipazaga:202502242213
--comment Se modifica la tabla medicoauditor
ALTER TABLE `medicoauditor` 
DROP COLUMN `usuario`,
DROP COLUMN `passwordmed`,
DROP COLUMN `fax`,
DROP COLUMN `nombres`,
DROP COLUMN `apellidos`,
DROP COLUMN `telefono`,
DROP COLUMN `direccion`,
DROP COLUMN `lugar`,
DROP COLUMN `celular`,
DROP COLUMN `email`;

ALTER TABLE `medicoauditor` ADD COLUMN `idusuario` int NULL AFTER `medicoauditorid`;

--rollback ALTER TABLE `medicoauditor` ADD COLUMN `usuario` varchar(50) DEFAULT NULL;
--rollback ALTER TABLE `medicoauditor` ADD COLUMN `passwordmed` varchar(250) DEFAULT NULL;
--rollback ALTER TABLE `medicoauditor` ADD COLUMN `fax` varchar(50) DEFAULT NULL;
--rollback ALTER TABLE `medicoauditor` ADD COLUMN `nombres` varchar(100) DEFAULT NULL;
--rollback ALTER TABLE `medicoauditor` ADD COLUMN `apellidos` varchar(100) DEFAULT NULL;
--rollback ALTER TABLE `medicoauditor` ADD COLUMN `telefono` varchar(50) DEFAULT NULL;
--rollback ALTER TABLE `medicoauditor` ADD COLUMN `direccion` varchar(200) DEFAULT NULL;
--rollback ALTER TABLE `medicoauditor` ADD COLUMN `lugar` varchar(50) DEFAULT NULL;
--rollback ALTER TABLE `medicoauditor` ADD COLUMN `celular` varchar(50) DEFAULT NULL;
--rollback ALTER TABLE `medicoauditor` ADD COLUMN `email` varchar(200) DEFAULT NULL;
--rollback ALTER TABLE `medicoauditor` DROP COLUMN `idusuario`;