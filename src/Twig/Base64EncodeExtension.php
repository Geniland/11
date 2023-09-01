<?php 
// src/Twig/Base64EncodeExtension.php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class Base64EncodeExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('base64_encode', [$this, 'base64EncodeFilter']),
        ];
    }

    public function base64EncodeFilter($data)
    {
        return base64_encode($data);
    }
}
