--liquibase formatted sql
--changeset lizandro.alipazaga:202502200841
--comment Se crea la tabla historia_clinica
CREATE TABLE `historia_clinica`  (
  `idhistoria` smallint NOT NULL AUTO_INCREMENT,
  `numero` smallint NOT NULL,
  `numerofisico` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fecha_registro` date NULL DEFAULT NULL,
  `idpaciente` smallint NOT NULL,
  `avatar` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idhistoria`) USING BTREE,
  INDEX `idpaciente`(`idpaciente` ASC) USING BTREE,
  CONSTRAINT `historia_clinica_ibfk_1` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE historia_clinica;
