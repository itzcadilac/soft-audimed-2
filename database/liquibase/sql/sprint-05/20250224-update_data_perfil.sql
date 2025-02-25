--liquibase formatted sql
--changeset lizandro.alipazaga:202502242219
--comment Se actualiza la tabla perfil
UPDATE `perfil` SET `perfil` = 'MEDICO AUDITOR 1' WHERE `idperfil` = 8;
UPDATE `perfil` SET `perfil` = 'MEDICO AUDITOR 2' WHERE `idperfil` = 9;
UPDATE `perfil` SET `perfil` = 'MEDICO AUDITOR 3' WHERE `idperfil` = 10;
UPDATE `perfil` SET `perfil` = 'MEDICO AUDITOR 4' WHERE `idperfil` = 11;

--rollback UPDATE `perfil` SET `perfil` = 'AUDITOR 1' WHERE `idperfil` = 8;
--rollback UPDATE `perfil` SET `perfil` = 'AUDITOR 2' WHERE `idperfil` = 9;
--rollback UPDATE `perfil` SET `perfil` = 'AUDITOR 3' WHERE `idperfil` = 10;
--rollback UPDATE `perfil` SET `perfil` = 'AUDITOR 4' WHERE `idperfil` = 11;