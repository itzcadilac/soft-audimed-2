--liquibase formatted sql
--changeset lizandro.alipazaga:202502192101
--comment Se crea la tabla tipo_movimiento
CREATE TABLE `tipo_movimiento`  (
  `idtipomovimiento` smallint NOT NULL AUTO_INCREMENT,
  `tipo_movimiento` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `factor` smallint NULL DEFAULT 0,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idtipomovimiento`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE tipo_movimiento;

--changeset lizandro.alipazaga:202502192102
--comment Se insertan datos en la tabla tipo_movimiento
INSERT INTO `tipo_movimiento` VALUES (1, 'INVENTARIO INICIAL', 1, '1');
INSERT INTO `tipo_movimiento` VALUES (2, 'AJUSTE POSITIVO', 1, '1');
INSERT INTO `tipo_movimiento` VALUES (3, 'AJUSTE NEGATIVO', -1, '1');
INSERT INTO `tipo_movimiento` VALUES (4, 'ENTRADA ALMACEN', 1, '1');
INSERT INTO `tipo_movimiento` VALUES (5, 'SALIDA ALMACEN', -1, '1');
INSERT INTO `tipo_movimiento` VALUES (6, 'VENTA DE ARTICULOS', -1, '1');
INSERT INTO `tipo_movimiento` VALUES (7, 'COMPRA DE ARTICULOS', 1, '1');
INSERT INTO `tipo_movimiento` VALUES (8, 'SALIDA POR PRESTAMO', -1, '1');
INSERT INTO `tipo_movimiento` VALUES (9, 'REPOSICION POR PRESTAMO', 1, '1');

--rollback DELETE FROM tipo_movimiento WHERE idtipomovimiento <= 9;
