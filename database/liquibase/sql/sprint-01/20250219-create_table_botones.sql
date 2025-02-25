--liquibase formatted sql
--changeset lizandro.alipazaga:202502190710 
--comment Se crea la tabla botones
CREATE TABLE `botones`  (
  `idboton` smallint NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tipo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `orden` smallint NOT NULL,
  `idmodulo` smallint NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idboton`) USING BTREE,
  INDEX `idmodulo`(`idmodulo` ASC) USING BTREE,
  CONSTRAINT `botones_ibfk_1` FOREIGN KEY (`idmodulo`) REFERENCES `modulos` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE botones;

--changeset lizandro.alipazaga:202502190711 
--comment Se insertan datos en la tabla botones
INSERT INTO `botones` VALUES (1, 'Editar Usuario', '1', 1, 1, '1');
INSERT INTO `botones` VALUES (2, 'Asignar Permisos', '1', 2, 1, '1');
INSERT INTO `botones` VALUES (3, 'Resetar Clave', '1', 3, 1, '1');
INSERT INTO `botones` VALUES (4, 'Activar/Desactivar', '1', 4, 1, '1');
INSERT INTO `botones` VALUES (5, 'Editar Empresa', '1', 1, 2, '1');
INSERT INTO `botones` VALUES (6, 'Anular Empresa', '1', 2, 2, '1');
INSERT INTO `botones` VALUES (7, 'Editar Centro', '1', 1, 2, '1');
INSERT INTO `botones` VALUES (8, 'Anular Centro', '1', 2, 2, '1');
INSERT INTO `botones` VALUES (9, 'Editar Proveedor', '1', 1, 3, '1');
INSERT INTO `botones` VALUES (10, 'Asignar Cuentas', '1', 1, 3, '1');
INSERT INTO `botones` VALUES (11, 'Anular Proveedor', '1', 2, 3, '1');
INSERT INTO `botones` VALUES (12, 'Editar Articulo', '1', 3, 3, '1');
INSERT INTO `botones` VALUES (13, 'Codigos Articulo', '1', 4, 3, '1');
INSERT INTO `botones` VALUES (14, 'Anular Articulo', '1', 5, 3, '1');
INSERT INTO `botones` VALUES (15, 'Editar Servicio', '1', 6, 3, '1');
INSERT INTO `botones` VALUES (16, 'Codigos Servicios', '1', 7, 3, '1');
INSERT INTO `botones` VALUES (17, 'Anular Servicios', '1', 8, 3, '1');
INSERT INTO `botones` VALUES (18, 'Editar Almacén', '1', 9, 3, '1');
INSERT INTO `botones` VALUES (19, 'Anular Almacén', '1', 10, 3, '1');
INSERT INTO `botones` VALUES (20, 'Editar Paciente', '1', 9, 4, '1');
INSERT INTO `botones` VALUES (21, 'Asignar Seguro', '1', 9, 4, '1');
INSERT INTO `botones` VALUES (22, 'Anular Paciente', '1', 9, 4, '1');
INSERT INTO `botones` VALUES (23, 'Editar Profesional', '1', 9, 4, '1');
INSERT INTO `botones` VALUES (24, 'Anular Profesional', '1', 9, 4, '1');
INSERT INTO `botones` VALUES (25, 'Editar Consultorio', '1', 9, 4, '1');
INSERT INTO `botones` VALUES (26, 'Anular COnsultorio', '1', 9, 4, '1');
INSERT INTO `botones` VALUES (27, 'Editar Turno', '1', 9, 4, '1');
INSERT INTO `botones` VALUES (28, 'Asignar Horario', '1', 9, 4, '1');
INSERT INTO `botones` VALUES (29, 'Anular Turno', '1', 9, 4, '1');
INSERT INTO `botones` VALUES (30, 'Asignar Paciente', '1', 9, 4, '1');
INSERT INTO `botones` VALUES (31, 'Confirmar Atencion', '1', 9, 4, '1');
INSERT INTO `botones` VALUES (32, 'Anular Cita', '1', 9, 4, '1');
INSERT INTO `botones` VALUES (33, 'Editar Procedimiento', '1', 9, 4, '1');
INSERT INTO `botones` VALUES (34, 'Generar Formula', '1', 9, 4, '1');
INSERT INTO `botones` VALUES (35, 'Anular Procedimiento', '1', 9, 4, '1');
INSERT INTO `botones` VALUES (36, 'Registrar Atencion', '1', 9, 4, '1');
INSERT INTO `botones` VALUES (37, 'Ver Historia', '1', 9, 4, '1');
INSERT INTO `botones` VALUES (38, 'Anular Historia', '1', 9, 4, '1');
INSERT INTO `botones` VALUES (39, 'Editar Orden Compra', '1', 11, 3, '1');
INSERT INTO `botones` VALUES (40, 'Anular Orden Compra', '1', 12, 3, '1');
INSERT INTO `botones` VALUES (41, 'Visualizar Orden Compra', '1', 13, 3, '1');
INSERT INTO `botones` VALUES (42, 'Editar Orden Servicio', '1', 14, 3, '1');
INSERT INTO `botones` VALUES (43, 'Anular Orden Servicio', '1', 15, 3, '1');
INSERT INTO `botones` VALUES (44, 'Visualizar Orden Servicio', '1', 16, 3, '1');
INSERT INTO `botones` VALUES (45, 'Editar Guia Ingreso', '1', 14, 3, '1');
INSERT INTO `botones` VALUES (46, 'Anular Guia Ingreso', '1', 15, 3, '1');
INSERT INTO `botones` VALUES (47, 'Visualizar Guia Ingreso', '1', 16, 3, '1');
INSERT INTO `botones` VALUES (48, 'Editar Guia Salida', '1', 17, 3, '1');
INSERT INTO `botones` VALUES (49, 'Anular Guia Salida', '1', 18, 3, '1');
INSERT INTO `botones` VALUES (50, 'Visualizar Guia Salida', '1', 19, 3, '1');

--rollback DELETE FROM botones WHERE idboton <= 50;