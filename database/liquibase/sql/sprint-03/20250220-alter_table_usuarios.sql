--liquibase formatted sql
--changeset lizandro.alipazaga:202502202150 
--comment Se actualiza el campo passwd de la tabla usuarios
ALTER TABLE usuarios MODIFY passwd VARCHAR(250);

--rollback ALTER TABLE usuarios MODIFY passwd VARCHAR(50);