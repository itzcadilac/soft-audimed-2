--liquibase formatted sql
--changeset lizandro.alipazaga:202502202159
--comment Se crea la tabla personas
CREATE TABLE `personas`  (
  `idepersona` int NOT NULL AUTO_INCREMENT,
  `tipdocumento` int NULL DEFAULT NULL,
  `documento` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nombres` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ape_paterno` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ape_materno` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `estado` int NULL DEFAULT 1,
  `fecregistro` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`idepersona`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE personas;
