--liquibase formatted sql
--changeset lizandro.alipazaga:202502201153
--comment Se crea la tabla permisos_botones
CREATE TABLE `permisos_botones`  (
  `idpermisosbotones` smallint NOT NULL AUTO_INCREMENT,
  `idboton` smallint NOT NULL,
  `idusuario` smallint NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idpermisosbotones`) USING BTREE,
  INDEX `idboton`(`idboton` ASC) USING BTREE,
  INDEX `idusuario`(`idusuario` ASC) USING BTREE,
  CONSTRAINT `permisos_botones_ibfk_1` FOREIGN KEY (`idboton`) REFERENCES `botones` (`idboton`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permisos_botones_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE permisos_botones;

--changeset lizandro.alipazaga:202502201154
--comment Se insertan datos en la tabla permisos_botones
INSERT INTO `permisos_botones` VALUES (1, 1, 1, '1');
INSERT INTO `permisos_botones` VALUES (2, 2, 1, '1');
INSERT INTO `permisos_botones` VALUES (3, 3, 1, '1');
INSERT INTO `permisos_botones` VALUES (4, 4, 1, '1');
INSERT INTO `permisos_botones` VALUES (5, 5, 1, '1');
INSERT INTO `permisos_botones` VALUES (6, 6, 1, '1');
INSERT INTO `permisos_botones` VALUES (7, 7, 1, '1');
INSERT INTO `permisos_botones` VALUES (8, 8, 1, '1');
INSERT INTO `permisos_botones` VALUES (9, 9, 1, '1');
INSERT INTO `permisos_botones` VALUES (10, 10, 1, '1');
INSERT INTO `permisos_botones` VALUES (11, 11, 1, '1');
INSERT INTO `permisos_botones` VALUES (12, 12, 1, '1');
INSERT INTO `permisos_botones` VALUES (13, 13, 1, '1');
INSERT INTO `permisos_botones` VALUES (14, 14, 1, '1');
INSERT INTO `permisos_botones` VALUES (15, 15, 1, '1');
INSERT INTO `permisos_botones` VALUES (16, 16, 1, '1');
INSERT INTO `permisos_botones` VALUES (17, 17, 1, '1');
INSERT INTO `permisos_botones` VALUES (18, 18, 1, '1');
INSERT INTO `permisos_botones` VALUES (19, 19, 1, '1');
INSERT INTO `permisos_botones` VALUES (20, 20, 1, '1');
INSERT INTO `permisos_botones` VALUES (21, 21, 1, '1');
INSERT INTO `permisos_botones` VALUES (22, 22, 1, '1');
INSERT INTO `permisos_botones` VALUES (23, 23, 1, '1');
INSERT INTO `permisos_botones` VALUES (24, 24, 1, '1');
INSERT INTO `permisos_botones` VALUES (25, 25, 1, '1');
INSERT INTO `permisos_botones` VALUES (26, 26, 1, '1');
INSERT INTO `permisos_botones` VALUES (27, 27, 1, '1');
INSERT INTO `permisos_botones` VALUES (28, 28, 1, '1');
INSERT INTO `permisos_botones` VALUES (29, 29, 1, '1');
INSERT INTO `permisos_botones` VALUES (30, 30, 1, '1');
INSERT INTO `permisos_botones` VALUES (31, 31, 1, '1');
INSERT INTO `permisos_botones` VALUES (32, 32, 1, '1');
INSERT INTO `permisos_botones` VALUES (33, 33, 1, '1');
INSERT INTO `permisos_botones` VALUES (34, 34, 1, '1');
INSERT INTO `permisos_botones` VALUES (35, 35, 1, '1');
INSERT INTO `permisos_botones` VALUES (36, 36, 1, '1');
INSERT INTO `permisos_botones` VALUES (37, 37, 1, '1');
INSERT INTO `permisos_botones` VALUES (38, 38, 1, '1');

--rollback DELETE FROM permisos_botones WHERE idpermisosbotones <= 38;
