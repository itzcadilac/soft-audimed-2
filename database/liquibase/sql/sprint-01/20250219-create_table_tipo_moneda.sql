--liquibase formatted sql
--changeset lizandro.alipazaga:202502192060
--comment Se crea la tabla tipo_moneda
CREATE TABLE `tipo_moneda`  (
  `idtipomoneda` smallint NOT NULL AUTO_INCREMENT,
  `tipo_moneda` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `simbolo` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idtipomoneda`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE tipo_moneda;

--changeset lizandro.alipazaga:202502192100
--comment Se insertan datos en la tabla tipo_moneda
INSERT INTO `tipo_moneda` VALUES (1, 'SOLES', 'S/.', '1');
INSERT INTO `tipo_moneda` VALUES (2, 'DOLARES', 'US$', '1');
INSERT INTO `tipo_moneda` VALUES (3, 'EURO', 'EUR', '1');

--rollback DELETE FROM tipo_moneda;
