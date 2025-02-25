--liquibase formatted sql
--changeset lizandro.alipazaga:202502200855
--comment Se crea la tabla historia_clinica_atenciones_examenes
CREATE TABLE `historia_clinica_atenciones_examenes`  (
  `idexamenes` smallint NOT NULL AUTO_INCREMENT,
  `idatencion` smallint NOT NULL,
  `idexamenauxiliar` smallint NOT NULL,
  `indicaciones` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `estado` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `avatar` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idexamenes`) USING BTREE,
  INDEX `idatencion`(`idatencion` ASC) USING BTREE,
  INDEX `idexamenauxiliar`(`idexamenauxiliar` ASC) USING BTREE,
  CONSTRAINT `historia_clinica_atenciones_examenes_ibfk_1` FOREIGN KEY (`idatencion`) REFERENCES `historia_clinica_atenciones` (`idatencion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `historia_clinica_atenciones_examenes_ibfk_2` FOREIGN KEY (`idexamenauxiliar`) REFERENCES `examenes_auxiliares` (`idexamenauxiliar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE historia_clinica_atenciones_examenes;