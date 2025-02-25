--liquibase formatted sql
--changeset lizandro.alipazaga:202502201711
--comment Se crea la tabla turnos_detalle
CREATE TABLE `turnos_detalle`  (
  `idturnodetalle` smallint NOT NULL AUTO_INCREMENT,
  `idturno` smallint NOT NULL,
  `fecha` date NULL DEFAULT NULL,
  `entrada1` time NULL DEFAULT NULL,
  `salida1` time NULL DEFAULT NULL,
  `entrada2` time NULL DEFAULT NULL,
  `salida2` time NULL DEFAULT NULL,
  `entrada3` time NULL DEFAULT NULL,
  `salida3` time NULL DEFAULT NULL,
  PRIMARY KEY (`idturnodetalle`) USING BTREE,
  INDEX `idturno`(`idturno` ASC) USING BTREE,
  CONSTRAINT `turnos_detalle_ibfk_1` FOREIGN KEY (`idturno`) REFERENCES `turnos` (`idturno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE turnos_detalle;