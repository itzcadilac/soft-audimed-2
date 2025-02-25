--liquibase formatted sql
--changeset lizandro.alipazaga:202502192058
--comment Se crea la tabla tipo_documento
CREATE TABLE `tipo_documento`  (
  `idtipodocumento` smallint NOT NULL AUTO_INCREMENT,
  `codigo_curl` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `codigo_sunat` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tipo_documento` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `longitud` smallint NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idtipodocumento`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE tipo_documento;

--changeset lizandro.alipazaga:202502192059
--comment Se insertan datos en la tabla tipo_documento
INSERT INTO `tipo_documento` VALUES (1, '01', '1', 'D.N.I.', 8, '1');
INSERT INTO `tipo_documento` VALUES (2, '03', '4', 'CARNET ETX.', 9, '1');
INSERT INTO `tipo_documento` VALUES (3, '06', '6', 'R.U.C.', 11, '1');
INSERT INTO `tipo_documento` VALUES (4, '07', '7', 'PASAPORTE', 12, '1');
INSERT INTO `tipo_documento` VALUES (5, '00', '0', 'OTROS', 15, '1');

--rollback DELETE FROM tipo_documento WHERE idtipodocumento <= 5;
