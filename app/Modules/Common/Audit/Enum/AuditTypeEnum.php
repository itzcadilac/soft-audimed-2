<?php

namespace Modules\Common\Audit\Enum;

enum AuditTypeEnum: string
{
    case TYPE_SESSION = "SESSION";
    case TYPE_LOGON = "LOGON";
    case TYPE_LOGOUT = "LOGOUT";
    case TYPE_PASSWORD = "PASSWORD";
    case TYPE_EXCEPTION = "EXCEPTION";
    case TYPE_RECOVERY = "RECUPERACION";
    case TYPE_UPDATE = "UPDATE";
    case TYPE_CREATE = "CREATE";
    case TYPE_DELETE = "DELETE";
    case TYPE_REGISTER = "REGISTRO";
    case TYPE_URL = "URL";
}
