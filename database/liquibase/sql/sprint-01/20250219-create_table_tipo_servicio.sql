--liquibase formatted sql
--changeset lizandro.alipazaga:202502192112
--comment Se crea la tabla tipo_servicio
CREATE TABLE `tipo_servicio`  (
  `idtiposervicio` smallint NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idtiposervicio`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE tipo_servicio;

--changeset lizandro.alipazaga:202502192113
--comment Se insertan datos en la tabla tipo_servicio
INSERT INTO `tipo_servicio` VALUES (1, 'CONSULTA EXTERNA', '1');
INSERT INTO `tipo_servicio` VALUES (2, 'EXAMENES AUXILIARES', '1');
INSERT INTO `tipo_servicio` VALUES (3, 'HOSPITALIZACION', '1');
INSERT INTO `tipo_servicio` VALUES (4, 'INTERVENCIONES', '1');
INSERT INTO `tipo_servicio` VALUES (5, 'SERVICIO CLINICO', '1');
INSERT INTO `tipo_servicio` VALUES (6, 'PROCEDIMIENTOS', '1');
INSERT INTO `tipo_servicio` VALUES (7, 'SERVICIO MEDICO', '1');
INSERT INTO `tipo_servicio` VALUES (8, 'TERAPIA FISICA', '1');
INSERT INTO `tipo_servicio` VALUES (9, 'OTROS SERVICIOS', '1');

--rollback DELETE FROM tipo_servicio WHERE idtiposervicio <= 9;
