#!/bin/bash

# Solicitar nombre de la tabla al usuario
read -p "Ingrese el nombre de la tabla: " TABLE_NAME
read -p "Ingrese el sprint: " SPRINT

# Validar que el usuario ingresó un valor
if [[ -z "$TABLE_NAME" ]]; then
    echo "Error: Debe ingresar un nombre de tabla."
    exit 1
fi

# Variables
AUTHOR="lizandro.alipazaga"
TIMESTAMP=$(date +"%Y%m%d")
TIMESTAMP2=$(date +"%Y%m%d%H%M")
DEST_DIR="./sql/sprint-${SPRINT}"
FILENAME="${DEST_DIR}/${TIMESTAMP}-create_table_${TABLE_NAME}.sql"

# Crear el archivo con la estructura de Liquibase
cat <<EOF > $FILENAME
--liquibase formatted sql
--changeset $AUTHOR:${TIMESTAMP2}
--comment Se crea la tabla $TABLE_NAME

) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

--rollback DROP TABLE $TABLE_NAME;

--changeset $AUTHOR:${TIMESTAMP2}
--comment Se insertan datos en la tabla $TABLE_NAME

--rollback DELETE FROM $TABLE_NAME;
EOF

echo "Archivo $FILENAME creado exitosamente."