--liquibase formatted sql
--changeset lizandro.alipazaga:202502201710
--comment Se crea la tabla turnos
CREATE TABLE `turnos`  (
  `idturno` smallint NOT NULL AUTO_INCREMENT,
  `idconsultorio` smallint NOT NULL,
  `iddepartamento` smallint NOT NULL,
  `idprofesional` smallint NOT NULL,
  `anio` smallint NULL DEFAULT NULL,
  `idmes` smallint NOT NULL,
  `duracion_consulta` smallint NULL DEFAULT NULL,
  `observaciones` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idturno`) USING BTREE,
  INDEX `idconsultorio`(`idconsultorio` ASC) USING BTREE,
  INDEX `idprofesional`(`idprofesional` ASC) USING BTREE,
  INDEX `iddepartamento`(`iddepartamento` ASC) USING BTREE,
  INDEX `idmes`(`idmes` ASC) USING BTREE,
  CONSTRAINT `turnos_ibfk_1` FOREIGN KEY (`idconsultorio`) REFERENCES `consultorio` (`idconsultorio`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `turnos_ibfk_2` FOREIGN KEY (`idprofesional`) REFERENCES `profesional` (`idprofesional`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `turnos_ibfk_3` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`iddepartamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `turnos_ibfk_4` FOREIGN KEY (`idmes`) REFERENCES `mes` (`idmes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE turnos;