--liquibase formatted sql
--changeset lizandro.alipazaga:202502192056
--comment Se crea la tabla tipo_cuenta
CREATE TABLE `tipo_cuenta`  (
  `idtipocuenta` smallint NOT NULL AUTO_INCREMENT,
  `tipo_cuenta` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idtipocuenta`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE tipo_cuenta;

--changeset lizandro.alipazaga:202502192057
--comment Se insertan datos en la tabla tipo_cuenta
INSERT INTO `tipo_cuenta` VALUES (1, 'CUENTA DE AHORROS', '1');
INSERT INTO `tipo_cuenta` VALUES (2, 'CUENTA CORRIENTE', '1');
INSERT INTO `tipo_cuenta` VALUES (3, 'CUENTA A PLAZO FIJO', '1');
INSERT INTO `tipo_cuenta` VALUES (4, 'CUENTA SUELDO', '1');
INSERT INTO `tipo_cuenta` VALUES (5, 'CUENTA CTS', '1');

--rollback DELETE FROM tipo_cuenta WHERE idtipocuenta <= 5;
