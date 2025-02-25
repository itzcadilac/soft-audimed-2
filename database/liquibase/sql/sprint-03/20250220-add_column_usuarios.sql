--liquibase formatted sql
--changeset lizandro.alipazaga:202502202155
--comment Se actualiza la tabla usuarios agregando nuevas columnas
ALTER TABLE `audimed2`.`usuarios` ADD COLUMN `email` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`usuarios` ADD COLUMN `movil` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`usuarios` ADD COLUMN `idle_sesion` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`usuarios` ADD COLUMN `fcreated` datetime NULL;
ALTER TABLE `audimed2`.`usuarios` ADD COLUMN `fupdated` datetime NULL;
ALTER TABLE `audimed2`.`usuarios` ADD COLUMN `fconfirm` datetime NULL;
ALTER TABLE `audimed2`.`usuarios` ADD COLUMN `flastpwd` datetime NULL;
ALTER TABLE `audimed2`.`usuarios` ADD COLUMN `flastmov` datetime NULL;
ALTER TABLE `audimed2`.`usuarios` ADD COLUMN `flastaccess` datetime NULL;

--rollback ALTER TABLE `audimed2`.`usuarios` DROP COLUMN `email`;
--rollback ALTER TABLE `audimed2`.`usuarios` DROP COLUMN `email`;
--rollback ALTER TABLE `audimed2`.`usuarios` DROP COLUMN `movil`;
--rollback ALTER TABLE `audimed2`.`usuarios` DROP COLUMN `idle_sesion`;
--rollback ALTER TABLE `audimed2`.`usuarios` DROP COLUMN `fcreated`;
--rollback ALTER TABLE `audimed2`.`usuarios` DROP COLUMN `fupdated`;
--rollback ALTER TABLE `audimed2`.`usuarios` DROP COLUMN `fconfirm`;
--rollback ALTER TABLE `audimed2`.`usuarios` DROP COLUMN `flastpwd`;
--rollback ALTER TABLE `audimed2`.`usuarios` DROP COLUMN `flastmov`;
--rollback ALTER TABLE `audimed2`.`usuarios` DROP COLUMN `flastaccess`;