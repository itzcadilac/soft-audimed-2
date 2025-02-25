# Audimed 2.0

PHP 8.3
MariaDB 8.0
Codeigniter 4

# Liquibase
Liquibase es una herramienta de gestión de cambios de base de datos que permite el versionamiento y control de cambios en esquemas de bases de datos. Utiliza archivos de configuración en formato XML, YAML, JSON o SQL para describir y aplicar cambios (como crear tablas, agregar columnas, etc.). Liquibase facilita la implementación de cambios en diferentes entornos, asegurando que las bases de datos estén siempre sincronizadas con el código de la aplicación.
### Base de datos audimed2
Se ha trabajado con todas las tablas indicadas hasta el momento, incluyendo los datos de prueba que deben ser actualizados antes de ser subidos a producción. Las tablas y sus respectivos registros han sido creados y versionados utilizando Liquibase para asegurar una implementación controlada y segura de los cambios en la base de datos.
### Requisitos
**Liquibase CLI:** Asegúrese de tener instalado Liquibase CLI en su PC para poder ejecutar las instrucciones necesarias. Puede descargarlo e instalarlo desde Liquibase.org.

**Base de datos:** Es necesario tener creada la base de datos audimed2. Se sugiere usar el siguiente comando para crearla:

```
CREATE DATABASE audimed2
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;
```
### Pasos para la Instalación
**Ubicarse en la carpeta correcta:** Navegue hasta la carpeta donde se encuentra el archivo de configuración de Liquibase. La ruta típica será algo como:
```
audimed2/database/liquibase/
```

**Ejecutar Liquibase:** Una vez en la carpeta correcta, ejecute el siguiente comando para aplicar los cambios a la base de datos:

```
liquibase update
```

Esto instalará las tablas y los respectivos registros en la base de datos.

**Rollback Completo:** En caso de querer realizar un rollback de toda la base de datos, use el siguiente comando:

```
liquibase rollbackCount 999
```

**Rollback Parcial:** Si solo desea revertir una cantidad específica de cambios, use el siguiente comando, donde n representa el número de cambios que quiere revertir:

```
liquibase rollbackCount n
```

Por ejemplo, para revertir los últimos 3 cambios, ejecutaría:

```
liquibase rollbackCount 3
```