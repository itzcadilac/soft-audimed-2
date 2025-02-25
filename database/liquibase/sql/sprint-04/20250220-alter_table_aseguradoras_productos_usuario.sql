--liquibase formatted sql
--changeset lizandro.alipazaga:202502202344
--comment Se agregan columnas a la tabla aseguradora
ALTER TABLE `audimed2`.`aseguradora` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`aseguradora` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`aseguradora` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`aseguradora` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`aseguradora` DROP COLUMN createdat;
--rollback ALTER TABLE `audimed2`.`aseguradora` DROP COLUMN updatedat;
--rollback ALTER TABLE `audimed2`.`aseguradora` DROP COLUMN createdby;
--rollback ALTER TABLE `audimed2`.`aseguradora` DROP COLUMN updatedby;

--changeset lizandro.alipazaga:202502202345
--comment Se agregan columnas a la tabla aseguradora_producto
ALTER TABLE `audimed2`.`aseguradora_producto` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`aseguradora_producto` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`aseguradora_producto` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`aseguradora_producto` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`aseguradora_producto` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`aseguradora_producto` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`aseguradora_producto` DROP COLUMN eliminado;
--rollback ALTER TABLE `audimed2`.`aseguradora_producto` DROP COLUMN estadoreg;
--rollback ALTER TABLE `audimed2`.`aseguradora_producto` DROP COLUMN createdat;
--rollback ALTER TABLE `audimed2`.`aseguradora_producto` DROP COLUMN updatedat;
--rollback ALTER TABLE `audimed2`.`aseguradora_producto` DROP COLUMN createdby;
--rollback ALTER TABLE `audimed2`.`aseguradora_producto` DROP COLUMN updatedby;

--changeset lizandro.alipazaga:202502202346
--comment Se eliminan columnas de la tabla aseguradora_producto
ALTER TABLE `audimed2`.`aseguradora_producto` DROP COLUMN `fechaultmod`;
ALTER TABLE `audimed2`.`aseguradora_producto` DROP COLUMN `usuarioreg`;

--rollback ALTER TABLE aseguradora_producto ADD COLUMN fechaultmod datetime DEFAULT CURRENT_TIMESTAMP;
--rollback ALTER TABLE aseguradora_producto ADD COLUMN usuarioreg varchar(100) NOT NULL;

--changeset lizandro.alipazaga:202502202347
--comment Se agregan columnas a la tabla usuario_aseguradora
ALTER TABLE `audimed2`.`usuario_aseguradora` ADD COLUMN `productos` varchar(240) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`usuario_aseguradora` ADD COLUMN `activo` smallint DEFAULT 1;
ALTER TABLE `audimed2`.`usuario_aseguradora` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`usuario_aseguradora` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`usuario_aseguradora` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`usuario_aseguradora` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`usuario_aseguradora` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`usuario_aseguradora` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`usuario_aseguradora` DROP COLUMN productos;
--rollback ALTER TABLE `audimed2`.`usuario_aseguradora` DROP COLUMN activo;
--rollback ALTER TABLE `audimed2`.`usuario_aseguradora` DROP COLUMN eliminado;
--rollback ALTER TABLE `audimed2`.`usuario_aseguradora` DROP COLUMN estadoreg;
--rollback ALTER TABLE `audimed2`.`usuario_aseguradora` DROP COLUMN createdat;
--rollback ALTER TABLE `audimed2`.`usuario_aseguradora` DROP COLUMN updatedat;
--rollback ALTER TABLE `audimed2`.`usuario_aseguradora` DROP COLUMN createdby;
--rollback ALTER TABLE `audimed2`.`usuario_aseguradora` DROP COLUMN updatedby;

--changeset lizandro.alipazaga:202502202348
--comment Se eliminan columnas de la tabla aseguradora_producto
ALTER TABLE `audimed2`.`usuario_aseguradora` DROP COLUMN `feccreacion`;
ALTER TABLE `audimed2`.`usuario_aseguradora` DROP COLUMN `fecmodificacion`;
ALTER TABLE `audimed2`.`usuario_aseguradora` DROP COLUMN `estado`;

--rollback ALTER TABLE usuario_aseguradora ADD COLUMN feccreacion datetime DEFAULT CURRENT_TIMESTAMP;
--rollback ALTER TABLE usuario_aseguradora ADD COLUMN fecmodificacion datetime DEFAULT CURRENT_TIMESTAMP;
--rollback ALTER TABLE usuario_aseguradora ADD COLUMN estado int(11) DEFAULT NULL;