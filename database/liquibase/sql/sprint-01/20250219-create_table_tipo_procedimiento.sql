--liquibase formatted sql
--changeset lizandro.alipazaga:202502192108
--comment Se crea la tabla tipo_procedimiento
CREATE TABLE `tipo_procedimiento`  (
  `idtipoprocedimiento` smallint NOT NULL AUTO_INCREMENT,
  `codigo_tipo_procedimiento` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tipo_procedimiento` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idtipoprocedimiento`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE tipo_procedimiento;

--changeset lizandro.alipazaga:202502192109
--comment Se insertan datos en la tabla tipo_procedimiento
INSERT INTO `tipo_procedimiento` VALUES (1, 'CA', 'CONSULTA EXTERNA', '1');
INSERT INTO `tipo_procedimiento` VALUES (2, 'EA', 'EXAMENES AUXILIARES', '1');
INSERT INTO `tipo_procedimiento` VALUES (3, 'FA', 'FARMACIA', '1');
INSERT INTO `tipo_procedimiento` VALUES (4, 'HO', 'HOSPITALIZACION', '1');
INSERT INTO `tipo_procedimiento` VALUES (5, 'IN', 'INTERVENCIONES', '1');
INSERT INTO `tipo_procedimiento` VALUES (6, 'SC', 'SERVICIO CLINICO', '1');
INSERT INTO `tipo_procedimiento` VALUES (7, 'PR', 'PROCEDIMIENTOS', '1');
INSERT INTO `tipo_procedimiento` VALUES (8, 'PM', 'PAQUETES A MEDIDA', '1');
INSERT INTO `tipo_procedimiento` VALUES (9, 'SM', 'SERVICIO MEDICO', '1');
INSERT INTO `tipo_procedimiento` VALUES (10, 'TF', 'TERAPIA FISICA', '1');
INSERT INTO `tipo_procedimiento` VALUES (11, 'OS', 'OTROS SERVICIOS', '1');
INSERT INTO `tipo_procedimiento` VALUES (12, 'LA', 'LABORARTORIO', '1');

--rollback DELETE FROM tipo_procedimiento WHERE idtipoprocedimiento <= 12;
