--liquibase formatted sql
--changeset lizandro.alipazaga:202502190809 
--comment Se crea la tabla medio_pago
CREATE TABLE `medio_pago`  (
  `idmediopago` smallint NOT NULL AUTO_INCREMENT,
  `medio_pago` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idmediopago`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE medio_pago;

--changeset lizandro.alipazaga:202502190810 
--comment Se insertan datos en la tabla medio_pago
INSERT INTO `medio_pago` VALUES (1, 'EFECTIVO', '1');
INSERT INTO `medio_pago` VALUES (2, 'TRANSFERENCIA', '1');
INSERT INTO `medio_pago` VALUES (3, 'CHEQUE', '1');
INSERT INTO `medio_pago` VALUES (4, 'TARJETA', '1');
INSERT INTO `medio_pago` VALUES (5, 'DEPOSITO', '1');
INSERT INTO `medio_pago` VALUES (6, 'OTROS', '1');

--rollback DELETE FROM medio_pago WHERE idmediopago<=6;