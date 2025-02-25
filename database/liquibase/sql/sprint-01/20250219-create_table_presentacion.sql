--liquibase formatted sql
--changeset lizandro.alipazaga:202502192125
--comment Se crea la tabla presentacion
CREATE TABLE `presentacion`  (
  `idpresentacion` smallint NOT NULL AUTO_INCREMENT,
  `presentacion` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idpresentacion`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE presentacion;

--changeset lizandro.alipazaga:202502192126
--comment Se insertan datos en la tabla presentacion
INSERT INTO `presentacion` VALUES (1, 'NO ESPECIFICA', '1');
INSERT INTO `presentacion` VALUES (2, 'AMPOLLA', '1');
INSERT INTO `presentacion` VALUES (3, 'CAJA', '1');
INSERT INTO `presentacion` VALUES (4, 'CAPSULA', '1');
INSERT INTO `presentacion` VALUES (5, 'FRASCO', '1');
INSERT INTO `presentacion` VALUES (6, 'GALON', '1');
INSERT INTO `presentacion` VALUES (7, 'GRAMOS', '1');
INSERT INTO `presentacion` VALUES (8, 'LITROS', '1');
INSERT INTO `presentacion` VALUES (9, 'MILILITROS', '1');
INSERT INTO `presentacion` VALUES (10, 'PAQUETE', '1');
INSERT INTO `presentacion` VALUES (11, 'TABLETA', '1');
INSERT INTO `presentacion` VALUES (12, 'TIRA', '1');
INSERT INTO `presentacion` VALUES (13, 'UNIDAD', '1');

--rollback DELETE FROM presentacion WHERE idpresentacion <= 13;
