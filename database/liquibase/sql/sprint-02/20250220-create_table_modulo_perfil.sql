--liquibase formatted sql
--changeset lizandro.alipazaga:202502200906
--comment Se crea la tabla modulo_perfil
CREATE TABLE `modulo_perfil`  (
  `idmoduloperfil` smallint NOT NULL AUTO_INCREMENT,
  `idmodulo` smallint NOT NULL,
  `idperfil` smallint NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idmoduloperfil`) USING BTREE,
  INDEX `idmodulo`(`idmodulo` ASC) USING BTREE,
  INDEX `idperfil`(`idperfil` ASC) USING BTREE,
  CONSTRAINT `modulo_perfil_ibfk_1` FOREIGN KEY (`idmodulo`) REFERENCES `modulos` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `modulo_perfil_ibfk_2` FOREIGN KEY (`idperfil`) REFERENCES `perfil` (`idperfil`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE modulo_perfil;

--changeset lizandro.alipazaga:202502200907
--comment Se insertan datos en la tabla modulo_perfil
INSERT INTO `modulo_perfil` VALUES (1, 1, 1, '1');
INSERT INTO `modulo_perfil` VALUES (2, 2, 1, '1');
INSERT INTO `modulo_perfil` VALUES (3, 3, 1, '1');
INSERT INTO `modulo_perfil` VALUES (4, 4, 1, '1');
INSERT INTO `modulo_perfil` VALUES (5, 5, 1, '1');
INSERT INTO `modulo_perfil` VALUES (6, 6, 1, '1');
INSERT INTO `modulo_perfil` VALUES (7, 7, 1, '1');
INSERT INTO `modulo_perfil` VALUES (8, 8, 1, '1');
INSERT INTO `modulo_perfil` VALUES (9, 1, 2, '0');
INSERT INTO `modulo_perfil` VALUES (10, 2, 2, '0');
INSERT INTO `modulo_perfil` VALUES (11, 3, 2, '1');
INSERT INTO `modulo_perfil` VALUES (12, 4, 2, '1');
INSERT INTO `modulo_perfil` VALUES (13, 5, 2, '1');
INSERT INTO `modulo_perfil` VALUES (14, 6, 2, '1');
INSERT INTO `modulo_perfil` VALUES (15, 7, 2, '1');
INSERT INTO `modulo_perfil` VALUES (16, 8, 2, '1');

--rollback DELETE FROM modulo_perfil WHERE idmoduloperfil <=16;
