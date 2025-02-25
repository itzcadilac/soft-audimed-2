--liquibase formatted sql
--changeset lizandro.alipazaga:202502192118
--comment Se crea la tabla unidad_medida
CREATE TABLE `unidad_medida`  (
  `idunidadmedida` smallint NOT NULL AUTO_INCREMENT,
  `unidad_medida` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `abreviatura` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `uso_bienes` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `uso_servicios` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idunidadmedida`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE unidad_medida;

--changeset lizandro.alipazaga:202502192119
--comment Se insertan datos en la tabla unidad_medida
INSERT INTO `unidad_medida` VALUES (1, 'SERVICIO', 'Serv', '0', '1', '1');
INSERT INTO `unidad_medida` VALUES (2, 'UNIDAD', 'Und', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (3, 'KILOGRAMO', 'kg', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (4, 'GRAMO', 'g', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (5, 'LITRO', 'L', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (6, 'METRO', 'm', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (7, 'CENTÍMETRO', 'cm', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (8, 'MILÍMETRO', 'mm', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (9, 'METRO CUADRADO', 'm²', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (10, 'METRO CÚBICO', 'm³', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (11, 'KILÓMETRO', 'km', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (12, 'TONELADA', 't', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (13, 'LIBRA', 'lb', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (14, 'ONZA', 'oz', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (15, 'GALÓN', 'gal', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (16, 'BARRIL', 'bbl', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (17, 'DOCENA', 'doz', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (18, 'CAJA', 'caja', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (19, 'BOLSA', 'bolsa', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (20, 'PAQUETE', 'paq', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (21, 'BOTELLA', 'bot', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (22, 'LATA', 'lata', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (23, 'PIEZA', 'pz', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (24, 'PAR', 'par', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (25, 'ROLLO', 'rollo', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (26, 'PALLET', 'pallet', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (27, 'BOLSA DE KILOGRAMOS', 'kg', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (28, 'BOLSA DE LIBRAS', 'lb', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (29, 'JUEGO', 'juego', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (30, 'LITRO POR MINUTO', 'L/min', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (31, 'METRO POR SEGUNDO', 'm/s', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (32, 'PORCENTAJE', '%', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (33, 'GALÓN ESTADOUNIDENSE', 'gal (US)', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (34, 'BARRIL ESTADOUNIDENSE', 'bbl (US)', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (35, 'CIENTO', 'cto', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (36, 'METRO LINEAL', 'ml', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (37, 'METRO CUADRADO POR LITRO', 'm²/L', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (38, 'METRO CÚBICO POR HORA', 'm³/h', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (39, 'KILÓMETRO POR HORA', 'km/h', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (40, 'TONELADA MÉTRICA CORTA', 't (corta)', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (41, 'TONELADA MÉTRICA LARGA', 't (larga)', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (42, 'UNIDAD INTERNACIONAL', 'UI', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (43, 'PIE CUADRADO', 'ft²', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (44, 'PULGADA', 'in', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (45, 'YARDA', 'yd', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (46, 'PIE', 'ft', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (47, 'HECTÁREA', 'ha', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (48, 'ACRE', 'acre', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (49, 'LIBRA POR PIE CUADRADO', 'lb/ft²', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (50, 'ONZA POR GALÓN', 'oz/gal', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (51, 'PIE CÚBICO POR MINUTO', 'ft³/min', '1', '0', '1');
INSERT INTO `unidad_medida` VALUES (52, 'KILOWATT HORA', 'kWh', '1', '0', '1');

--rollback DELETE FROM unidad_medida WHERE idunidadmedida <= 52;
