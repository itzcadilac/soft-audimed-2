--liquibase formatted sql
--changeset lizandro.alipazaga:202502192036
--comment Se crea la tabla menu_detalle
CREATE TABLE `menu_detalle`  (
  `idmenudetalle` smallint NOT NULL AUTO_INCREMENT,
  `idmenu` smallint NOT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `url` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `icono` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `orden` int NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idmenudetalle`) USING BTREE,
  INDEX `idmenu`(`idmenu` ASC) USING BTREE,
  CONSTRAINT `menu_detalle_ibfk_1` FOREIGN KEY (`idmenu`) REFERENCES `menu` (`idmenu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE menu_detalle;
