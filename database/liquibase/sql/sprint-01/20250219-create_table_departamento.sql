--liquibase formatted sql
--changeset lizandro.alipazaga:202502190724 
--comment Se crea la tabla departamento
CREATE TABLE `departamento`  (
  `iddepartamento` smallint NOT NULL AUTO_INCREMENT,
  `departamento` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `observaciones` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`iddepartamento`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE departamento;

--changeset lizandro.alipazaga:202502190725 
--comment Se insertan datos en la tabla departamento
INSERT INTO `departamento` VALUES (1, 'ORTOPEDIA Y TRAUMATOLOGIA', '[N/A]', '1');
INSERT INTO `departamento` VALUES (2, 'TERAPIA FISICA', '[N/A]', '1');

--rollback DELETE FROM departamento WHERE iddepartamento IN (1,2);