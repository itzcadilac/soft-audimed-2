<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the framework's
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter.com/user_guide/extending/common.html
 */

use Psr\Log\LogLevel;

if (!function_exists('successResponse')) {
    function successResponse($data, $message = 'Operación exitosa.', $status = 'success')
    {
        return [
            'status'  => $status,
            'success' => true,
            'message' => $message,
            'data'    => is_object($data) && method_exists($data, 'toArray')
                ? $data->toArray()
                : $data,
        ];
    }
}

if (!function_exists('errorResponse')) {
    function errorResponse($message = 'Ocurrió un error inesperado.', $data = null, $status = 'error')
    {
        return [
            'status'  => $status,
            'success' => false,
            'message' => $message,
            'data'    => is_object($data) && method_exists($data, 'toArray')
                ? $data->toArray()
                : $data,
        ];
    }
}

if (!function_exists('auditEventTrigger')) {
    /**
     * Lanza un evento que permite guardar datos en auditoria
     * @param AuditTypeEnum $type Tipo de auditoria
     * @param string $description Descripcion de la auditoria generada
     * @param mixed $content Informacion que se quiere auditar
     */
    function auditEventTrigger($type, $description, $data = [])
    {
        // Creamos la auditoria y seteamos los datos
        $audit = new Modules\Common\Audit\Entity\Audit();
        $audit->tipo = $type->value;
        $audit->descripcion = $description;
        $data = is_object($data) && method_exists($data, 'toArray') ? $data->toArray() : $data;
        if (!empty($data)) {
            $audit->contenido = json_encode($data);
        }

        // Lanzamos el evento
        CodeIgniter\Events\Events::trigger(EVENT_SAVE_AUDIT, $audit->toArray());
    }
}
