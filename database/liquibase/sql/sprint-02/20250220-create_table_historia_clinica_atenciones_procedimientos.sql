--liquibase formatted sql
--changeset lizandro.alipazaga:202502200859
--comment Se crea la tabla historia_clinica_atenciones_procedimientos
CREATE TABLE `historia_clinica_atenciones_procedimientos`  (
  `idprocedimientos` smallint NOT NULL AUTO_INCREMENT,
  `idatencion` smallint NOT NULL,
  `idprocedimiento` smallint NOT NULL,
  `indicaciones` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `estado` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `avatar` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idprocedimientos`) USING BTREE,
  INDEX `idatencion`(`idatencion` ASC) USING BTREE,
  INDEX `idprocedimiento`(`idprocedimiento` ASC) USING BTREE,
  CONSTRAINT `historia_clinica_atenciones_procedimientos_ibfk_1` FOREIGN KEY (`idatencion`) REFERENCES `historia_clinica_atenciones` (`idatencion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `historia_clinica_atenciones_procedimientos_ibfk_2` FOREIGN KEY (`idprocedimiento`) REFERENCES `procedimiento` (`idprocedimiento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE historia_clinica_atenciones_procedimientos;