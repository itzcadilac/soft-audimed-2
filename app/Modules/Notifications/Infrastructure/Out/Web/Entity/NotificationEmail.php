<?php

namespace Modules\Notifications\Infrastructure\Out\Web\Entity;

use CodeIgniter\Entity\Entity;

class NotificationEmail extends Entity
{
    protected $attributes = [
        "to" => null,
        "from" => null,
        "cc" => null,
        "bcc" => null,
        "nameFrom" => null,
        "subjectContent" => null,
        "templateContent" => null
    ];
}
