--liquibase formatted sql
--changeset lizandro.alipazaga:202502202314
--comment Se agregan columnas a la tabla notificaciones
ALTER TABLE `audimed2`.`notificaciones` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`notificaciones` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`notificaciones` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`notificaciones` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE notificaciones DROP COLUMN createdat;
--rollback ALTER TABLE notificaciones DROP COLUMN updatedat;
--rollback ALTER TABLE notificaciones DROP COLUMN createdby;
--rollback ALTER TABLE notificaciones DROP COLUMN updatedby;

--changeset lizandro.alipazaga:202502202315
--comment Se eliminan columnas de la tabla notificaciones
ALTER TABLE `audimed2`.`notificaciones` DROP COLUMN `fcreated`;
ALTER TABLE `audimed2`.`notificaciones` DROP COLUMN `fupdated`;

--rollback ALTER TABLE notificaciones ADD COLUMN fcreated datetime DEFAULT CURRENT_TIMESTAMP;
--rollback ALTER TABLE notificaciones ADD COLUMN fupdated datetime DEFAULT CURRENT_TIMESTAMP;

--changeset lizandro.alipazaga:202502202316
--comment Se agregan columnas a la tabla producto
ALTER TABLE `audimed2`.`producto` ADD COLUMN `codeproducto` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `audimed2`.`producto` ADD COLUMN `orden` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`producto` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`producto` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`producto` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`producto` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`producto` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`producto` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`producto` DROP COLUMN `codeproducto`;
--rollback ALTER TABLE `audimed2`.`producto` DROP COLUMN `orden`;
--rollback ALTER TABLE `audimed2`.`producto` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`producto` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`producto` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`producto` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`producto` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`producto` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502202317
--comment Se eliminan columnas de la tabla producto
ALTER TABLE `audimed2`.`producto` DROP COLUMN `fechaultmod`;
ALTER TABLE `audimed2`.`producto` DROP COLUMN `usuarioreg`;

--rollback ALTER TABLE producto ADD COLUMN fechaultmod datetime DEFAULT CURRENT_TIMESTAMP;
--rollback ALTER TABLE producto ADD COLUMN usuarioreg varchar(100) NOT NULL;

--changeset lizandro.alipazaga:202502202318
--comment Se trunca la tabla producto
TRUNCATE TABLE producto;

--rollback INSERT INTO audimed2.producto VALUES(1, 'SOAT', 1, 'SOAT', 1, 0, 0, '2025-02-20 23:35:01.000', NULL, NULL, NULL);
--rollback INSERT INTO audimed2.producto VALUES(2, 'AP', 1, 'AP', 1, 0, 0, '2025-02-20 23:35:01.000', NULL, NULL, NULL);
--rollback INSERT INTO audimed2.producto VALUES(3, 'SCTR', 1, 'SCTR', 1, 0, 0, '2025-02-20 23:35:01.000', NULL, NULL, NULL);
--rollback INSERT INTO audimed2.producto VALUES(4, 'OTROS', 1, 'OTROS', 1, 0, 0, '2025-02-20 23:35:01.000', NULL, NULL, NULL);

--changeset lizandro.alipazaga:202502202319
--comment Se modifica la tabla producto
ALTER TABLE `audimed2`.`producto` ADD UNIQUE (codeproducto);

--rollback ALTER TABLE `audimed2`.`producto` DROP INDEX `codeproducto`;

--changeset lizandro.alipazaga:202502202320
--comment Se insertan datos en la tabla producto
insert into producto (activo, codeproducto, descripcion, orden) 
values 
(1, 'SOAT', 'SEGURO OBLIGATORIO ACCIDENTES TRANSITO', 1),
(1, 'ACP', 'ACCIDENTES PERSONALES', 3),
(1, 'SCTR', 'SEGURO COMPLEMENTARIO DE TRABAJO DE RIESGO', 5),
(1, 'SEVEH', 'SEGUROS VEHICULARES', 2);

--rollback DELETE FROM producto WHERE codeproducto IN ('SOAT', 'ACP', 'SCTR', 'SEVEH');