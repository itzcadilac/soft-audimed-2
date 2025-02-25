--liquibase formatted sql
--changeset lizandro.alipazaga:202502201151
--comment Se crea la tabla servicios
CREATE TABLE `servicios`  (
  `idservicio` smallint NOT NULL AUTO_INCREMENT,
  `idtiposervicio` smallint NOT NULL,
  `idunidadmedida` smallint NOT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `disponible_compra` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `disponible_venta` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `porcentaje_utilidad` decimal(9, 2) NULL DEFAULT NULL,
  `observaciones` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idservicio`) USING BTREE,
  INDEX `idtiposervicio`(`idtiposervicio` ASC) USING BTREE,
  INDEX `idunidadmedida`(`idunidadmedida` ASC) USING BTREE,
  CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`idtiposervicio`) REFERENCES `tipo_servicio` (`idtiposervicio`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `servicios_ibfk_2` FOREIGN KEY (`idunidadmedida`) REFERENCES `unidad_medida` (`idunidadmedida`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE servicios;