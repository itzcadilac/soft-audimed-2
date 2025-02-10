<?php
namespace Modules\Siniestro\Infrastructure\Out\Persistence\Repository;

use Modules\Siniestro\Infrastructure\Out\Persistence\Model\SiniestroModel;

class SiniestroRepository
{
    protected $SiniestroModel;

    public function __construct()
    {
        $this->SiniestroModel = new SiniestroModel();
    }

    public function findAll()
    {
        return $this->SiniestroModel->findAll();
    }

    public function findById($id)
    {
        return $this->SiniestroModel->find($id);
    }

    public function create($data)
    {
        return $this->SiniestroModel->insert($data);
    }

    public function update($id, $data)
    {
        return $this->SiniestroModel->update($id, $data);
    }

    public function delete($id)
    {
        return $this->SiniestroModel->delete($id);
    }
}