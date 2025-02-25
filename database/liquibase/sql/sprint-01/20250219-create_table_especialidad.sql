--liquibase formatted sql
--changeset lizandro.alipazaga:202502190728 
--comment Se crea la tabla especialidad
CREATE TABLE `especialidad`  (
  `idespecialidad` smallint NOT NULL AUTO_INCREMENT,
  `especialidad` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `observaciones` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idespecialidad`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE especialidad;

--changeset lizandro.alipazaga:202502190729 
--comment Se insertan datos en la tabla especialidad
INSERT INTO `especialidad` VALUES (1, '[N/A]', '[N/A]', '1');
INSERT INTO `especialidad` VALUES (2, 'TRAUMATOLOGIA', '[N/A]', '1');
INSERT INTO `especialidad` VALUES (3, 'CIRUGIA GENERAL', '[N/A]', '1');
INSERT INTO `especialidad` VALUES (4, 'CIRUGIA PLASTICA', '[N/A]', '1');
INSERT INTO `especialidad` VALUES (5, 'CARDIOLOGIA', '[N/A]', '1');
INSERT INTO `especialidad` VALUES (6, 'TERAPIA FISICA', '[N/A]', '1');
INSERT INTO `especialidad` VALUES (7, 'NEUROCIRUGIA', '[N/A]', '1');
INSERT INTO `especialidad` VALUES (8, 'ORTOPEDIA Y TRAUMATOLOGIA', '[N/A]', '1');
INSERT INTO `especialidad` VALUES (9, 'OTORRINOLARINGOLOGIA', '[N/A]', '1');
INSERT INTO `especialidad` VALUES (10, 'GASTROENTEROLOGIA', '[N/A]', '1');
INSERT INTO `especialidad` VALUES (11, 'ANESTESIOLOGIA', '[N/A]', '1');
INSERT INTO `especialidad` VALUES (12, 'RADIOLOGIA', '[N/A]', '1');
INSERT INTO `especialidad` VALUES (13, 'MEDICINA FISICA Y REHABILITACION', '[N/A]', '1');

--rollback DELETE FROM especialidad WHERE idespecialidad <=13;