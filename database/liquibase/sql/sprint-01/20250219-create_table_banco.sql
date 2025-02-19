--liquibase formatted sql
--changeset lizandro.alipazaga:202502180121 
--comment Se crea la tabla banco
CREATE TABLE `banco`  (
  `idbanco` smallint NOT NULL AUTO_INCREMENT,
  `banco` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idbanco`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE banco;

--changeset lizandro.alipazaga:202502180122 
--comment Se insertan datos en la tabla banco
INSERT INTO `banco` VALUES (1, 'BANCO DE COMERCIO', '1');
INSERT INTO `banco` VALUES (2, 'BANCO DE CRÉDITO DEL PERÚ', '1');
INSERT INTO `banco` VALUES (3, 'BANCO INTERAMERICANO DE FINANZAS (BANBIF)', '1');
INSERT INTO `banco` VALUES (4, 'BANCO PICHINCHA', '1');
INSERT INTO `banco` VALUES (5, 'BBVA', '1');
INSERT INTO `banco` VALUES (6, 'CITIBANK PERÚ', '1');
INSERT INTO `banco` VALUES (7, 'INTERBANK', '1');
INSERT INTO `banco` VALUES (8, 'MIBANCO', '1');
INSERT INTO `banco` VALUES (9, 'SCOTIABANK PERÚ', '1');
INSERT INTO `banco` VALUES (10, 'BANCO GNB PERÚ', '1');
INSERT INTO `banco` VALUES (11, 'BANCO FALABELLA', '1');
INSERT INTO `banco` VALUES (12, 'BANCO RIPLEY', '1');
INSERT INTO `banco` VALUES (13, 'BANCO SANTANDER PERÚ', '1');
INSERT INTO `banco` VALUES (14, 'ALFIN BANCO', '1');
INSERT INTO `banco` VALUES (15, 'BANK OF CHINA', '1');
INSERT INTO `banco` VALUES (16, 'BCI PERÚ', '1');
INSERT INTO `banco` VALUES (17, 'ICBC PERU BANK', '1');

--rollback DELETE FROM banco WHERE idbanco <=17;