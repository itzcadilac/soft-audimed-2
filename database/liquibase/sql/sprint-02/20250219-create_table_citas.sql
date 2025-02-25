--liquibase formatted sql
--changeset lizandro.alipazaga:202502192142
--comment Se crea la tabla citas
CREATE TABLE `citas`  (
  `idcita` smallint NOT NULL AUTO_INCREMENT,
  `idconsultorio` smallint NOT NULL,
  `iddepartamento` smallint NOT NULL,
  `idprofesional` smallint NOT NULL,
  `idpaciente` smallint NOT NULL,
  `idturno` smallint NULL DEFAULT NULL,
  `tipo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `fecha` date NULL DEFAULT NULL,
  `entrada` time NULL DEFAULT NULL,
  `salida` time NULL DEFAULT NULL,
  `observaciones` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `atendido` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idcita`) USING BTREE,
  INDEX `idconsultorio`(`idconsultorio` ASC) USING BTREE,
  INDEX `iddepartamento`(`iddepartamento` ASC) USING BTREE,
  INDEX `idprofesional`(`idprofesional` ASC) USING BTREE,
  INDEX `idpaciente`(`idpaciente` ASC) USING BTREE,
  CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`idconsultorio`) REFERENCES `consultorio` (`idconsultorio`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`iddepartamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`idprofesional`) REFERENCES `profesional` (`idprofesional`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `citas_ibfk_4` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE citas;
