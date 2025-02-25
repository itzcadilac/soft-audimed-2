--liquibase formatted sql
--changeset lizandro.alipazaga:202502202142
--comment Se crea la tabla auditoria
CREATE TABLE `auditoria`  (
  `idauditoria` bigint AUTO_INCREMENT,
  `fcreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `tipo` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `idusuario` smallint NULL,
  `remotehost` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `remotemachine` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `contenido` TEXT NULL,
  `lat` DECIMAL(9,6) NULL,
  `lon` DECIMAL(9,6) NULL,
  PRIMARY KEY (`idauditoria`) USING BTREE,
  INDEX `idauditoria`(`idauditoria` ASC) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE auditoria;