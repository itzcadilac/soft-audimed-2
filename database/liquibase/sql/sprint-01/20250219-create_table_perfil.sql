--liquibase formatted sql
--changeset lizandro.alipazaga:202502192122
--comment Se crea la tabla perfil
CREATE TABLE `perfil`  (
  `idperfil` smallint NOT NULL AUTO_INCREMENT,
  `perfil` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idperfil`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE perfil;

--changeset lizandro.alipazaga:202502192123
--comment Se insertan datos en la tabla perfil
INSERT INTO `perfil` VALUES (1, 'ADMINISTRADOR', '1');
INSERT INTO `perfil` VALUES (2, 'ADMISION', '1');
INSERT INTO `perfil` VALUES (3, 'LOGISTICO', '1');
INSERT INTO `perfil` VALUES (4, 'FACTURACION', '1');
INSERT INTO `perfil` VALUES (5, 'MEDICO', '1');
INSERT INTO `perfil` VALUES (6, 'LABORATORIO', '1');
INSERT INTO `perfil` VALUES (7, 'FARMACIA', '1');
INSERT INTO `perfil` VALUES (8, 'AUDITOR 1', '1');
INSERT INTO `perfil` VALUES (9, 'AUDITOR 2', '1');
INSERT INTO `perfil` VALUES (10, 'AUDITOR 3', '1');
INSERT INTO `perfil` VALUES (11, 'AUDITOR 4', '1');

--rollback DELETE FROM perfil WHERE idperfil <= 11;
