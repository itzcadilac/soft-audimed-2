--liquibase formatted sql
--changeset lizandro.alipazaga:202502202230
--comment Se crea la tabla usuario_aseguradora
CREATE TABLE `usuario_aseguradora`  (
  `idusuarioaseguradora` INT AUTO_INCREMENT PRIMARY KEY,
  `idaseguradora` int NULL DEFAULT NULL,
  `idusuario` int NULL DEFAULT NULL,
  `feccreacion` timestamp NULL DEFAULT current_timestamp,
  `fecmodificacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `estado` int NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE usuario_aseguradora;

--changeset lizandro.alipazaga:202502202231
--comment Se insertan datos en la tabla usuario_aseguradora
INSERT INTO audimed2.usuario_aseguradora (idusuarioaseguradora, idaseguradora, idusuario, fecmodificacion, estado) VALUES(1, 1, 11, NULL, 1);
INSERT INTO audimed2.usuario_aseguradora (idusuarioaseguradora, idaseguradora, idusuario, fecmodificacion, estado) VALUES(2, 1, 12, NULL, 1);
INSERT INTO audimed2.usuario_aseguradora (idusuarioaseguradora, idaseguradora, idusuario, fecmodificacion, estado) VALUES(3, 2, 12, NULL, 1);
INSERT INTO audimed2.usuario_aseguradora (idusuarioaseguradora, idaseguradora, idusuario, fecmodificacion, estado) VALUES(4, 3, 12, NULL, 1);

--rollback DELETE FROM audimed2.usuario_aseguradora WHERE idusuarioaseguradora IN (1,2,3,4);