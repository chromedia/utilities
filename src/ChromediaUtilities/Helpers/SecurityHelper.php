<?php
namespace ChromediaUtilities\Helpers;

class SecurityHelper
{
    public static function hash_sha256($data)
    {
        return \hash('sha256', $data);
    }
}