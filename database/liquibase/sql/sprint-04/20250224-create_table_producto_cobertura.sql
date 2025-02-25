--liquibase formatted sql
--changeset lizandro.alipazaga:202502242155
--comment Se crea la tabla producto_cobertura
CREATE TABLE `producto_cobertura`  (
  `idproductocobertura` int NOT NULL AUTO_INCREMENT,
  `idproducto` int NOT NULL,
  `idcobertura` int NOT NULL,
  `idanio` smallint NOT NULL,
  `createdat` datetime NULL,
  `updatedat` datetime NULL,
  `createdby` varchar(255) NULL,
  `updateby` varchar(255) NULL,
  PRIMARY KEY (`idproductocobertura`),
  UNIQUE INDEX `idx_idprod_idcob_idanio`(`idproducto`, `idcobertura`, `idanio`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE producto_cobertura;

--changeset lizandro.alipazaga:202502242156
--comment Se insertan datos en la tabla producto_cobertura
INSERT INTO `producto_cobertura` (`idproductocobertura`, `idproducto`, `idcobertura`, `idanio`) VALUES (1, 1, 1, 1);
INSERT INTO `producto_cobertura` (`idproductocobertura`, `idproducto`, `idcobertura`, `idanio`) VALUES (2, 1, 2, 1);
INSERT INTO `producto_cobertura` (`idproductocobertura`, `idproducto`, `idcobertura`, `idanio`) VALUES (3, 1, 3, 1);
INSERT INTO `producto_cobertura` (`idproductocobertura`, `idproducto`, `idcobertura`, `idanio`) VALUES (4, 1, 4, 1);
INSERT INTO `producto_cobertura` (`idproductocobertura`, `idproducto`, `idcobertura`, `idanio`) VALUES (5, 1, 5, 1);
INSERT INTO `producto_cobertura` (`idproductocobertura`, `idproducto`, `idcobertura`, `idanio`) VALUES (6, 2, 1, 1);
INSERT INTO `producto_cobertura` (`idproductocobertura`, `idproducto`, `idcobertura`, `idanio`) VALUES (7, 2, 2, 1);
INSERT INTO `producto_cobertura` (`idproductocobertura`, `idproducto`, `idcobertura`, `idanio`) VALUES (8, 2, 3, 1);
INSERT INTO `producto_cobertura` (`idproductocobertura`, `idproducto`, `idcobertura`, `idanio`) VALUES (9, 2, 5, 1);
INSERT INTO `producto_cobertura` (`idproductocobertura`, `idproducto`, `idcobertura`, `idanio`) VALUES (10, 5, 1, 1);
INSERT INTO `producto_cobertura` (`idproductocobertura`, `idproducto`, `idcobertura`, `idanio`) VALUES (11, 6, 1, 1);

--rollback DELETE FROM producto_cobertura WHERE idproductocobertura IN (1,2,3,4,5,6,7,8,9,10,11);
