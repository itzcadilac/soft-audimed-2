--liquibase formatted sql
--changeset lizandro.alipazaga:202502200840
--comment Se crea la tabla guia_salida_detalle
CREATE TABLE `guia_salida_detalle`  (
  `iddetalle` smallint NOT NULL AUTO_INCREMENT,
  `idguia` smallint NOT NULL,
  `idarticulo` smallint NOT NULL,
  `cantidad` decimal(20, 4) NULL DEFAULT NULL,
  `costo` decimal(20, 4) NULL DEFAULT NULL,
  `fecha_vencimiento` date NULL DEFAULT NULL,
  `numero_lote` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`iddetalle`) USING BTREE,
  INDEX `idguia`(`idguia` ASC) USING BTREE,
  INDEX `idarticulo`(`idarticulo` ASC) USING BTREE,
  CONSTRAINT `guia_salida_detalle_ibfk_1` FOREIGN KEY (`idguia`) REFERENCES `guia_salida` (`idguia`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `guia_salida_detalle_ibfk_2` FOREIGN KEY (`idarticulo`) REFERENCES `articulos` (`idarticulo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE guia_salida_detalle;
