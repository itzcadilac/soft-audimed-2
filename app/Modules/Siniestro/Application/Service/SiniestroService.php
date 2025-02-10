<?php
namespace Modules\Siniestro\Application\Service;

use Modules\Siniestro\Infrastructure\Out\Persistence\Repository\SiniestroRepository;

class SiniestroService
{
    protected $SiniestroRepository;

    public function __construct(SiniestroRepository $SiniestroRepository)
    {
        $this->SiniestroRepository = $SiniestroRepository;
    }

    public function findAll()
    {
        return $this->SiniestroRepository->findAll();
    }

    public function findById($id)
    {
        return $this->SiniestroRepository->findById($id);
    }

    public function create($data)
    {
        return $this->SiniestroRepository->create($data);
    }

    public function update($id, $data)
    {
        return $this->SiniestroRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->SiniestroRepository->delete($id);
    }
}