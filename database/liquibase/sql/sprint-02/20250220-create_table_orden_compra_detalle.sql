--liquibase formatted sql
--changeset lizandro.alipazaga:202502201142
--comment Se crea la tabla orden_compra_detalle
CREATE TABLE `orden_compra_detalle`  (
  `iddetalle` smallint NOT NULL AUTO_INCREMENT,
  `idorden` smallint NOT NULL,
  `idarticulo` smallint NOT NULL,
  `cantidad` decimal(20, 4) NULL DEFAULT NULL,
  `costo` decimal(20, 4) NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`iddetalle`) USING BTREE,
  INDEX `idorden`(`idorden` ASC) USING BTREE,
  INDEX `idarticulo`(`idarticulo` ASC) USING BTREE,
  CONSTRAINT `orden_compra_detalle_ibfk_1` FOREIGN KEY (`idorden`) REFERENCES `orden_compra` (`idorden`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orden_compra_detalle_ibfk_2` FOREIGN KEY (`idarticulo`) REFERENCES `articulos` (`idarticulo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE orden_compra_detalle;
