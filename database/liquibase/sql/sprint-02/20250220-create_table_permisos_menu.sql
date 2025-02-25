--liquibase formatted sql
--changeset lizandro.alipazaga:202502201213
--comment Se crea la tabla permisos_menu
CREATE TABLE `permisos_menu`  (
  `idpermisosmenu` smallint NOT NULL AUTO_INCREMENT,
  `idmenu` smallint NOT NULL,
  `idusuario` smallint NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idpermisosmenu`) USING BTREE,
  INDEX `idmenu`(`idmenu` ASC) USING BTREE,
  INDEX `idusuario`(`idusuario` ASC) USING BTREE,
  CONSTRAINT `permisos_menu_ibfk_1` FOREIGN KEY (`idmenu`) REFERENCES `menu` (`idmenu`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permisos_menu_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE permisos_menu;

--changeset lizandro.alipazaga:202502201214
--comment Se insertan datos en la tabla permisos_menu
INSERT INTO `permisos_menu` VALUES (1, 1, 1, '1');
INSERT INTO `permisos_menu` VALUES (2, 2, 1, '1');
INSERT INTO `permisos_menu` VALUES (3, 3, 1, '1');
INSERT INTO `permisos_menu` VALUES (4, 4, 1, '1');
INSERT INTO `permisos_menu` VALUES (5, 5, 1, '1');
INSERT INTO `permisos_menu` VALUES (6, 6, 1, '1');
INSERT INTO `permisos_menu` VALUES (7, 7, 1, '1');
INSERT INTO `permisos_menu` VALUES (8, 8, 1, '1');
INSERT INTO `permisos_menu` VALUES (9, 9, 1, '1');
INSERT INTO `permisos_menu` VALUES (10, 10, 1, '1');
INSERT INTO `permisos_menu` VALUES (11, 11, 1, '1');
INSERT INTO `permisos_menu` VALUES (12, 12, 1, '1');
INSERT INTO `permisos_menu` VALUES (13, 13, 1, '1');
INSERT INTO `permisos_menu` VALUES (14, 14, 1, '1');
INSERT INTO `permisos_menu` VALUES (15, 15, 1, '1');
INSERT INTO `permisos_menu` VALUES (16, 16, 1, '1');
INSERT INTO `permisos_menu` VALUES (17, 17, 1, '1');
INSERT INTO `permisos_menu` VALUES (18, 18, 1, '1');
INSERT INTO `permisos_menu` VALUES (19, 19, 1, '1');

--rollback DELETE FROM permisos_menu WHERE idpermisosmenu <= 19;
