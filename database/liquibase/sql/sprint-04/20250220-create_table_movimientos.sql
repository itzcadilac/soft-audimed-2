--liquibase formatted sql
--changeset lizandro.alipazaga:202502202312
--comment Se crea la tabla movimientos
CREATE TABLE `movimientos`  (
  `idmovimiento` bigint NOT NULL,
  `modulo` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tipo` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `contenido` TEXT NULL,
  `username` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `idusuario` smallint NULL,
  `createdat` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idmovimiento`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE movimientos;
