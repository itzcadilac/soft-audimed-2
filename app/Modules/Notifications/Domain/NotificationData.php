<?php

namespace Modules\Notifications\Domain;

use CodeIgniter\Entity\Entity;

class NotificationData extends Entity
{
    protected $attributes = [
        "type" => null,
        "to" => null,
        "from" => null,
        "cc" => null,
        "bcc" => null,
        "nameFrom" => null,
        "templateCode" => null,
        "templateContent" => null,
        "templateData" => [],
        "subjectContent" => null,
        "subjectData" => [],
        "username" => null
    ];
}
