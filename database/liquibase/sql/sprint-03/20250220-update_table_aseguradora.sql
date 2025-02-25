--liquibase formatted sql
--changeset lizandro.alipazaga:202502202254
--comment Se actualizan datos en la tabla aseguradora
update aseguradora set url = 'uploads/mapfre1.png', colorprim = '#D81E05', colorseg = '#FEEDEB' where idaseguradora = 1;
update aseguradora set url = 'uploads/pacifico.png', colorprim = '#0099CC', colorseg = '#EBFAFF' where idaseguradora = 2;
update aseguradora set url = 'uploads/rimac.png', colorprim = '#D81E05', colorseg = '#FEEDEB' where idaseguradora = 3;

--rollback UPDATE aseguradora SET url = NULL, colorprim = NULL, colorseg = NULL WHERE idaseguradora = 1;
--rollback UPDATE aseguradora SET url = NULL, colorprim = NULL, colorseg = NULL WHERE idaseguradora = 2;
--rollback UPDATE aseguradora SET url = NULL, colorprim = NULL, colorseg = NULL WHERE idaseguradora = 3;
