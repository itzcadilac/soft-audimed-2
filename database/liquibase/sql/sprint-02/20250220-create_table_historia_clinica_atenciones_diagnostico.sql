--liquibase formatted sql
--changeset lizandro.alipazaga:202502200847
--comment Se crea la tabla historia_clinica_atenciones_diagnostico
CREATE TABLE `historia_clinica_atenciones_diagnostico`  (
  `iddiagnostico` smallint NOT NULL AUTO_INCREMENT,
  `idatencion` smallint NOT NULL,
  `idcie10` smallint NOT NULL,
  `tipo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`iddiagnostico`) USING BTREE,
  INDEX `idatencion`(`idatencion` ASC) USING BTREE,
  INDEX `idcie10`(`idcie10` ASC) USING BTREE,
  CONSTRAINT `historia_clinica_atenciones_diagnostico_ibfk_1` FOREIGN KEY (`idatencion`) REFERENCES `historia_clinica_atenciones` (`idatencion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `historia_clinica_atenciones_diagnostico_ibfk_2` FOREIGN KEY (`idcie10`) REFERENCES `cie10` (`idcie10`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE historia_clinica_atenciones_diagnostico;
