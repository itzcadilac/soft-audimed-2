--liquibase formatted sql
--changeset lizandro.alipazaga:202502190703 
--comment Se crea la tabla modulos
CREATE TABLE `modulos`  (
  `idmodulo` smallint NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `menu` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `icono` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `url` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `imagen` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mini` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `orden` smallint NOT NULL,
  PRIMARY KEY (`idmodulo`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE modulos;

--changeset lizandro.alipazaga:202502190704 
--comment Se insertan datos en la tabla modulos
INSERT INTO `modulos` VALUES (1, 'Módulo de Registro de Usuarios y Accesos Personalizados', 'Módulo Usuarios', 'usuarios.png', 'usuarios', '1', 'fa fa-users', 2);
INSERT INTO `modulos` VALUES (2, 'Módulo de Configuración de Parámetros del Sistema', 'Módulo Parámetros', 'parametros.png', 'parametros', '1', 'fa fa-cubes', 3);
INSERT INTO `modulos` VALUES (3, 'Módulo de Gestión de Proveedores', 'Módulo Proveedores', 'logistica.png', 'logistica', '1', 'fa fa-truck', 4);
INSERT INTO `modulos` VALUES (4, 'Módulo de Registro de Siniestros', 'Módulo Siniestros', 'citas.png', 'siniestro', '1', 'fa fa-address-card-o', 1);
INSERT INTO `modulos` VALUES (5, 'Módulo de Servicios de Farmacia y Laboratorio', 'Módulo Atenciones', 'atenciones.png', 'farmacias', '1', 'fa fa-universal-access', 5);
INSERT INTO `modulos` VALUES (6, 'Módulo de Facturacion y Registros Administrativos', 'Módulo Facturacion', 'facturacion.png', 'facturacion', '1', 'fa fa-university', 6);
INSERT INTO `modulos` VALUES (7, 'Módulo de Recusos Humanos y Gestion del Talento Humano', 'Módulo RR.HH.', 'rrhh.png', 'rrhh', '1', 'fa fa-users', 7);
INSERT INTO `modulos` VALUES (8, 'Módulo de Gestion de Reportes y Visualizacion de Dashboard', 'Módulo Reportes', 'dashboard.png', 'dashboard', '1', 'fa fa-calculator', 8);

--rollback DELETE FROM modulos WHERE idmodulo <= 8;