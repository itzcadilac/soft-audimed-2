--liquibase formatted sql
--changeset lizandro.alipazaga:202502192054
--comment Se crea la tabla tipo_comprobante
CREATE TABLE `tipo_comprobante`  (
  `idtipocomprobante` smallint NOT NULL AUTO_INCREMENT,
  `codigo_sunat` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tipo_comprobante` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idtipocomprobante`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE tipo_comprobante;

--changeset lizandro.alipazaga:202502192055
--comment Se insertan datos en la tabla tipo_comprobante
INSERT INTO `tipo_comprobante` VALUES (1, '00', 'OTROS', '1');
INSERT INTO `tipo_comprobante` VALUES (2, '01', 'FACTURA', '1');
INSERT INTO `tipo_comprobante` VALUES (3, '02', 'RECIBO POR HONORARIOS', '1');
INSERT INTO `tipo_comprobante` VALUES (4, '03', 'BOLETA DE VENTA', '1');
INSERT INTO `tipo_comprobante` VALUES (5, '04', 'LIQUIDACIÓN DE COMPRA', '1');
INSERT INTO `tipo_comprobante` VALUES (6, '07', 'NOTA DE CRÉDITO', '1');
INSERT INTO `tipo_comprobante` VALUES (7, '08', 'NOTA DE DÉBITO', '1');
INSERT INTO `tipo_comprobante` VALUES (8, '09', 'GUÍA DE REMISIÓN - REMITENTE', '1');
INSERT INTO `tipo_comprobante` VALUES (9, '12', 'TICKET O CINTA EMITIDO POR MÁQUINA REGISTRADORA', '1');
INSERT INTO `tipo_comprobante` VALUES (10, '14', 'RECIBO POR SERVICIOS PÚBLICOS', '1');
INSERT INTO `tipo_comprobante` VALUES (11, '31', 'GUÍA DE REMISIÓN - TRANSPORTISTA', '1');
INSERT INTO `tipo_comprobante` VALUES (12, '53', 'DECLARACIÓN DE MENSAJERÍA O COURIER', '1');
INSERT INTO `tipo_comprobante` VALUES (13, '54', 'LIQUIDACIÓN DE COBRANZA', '1');

--rollback DELETE FROM tipo_comprobante WHERE idtipocomprobante <= 13;
