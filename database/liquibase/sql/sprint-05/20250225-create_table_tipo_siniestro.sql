--liquibase formatted sql
--changeset lizandro.alipazaga:202502251004
--comment Se crea la tabla tipo_siniestro
CREATE TABLE `tipo_siniestro`  (
  `idtiposiniestro` bigint NOT NULL AUTO_INCREMENT,
  `tipo_siniestro` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `orden` smallint DEFAULT 0,
  `activo` smallint NULL DEFAULT 1,
  `eliminado` smallint NULL DEFAULT 0,
  `estadoreg` smallint NULL DEFAULT 0,
  `createdat` datetime NULL DEFAULT current_timestamp,
  `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idtiposiniestro`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE tipo_siniestro;

--changeset lizandro.alipazaga:202502251005
--comment Se insertan datos en la tabla tipo_siniestro
INSERT INTO `tipo_siniestro` (idtiposiniestro, tipo_siniestro) VALUES (1, 'ATROPELLO');
INSERT INTO `tipo_siniestro` (idtiposiniestro, tipo_siniestro) VALUES (2, 'CHOQUE CON LESIONES');
INSERT INTO `tipo_siniestro` (idtiposiniestro, tipo_siniestro) VALUES (3, 'VANDALISMO');
INSERT INTO `tipo_siniestro` (idtiposiniestro, tipo_siniestro) VALUES (4, 'DESPISTE CON LESIONES');
INSERT INTO `tipo_siniestro` (idtiposiniestro, tipo_siniestro) VALUES (5, 'INCENDIO Y/O EXPLOSION');
INSERT INTO `tipo_siniestro` (idtiposiniestro, tipo_siniestro) VALUES (6, 'VUELCO CON LESIONES');
INSERT INTO `tipo_siniestro` (idtiposiniestro, tipo_siniestro) VALUES (7, 'TERRORISMO');
INSERT INTO `tipo_siniestro` (idtiposiniestro, tipo_siniestro) VALUES (8, 'CAUSAS DIVERSAS SOAT');
INSERT INTO `tipo_siniestro` (idtiposiniestro, tipo_siniestro) VALUES (9, 'CAIDA DE OCUPANTE');
INSERT INTO `tipo_siniestro` (idtiposiniestro, tipo_siniestro) VALUES (10, 'ACCIDENTE PERSONAL');
INSERT INTO `tipo_siniestro` (idtiposiniestro, tipo_siniestro) VALUES (11, 'CAIDA DE OBJETOS');

--rollback DELETE FROM tipo_siniestro WHERE idtiposiniestro IN (1,2,3,4,5,6,7,8,9,10,11);
