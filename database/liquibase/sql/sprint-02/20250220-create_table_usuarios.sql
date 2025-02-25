--liquibase formatted sql
--changeset lizandro.alipazaga:202502201155
--comment Se crea la tabla usuarios
CREATE TABLE `usuarios`  (
  `idusuario` smallint NOT NULL AUTO_INCREMENT,
  `idtipodocumento` smallint NOT NULL,
  `numero_documento` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `avatar` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `passwd` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `idperfil` smallint NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idusuario`) USING BTREE,
  INDEX `idperfil`(`idperfil` ASC) USING BTREE,
  INDEX `idtipodocumento`(`idtipodocumento` ASC) USING BTREE,
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idperfil`) REFERENCES `perfil` (`idperfil`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`idtipodocumento`) REFERENCES `tipo_documento` (`idtipodocumento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE usuarios;

--changeset lizandro.alipazaga:202502201156
--comment Se insertan datos en la tabla usuarios
INSERT INTO `usuarios` VALUES (1, 1, '42545573', '000120190310064855.png', 'ARAUJO CUADROS', 'KLAUS JOSEPH', 'karaujo', 'e4619e8fb50a0aa59ad1b92364f127afad06afe1', 1, '1');
INSERT INTO `usuarios` VALUES (2, 1, '44866027', '000120190310064855.png', 'ROMERO ACASIETE', 'TEDDY ELIZABETH', '44866027', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, '1');
INSERT INTO `usuarios` VALUES (3, 1, '72082330', 'user.jpg', 'CASTILLO TUESTA', 'JHAN ISAAC', 'jcastillo', '2278c0fc195e721e0969ac6478435f248270a274', 1, '1');

--rollback DELETE FROM usuarios WHERE idusuario IN (1,2,3)
