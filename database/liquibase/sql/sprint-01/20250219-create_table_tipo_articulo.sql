--liquibase formatted sql
--changeset lizandro.alipazaga:202502192051
--comment Se crea la tabla tipo_articulo
CREATE TABLE `tipo_articulo`  (
  `idtipoarticulo` smallint NOT NULL AUTO_INCREMENT,
  `tipo_articulo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idtipoarticulo`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE tipo_articulo;

--changeset lizandro.alipazaga:202502192052
--comment Se insertan datos en la tabla tipo_articulo
INSERT INTO `tipo_articulo` VALUES (1, 'NO CLASIFICADOS', '1');
INSERT INTO `tipo_articulo` VALUES (2, 'ACTIVOS FIJOS', '1');
INSERT INTO `tipo_articulo` VALUES (3, 'APOSITOS', '1');
INSERT INTO `tipo_articulo` VALUES (4, 'BIGUTERIA', '1');
INSERT INTO `tipo_articulo` VALUES (5, 'COSMETICOS', '1');
INSERT INTO `tipo_articulo` VALUES (6, 'DESCARTABLES', '1');
INSERT INTO `tipo_articulo` VALUES (7, 'FARMACOS', '1');
INSERT INTO `tipo_articulo` VALUES (8, 'GALENICOS', '1');
INSERT INTO `tipo_articulo` VALUES (9, 'INSECTICIDAS', '1');
INSERT INTO `tipo_articulo` VALUES (10, 'INSUMOS', '1');
INSERT INTO `tipo_articulo` VALUES (11, 'INSUMOS QUIMICOS', '1');
INSERT INTO `tipo_articulo` VALUES (12, 'MATERIAL QUIRURGICO', '1');
INSERT INTO `tipo_articulo` VALUES (13, 'MATERIALES', '1');
INSERT INTO `tipo_articulo` VALUES (14, 'MEDICAMENTOS GENERICOS', '1');
INSERT INTO `tipo_articulo` VALUES (15, 'MEDICAMENTOS HOMEOPATICOS', '1');
INSERT INTO `tipo_articulo` VALUES (16, 'OFICINA', '1');
INSERT INTO `tipo_articulo` VALUES (17, 'OPTICA', '1');
INSERT INTO `tipo_articulo` VALUES (18, 'ORTESICO', '1');
INSERT INTO `tipo_articulo` VALUES (19, 'OTROS', '1');
INSERT INTO `tipo_articulo` VALUES (20, 'PERFUMERIA', '1');
INSERT INTO `tipo_articulo` VALUES (21, 'PRODUCTOS DE TOCADOR', '1');
INSERT INTO `tipo_articulo` VALUES (22, 'PRODUCTOS LACTEOS', '1');
INSERT INTO `tipo_articulo` VALUES (23, 'PRODUCTOS PARA BEBE', '1');
INSERT INTO `tipo_articulo` VALUES (24, 'REACTIVOS', '1');
INSERT INTO `tipo_articulo` VALUES (25, 'VITAMINAS', '1');

--rollback DELETE FROM tipo_articulo WHERE idtipoarticulo <= 25;
