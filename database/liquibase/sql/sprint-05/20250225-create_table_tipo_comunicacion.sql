--liquibase formatted sql
--changeset lizandro.alipazaga:202502250955
--comment Se crea la tabla tipo_comunicacion
CREATE TABLE `tipo_comunicacion`  (
  `idtipocomunica` bigint NOT NULL AUTO_INCREMENT,
  `tipo_comunica` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` smallint NULL DEFAULT 1,
  `eliminado` smallint NULL DEFAULT 0,
  `estadoreg` smallint NULL DEFAULT 0,
  `createdat` datetime NULL DEFAULT current_timestamp,
  `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idtipocomunica`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE tipo_comunicacion;

--changeset lizandro.alipazaga:202502250956
--comment Se insertan datos en la tabla tipo_comunicacion
INSERT INTO `tipo_comunicacion` (idtipocomunica, tipo_comunica) VALUES (1, 'EMAIL');
INSERT INTO `tipo_comunicacion` (idtipocomunica, tipo_comunica) VALUES (2, 'LLAMADA');
INSERT INTO `tipo_comunicacion` (idtipocomunica, tipo_comunica) VALUES (3, 'VISITA');

--rollback DELETE FROM tipo_comunicacion WHERE idtipocomunica IN (1,2,3);
