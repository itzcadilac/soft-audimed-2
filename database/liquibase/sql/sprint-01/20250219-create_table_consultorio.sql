--liquibase formatted sql
--changeset lizandro.alipazaga:202502190719 
--comment Se crea la tabla consultorio
CREATE TABLE `consultorio`  (
  `idconsultorio` smallint NOT NULL AUTO_INCREMENT,
  `idempresa` smallint NOT NULL,
  `consultorio` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `observaciones` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idconsultorio`) USING BTREE,
  INDEX `idempresa`(`idempresa` ASC) USING BTREE,
  CONSTRAINT `consultorio_ibfk_1` FOREIGN KEY (`idempresa`) REFERENCES `empresa` (`idempresa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE consultorio;

--changeset lizandro.alipazaga:202502190720 
--comment Se insertan datos en la tabla consultorio
INSERT INTO `consultorio` VALUES (1, 1, 'CONSULTORIO 01', '[N/A]', '1');
INSERT INTO `consultorio` VALUES (2, 1, 'CONSULTORIO 02', '[N/A]', '1');
INSERT INTO `consultorio` VALUES (3, 2, 'CONSULTORIO 01', '[N/A]', '1');
INSERT INTO `consultorio` VALUES (4, 2, 'CONSULTORIO 02', '[N/A]', '1');

--rollback DELETE FROM consultorio WHERE idconsultorio IN (1,2,3,4);