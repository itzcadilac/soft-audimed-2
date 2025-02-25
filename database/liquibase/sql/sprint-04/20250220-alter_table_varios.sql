--liquibase formatted sql
--changeset lizandro.alipazaga:202502200000
--comment Se agregan columnas a la tabla almacen
ALTER TABLE `audimed2`.`almacen` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`almacen` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`almacen` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`almacen` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`almacen` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`almacen` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`almacen` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`almacen` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200001
--comment Se agregan columnas a la tabla articulos
ALTER TABLE `audimed2`.`articulos` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`articulos` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`articulos` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`articulos` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`articulos` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`articulos` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`articulos` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`articulos` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200002
--comment Se agregan columnas a la tabla banco
ALTER TABLE `audimed2`.`banco` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`banco` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`banco` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`banco` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`banco` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`banco` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`banco` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`banco` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`banco` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`banco` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`banco` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`banco` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200003
--comment Se agregan columnas a la tabla centro_costos
ALTER TABLE `audimed2`.`centro_costos` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`centro_costos` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`centro_costos` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`centro_costos` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`centro_costos` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`centro_costos` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`centro_costos` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`centro_costos` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`centro_costos` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`centro_costos` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`centro_costos` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`centro_costos` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200004
--comment Se agregan columnas a la tabla cie10
ALTER TABLE `audimed2`.`cie10` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`cie10` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`cie10` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`cie10` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`cie10` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`cie10` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`cie10` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`cie10` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`cie10` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`cie10` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`cie10` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`cie10` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200005
--comment Se agregan columnas a la tabla citas
ALTER TABLE `audimed2`.`citas` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`citas` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`citas` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`citas` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`citas` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`citas` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`citas` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`citas` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`citas` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`citas` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`citas` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`citas` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200006
--comment Se agregan columnas a la tabla consultorio
ALTER TABLE `audimed2`.`consultorio` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`consultorio` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`consultorio` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`consultorio` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`consultorio` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`consultorio` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`consultorio` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`consultorio` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200007
--comment Se agregan columnas a la tabla departamento
ALTER TABLE `audimed2`.`departamento` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`departamento` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`departamento` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`departamento` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`departamento` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`departamento` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`departamento` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`departamento` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`departamento` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`departamento` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`departamento` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`departamento` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200008
--comment Se agregan columnas a la tabla empresa
ALTER TABLE `audimed2`.`empresa` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`empresa` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`empresa` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`empresa` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`empresa` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`empresa` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`empresa` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`empresa` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200009
--comment Se agregan columnas a la tabla especialidad
ALTER TABLE `audimed2`.`especialidad` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`especialidad` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`especialidad` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`especialidad` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`especialidad` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`especialidad` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`especialidad` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`especialidad` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200010
--comment Se agregan columnas a la tabla estado_civil
ALTER TABLE `audimed2`.`estado_civil` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`estado_civil` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`estado_civil` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`estado_civil` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`estado_civil` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`estado_civil` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`estado_civil` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`estado_civil` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`estado_civil` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`estado_civil` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`estado_civil` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`estado_civil` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200011
--comment Se agregan columnas a la tabla examenes_auxiliares
ALTER TABLE `audimed2`.`examenes_auxiliares` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`examenes_auxiliares` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`examenes_auxiliares` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`examenes_auxiliares` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`examenes_auxiliares` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`examenes_auxiliares` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`examenes_auxiliares` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`examenes_auxiliares` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200012
--comment Se agregan columnas a la tabla guia_ingreso
ALTER TABLE `audimed2`.`guia_ingreso` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`guia_ingreso` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`guia_ingreso` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`guia_ingreso` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`guia_ingreso` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`guia_ingreso` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`guia_ingreso` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`guia_ingreso` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200013
--comment Se agregan columnas a la tabla guia_salida
ALTER TABLE `audimed2`.`guia_salida` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`guia_salida` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`guia_salida` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`guia_salida` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`guia_salida` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`guia_salida` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`guia_salida` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`guia_salida` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200014
--comment Se agregan columnas a la tabla laboratorio
ALTER TABLE `audimed2`.`laboratorio` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`laboratorio` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`laboratorio` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`laboratorio` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`laboratorio` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`laboratorio` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`laboratorio` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`laboratorio` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200015
--comment Se agregan columnas a la tabla medicoauditor
ALTER TABLE `audimed2`.`medicoauditor` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`medicoauditor` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`medicoauditor` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`medicoauditor` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`medicoauditor` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`medicoauditor` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`medicoauditor` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`medicoauditor` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200016
--comment Se agregan columnas a la tabla medio_pago
ALTER TABLE `audimed2`.`medio_pago` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`medio_pago` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`medio_pago` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`medio_pago` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`medio_pago` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`medio_pago` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`medio_pago` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`medio_pago` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200017
--comment Se agregan columnas a la tabla orden_compra
ALTER TABLE `audimed2`.`orden_compra` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`orden_compra` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`orden_compra` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`orden_compra` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`orden_compra` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`orden_compra` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`orden_compra` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`orden_compra` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200018
--comment Se agregan columnas a la tabla orden_compra_detalle
ALTER TABLE `audimed2`.`orden_compra_detalle` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`orden_compra_detalle` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`orden_compra_detalle` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`orden_compra_detalle` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`orden_compra_detalle` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`orden_compra_detalle` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`orden_compra_detalle` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`orden_compra_detalle` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`orden_compra_detalle` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`orden_compra_detalle` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`orden_compra_detalle` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`orden_compra_detalle` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200019
--comment Se agregan columnas a la tabla orden_examenes
ALTER TABLE `audimed2`.`orden_examenes` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`orden_examenes` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`orden_examenes` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`orden_examenes` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`orden_examenes` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`orden_examenes` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`orden_examenes` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`orden_examenes` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200020
--comment Se agregan columnas a la tabla orden_examenes_detalle
ALTER TABLE `audimed2`.`orden_examenes_detalle` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`orden_examenes_detalle` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`orden_examenes_detalle` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`orden_examenes_detalle` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`orden_examenes_detalle` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`orden_examenes_detalle` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`orden_examenes_detalle` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`orden_examenes_detalle` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`orden_examenes_detalle` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`orden_examenes_detalle` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`orden_examenes_detalle` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`orden_examenes_detalle` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200021
--comment Se agregan columnas a la tabla orden_servicio
ALTER TABLE `audimed2`.`orden_servicio` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`orden_servicio` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`orden_servicio` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`orden_servicio` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`orden_servicio` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`orden_servicio` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`orden_servicio` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`orden_servicio` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200022
--comment Se agregan columnas a la tabla orden_servicio_detalle
ALTER TABLE `audimed2`.`orden_servicio_detalle` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`orden_servicio_detalle` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`orden_servicio_detalle` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`orden_servicio_detalle` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`orden_servicio_detalle` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`orden_servicio_detalle` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`orden_servicio_detalle` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`orden_servicio_detalle` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`orden_servicio_detalle` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`orden_servicio_detalle` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`orden_servicio_detalle` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`orden_servicio_detalle` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200023
--comment Se agregan columnas a la tabla paciente
ALTER TABLE `audimed2`.`paciente` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`paciente` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`paciente` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`paciente` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`paciente` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`paciente` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`paciente` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`paciente` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200024
--comment Se agregan columnas a la tabla parametros
ALTER TABLE `audimed2`.`parametros` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`parametros` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`parametros` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`parametros` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`parametros` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`parametros` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`parametros` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`parametros` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200025
--comment Se eliminan columnas de la tabla parametros
ALTER TABLE `audimed2`.`parametros` DROP COLUMN `fcreated`;
ALTER TABLE `audimed2`.`parametros` DROP COLUMN `fupdated`;

