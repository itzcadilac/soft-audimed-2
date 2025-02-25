--liquibase formatted sql
--changeset lizandro.alipazaga:202502202149
--comment Se crea la vista lista_ubigeo
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `lista_ubigeo` AS select `ubigeo`.`ubigeo` AS `ubigeo`,
`ubigeo`.`departamento` AS `departamento`,`ubigeo`.`provincia` AS `provincia`,`ubigeo`.`distrito` AS `distrito`,
concat_ws(' - ',`ubigeo`.`departamento`,`ubigeo`.`provincia`,`ubigeo`.`distrito`) AS `descripcion`,
`ubigeo`.`latitud` AS `latitud`,`ubigeo`.`longitud` AS `longitud` from `ubigeo`;

--rollback DROP VIEW lista_ubigeo;