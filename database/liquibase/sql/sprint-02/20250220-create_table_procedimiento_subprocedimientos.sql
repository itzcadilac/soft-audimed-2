--liquibase formatted sql
--changeset lizandro.alipazaga:202502201219
--comment Se crea la tabla procedimiento_subprocedimientos
CREATE TABLE `procedimiento_subprocedimientos`  (
  `idprocedimientosub` smallint NOT NULL AUTO_INCREMENT,
  `idprocedimiento` smallint NOT NULL,
  `idprocedimientosubprocedimiento` smallint NOT NULL,
  `cantidad` decimal(20, 2) NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idprocedimientosub`) USING BTREE,
  INDEX `idprocedimiento`(`idprocedimiento` ASC) USING BTREE,
  CONSTRAINT `procedimiento_subprocedimientos_ibfk_1` FOREIGN KEY (`idprocedimiento`) REFERENCES `procedimiento` (`idprocedimiento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE procedimiento_subprocedimientos;