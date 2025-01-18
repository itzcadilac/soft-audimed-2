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

 if (!function_exists('successResponse')) {
    function successResponse($data, $message = 'Operación exitosa.')
    {
        return [
            'success' => true,
            'message' => $message,
            'data'    => is_object($data) && method_exists($data, 'toArray') 
                            ? $data->toArray() 
                            : $data,
        ];
    }
}

if (!function_exists('errorResponse')) {
    function errorResponse($message = 'Ocurrió un error.', $data = null)
    {
        return [
            'success' => false,
            'message' => $message,
            'data'    => is_object($data) && method_exists($data, 'toArray') 
                            ? $data->toArray() 
                            : $data,
        ];
    }
}
