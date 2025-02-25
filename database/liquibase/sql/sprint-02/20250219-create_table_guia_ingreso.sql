--liquibase formatted sql
--changeset lizandro.alipazaga:202502192201
--comment Se crea la tabla guia_ingreso
CREATE TABLE `guia_ingreso`  (
  `idguia` smallint NOT NULL AUTO_INCREMENT,
  `anio` smallint NULL DEFAULT NULL,
  `numero` smallint NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `idalmacen` smallint NOT NULL,
  `idtipomovimiento` smallint NOT NULL,
  `idproveedor` smallint NOT NULL,
  `idtipocomprobante` smallint NOT NULL,
  `serie_comprobante` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `numero_comprobante` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fecha_emision_comprobante` date NULL DEFAULT NULL,
  `observaciones` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idguia`) USING BTREE,
  INDEX `idalmacen`(`idalmacen` ASC) USING BTREE,
  INDEX `idtipomovimiento`(`idtipomovimiento` ASC) USING BTREE,
  INDEX `idproveedor`(`idproveedor` ASC) USING BTREE,
  INDEX `idtipocomprobante`(`idtipocomprobante` ASC) USING BTREE,
  CONSTRAINT `guia_ingreso_ibfk_1` FOREIGN KEY (`idalmacen`) REFERENCES `almacen` (`idalmacen`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `guia_ingreso_ibfk_2` FOREIGN KEY (`idtipomovimiento`) REFERENCES `tipo_movimiento` (`idtipomovimiento`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `guia_ingreso_ibfk_3` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `guia_ingreso_ibfk_4` FOREIGN KEY (`idtipocomprobante`) REFERENCES `tipo_comprobante` (`idtipocomprobante`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE guia_ingreso;