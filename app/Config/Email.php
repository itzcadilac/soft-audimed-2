<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public $fromEmail;
    public $fromName;
    public $protocol;
    public $SMTPHost;
    public $SMTPUser;
    public $SMTPPass;
    public $SMTPPort;
    public $SMTPTimeout;
    public $SMTPCrypto;
    public $mailType;

    public function __construct()
    {
        $this->fromEmail   = getenv('email.fromEmail');
        $this->fromName    = getenv('email.fromName');
        $this->protocol    = getenv('email.protocol');
        $this->SMTPHost    = getenv('email.SMTPHost');
        $this->SMTPUser    = getenv('email.SMTPUser');
        $this->SMTPPass    = getenv('email.SMTPPass');
        $this->SMTPPort    = (int) getenv('email.SMTPPort');
        $this->SMTPTimeout = (int) getenv('email.SMTPTimeout');
        $this->SMTPCrypto  = getenv('email.SMTPCrypto');
        $this->mailType    = getenv('email.mailType');
    }
}
