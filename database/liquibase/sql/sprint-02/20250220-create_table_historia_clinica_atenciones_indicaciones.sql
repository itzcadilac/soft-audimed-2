--liquibase formatted sql
--changeset lizandro.alipazaga:202502200858
--comment Se crea la tabla historia_clinica_atenciones_indicaciones
CREATE TABLE `historia_clinica_atenciones_indicaciones`  (
  `idindicacion` smallint NOT NULL AUTO_INCREMENT,
  `idatencion` smallint NOT NULL,
  `idarticulo` smallint NOT NULL,
  `cantidad` smallint NULL DEFAULT NULL,
  `indicaciones` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idindicacion`) USING BTREE,
  INDEX `idatencion`(`idatencion` ASC) USING BTREE,
  INDEX `idarticulo`(`idarticulo` ASC) USING BTREE,
  CONSTRAINT `historia_clinica_atenciones_indicaciones_ibfk_1` FOREIGN KEY (`idatencion`) REFERENCES `historia_clinica_atenciones` (`idatencion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `historia_clinica_atenciones_indicaciones_ibfk_2` FOREIGN KEY (`idarticulo`) REFERENCES `articulos` (`idarticulo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE historia_clinica_atenciones_indicaciones;
