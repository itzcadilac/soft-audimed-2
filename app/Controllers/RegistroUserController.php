<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Exception;

class RegistroUserController extends BaseController
{

    protected $userService;

    public function __construct()
    {
        $this->userService = service('userService');
    }

    //public $helpers = ['url', 'form']; // Cargamos los helpers necesarios

    public function index(){

        $data['test'] = "Test";

        return $this->render('Auth/registro.twig', ['title' => 'Dashboard', 'data' => $data]);
    }

    
    public function registroUsuario(){

        // Obtener los datos del formulario
        $data = $this->request->getPost();
        $logger = Services::logger();

        try {
     
            // Obtener el servicio de log
            
            $logger->debug('Ingresó a la función registroUsuario');

            // Validar los datos
            $rules = [
                'num_documento' => 'required|min_length[3]|max_length[50]',
                'password' => 'required|min_length[6]',
            ];
            
            if (!$this->validate($rules)) {

                $errors = $this->validator->getErrors();

                //$logger->error("Cae en la validacion" . json_encode($errors));
                // Si la validación falla, devolver un error en la respuesta JSON

                $csrfHash = csrf_hash();

                $data = [
                    'status' => 'error',
                    'message' => $errors,
                    'csrf_hash_gen' => $csrfHash,
                ];

                return $this->respond($data, 400);

            }
    
            $usuario = new \App\Entities\Usuario();

            $logger->info("Password antes de encriptar (entidad): " . $data['password']);

            $usuario->idtipodocumento = 1;
            $usuario->numero_documento = $data['num_documento'];
            $usuario->apellidos = $data['apellidos'];
            $usuario->nombres = $data['nombres'];
            $usuario->usuario = 'AAAA';
            $usuario->passwd = password_hash($data['password'], PASSWORD_BCRYPT);
            $usuario->idperfil = 1;
            $usuario->activo = '1';
            
            //Llama a la funcion de guardar
            $result = $this->userService->guardarUsuario($usuario);
        
            $csrfHash = csrf_hash();

            $data = [
                'status' => 'success',
                'message' => 'Usuario creado correctamente',
                'csrf_hash_gen' => $csrfHash,
            ];

            if($result["success"]){
                return $this->respond($data, 201);
            }else{
                return $this->respond($data, 400); //Error
            }

            //return $this->respond($data, 201); // Código 201 Created

        }catch(Exception $e){

            $logger->error($e->getMessage());

            $csrfHash = csrf_hash();

            $data = [
                'status' => 'error',
                'message' => 'Hubo un error al guardar la información.',
                'csrf_hash_gen' => $csrfHash,
            ];

            return $this->respond($data, 400);
        }

    }

    public function getAllActiveUsers(){

        $logger = Services::logger();
        try {

            $result = $this->userService->getAllActiveUsers();
            
            if($result["success"]){
                return $this->respond($result, 200);
            }else{
                return $this->respond($result, 400); //No existen datos
            }

        } catch (Exception $e) {

            $logger->error("Error Catch en RegistroUserController: getAllActiveUsers: "+$e->getMessage());

            $result = [
                'status' => 'error',
                'message' => 'Hubo un error',
            ];

            return $this->respond($result, 400); //error al llamar al EndPoint
        }

    }
        
}
