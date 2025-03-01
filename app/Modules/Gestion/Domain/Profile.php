<?php

namespace Modules\Gestion\Domain;
use CodeIgniter\Entity\Entity;

class Profile extends Entity
{
    protected $users;
    protected $insurers;
    protected $producto;

    protected $attributes = [
        'idperfil' => null,
        'perfil' => null,
        'activo' => '1',
        'eliminado' => 0,
        'estadoreg' => 0,
        'createdat' => null,
        'updatedat' => null,
        'createdby' => null,
        'updatedby' => null,
    ];

    public function setUsers($data)
    {
        $this->users = $data;
    }

    public function getUsers()
    {
        return $this->users;
    }

    public function setInsurers($data)
    {
        $this->insurers = $data;
    }

    public function getInsurers()
    {
        return $this->insurers;
    }

    public function setProducto($data)
    {
        $this->producto = $data;
    }

    public function getProducto()
    {
        return $this->producto;
    }
    
    public function getUpdatedAt()
    {
        return date('d/m/Y H:i:s', strtotime($this->attributes['updatedat']));
    }

    public function getCreatedAt()
    {
        return date('d/m/Y H:i:s', strtotime($this->attributes['createdat']));
    }
}
