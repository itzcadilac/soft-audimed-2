--liquibase formatted sql
--changeset lizandro.alipazaga:202502192110
--comment Se crea la tabla tipo_profesional
CREATE TABLE `tipo_profesional`  (
  `idtipoprofesional` smallint NOT NULL AUTO_INCREMENT,
  `tipo_profesional` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `observaciones` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idtipoprofesional`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE tipo_profesional;

--changeset lizandro.alipazaga:202502192111
--comment Se insertan datos en la tabla tipo_profesional
INSERT INTO `tipo_profesional` VALUES (1, 'MEDICO', '[N/A]', '1');
INSERT INTO `tipo_profesional` VALUES (2, 'ENFERMERO', '[N/A]', '1');
INSERT INTO `tipo_profesional` VALUES (3, 'AUXILIAR TECNICO', '[N/A]', '1');
INSERT INTO `tipo_profesional` VALUES (4, 'QUIMICO FARMACEUTICO', '[N/A]', '1');
INSERT INTO `tipo_profesional` VALUES (5, 'TERAPISTA', '[N/A]', '1');

--rollback DELETE FROM tipo_profesional WHERE idtipoprofesional <= 5;
