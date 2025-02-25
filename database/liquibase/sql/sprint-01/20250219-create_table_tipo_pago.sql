--liquibase formatted sql
--changeset lizandro.alipazaga:202502192103
--comment Se crea la tabla tipo_pago
CREATE TABLE `tipo_pago`  (
  `idtipopago` smallint NOT NULL AUTO_INCREMENT,
  `tipo_pago` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idtipopago`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE tipo_pago;

--changeset lizandro.alipazaga:202502192104
--comment Se insertan datos en la tabla tipo_pago
INSERT INTO `tipo_pago` VALUES (1, 'CONTADO', '1');
INSERT INTO `tipo_pago` VALUES (2, 'CREDITO', '1');

--rollback DELETE FROM tipo_pago WHERE idtipopago IN (1,2);
