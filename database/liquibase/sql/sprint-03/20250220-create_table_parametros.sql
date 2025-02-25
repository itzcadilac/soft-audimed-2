--liquibase formatted sql
--changeset lizandro.alipazaga:202502202144
--comment Se crea la tabla parametros
CREATE TABLE `parametros`  (
  `idparametro` bigint AUTO_INCREMENT,
  `tipo` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `codigo` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `valor` TEXT NULL,
  `activo` smallint DEFAULT 1,
  `eliminado` smallint DEFAULT 0,
  `estadoreg` smallint DEFAULT 0,
  `fcreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `fupdated` datetime NULL,
  PRIMARY KEY (`idparametro`) USING BTREE,
  INDEX `idparametro`(`idparametro` ASC) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE parametros;

--changeset lizandro.alipazaga:202502202145
--comment Se insertan datos en la tabla parametros
insert into parametros (idparametro, tipo, codigo, valor) 
values 
(1, 'GLOBAL', 'IDLE_SESSION', '30'),
(2, 'GLOBAL', 'REINTENTOS_BLOQUEO', '5'),
(3, 'PAGINACION', 'SINIESTROS', '30');

--rollback DELETE FROM parametros WHERE idparametro IN(1,2,3);
