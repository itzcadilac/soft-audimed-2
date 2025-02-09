<?php

namespace Modules\Audit\Infrastructure\Events;

use CodeIgniter\Events\Events;

class EventServiceProvider
{
    public static function register()
    {
        Events::on(EVENT_SAVE_AUDIT, [new SaveAuditEventListener(), "handle"]);
    }
}
