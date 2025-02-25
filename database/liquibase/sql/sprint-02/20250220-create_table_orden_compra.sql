--liquibase formatted sql
--changeset lizandro.alipazaga:202502201137
--comment Se crea la tabla orden_compra
CREATE TABLE `orden_compra`  (
  `idorden` smallint NOT NULL AUTO_INCREMENT,
  `anio` smallint NULL DEFAULT NULL,
  `numero` smallint NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `idempresa` smallint NOT NULL,
  `idcentro` smallint NOT NULL,
  `idproveedor` smallint NOT NULL,
  `idtipopago` smallint NOT NULL,
  `idmediopago` smallint NOT NULL,
  `idtipomoneda` smallint NOT NULL,
  `observaciones` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tipo_cambio` decimal(18, 4) NULL DEFAULT NULL,
  `importe` decimal(20, 4) NULL DEFAULT NULL,
  `impuesto` decimal(20, 4) NULL DEFAULT NULL,
  `total` decimal(20, 4) NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idorden`) USING BTREE,
  INDEX `idempresa`(`idempresa` ASC) USING BTREE,
  INDEX `idcentro`(`idcentro` ASC) USING BTREE,
  INDEX `idproveedor`(`idproveedor` ASC) USING BTREE,
  INDEX `idtipopago`(`idtipopago` ASC) USING BTREE,
  INDEX `idmediopago`(`idmediopago` ASC) USING BTREE,
  INDEX `idtipomoneda`(`idtipomoneda` ASC) USING BTREE,
  CONSTRAINT `orden_compra_ibfk_1` FOREIGN KEY (`idempresa`) REFERENCES `empresa` (`idempresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orden_compra_ibfk_2` FOREIGN KEY (`idcentro`) REFERENCES `centro_costos` (`idcentro`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orden_compra_ibfk_3` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orden_compra_ibfk_4` FOREIGN KEY (`idtipopago`) REFERENCES `tipo_pago` (`idtipopago`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orden_compra_ibfk_5` FOREIGN KEY (`idmediopago`) REFERENCES `medio_pago` (`idmediopago`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orden_compra_ibfk_6` FOREIGN KEY (`idtipomoneda`) REFERENCES `tipo_moneda` (`idtipomoneda`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE orden_compra;
