--liquibase formatted sql
--changeset lizandro.alipazaga:202502192047
--comment Se crea la tabla ss_tipo_producto_farmacia
CREATE TABLE `ss_tipo_producto_farmacia`  (
  `idtipoproductofarmacia` smallint NOT NULL AUTO_INCREMENT,
  `codigo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tipo_producto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idtipoproductofarmacia`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE ss_tipo_producto_farmacia;

--changeset lizandro.alipazaga:202502192048
--comment Se insertan datos en la tabla ss_tipo_producto_farmacia
INSERT INTO `ss_tipo_producto_farmacia` VALUES (1, 'A', 'SUPLEMENTO ALIMENTICIO', '1');
INSERT INTO `ss_tipo_producto_farmacia` VALUES (2, 'B', 'PRODUCTOS SANITARIOS O COSMETICOS', '1');
INSERT INTO `ss_tipo_producto_farmacia` VALUES (3, 'I', 'INSUMO, MATERIAL, DISPOSITIVO MEDICO O PROTESIS', '1');
INSERT INTO `ss_tipo_producto_farmacia` VALUES (4, 'M', 'MEDICAMENTO O PRODUCTO DE ORIGEN BIOLOGO', '1');
INSERT INTO `ss_tipo_producto_farmacia` VALUES (5, 'O', 'OTRO PRODUCTO NO FARMACEUTICO', '1');
INSERT INTO `ss_tipo_producto_farmacia` VALUES (6, 'P', 'SUPLEMENTO DIETETICO, EDULCORANTE, PRODUCTO GALENICO, PRODUCTO NATURAL', '1');
INSERT INTO `ss_tipo_producto_farmacia` VALUES (7, 'R', 'PREPARADO MAGISTRAL', '1');

--rollback DELETE FROM ss_tipo_producto_farmacia WHERE idtipoproductofarmacia <= 7;
