--liquibase formatted sql
--changeset lizandro.alipazaga:202502242059
--comment Se agrega unique key a la tabla usuarios
ALTER TABLE audimed2.usuarios ADD CONSTRAINT usuariouq UNIQUE (usuario);

--rollback ALTER TABLE audimed2.usuarios DROP INDEX usuariouq;

--changeset lizandro.alipazaga:202502242100
--comment Se agrega columna a la tabla perfil_aseguradora
ALTER TABLE audimed2.perfil_aseguradora ADD COLUMN activo smallint NULL DEFAULT 1;

--rollback ALTER TABLE audimed2.perfil_aseguradora DROP COLUMN activo;

--changeset lizandro.alipazaga:202502242101
--comment Se modifica la tabla movimientos
ALTER TABLE audimed2.movimientos MODIFY COLUMN idmovimiento bigint NOT NULL AUTO_INCREMENT;

--rollback ALTER TABLE audimed2.movimientos MODIFY COLUMN idmovimiento INT NOT NULL;