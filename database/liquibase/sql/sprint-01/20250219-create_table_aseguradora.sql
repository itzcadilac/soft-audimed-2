--liquibase formatted sql
--changeset lizandro.alipazaga:202502181125 
--comment Se crea la tabla aseguradora
CREATE TABLE `aseguradora` (
  `idaseguradora` smallint NOT NULL AUTO_INCREMENT,
  `codigo_iafa` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `numero_ruc` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `razon_social` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nombre_comercial` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `domicilio` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ubigeo` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `latitud` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `longitud` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `celular` varchar(9) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `contacto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `correo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `observaciones` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idaseguradora`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE aseguradora;

--changeset lizandro.alipazaga:202502181126 
--comment Se insertan datos en la tabla aseguradora
INSERT INTO `aseguradora` VALUES (1, '00000', '00000000000', 'PARTICULAR', 'PARTICULAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');

--rollback DELETE FROM aseguradora WHERE idaseguradora IN (1);