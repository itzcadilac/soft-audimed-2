--liquibase formatted sql
--changeset lizandro.alipazaga:202502250946
--comment Se modifica la tabla aseguradoras
ALTER TABLE aseguradora ADD COLUMN decimal_importes smallint NULL DEFAULT 2;
ALTER TABLE aseguradora ADD COLUMN decimal_descanso smallint NULL DEFAULT 2;
ALTER TABLE aseguradora ADD COLUMN regex_poliza VARCHAR(60) NULL;
ALTER TABLE aseguradora ADD COLUMN codigo_sbs VARCHAR(15) NULL;

--rollback ALTER TABLE aseguradora DROP COLUMN decimal_importes;
--rollback ALTER TABLE aseguradora DROP COLUMN decimal_descanso;
--rollback ALTER TABLE aseguradora DROP COLUMN regex_poliza;
--rollback ALTER TABLE aseguradora DROP COLUMN codigo_sbs;

--changeset lizandro.alipazaga:202502250947
--comment Se modifica la tabla siniestros
ALTER TABLE siniestros ADD COLUMN latitud VARCHAR(25) NULL;
ALTER TABLE siniestros ADD COLUMN longitud VARCHAR(25) NULL;
ALTER TABLE siniestros ADD COLUMN departamentotext VARCHAR(60) NULL;
ALTER TABLE siniestros ADD COLUMN provinciatext VARCHAR(60) NULL;

--rollback ALTER TABLE siniestros DROP COLUMN latitud;
--rollback ALTER TABLE siniestros DROP COLUMN longitud;
--rollback ALTER TABLE siniestros DROP COLUMN departamentotext;
--rollback ALTER TABLE siniestros DROP COLUMN provinciatext;