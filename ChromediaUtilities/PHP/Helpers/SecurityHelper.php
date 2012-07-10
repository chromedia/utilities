<?php
namespace ChromediaUtilities\PHP\Helpers;

require 'vendor/autoload.php';

class SecurityHelper
{
    public static function hash_sha256($data)
    {
        return \hash('sha256', $data);
    }
}