--rollback ALTER TABLE `audimed2`.`parametros` ADD COLUMN `fcreated` datetime NULL;
--rollback ALTER TABLE `audimed2`.`parametros` ADD COLUMN `fupdated` datetime NULL;

--changeset lizandro.alipazaga:202502200026
--comment Se agregan columnas a la tabla perfil
ALTER TABLE `audimed2`.`perfil` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`perfil` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`perfil` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`perfil` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`perfil` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`perfil` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`perfil` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`perfil` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200027
--comment Se agregan columnas a la tabla plantillas
ALTER TABLE `audimed2`.`plantillas` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`plantillas` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`plantillas` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`plantillas` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`plantillas` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`plantillas` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`plantillas` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`plantillas` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200028
--comment Se eliminan columnas de la tabla plantillas
ALTER TABLE `audimed2`.`plantillas` DROP COLUMN `fcreated`;
ALTER TABLE `audimed2`.`plantillas` DROP COLUMN `fupdated`;

--rollback ALTER TABLE `audimed2`.`plantillas` ADD COLUMN `fcreated` datetime NULL;
--rollback ALTER TABLE `audimed2`.`plantillas` ADD COLUMN `fupdated` datetime NULL;

--changeset lizandro.alipazaga:202502200029
--comment Se agregan columnas a la tabla presentacion
ALTER TABLE `audimed2`.`presentacion` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`presentacion` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`presentacion` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`presentacion` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`presentacion` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`presentacion` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`presentacion` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`presentacion` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200030
--comment Se agregan columnas a la tabla procedimiento
ALTER TABLE `audimed2`.`procedimiento` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`procedimiento` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`procedimiento` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`procedimiento` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`procedimiento` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`procedimiento` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`procedimiento` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`procedimiento` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200031
--comment Se agregan columnas a la tabla procedimiento_articulos
ALTER TABLE `audimed2`.`procedimiento_articulos` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`procedimiento_articulos` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`procedimiento_articulos` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`procedimiento_articulos` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`procedimiento_articulos` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`procedimiento_articulos` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`procedimiento_articulos` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`procedimiento_articulos` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`procedimiento_articulos` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`procedimiento_articulos` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`procedimiento_articulos` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`procedimiento_articulos` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200032
--comment Se agregan columnas a la tabla procedimiento_subprocedimientos
ALTER TABLE `audimed2`.`procedimiento_subprocedimientos` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`procedimiento_subprocedimientos` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`procedimiento_subprocedimientos` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`procedimiento_subprocedimientos` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`procedimiento_subprocedimientos` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`procedimiento_subprocedimientos` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`procedimiento_subprocedimientos` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`procedimiento_subprocedimientos` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`procedimiento_subprocedimientos` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`procedimiento_subprocedimientos` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`procedimiento_subprocedimientos` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`procedimiento_subprocedimientos` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200033
--comment Se agregan columnas a la tabla profesional
ALTER TABLE `audimed2`.`profesional` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`profesional` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`profesional` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`profesional` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`profesional` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`profesional` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`profesional` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`profesional` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200034
--comment Se agregan columnas a la tabla proveedor
ALTER TABLE `audimed2`.`proveedor` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`proveedor` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`proveedor` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`proveedor` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`proveedor` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`proveedor` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`proveedor` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`proveedor` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200035
--comment Se agregan columnas a la tabla proveedor_cuentas
ALTER TABLE `audimed2`.`proveedor_cuentas` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`proveedor_cuentas` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`proveedor_cuentas` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`proveedor_cuentas` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`proveedor_cuentas` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`proveedor_cuentas` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`proveedor_cuentas` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`proveedor_cuentas` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200036
--comment Se agregan columnas a la tabla receta_medica
ALTER TABLE `audimed2`.`receta_medica` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`receta_medica` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`receta_medica` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`receta_medica` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`receta_medica` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`receta_medica` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`receta_medica` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`receta_medica` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`receta_medica` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`receta_medica` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`receta_medica` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`receta_medica` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200037
--comment Se agregan columnas a la tabla receta_medica_detalle
ALTER TABLE `audimed2`.`receta_medica_detalle` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`receta_medica_detalle` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`receta_medica_detalle` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`receta_medica_detalle` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`receta_medica_detalle` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`receta_medica_detalle` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`receta_medica_detalle` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`receta_medica_detalle` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`receta_medica_detalle` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`receta_medica_detalle` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`receta_medica_detalle` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`receta_medica_detalle` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200038
--comment Se agregan columnas a la tabla receta_medica_dx
ALTER TABLE `audimed2`.`receta_medica_dx` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`receta_medica_dx` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`receta_medica_dx` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`receta_medica_dx` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`receta_medica_dx` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`receta_medica_dx` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`receta_medica_dx` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`receta_medica_dx` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`receta_medica_dx` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`receta_medica_dx` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`receta_medica_dx` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`receta_medica_dx` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200039
--comment Se agregan columnas a la tabla servicios
ALTER TABLE `audimed2`.`servicios` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`servicios` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`servicios` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`servicios` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`servicios` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`servicios` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`servicios` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`servicios` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200040
--comment Se agregan columnas a la tabla siniestros
ALTER TABLE `audimed2`.`siniestros` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`siniestros` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`siniestros` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`siniestros` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`siniestros` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`siniestros` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`siniestros` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`siniestros` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200041
--comment Se agregan columnas a la tabla ss_rubro
ALTER TABLE `audimed2`.`ss_rubro` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`ss_rubro` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`ss_rubro` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`ss_rubro` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`ss_rubro` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`ss_rubro` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`ss_rubro` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`ss_rubro` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`ss_rubro` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`ss_rubro` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`ss_rubro` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`ss_rubro` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200042
--comment Se agregan columnas a la tabla ss_tipo_producto_farmacia
ALTER TABLE `audimed2`.`ss_tipo_producto_farmacia` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`ss_tipo_producto_farmacia` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`ss_tipo_producto_farmacia` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`ss_tipo_producto_farmacia` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`ss_tipo_producto_farmacia` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`ss_tipo_producto_farmacia` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`ss_tipo_producto_farmacia` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`ss_tipo_producto_farmacia` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`ss_tipo_producto_farmacia` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`ss_tipo_producto_farmacia` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`ss_tipo_producto_farmacia` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`ss_tipo_producto_farmacia` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200043
--comment Se agregan columnas a la tabla tipo_articulo
ALTER TABLE `audimed2`.`tipo_articulo` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`tipo_articulo` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`tipo_articulo` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`tipo_articulo` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`tipo_articulo` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`tipo_articulo` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`tipo_articulo` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`tipo_articulo` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`tipo_articulo` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`tipo_articulo` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`tipo_articulo` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`tipo_articulo` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200044
--comment Se agregan columnas a la tabla tipo_comprobante
ALTER TABLE `audimed2`.`tipo_comprobante` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`tipo_comprobante` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`tipo_comprobante` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`tipo_comprobante` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`tipo_comprobante` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`tipo_comprobante` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`tipo_comprobante` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`tipo_comprobante` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`tipo_comprobante` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`tipo_comprobante` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`tipo_comprobante` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`tipo_comprobante` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200045
--comment Se agregan columnas a la tabla tipo_cuenta
ALTER TABLE `audimed2`.`tipo_cuenta` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`tipo_cuenta` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`tipo_cuenta` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`tipo_cuenta` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`tipo_cuenta` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`tipo_cuenta` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`tipo_cuenta` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`tipo_cuenta` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`tipo_cuenta` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`tipo_cuenta` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`tipo_cuenta` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`tipo_cuenta` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200046
--comment Se agregan columnas a la tabla tipo_documento
ALTER TABLE `audimed2`.`tipo_documento` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`tipo_documento` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`tipo_documento` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`tipo_documento` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`tipo_documento` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`tipo_documento` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`tipo_documento` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`tipo_documento` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`tipo_documento` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`tipo_documento` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`tipo_documento` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`tipo_documento` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200047
--comment Se agregan columnas a la tabla tipo_moneda
ALTER TABLE `audimed2`.`tipo_moneda` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`tipo_moneda` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`tipo_moneda` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`tipo_moneda` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`tipo_moneda` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`tipo_moneda` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`tipo_moneda` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`tipo_moneda` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`tipo_moneda` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`tipo_moneda` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`tipo_moneda` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`tipo_moneda` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200048
--comment Se agregan columnas a la tabla tipo_movimiento
ALTER TABLE `audimed2`.`tipo_movimiento` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`tipo_movimiento` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`tipo_movimiento` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`tipo_movimiento` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`tipo_movimiento` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`tipo_movimiento` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`tipo_movimiento` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`tipo_movimiento` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`tipo_movimiento` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`tipo_movimiento` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`tipo_movimiento` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`tipo_movimiento` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200049
--comment Se agregan columnas a la tabla tipo_pago
ALTER TABLE `audimed2`.`tipo_pago` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`tipo_pago` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`tipo_pago` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`tipo_pago` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`tipo_pago` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`tipo_pago` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`tipo_pago` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`tipo_pago` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`tipo_pago` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`tipo_pago` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`tipo_pago` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`tipo_pago` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200050
--comment Se agregan columnas a la tabla tipo_procedimiento
ALTER TABLE `audimed2`.`tipo_procedimiento` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`tipo_procedimiento` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`tipo_procedimiento` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`tipo_procedimiento` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`tipo_procedimiento` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`tipo_procedimiento` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`tipo_procedimiento` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`tipo_procedimiento` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`tipo_procedimiento` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`tipo_procedimiento` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`tipo_procedimiento` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`tipo_procedimiento` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200051
--comment Se agregan columnas a la tabla tipo_profesional
ALTER TABLE `audimed2`.`tipo_profesional` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`tipo_profesional` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`tipo_profesional` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`tipo_profesional` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`tipo_profesional` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`tipo_profesional` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`tipo_profesional` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`tipo_profesional` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`tipo_profesional` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`tipo_profesional` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`tipo_profesional` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`tipo_profesional` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200052
--comment Se agregan columnas a la tabla tipo_servicio
ALTER TABLE `audimed2`.`tipo_servicio` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`tipo_servicio` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`tipo_servicio` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`tipo_servicio` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`tipo_servicio` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`tipo_servicio` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`tipo_servicio` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`tipo_servicio` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200053
--comment Se agregan columnas a la tabla turnos
ALTER TABLE `audimed2`.`turnos` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`turnos` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`turnos` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`turnos` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`turnos` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`turnos` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`turnos` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`turnos` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`turnos` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`turnos` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`turnos` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`turnos` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200054
--comment Se agregan columnas a la tabla turnos_detalle
ALTER TABLE `audimed2`.`turnos_detalle` ADD COLUMN `activo` smallint DEFAULT 1;
ALTER TABLE `audimed2`.`turnos_detalle` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`turnos_detalle` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`turnos_detalle` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`turnos_detalle` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`turnos_detalle` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`turnos_detalle` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`turnos_detalle` DROP COLUMN `activo`;
--rollback ALTER TABLE `audimed2`.`turnos_detalle` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`turnos_detalle` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`turnos_detalle` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`turnos_detalle` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`turnos_detalle` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`turnos_detalle` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200055
--comment Se agregan columnas a la tabla unidad_medida
ALTER TABLE `audimed2`.`unidad_medida` ADD COLUMN `eliminado` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`unidad_medida` ADD COLUMN `estadoreg` smallint DEFAULT 0;
ALTER TABLE `audimed2`.`unidad_medida` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`unidad_medida` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`unidad_medida` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`unidad_medida` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`unidad_medida` DROP COLUMN `eliminado`;
--rollback ALTER TABLE `audimed2`.`unidad_medida` DROP COLUMN `estadoreg`;
--rollback ALTER TABLE `audimed2`.`unidad_medida` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`unidad_medida` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`unidad_medida` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`unidad_medida` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200056
--comment Se agregan columnas a la tabla usuarios
ALTER TABLE `audimed2`.`usuarios` ADD COLUMN `createdat` datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`usuarios` ADD COLUMN `updatedat` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `audimed2`.`usuarios` ADD COLUMN `createdby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `audimed2`.`usuarios` ADD COLUMN `updatedby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--rollback ALTER TABLE `audimed2`.`usuarios` DROP COLUMN `createdat`;
--rollback ALTER TABLE `audimed2`.`usuarios` DROP COLUMN `updatedat`;
--rollback ALTER TABLE `audimed2`.`usuarios` DROP COLUMN `createdby`;
--rollback ALTER TABLE `audimed2`.`usuarios` DROP COLUMN `updatedby`;

--changeset lizandro.alipazaga:202502200057
--comment Se eliminan columnas de la tabla usuarios
ALTER TABLE `audimed2`.`usuarios` DROP COLUMN `fcreated`;
ALTER TABLE `audimed2`.`usuarios` DROP COLUMN `fupdated`;

--rollback ALTER TABLE `audimed2`.`usuarios` ADD COLUMN `fcreated` datetime NULL;
--rollback ALTER TABLE `audimed2`.`usuarios` ADD COLUMN `fupdated` datetime NULL;