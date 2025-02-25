--liquibase formatted sql
--changeset lizandro.alipazaga:202502201149
--comment Se crea la tabla orden_servicio_detalle
CREATE TABLE `orden_servicio_detalle`  (
  `iddetalle` smallint NOT NULL AUTO_INCREMENT,
  `idorden` smallint NOT NULL,
  `idservicio` smallint NOT NULL,
  `cantidad` decimal(20, 4) NULL DEFAULT NULL,
  `costo` decimal(20, 4) NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`iddetalle`) USING BTREE,
  INDEX `idorden`(`idorden` ASC) USING BTREE,
  INDEX `idservicio`(`idservicio` ASC) USING BTREE,
  CONSTRAINT `orden_servicio_detalle_ibfk_1` FOREIGN KEY (`idorden`) REFERENCES `orden_servicio` (`idorden`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orden_servicio_detalle_ibfk_2` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicio`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE orden_servicio_detalle;
