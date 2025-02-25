--liquibase formatted sql
--changeset lizandro.alipazaga:202502202148
--comment Se crea la tabla plantillas
CREATE TABLE `plantillas`  (
  `idplantilla` bigint AUTO_INCREMENT,
  `codeplantilla` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tipo` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dias_expira` smallint DEFAULT 30,
  `cc` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `bcc` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `topic_fcm` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `subject` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `contenido` TEXT NULL,
  `activo` smallint DEFAULT 1,
  `eliminado` smallint DEFAULT 0,
  `estadoreg` smallint DEFAULT 0,
  `fcreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `fupdated` datetime NULL,
  UNIQUE (codeplantilla),
  PRIMARY KEY (`idplantilla`) USING BTREE,
  INDEX `idplantilla`(`idplantilla` ASC) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE plantillas;

--changeset lizandro.alipazaga:202502202149
--comment Se insertan datos en la tabla plantillas
insert into plantillas (idplantilla, codeplantilla, tipo, descripcion, dias_expira, subject, contenido) 
values 
(1, 'EMAIL_CONF_ACCOUNT', 'EMAIL', 'Confirmación de cuenta', 30, '{{nombre}} confirma tu cuenta', 'Estimado(a) {{nombre}},
Por medio del presente correo le damos la bienvenida.

Para confirmar su registro por favor acceda al siguiente enlace:

https://example.domain.com/endpoint?uuid={{uuid}}&email={{email}}

Administrador'),
(2, 'EMAIL_CHANGE_PWD', 'EMAIL', 'Cambio de contraseña', 3, 'Recuperación de contraseña', 'Estimado(a) {{nombre}},

Para cambiar su contraseña por favor acceda al siguiente enlace:

https://example.domain.com/endpoint?uuid={{uuid}}&email={{email}}

Administrador'),
(3, 'EMAIL_RESET_PWD', 'EMAIL', 'Reinicio de contraseña', 3, 'Solicitud de cambio de contraseña', 'Estimado(a) {{nombre}},

Por razones de seguridad se ha reseteado el acceso a su cuenta, por favor acceda al siguiente enlace para confirmar su nueva contraseña:

https://example.domain.com/endpoint?uuid={{uuid}}&email={{email}}

Administrador');


--rollback DELETE FROM plantillas WHERE idplantilla IN (1,2,3);
