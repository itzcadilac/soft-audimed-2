--liquibase formatted sql
--changeset lizandro.alipazaga:202502201221
--comment Se crea la tabla proveedor_cuentas
CREATE TABLE `proveedor_cuentas`  (
  `idcuenta` smallint NOT NULL AUTO_INCREMENT,
  `idproveedor` smallint NOT NULL,
  `idtipocuenta` smallint NOT NULL,
  `idbanco` smallint NOT NULL,
  `numero_cuenta` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cci_cuenta` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `idtipomoneda` smallint NOT NULL,
  `principal` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `observaciones` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idcuenta`) USING BTREE,
  INDEX `idproveedor`(`idproveedor` ASC) USING BTREE,
  INDEX `idtipocuenta`(`idtipocuenta` ASC) USING BTREE,
  INDEX `idbanco`(`idbanco` ASC) USING BTREE,
  INDEX `idtipomoneda`(`idtipomoneda` ASC) USING BTREE,
  CONSTRAINT `proveedor_cuentas_ibfk_1` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `proveedor_cuentas_ibfk_2` FOREIGN KEY (`idtipocuenta`) REFERENCES `tipo_cuenta` (`idtipocuenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `proveedor_cuentas_ibfk_3` FOREIGN KEY (`idbanco`) REFERENCES `banco` (`idbanco`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `proveedor_cuentas_ibfk_4` FOREIGN KEY (`idtipomoneda`) REFERENCES `tipo_moneda` (`idtipomoneda`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE proveedor_cuentas;