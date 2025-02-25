--liquibase formatted sql
--changeset lizandro.alipazaga:202502201707
--comment Se crea la tabla receta_medica_detalle
CREATE TABLE `receta_medica_detalle`  (
  `iddetallerecetamedica` smallint NOT NULL AUTO_INCREMENT,
  `idrecetamedica` smallint NOT NULL,
  `idarticulo` smallint NOT NULL,
  `cantidad` smallint NULL DEFAULT NULL,
  `indicaciones` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`iddetallerecetamedica`) USING BTREE,
  INDEX `idrecetamedica`(`idrecetamedica` ASC) USING BTREE,
  INDEX `idarticulo`(`idarticulo` ASC) USING BTREE,
  CONSTRAINT `receta_medica_detalle_ibfk_1` FOREIGN KEY (`idrecetamedica`) REFERENCES `receta_medica` (`idrecetamedica`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `receta_medica_detalle_ibfk_2` FOREIGN KEY (`idarticulo`) REFERENCES `articulos` (`idarticulo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE receta_medica_detalle;