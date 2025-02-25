--liquibase formatted sql
--changeset lizandro.alipazaga:202502202355
--comment Se crea la tabla perfil_aseguradora
CREATE TABLE `perfil_aseguradora`  (
  `idperfilaseguradora` bigint NOT NULL,
  `idaseguradora` bigint NOT NULL,
  `idperfil` bigint NOT NULL,
  `productos` varchar(240) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `eliminado` smallint DEFAULT 0,
  `estadoreg` smallint DEFAULT 0,
  `createdat` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`idperfilaseguradora`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE perfil_aseguradora;