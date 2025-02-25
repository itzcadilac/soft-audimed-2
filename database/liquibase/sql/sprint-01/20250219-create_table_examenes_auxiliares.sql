--liquibase formatted sql
--changeset lizandro.alipazaga:202502190753 
--comment Se crea la tabla examenes_auxiliares
CREATE TABLE `examenes_auxiliares`  (
  `idexamenauxiliar` smallint NOT NULL AUTO_INCREMENT,
  `correlativo` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `examen_auxiliar` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tarifa_base` decimal(20, 2) NULL DEFAULT 0.00,
  `activo` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`idexamenauxiliar`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE examenes_auxiliares;

--changeset lizandro.alipazaga:202502190754 
--comment Se insertan datos en la tabla examenes_auxiliares
INSERT INTO `examenes_auxiliares` VALUES (1, 'EA000001', 'RX BRAZO C/U', 55.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (2, 'EA000002', 'RX CADERAS COXOFEMORAL C/U', 50.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (3, 'EA000003', 'RX CLAVICULA', 55.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (4, 'EA000004', 'RX CODO (F.P. AXIAL)', 70.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (5, 'EA000005', 'RX CODO C/U', 55.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (6, 'EA000006', 'RX COLUMNA CERVICAL', 60.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (7, 'EA000007', 'RX COLUMNA CERVICAL (F.P.O)', 100.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (8, 'EA000008', 'RX COLUMNA CERVICAL FUNCIONAL', 120.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (9, 'EA000009', 'RX COLUMNA DORSAL', 60.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (10, 'EA000010', 'RX COLUMNA DORSO - LUMBAR', 70.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (11, 'EA000011', 'RX COLUMNA LUMBAR', 60.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (12, 'EA000012', 'RX COLUMNA LUMBAR (F.P.O)', 95.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (13, 'EA000013', 'RX COLUMNA LUMBO - SACRA', 60.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (14, 'EA000014', 'RX COLUMNA SACRO - COXIGEA', 60.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (15, 'EA000015', 'RX EDAD OSEA', 70.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (16, 'EA000016', 'RX ESTERNON', 55.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (17, 'EA000017', 'RX HOMBRO C/U', 55.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (18, 'EA000018', 'RX MANO C/U', 55.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (19, 'EA000019', 'RX MEDICION DE MIEMBROS', 160.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (20, 'EA000020', 'RX MUNECAS C/U', 55.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (21, 'EA000021', 'RX MUSLO C/U', 55.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (22, 'EA000022', 'RX PARRILLA COSTAL', 55.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (23, 'EA000023', 'RX PELVIMETRIA', 120.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (24, 'EA000024', 'RX PELVIS', 65.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (25, 'EA000025', 'RX PIE C/U', 55.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (26, 'EA000026', 'RX PIERNA C/U', 55.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (27, 'EA000027', 'RX RODILLA C/U', 55.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (28, 'EA000028', 'RX SACROILIACA', 70.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (29, 'EA000029', 'RX TELERADIOGRAFIA MIEMBROS INFERIORES', 160.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (30, 'EA000030', 'RX TOBILLO C/U', 55.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (31, 'EA000031', 'RX TORAX', 60.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (32, 'EA000032', 'RX TORAX (F-L)', 80.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (33, 'EA000033', 'RX ARCO ZIGOMATICO (F-L)', 64.90, '1');
INSERT INTO `examenes_auxiliares` VALUES (34, 'EA000034', 'RX CRANEO (F-L)', 64.90, '1');
INSERT INTO `examenes_auxiliares` VALUES (35, 'EA000035', 'AMBULANCIA', 350.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (36, 'EA000036', 'RX AGUJEROS OPTICOS ', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (37, 'EA000037', 'RX ART. TEMPORO MAXILAR ', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (38, 'EA000038', 'RX CAVUM', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (39, 'EA000039', 'RX HUESOS NASALES', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (40, 'EA000040', 'RX MASTOIDES', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (41, 'EA000041', 'RX MAXILAR SUPERIOR', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (42, 'EA000042', 'RX MAXILAR INFERIOR', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (43, 'EA000043', 'RX MAXILAR INFERIOR F-L OBLICUA', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (44, 'EA000044', 'RX ORBITAS', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (45, 'EA000045', 'RX PENASCOS', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (46, 'EA000046', 'RX TEMPORAL', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (47, 'EA000047', 'RX SENOS PARANASALES', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (48, 'EA000048', 'RX SILLA TURCA', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (49, 'EA000049', 'RX CUERPO EXTRANO', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (50, 'EA000050', 'RX ABDOMEN SIMPLE', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (51, 'EA000051', 'RX ABDOMEN DE CUBITO Y DE PIE', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (52, 'EA000052', 'ECOGRAFIA 4D', 236.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (53, 'EA000053', 'ECOGRAFIA ABDOMEN INFERIOR (PELVICA)', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (54, 'EA000054', 'ECOGRAFIA DE PARTES BLANDAS OTROS', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (55, 'EA000055', 'ECOGRAFIA DE TIROIDES', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (56, 'EA000056', 'ECOGRAFIA DE TORAX', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (57, 'EA000057', 'ECOGRAFIA DOPPLER ABDOMINAL', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (58, 'EA000058', 'ECOGRAFIA DOPPLER CAROTIDEO', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (59, 'EA000059', 'ECOGRAFIA DOPPLER OTRAS REGIONES', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (60, 'EA000060', 'ECOGRAFIA DOPPLER RENAL', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (61, 'EA000061', 'ECOGRAFIA DOPPLER TESTICULAR', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (62, 'EA000062', 'ECOGRAFIA DOPPLER TRANSVAGINAL', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (63, 'EA000063', 'ECOGRAFIA GENETICA', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (64, 'EA000064', 'ECOGRAFIA MAMARIA', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (65, 'EA000065', 'ECOGRAFIA OBSTETRICA', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (66, 'EA000066', 'ECOGRAFIA DE PARTES BLANDAS, CABEZA, CUE', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (67, 'EA000067', 'ECOGRAFIA RENAL', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (68, 'EA000068', 'ECOGRAFIA TESTICULAR', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (69, 'EA000069', 'ECOGRAFIA TRANSVAGINAL', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (70, 'EA000070', 'ECOGRAFIA VESICULAR', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (71, 'EA000071', 'ECOGRAFIA VESICO PROSTATICO', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (72, 'EA000072', 'ECOGRAFIA, DISPLASIA DE CADERA', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (73, 'EA000073', 'ECOGRAFIA, PARTES BLANDAS EXT. ARTIC.', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (74, 'EA000074', 'ECOGRAFIA, PROSTATA-VESICULA SEMINAL', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (75, 'EA000075', 'PERFIL BIOSIFICO FETAL', 0.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (76, 'EA000076', 'PANORAMICA DE COLUMNA', 160.00, '1');
INSERT INTO `examenes_auxiliares` VALUES (77, 'EA000077', 'RX DE ANTEBRAZO', 0.00, '1');

--rollback DELETE FROM examenes_auxiliares WHERE idexamenauxiliar <= 77;