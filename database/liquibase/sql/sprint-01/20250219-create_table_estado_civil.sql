--liquibase formatted sql
--changeset lizandro.alipazaga:202502190733 
--comment Se crea la tabla estado_civil
CREATE TABLE `estado_civil`  (
  `idestadocivil` smallint NOT NULL AUTO_INCREMENT,
  `estado_civil` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idestadocivil`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE estado_civil;

--changeset lizandro.alipazaga:202502190725 
--comment Se insertan datos en la tabla estado_civil
INSERT INTO `estado_civil` VALUES (1, 'Soltero(a)', '1');
INSERT INTO `estado_civil` VALUES (2, 'Casado(a)', '1');
INSERT INTO `estado_civil` VALUES (3, 'Conviviente', '1');
INSERT INTO `estado_civil` VALUES (4, 'Viudo(a)', '1');
INSERT INTO `estado_civil` VALUES (5, 'Divorciado(a)', '1');
INSERT INTO `estado_civil` VALUES (6, 'No Especifica', '1');

--rollback DELETE FROM estado_civil WHERE idestadocivil IN (1,2,3,4,5,6);