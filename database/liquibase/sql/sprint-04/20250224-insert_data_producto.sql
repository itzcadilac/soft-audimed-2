--liquibase formatted sql
--changeset lizandro.alipazaga:202502242150
--comment Se insertan datos en la tabla producto
INSERT INTO `producto` (`idproducto`, `descripcion`, `activo`, `codeproducto`, `orden`) VALUES (5, 'RESPONSABILIDAD CIVIL', 0, 'RC', 6);
INSERT INTO `producto` (`idproducto`, `descripcion`, `activo`, `codeproducto`, `orden`) VALUES (6, 'AUTOMÓVILES', 0, 'AUT', 7);
INSERT INTO `producto` (`idproducto`, `descripcion`, `activo`, `codeproducto`, `orden`) VALUES (7, 'AUDITORÍA MÉDICA CONCURRENTE', 0, 'AUDMC', 8);

--rollback DELETE FROM producto WHERE idproducto IN (5,6,7);