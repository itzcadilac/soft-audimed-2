<?php

namespace Config;

use CodeIgniter\Events\Events;
use CodeIgniter\Exceptions\FrameworkException;
use CodeIgniter\HotReloader\HotReloader;
use Modules\Security\Domain\Auditoria;
use Modules\Security\Infrastructure\Out\Persistence\Model\AuditoriaModel;

use Modules\Audit\Infrastructure\Events\EventServiceProvider;

/*
 * --------------------------------------------------------------------
 * Application Events
 * --------------------------------------------------------------------
 * Events allow you to tap into the execution of the program without
 * modifying or extending core files. This file provides a central
 * location to define your events, though they can always be added
 * at run-time, also, if needed.
 *
 * You create code that can execute by subscribing to events with
 * the 'on()' method. This accepts any form of callable, including
 * Closures, that will be executed when the event is triggered.
 *
 * Example:
 *      Events::on('create', [$myInstance, 'myMethod']);
 */

Events::on('pre_system', static function (): void {
    if (ENVIRONMENT !== 'testing') {
        if (ini_get('zlib.output_compression')) {
            throw FrameworkException::forEnabledZlibOutputCompression();
        }

        while (ob_get_level() > 0) {
            ob_end_flush();
        }

        ob_start(static fn ($buffer) => $buffer);
    }

    /*
     * --------------------------------------------------------------------
     * Debug Toolbar Listeners.
     * --------------------------------------------------------------------
     * If you delete, they will no longer be collected.
     */
    if (CI_DEBUG && ! is_cli()) {
        Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');
        service('toolbar')->respond();
        // Hot Reload route - for framework use on the hot reloader.
        if (ENVIRONMENT === 'development') {
            service('routes')->get('__hot-reload', static function (): void {
                (new HotReloader())->run();
            });
        }
    }
});

Events::on('registrar_auditoria', function ($accion, $descripcion = null, $contenido = null ) {

    $logger = Services::logger();

    try {
        $logger->info("Auditoría - Ingresa a Events");

        $acciones = [
            'session' => 'Inicio de sesión en el sistema',
            'session_failed' => 'Intento de inicio de sesión fallido',
            'logout'  => 'Cierre de sesión del usuario',
            'create'  => 'Creación de un nuevo registro',
            'update'  => 'Actualización de un registro existente',
            'delete'  => 'Eliminación de un registro',
        ];
    
        // Obtener IP del usuario
        $request = Services::request();
        $ip = $request->getIPAddress();
    
        $Auditoria = new Auditoria();
    
        $Auditoria->tipo = $accion->value;
        $Auditoria->username = session()->get('usuario') ?? null;
        $Auditoria->idusuario = session()->get('idusuario') ?? null;
        $Auditoria->remotehost = $ip;
        //$Auditoria->remotemachine = null;
        $Auditoria->descripcion = $descripcion !== null ? $descripcion : $acciones[$accion] ?? 'Acción desconocida';
        $Auditoria->contenido = $contenido;
        //$Auditoria->lat = null;
        //$Auditoria->lon = null;
    
        // Guardar en la BD
        $auditoriaModel = new AuditoriaModel();
        $auditoriaModel->insert($Auditoria);
    } catch (\Throwable $e) {
        $logger->error("Error Catch en Events.php -> registrar_auditoria -> " . $e->getMessage());
    }

});
EventServiceProvider::register();