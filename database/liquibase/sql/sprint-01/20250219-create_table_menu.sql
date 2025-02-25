--liquibase formatted sql
--changeset lizandro.alipazaga:202502190814 
--comment Se crea la tabla menu
CREATE TABLE `menu`  (
  `idmenu` smallint NOT NULL AUTO_INCREMENT,
  `idmodulo` smallint NOT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nivel` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `url` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `icono` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idmenu`) USING BTREE,
  INDEX `idmodulo`(`idmodulo` ASC) USING BTREE,
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`idmodulo`) REFERENCES `modulos` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE menu;

--changeset lizandro.alipazaga:202502190815 
--comment Se insertan datos en la tabla menu
INSERT INTO `menu` VALUES (1, 1, 'Lista Usuarios', '0', 'usuarios', 'fa fa-list', '1');
INSERT INTO `menu` VALUES (2, 1, 'Nuevo Registro', '0', 'nuevousuario', 'fa fa-pencil-square-o', '1');
INSERT INTO `menu` VALUES (3, 2, 'Registro Empresas', '0', 'empresas', 'fa fa-file-text-o', '1');
INSERT INTO `menu` VALUES (4, 2, 'Centros de Costos', '0', 'centros', 'fa fa-money', '1');
INSERT INTO `menu` VALUES (5, 3, 'Registro Proveedores', '0', 'proveedores', 'fa fa-file-powerpoint-o', '1');
INSERT INTO `menu` VALUES (6, 3, 'Catálogo Bienes', '0', 'bienes', 'fa fa-window-maximize', '1');
INSERT INTO `menu` VALUES (7, 3, 'Catálogo Servicios', '0', 'servicios', 'fa fa-exchange', '1');
INSERT INTO `menu` VALUES (8, 3, 'Registro Almacenes', '0', 'almacenes', 'fa fa-building', '1');
INSERT INTO `menu` VALUES (9, 3, 'Ordenes de Compra', '0', 'ocompra', 'fa fa-id-card-o', '1');
INSERT INTO `menu` VALUES (10, 3, 'Ordenes de Servicio', '0', 'oservicio', 'fa fa-keyboard-o', '1');
INSERT INTO `menu` VALUES (11, 3, 'Guia de Ingreso', '0', 'gentrada', 'fa fa-angle-double-up', '1');
INSERT INTO `menu` VALUES (12, 3, 'Guia de Salida', '0', 'gsalida', 'fa fa-angle-double-down', '1');
INSERT INTO `menu` VALUES (13, 4, 'Registro Pacientes', '0', 'pacientes', 'fa fa-child', '1');
INSERT INTO `menu` VALUES (14, 4, 'Registro Profesionales', '0', 'medicos', 'fa fa-heartbeat', '1');
INSERT INTO `menu` VALUES (15, 4, 'Registro Consultorios', '0', 'consultorios', 'fa fa-life-ring', '1');
INSERT INTO `menu` VALUES (16, 4, 'Registro de Turnos', '0', 'turnos', 'fa fa-bars', '1');
INSERT INTO `menu` VALUES (17, 4, 'Registro de Citas', '0', 'citas', 'fa fa-thermometer-empty', '1');
INSERT INTO `menu` VALUES (18, 4, 'Registro Procedimientos', '0', 'procedimientos', 'fa fa-window-maximize', '1');
INSERT INTO `menu` VALUES (19, 4, 'Historia Clinica', '0', 'historia', 'fa fa-id-card-o', '1');

--rollback DELETE FROM menu WHERE idmenu<=19;