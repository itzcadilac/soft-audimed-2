<?php

namespace App\Libraries;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TwigExtensions extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('csrf_token', 'csrf_token'),
            new TwigFunction('csrf_hash', 'csrf_hash'),
        ];
    }
}