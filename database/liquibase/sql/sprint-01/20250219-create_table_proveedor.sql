--liquibase formatted sql
--changeset lizandro.alipazaga:202502192127
--comment Se crea la tabla proveedor
CREATE TABLE `proveedor`  (
  `idproveedor` smallint NOT NULL AUTO_INCREMENT,
  `numero_ruc` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `razon_social` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nombre_comercial` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `domicilio` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ubigeo` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `latitud` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `longitud` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `celular` varchar(9) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `contacto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `correo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `observaciones` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idproveedor`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE proveedor;

--changeset lizandro.alipazaga:202502192128
--comment Se insertan datos en la tabla proveedor
INSERT INTO `proveedor` VALUES (1, '00000000000', 'PROVEEDOR GENERICO', 'PROVEEDOR GENERICO', '[N/A]', '150101', NULL, NULL, NULL, NULL, NULL, NULL, '1');

--rollback DELETE FROM proveedor WHERE idproveedor = 1;
