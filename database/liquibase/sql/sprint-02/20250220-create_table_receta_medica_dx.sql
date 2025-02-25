--liquibase formatted sql
--changeset lizandro.alipazaga:202502201708
--comment Se crea la tabla receta_medica_dx
CREATE TABLE `receta_medica_dx`  (
  `idrecetamedicadx` smallint NOT NULL AUTO_INCREMENT,
  `idrecetamedica` smallint NOT NULL,
  `idcie10` smallint NOT NULL,
  `tipo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idrecetamedicadx`) USING BTREE,
  INDEX `idrecetamedica`(`idrecetamedica` ASC) USING BTREE,
  INDEX `idcie10`(`idcie10` ASC) USING BTREE,
  CONSTRAINT `receta_medica_dx_ibfk_1` FOREIGN KEY (`idrecetamedica`) REFERENCES `receta_medica` (`idrecetamedica`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `receta_medica_dx_ibfk_2` FOREIGN KEY (`idcie10`) REFERENCES `cie10` (`idcie10`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE receta_medica_dx;