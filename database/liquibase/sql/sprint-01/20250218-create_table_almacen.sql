--liquibase formatted sql
--changeset lizandro.alipazaga:202502181121 
--comment Se crea la tabla almacen
CREATE TABLE `almacen`  (
  `idalmacen` smallint NOT NULL AUTO_INCREMENT,
  `idempresa` smallint NOT NULL,
  `numero` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nombre_almacen` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `domicilio` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ubigeo` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `latitud` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `longitud` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tipo_almacen` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idalmacen`) USING BTREE,
  INDEX `idempresa`(`idempresa` ASC) USING BTREE,
  CONSTRAINT `almacen_ibfk_1` FOREIGN KEY (`idempresa`) REFERENCES `empresa` (`idempresa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE almacen;

--changeset lizandro.alipazaga:202502181122 
--comment Se insertan datos en la tabla almacen
INSERT INTO `almacen` VALUES (1, 1, '01', 'ALMACEN LIMA', 'JR. SANCHEZ PINILLOS NRO. 188', '150101', '-12.048208', '-77.043831', '1', '1');
INSERT INTO `almacen` VALUES (2, 1, '02', 'FARMACIA LIMA', 'JR. SANCHEZ PINILLOS NRO. 188', '150101', '-12.048208', '-77.043831', '2', '1');
INSERT INTO `almacen` VALUES (3, 2, '01', 'ALMACEN LINCE', 'AV. PASEO DE LA REPUBLICA NRO. 2772', '150116', '-12.08992253', '-77.02398307', '1', '1');
INSERT INTO `almacen` VALUES (4, 2, '02', 'FARMACIA LINCE', 'AV. PASEO DE LA REPUBLICA NRO. 2772', '150116', '-12.08992253', '-77.02398307', '2', '1');

--rollback DELETE FROM almacen WHERE idalmacen IN (1, 2, 3, 4);