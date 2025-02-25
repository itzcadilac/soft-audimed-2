--liquibase formatted sql
--changeset lizandro.alipazaga:202502242141
--comment Se crea la tabla coberturas
CREATE TABLE `coberturas`  (
  `idcobertura` INT AUTO_INCREMENT PRIMARY KEY,
  `nombcobertura` varchar(255) NULL,
  `nombcortocobertura` varchar(255) NULL,
  `estado` char(1) NULL DEFAULT 1,
  `createdat` datetime NULL DEFAULT current_timestamp,
  `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `createdby` varchar(255) NULL,
  `updatedby` varchar(255) NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE coberturas;

--changeset lizandro.alipazaga:202502242142
--comment Se insertan datos en la tabla coberturas
INSERT INTO `coberturas` (`idcobertura`, `nombcobertura`, `nombcortocobertura`) VALUES (1, 'GASTOS MÉDICOS', 'GASTOS MÉDICOS');
INSERT INTO `coberturas` (`idcobertura`, `nombcobertura`, `nombcortocobertura`) VALUES (2, 'INCAPACIDAD TEMPORAL', 'INCAPACIDAD TEMPORAL');
INSERT INTO `coberturas` (`idcobertura`, `nombcobertura`, `nombcortocobertura`) VALUES (3, 'INVALIDEZ PERMANENTE', 'INVALIDEZ PERMANENTE');
INSERT INTO `coberturas` (`idcobertura`, `nombcobertura`, `nombcortocobertura`) VALUES (4, 'MUERTE', 'MUERTE');
INSERT INTO `coberturas` (`idcobertura`, `nombcobertura`, `nombcortocobertura`) VALUES (5, 'SEPELIO', 'SEPELIO');

--rollback DELETE FROM coberturas WHERE idcobertura IN (1,2,3,4,5);
