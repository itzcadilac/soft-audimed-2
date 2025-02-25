--liquibase formatted sql
--changeset lizandro.alipazaga:202502242206
--comment Se crea la tabla tab_minvital
CREATE TABLE `tab_minvital`  (
  `idminvital` int NOT NULL AUTO_INCREMENT,
  `idanio` int NOT NULL,
  `valor` decimal(18, 2) NULL,
  `fecinivig` datetime NULL,
  `fecfinvig` datetime NULL,
  `estado` int NULL,
  `createdat` datetime NULL DEFAULT current_timestamp,
  `updatedat` datetime NULL ON UPDATE CURRENT_TIMESTAMP,
  `createdby` varchar(255) NULL,
  `updateby` varchar(255) NULL,
  PRIMARY KEY (`idminvital`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE tab_minvital;

--changeset lizandro.alipazaga:202502242207
--comment Se insertan datos en la tabla tab_minvital
INSERT INTO `tab_minvital` (`idminvital`, `idanio`, `valor`, `fecinivig`, `fecfinvig`, `estado`) VALUES (1, 1, 1025.00, '2025-01-01 00:00:00', '2025-12-31 23:59:59', 1);

--rollback DELETE FROM tab_minvital WHERE idminvital = 1;
