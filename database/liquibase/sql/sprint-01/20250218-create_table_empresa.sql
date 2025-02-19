--liquibase formatted sql
--changeset lizandro.alipazaga:202502181133 
--comment Se crea la tabla empresa
CREATE TABLE `empresa`  (
  `idempresa` smallint NOT NULL AUTO_INCREMENT,
  `ruc` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `razon_social` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nombre_comercial` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `domicilio` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ubigeo` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `latitud` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `longitud` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `logotipo` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `renipress` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idempresa`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE empresa;

--changeset lizandro.alipazaga:202502181134 
--comment Se insertan datos en la tabla empresa
INSERT INTO `empresa` VALUES (1, '20603185197', 'ARTHRO MEDS SPORT S.A.C.', 'POLICLINICO ARTHRO MEDS (LIMA)', 'JR. SANCHEZ PINILLOS NRO. 188', '150101', '-12.048208', '-77.043831', NULL, '00027276', '1');
INSERT INTO `empresa` VALUES (2, '20605508384', 'MEDICAL ASSISTEM S.A.C.', 'ARTHROSALUD (LINCE)', 'AV. PASEO DE LA REPUBLICA NRO. 2772', '150116', '-12.08992253', '-77.02398307', NULL, '00033237', '1');

--rollback DELETE FROM empresa WHERE idempresa IN (1, 2);