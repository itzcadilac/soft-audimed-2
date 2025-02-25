--liquibase formatted sql
--changeset lizandro.alipazaga:202502242000
--comment Se insertan datos en la tabla perfil_aseguradora
INSERT INTO `perfil_aseguradora` VALUES (1, 1, 1, 'SOAT,ACP', 0, 0, '2025-02-11 16:31:50', '2025-02-11 16:32:34', NULL, NULL);
INSERT INTO `perfil_aseguradora` VALUES (2, 2, 1, 'SOAT,ACP,SEVEH', 0, 0, '2025-02-11 16:32:44', '2025-02-11 16:32:59', NULL, NULL);
INSERT INTO `perfil_aseguradora` VALUES (3, 3, 1, 'ACP', 0, 0, '2025-02-11 16:32:47', '2025-02-11 16:33:04', NULL, NULL);

--rollback DELETE FROM perfil_aseguradora WHERE idperfilaseguradora IN (1,2,3);
