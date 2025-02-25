--liquibase formatted sql
--changeset lizandro.alipazaga:202502192040
--comment Se crea la tabla mes
CREATE TABLE `mes`  (
  `idmes` smallint NOT NULL AUTO_INCREMENT,
  `mes` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idmes`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE mes;

--changeset lizandro.alipazaga:202502192041
--comment Se insertan datos en la tabla mes
INSERT INTO `mes` VALUES (1, 'ENERO', '1');
INSERT INTO `mes` VALUES (2, 'FEBRERO', '1');
INSERT INTO `mes` VALUES (3, 'MARZO', '1');
INSERT INTO `mes` VALUES (4, 'ABRIL', '1');
INSERT INTO `mes` VALUES (5, 'MAYO', '1');
INSERT INTO `mes` VALUES (6, 'JUNIO', '1');
INSERT INTO `mes` VALUES (7, 'JULIO', '1');
INSERT INTO `mes` VALUES (8, 'AGOSTO', '1');
INSERT INTO `mes` VALUES (9, 'SEPTIEMBRE', '1');
INSERT INTO `mes` VALUES (10, 'OCTUBRE', '1');
INSERT INTO `mes` VALUES (11, 'NOVIEMBRE', '1');
INSERT INTO `mes` VALUES (12, 'DICIEMBRE', '1');

--rollback DELETE FROM mes WHERE idmes <= 12;
