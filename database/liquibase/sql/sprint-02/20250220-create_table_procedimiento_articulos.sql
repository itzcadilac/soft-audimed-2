--liquibase formatted sql
--changeset lizandro.alipazaga:202502201217
--comment Se crea la tabla procedimiento_articulos
CREATE TABLE `procedimiento_articulos`  (
  `idprocedimientoarticulo` smallint NOT NULL AUTO_INCREMENT,
  `idprocedimiento` smallint NOT NULL,
  `idarticulo` smallint NOT NULL,
  `cantidad` decimal(20, 2) NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idprocedimientoarticulo`) USING BTREE,
  INDEX `idprocedimiento`(`idprocedimiento` ASC) USING BTREE,
  INDEX `idarticulo`(`idarticulo` ASC) USING BTREE,
  CONSTRAINT `procedimiento_articulos_ibfk_1` FOREIGN KEY (`idprocedimiento`) REFERENCES `procedimiento` (`idprocedimiento`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `procedimiento_articulos_ibfk_2` FOREIGN KEY (`idarticulo`) REFERENCES `articulos` (`idarticulo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE procedimiento_articulos;