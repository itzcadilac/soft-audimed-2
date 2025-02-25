--liquibase formatted sql
--changeset lizandro.alipazaga:202502201705
--comment Se crea la tabla receta_medica
CREATE TABLE `receta_medica`  (
  `idrecetamedica` smallint NOT NULL AUTO_INCREMENT,
  `idalmacen` smallint NOT NULL,
  `idatencion` smallint NOT NULL,
  `fecha` date NULL DEFAULT NULL,
  `numero` smallint NULL DEFAULT NULL,
  `idprofesional` smallint NOT NULL,
  `idpaciente` smallint NOT NULL,
  `observaciones` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `atendido` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idrecetamedica`) USING BTREE,
  INDEX `idalmacen`(`idalmacen` ASC) USING BTREE,
  INDEX `idatencion`(`idatencion` ASC) USING BTREE,
  INDEX `idprofesional`(`idprofesional` ASC) USING BTREE,
  INDEX `idpaciente`(`idpaciente` ASC) USING BTREE,
  CONSTRAINT `receta_medica_ibfk_1` FOREIGN KEY (`idalmacen`) REFERENCES `almacen` (`idalmacen`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `receta_medica_ibfk_2` FOREIGN KEY (`idatencion`) REFERENCES `historia_clinica_atenciones` (`idatencion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `receta_medica_ibfk_3` FOREIGN KEY (`idprofesional`) REFERENCES `profesional` (`idprofesional`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `receta_medica_ibfk_4` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE receta_medica;