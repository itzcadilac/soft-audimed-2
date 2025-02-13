<?php

namespace Modules\Security\Application\Service;

use CodeIgniter\Events\Events;
use CodeIgniter\Session\Session;
use Config\Services;
use Exception;

use Modules\Users\Config\Services as UserServices;
use Modules\Siniestro\Config\Services as SiniestroServices;

class LoginService
{
    protected $session;
    protected $moduleByProfileService;
    protected $userService;
    protected $aseguradoraService;

    public function __construct(Session $session)
    {
        $this->session = $session;

        $this->moduleByProfileService = UserServices::moduleByProfileService();
        $this->userService = UserServices::userService();
        $this->aseguradoraService = SiniestroServices::AseguradoraService();
    }

    public function loginUser($documentNumber, $password)
    {
        $logger = Services::logger();

        try {
            $result = $this->userService->getActiveUserByDocument($documentNumber);

            if ($result['success']) {
                $user = $result['data'];

                //Verificamos si el usuario tiene opciones asignadas
                $moduleByProfile = $this->moduleByProfileService->getListModuleByProfile($user['idperfil']);
                $asegxUser = $this->aseguradoraService->getAseguradoraxUser($user['idusuario'],$user['idperfil']);

                //print_r($moduleByProfile);exit();

                $logger->info("Trae la relacion de modulos: " . json_encode($moduleByProfile));

                if ($moduleByProfile["success"]) {
                    $array_modulos = $moduleByProfile["data"];
                    $array_aseg = $asegxUser["data"];

                    /*
                    if(count($array_aseg) == 1) {
                        //print_r($array_aseg);exit();
                        $idAseg = $array_aseg['0']['idaseguradora'];
                        $idaseguradora_user = $idAseg;
                        $prodxAseg = $this->aseguradoraService->getProductsxAseg($idAseg,$user['idusuario'],$user['idperfil']);

                        $arrayProdxAseg = $prodxAseg['data'];

                        if(count($arrayProdxAseg) == 1){
                            $idproducto_user = $arrayProdxAseg['productos'];
                        }else{
                            $idproducto_user = '0';
                        }
                        
                    }else{
                        $idaseguradora_user = '0';
                        $idproducto_user = '0';
                    }
                    */

                    if (password_verify($password, $user['passwd'])) {
                        // Guardar datos del usuario en la sesión
                        $this->session->set([
                            'idusuario' => $user['idusuario'],
                            'numero_documento' => $user['numero_documento'],
                            'apellidos' => $user['apellidos'],
                            'nombres' => $user['nombres'],
                            'usuario' => $user['usuario'],
                            'idperfil' => $user['idperfil'],
                            'modulosUsuario' => $array_modulos,
                            'aseguradoras_user' => $array_aseg,
                            'idaseguradora_user' => 0,
                            'idproducto_user' => 0,
                            'isLoggedIn' => true,
                        ]);

                        $data = [
                            'retry' => 0,
                            'fretry' => null //date('Y-m-d H:i:s'),
                        ];

                        $this->userService->updateUserFretry($user['idusuario'],$data);

                        Events::trigger('registrar_auditoria', 'session');
                        return successResponse($result, 'Sesion iniciada');
                    } else {
                        //actualizar numero de reintentos
                        $data = [
                            'retry' => $user['retry'] + 1,
                            'fretry' =>  date('Y-m-d H:i:s')
                        ];

                        if ($data['retry'] === REINTENTOS_BLOQUEO) {
                            $data['activo'] = 0;
                            Events::trigger('registrar_auditoria', 'session_failed', 'Cuenta bloqueada por intentos de acceso fallidos', $documentNumber);
                        }else{
                            Events::trigger('registrar_auditoria', 'session_failed', 'Intento de acceso fallido: '.$data['retry'] , $documentNumber);
                        }

                        $this->userService->updateUserFretry($user['idusuario'],$data);

                        $logger->error("Usuario o pass incorrectos");
                        if($data['retry'] === REINTENTOS_BLOQUEO){
                            return errorResponse('Cuenta bloqueada por intentos de acceso fallidos:' . REINTENTOS_BLOQUEO);
                        }
                        return errorResponse('Credenciales invalidas');
                    }
                } else {
                    $logger->error("Usuario no tiene modulos asignados");
                    return errorResponse('Usuario no tiene modulos asignados');
                }
            } else {
                Events::trigger('registrar_auditoria', 'session_failed', null, $documentNumber);
                return errorResponse('Usuario no existe o está inactivo');
            }
        } catch (Exception $e) {
            $logger->error("Error Catch en LoginService -> getAuthenticateUser -> " . $e->getMessage());
            return errorResponse('Error global en la autenticacion');
        }
    }
}
