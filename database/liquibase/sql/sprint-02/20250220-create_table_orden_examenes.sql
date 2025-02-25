--liquibase formatted sql
--changeset lizandro.alipazaga:202502201145
--comment Se crea la tabla orden_examenes
CREATE TABLE `orden_examenes`  (
  `idorden` smallint NOT NULL AUTO_INCREMENT,
  `idempresa` smallint NOT NULL,
  `idatencion` smallint NOT NULL,
  `fecha` date NULL DEFAULT NULL,
  `numero` smallint NULL DEFAULT NULL,
  `idprofesional` smallint NOT NULL,
  `idpaciente` smallint NOT NULL,
  `observaciones` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idorden`) USING BTREE,
  INDEX `idempresa`(`idempresa` ASC) USING BTREE,
  INDEX `idatencion`(`idatencion` ASC) USING BTREE,
  INDEX `idprofesional`(`idprofesional` ASC) USING BTREE,
  INDEX `idpaciente`(`idpaciente` ASC) USING BTREE,
  CONSTRAINT `orden_examenes_ibfk_1` FOREIGN KEY (`idempresa`) REFERENCES `empresa` (`idempresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orden_examenes_ibfk_2` FOREIGN KEY (`idatencion`) REFERENCES `historia_clinica_atenciones` (`idatencion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orden_examenes_ibfk_3` FOREIGN KEY (`idprofesional`) REFERENCES `profesional` (`idprofesional`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orden_examenes_ibfk_4` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE orden_examenes;