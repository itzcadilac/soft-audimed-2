--liquibase formatted sql
--changeset lizandro.alipazaga:202502201215
--comment Se crea la tabla permisos_menu_detalle
CREATE TABLE `permisos_menu_detalle`  (
  `idpermisosmenudetalle` smallint NOT NULL AUTO_INCREMENT,
  `idmenudetalle` smallint NOT NULL,
  `idusuario` smallint NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idpermisosmenudetalle`) USING BTREE,
  INDEX `idmenudetalle`(`idmenudetalle` ASC) USING BTREE,
  INDEX `idusuario`(`idusuario` ASC) USING BTREE,
  CONSTRAINT `permisos_menu_detalle_ibfk_1` FOREIGN KEY (`idmenudetalle`) REFERENCES `menu_detalle` (`idmenudetalle`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permisos_menu_detalle_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE permisos_menu_detalle;
