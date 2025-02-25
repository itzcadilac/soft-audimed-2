--liquibase formatted sql
--changeset lizandro.alipazaga:202502242202
--comment Se crea la tabla tab_uit
CREATE TABLE `tab_uit`  (
  `iduit` int NOT NULL AUTO_INCREMENT,
  `idanio` int NOT NULL,
  `monto` decimal(18, 2) NULL,
  `fecinivig` datetime NULL,
  `fecfinvig` datetime NULL,
  `estado` int NULL,
  `createdat` datetime NULL DEFAULT current_timestamp,
  `updatedat` datetime NULL ON UPDATE CURRENT_TIMESTAMP,
  `createdby` varchar(255) NULL,
  `updateby` varchar(255) NULL,
  PRIMARY KEY (`iduit`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE tab_uit;

--changeset lizandro.alipazaga:202502242203
--comment Se insertan datos en la tabla tab_uit
INSERT INTO `tab_uit` (`iduit`, `idanio`, `monto`, `fecinivig`, `fecfinvig`, `estado`) VALUES (1, 1, 5350.00, '2025-01-01 00:00:00', '2025-12-31 23:59:59', 1);

--rollback DELETE FROM tab_uit WHERE iduit = 1;
