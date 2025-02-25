--liquibase formatted sql
--changeset lizandro.alipazaga:202502202201
--comment Se crea la tabla empresas
CREATE TABLE `empresas`  (
  `idempresa` int NOT NULL AUTO_INCREMENT,
  `tipdocumento` int NULL DEFAULT NULL,
  `ruc` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `razonsocial` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `direccion` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `departamento` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `provincia` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `distrito` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ubigeo` int NULL DEFAULT NULL,
  `estado` int NULL DEFAULT 1,
  `fecregistro` datetime NULL DEFAULT current_timestamp,
  PRIMARY KEY (`idempresa`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE empresas;