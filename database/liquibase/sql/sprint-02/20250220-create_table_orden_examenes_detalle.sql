--liquibase formatted sql
--changeset lizandro.alipazaga:202502201146
--comment Se crea la tabla orden_examenes_detalle
CREATE TABLE `orden_examenes_detalle`  (
  `iddetalleorden` smallint NOT NULL AUTO_INCREMENT,
  `idorden` smallint NOT NULL,
  `idexamenauxiliar` smallint NOT NULL,
  `indicaciones` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `estado` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `avatar` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`iddetalleorden`) USING BTREE,
  INDEX `idorden`(`idorden` ASC) USING BTREE,
  INDEX `idexamenauxiliar`(`idexamenauxiliar` ASC) USING BTREE,
  CONSTRAINT `orden_examenes_detalle_ibfk_1` FOREIGN KEY (`idorden`) REFERENCES `orden_examenes` (`idorden`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orden_examenes_detalle_ibfk_2` FOREIGN KEY (`idexamenauxiliar`) REFERENCES `examenes_auxiliares` (`idexamenauxiliar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE orden_examenes_detalle;
