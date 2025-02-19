--liquibase formatted sql
--changeset lizandro.alipazaga:202502191132
--comment Se crea la tabla centro costos

CREATE TABLE `centro_costos`  (
  `idcentro` smallint NOT NULL AUTO_INCREMENT,
  `idempresa` smallint NOT NULL,
  `centro_costos` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idcentro`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE centro_costos;

--changeset lizandro.alipazaga:202502191133 
--comment Se insertan datos en la tabla centro costos
INSERT INTO `centro_costos` VALUES (1, 1, 'GERENCIA', '1');
INSERT INTO `centro_costos` VALUES (2, 2, 'GERENCIA', '1');

--rollback DELETE FROM centro_costos WHERE idcentro IN (1, 2);