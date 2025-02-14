<?php

namespace Modules\Users\Infrastructure\Out\Persistence\Repository;

use Config\Services;
use Exception;

use function PHPUnit\Framework\isNull;

class PasswordResetRepository
{
    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('usuarios');
    }

    public function findByIdentityAndEmail(string $identityNumber, string $email)
    {
        return $this->builder->where('numero_documento', $identityNumber)->where('email', $email)->where('active', 1)->get()->getResult();
    }

    public function saveToken(string $identityNumber, string $token)
    {
        $this->builder->where('numero_documento', $identityNumber)->update(['recovery_token' => $token, 'token_expiry' => date('Y-m-d H:i:s', time() + 3600)]);
    }

    public function updatePassword(string $identityNumber, string $hashedPassword)
    {
        $this->builder->where('numero_documento', $identityNumber)->update(['password' => $hashedPassword, 'recovery_token' => null, 'token_expiry' => null]);
    }
}