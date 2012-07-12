<?php
namespace ChromediaUtilities\Helpers;

class Inflector 
{
    static public function camelize($word)
    {
        return str_replace(' ','',preg_replace('/[^A-Z^a-z^0-9]+/',' ',$word));
    }
}