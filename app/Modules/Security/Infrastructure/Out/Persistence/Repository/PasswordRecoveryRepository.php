<?php
namespace Modules\Security\Infrastructure\Out\Persistence\Repository;

use Config\Database;

class PasswordRecoveryRepository
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function findByEmailAndIdentity($email, $identityNumber, $userSelect)
    {
        $sql = "SELECT idusuario, usuario, email FROM usuarios WHERE email = ? AND numero_documento = ? AND activo = 1";
        $params = [$email, $identityNumber];
    
        if ($userSelect > 0) {
            $sql .= " AND idusuario = ?";
            $params[] = $userSelect;
        }
    
        $query = $this->db->query($sql, $params);
        return $query->getResultArray();
    }

    public function saveRecoveryToken($usuario,$email,$token)
    {
        $this->db->query("INSERT INTO notificaciones (codeplantilla,usuario,email,token_fcm) VALUES (?, ?, ?, ?)", ['EMAIL_CHANGE_PWD',$usuario, $email, $token]);
    }

    public function validateToken($token)
    {
        $query = $this->db->query("SELECT * FROM notificaciones WHERE activo = 1 and fexpiracion > current_timestamp and uuid = ?", [$token]);
        return $query->getRowArray();
    }

    public function updatePassword($userId, $hashedPassword)
    {
        $this->db->query("UPDATE usuarios SET passwd = ? WHERE usuario = ?", [$hashedPassword, $userId]);
    }

    public function deleteToken($token,$userId)
    {
        $this->db->query("UPDATE notificaciones SET activo = 0 WHERE usuario = ?", [$userId]);
    }
}