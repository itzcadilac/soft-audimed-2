--liquibase formatted sql
--changeset lizandro.alipazaga:202502202151
--comment Se crea la tabla notificaciones
CREATE TABLE `notificaciones`  (
  `idnotificacion` bigint AUTO_INCREMENT,
  `codeplantilla` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tipo` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fecha` datetime NULL,
  `fexpiracion` datetime NULL,
  `fenvio` datetime NULL,
  `usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `email` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `cc` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `bcc` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `token_fcm` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `topic_fcm` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `subject` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `contenido` TEXT NULL,
  `uuid` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `enviado` smallint DEFAULT 0,
  `reintentos` smallint DEFAULT 0,
  `activo` smallint DEFAULT 1,
  `eliminado` smallint DEFAULT 0,
  `estadoreg` smallint DEFAULT 0,
  `fcreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `fupdated` datetime NULL,
  PRIMARY KEY (`idnotificacion`) USING BTREE,
  INDEX `idnotificacion`(`idnotificacion` ASC) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE notificaciones;