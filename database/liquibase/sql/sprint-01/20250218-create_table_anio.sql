--liquibase formatted sql
--changeset lizandro.alipazaga:202502181129 
--comment Se crea la tabla anio
CREATE TABLE `anio`  (
  `idanio` smallint NOT NULL AUTO_INCREMENT,
  `anio` smallint NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idanio`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE anio;

--changeset lizandro.alipazaga:202502181130 
--comment Se insertan datos en la tabla anio
INSERT INTO `anio` VALUES (1, 2025, '1');

--rollback DELETE FROM anio WHERE idanio IN (1);