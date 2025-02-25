--liquibase formatted sql
--changeset lizandro.alipazaga:202502202220
--comment Se limpia la tabla aseguradora
TRUNCATE TABLE aseguradora;

--rollback INSERT INTO audimed2.aseguradora VALUES(1, '00000', '00000000000', 'PARTICULAR', 'PARTICULAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0, 0);

--changeset lizandro.alipazaga:202502202221
--comment Se insertan datos en la tabla aseguradora
INSERT INTO aseguradora
(codigo_iafa, numero_ruc, razon_social, nombre_comercial, domicilio, ubigeo, latitud, longitud, celular, contacto, correo, observaciones, activo)
VALUES('40006', '20202380621', 'Mapfre Perú Compañía de Seguros y Reaseguros S.A.', 'Mapfre Perú Compañía de Seguros y Reaseguros S.A.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');

INSERT INTO aseguradora
(codigo_iafa, numero_ruc, razon_social, nombre_comercial, domicilio, ubigeo, latitud, longitud, celular, contacto, correo, observaciones, activo)
VALUES('40004', '20332970411', 'Pacífico Compañía de Seguros y Reaseguros S.A.', 'Pacífico-Compañía de Seguros y Reaseguros S.A.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');

INSERT INTO aseguradora
(codigo_iafa, numero_ruc, razon_social, nombre_comercial, domicilio, ubigeo, latitud, longitud, celular, contacto, correo, observaciones, activo)
VALUES('40007', '20100041953', 'Rímac Seguros y Reaseguros S.A.', 'Rímac Seguros y Reaseguros S.A.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');

--rollback DELETE FROM aseguradora WHERE codigo_iafa = '40006';
--rollback DELETE FROM aseguradora WHERE codigo_iafa = '40004';
--rollback DELETE FROM aseguradora WHERE codigo_iafa = '40007';
