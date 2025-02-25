--liquibase formatted sql
--changeset lizandro.alipazaga:202502202250
--comment Se agregan columnas a la tabla aseguradora
ALTER TABLE aseguradora ADD COLUMN url VARCHAR(150);
ALTER TABLE aseguradora ADD COLUMN colorprim VARCHAR(150);
ALTER TABLE aseguradora ADD COLUMN colorseg VARCHAR(150);

--rollback ALTER TABLE aseguradora DROP COLUMN url;
--rollback ALTER TABLE aseguradora DROP COLUMN colorprim;
--rollback ALTER TABLE aseguradora DROP COLUMN colorseg;