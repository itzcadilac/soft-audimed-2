<?php
namespace Modules\Siniestro\Infrastructure\In\Controller;

use App\Controllers\BaseController;
use Config\Services;
use Exception;
use Modules\Siniestro\Config\Services as SiniestroService;
use Modules\Siniestro\Config\Services as AseguradoraService;

class SiniestroController extends BaseController
{
    protected $SiniestroService;
    protected $AseguradoraService;

    public function __construct()
    {
        $this->SiniestroService = SiniestroService::SiniestroService();
        $this->AseguradoraService = AseguradoraService::AseguradoraService();
    }

    public function index()
    {
        return ($this->SiniestroService->findAll());
    }

    public function show($id)
    {
        return ($this->SiniestroService->findById($id));
    }

    public function create()
    {
        $data = $this->request->getPost();
        return ($this->SiniestroService->create($data));
    }

    public function update($id)
    {
        $data = $this->request->getRawInput();
        return ($this->SiniestroService->update($id, $data));
    }

    public function delete($id)
    {
        return ($this->SiniestroService->delete($id));
    }

    public function getAseguradoraxUser(){

        $logger = Services::logger();

        try {
            $result = $this->AseguradoraService->getAseguradoraxUser(12,1);

            //return $this->respond($result, $result["success"] ? 200 : 400);
            return $this->respond($result,200);

        } catch (\Throwable $e) {
            $logger->error("Error Catch en SiniestroController: getAseguradoraxUser: ".$e->getMessage());
            return $this->respond('Error al obtener aseguradoras.', 500); 
        }

    }

    public function setAseguradora(){
        $data = $this->request->getPost();
        $logger = Services::logger();

        try {

        $idAseg = $data['idAseguradora'];

        $session = session();
        $session->set('idaseguradora_user', $idAseg);
        
            $idUser = $session->get('idusuario');
            $idPerfil = $session->get('idperfil');
            $idAseguradora = $session->get('idaseguradora_user');

            $result = $this->AseguradoraService->getProductsxAseg($idAseg,$idUser,$idPerfil);
            
            $csrfHash = csrf_hash();
            $result["csrf_hash_gen"] = $csrfHash;
            
            return $this->respond($result, 200);

        } catch (\Throwable $e) {

            $logger->error("Error Catch en SiniestroController: setAseguradora: " . $e->getMessage());
            return $this->respond('Error al asignar aseguradora y obtener productos.', 500); 
        }

    }

    public function setProducto(){
        $data = $this->request->getPost();
        $logger = Services::logger();

        try {

            $idProducto = $data['idProducto'];

            $session = session();
            $session->set('idproducto_user', $idProducto);

            $csrfHash = csrf_hash();
                
            $result = [
                'status' => 'success',
                'message' => 'ok',
                'csrf_hash_gen' => $csrfHash
            ];

            return $this->respond($result, 200);

        } catch (\Throwable $e) {

            $logger->error("Error Catch en SiniestroController: setAseguradora: " . $e->getMessage());
            return $this->respond('Error al asignar productos.', 500); 
        }

    }

}