--liquibase formatted sql
--changeset lizandro.alipazaga:202502192045
--comment Se crea la tabla ss_rubro
CREATE TABLE `ss_rubro`  (
  `idrubro` smallint NOT NULL AUTO_INCREMENT,
  `codigo_rubro` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rubro` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idrubro`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE ss_rubro;

--changeset lizandro.alipazaga:202502192046
--comment Se insertan datos en la tabla ss_rubro
INSERT INTO `ss_rubro` VALUES (1, '01', 'HOTELERIA (CUARTO Y ALIMENTACION)', '1');
INSERT INTO `ss_rubro` VALUES (2, '02', 'CONSULTAS/HONORARIOS', '1');
INSERT INTO `ss_rubro` VALUES (3, '03', 'SERVICIOS CLINICOS', '1');
INSERT INTO `ss_rubro` VALUES (4, '04', 'LABORATORIO', '1');
INSERT INTO `ss_rubro` VALUES (5, '05', 'FARMACIA/INSUMOS', '1');
INSERT INTO `ss_rubro` VALUES (6, '06', 'RAYOS X', '1');
INSERT INTO `ss_rubro` VALUES (7, '07', 'TRATAMIENTOS ESPECIALES', '1');
INSERT INTO `ss_rubro` VALUES (8, '08', 'AYUDANTES - INSTRUMENTISTAS', '1');
INSERT INTO `ss_rubro` VALUES (9, '09', 'CIRUJANO', '1');
INSERT INTO `ss_rubro` VALUES (10, '10', 'EXAMENES AUXILIARES Y/O ESPECIALES (IMAGENES)', '1');
INSERT INTO `ss_rubro` VALUES (11, '11', 'ANESTECISTAS', '1');
INSERT INTO `ss_rubro` VALUES (12, '12', 'TRATAMIENTO PALIATIVO Y TERAPIA DEL DOLOR', '1');
INSERT INTO `ss_rubro` VALUES (13, '13', 'PROCEDIMIENTOS ODONTOLOGICOS', '1');
INSERT INTO `ss_rubro` VALUES (14, '14', 'PROTESIS', '1');
INSERT INTO `ss_rubro` VALUES (15, '15', 'OTROS', '1');

--rollback DELETE FROM ss_rubro WHERE idrubro <= 15;
