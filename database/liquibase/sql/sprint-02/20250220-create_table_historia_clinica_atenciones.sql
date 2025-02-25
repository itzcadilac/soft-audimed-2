--liquibase formatted sql
--changeset lizandro.alipazaga:202502200844
--comment Se crea la tabla historia_clinica_atenciones
CREATE TABLE `historia_clinica_atenciones`  (
  `idatencion` smallint NOT NULL AUTO_INCREMENT,
  `idconsultorio` smallint NOT NULL,
  `iddepartamento` smallint NOT NULL,
  `idprofesional` smallint NOT NULL,
  `idhistoria` smallint NOT NULL,
  `fecha_atencion` date NULL DEFAULT NULL,
  `hora_atencion` time NULL DEFAULT NULL,
  `tipo_atencion` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  `prioridad` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '4',
  `gestante` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `tiempo_gestacion` smallint NULL DEFAULT NULL,
  `presion01` smallint NULL DEFAULT 0,
  `presion02` smallint NULL DEFAULT 0,
  `presion_venosa` smallint NULL DEFAULT 0,
  `temperatura` decimal(19, 1) NULL DEFAULT 0.0,
  `saturacion` smallint NULL DEFAULT 0,
  `frecuencia_cardiaca` smallint NULL DEFAULT 0,
  `frecuencia_respiratoria` smallint NULL DEFAULT 0,
  `peso` decimal(19, 2) NULL DEFAULT 0.00,
  `talla` decimal(19, 2) NULL DEFAULT 0.00,
  `imc` decimal(19, 2) NULL DEFAULT 0.00,
  `AO` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `RV` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `RM` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `glasgow` smallint NULL DEFAULT 0,
  `observaciones` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idatencion`) USING BTREE,
  INDEX `idhistoria`(`idhistoria` ASC) USING BTREE,
  INDEX `idconsultorio`(`idconsultorio` ASC) USING BTREE,
  INDEX `iddepartamento`(`iddepartamento` ASC) USING BTREE,
  INDEX `idprofesional`(`idprofesional` ASC) USING BTREE,
  CONSTRAINT `historia_clinica_atenciones_ibfk_1` FOREIGN KEY (`idhistoria`) REFERENCES `historia_clinica` (`idhistoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `historia_clinica_atenciones_ibfk_2` FOREIGN KEY (`idconsultorio`) REFERENCES `consultorio` (`idconsultorio`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `historia_clinica_atenciones_ibfk_3` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`iddepartamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `historia_clinica_atenciones_ibfk_4` FOREIGN KEY (`idprofesional`) REFERENCES `profesional` (`idprofesional`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE historia_clinica_atenciones;