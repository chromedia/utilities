<?php
namespace ChromediaUtilities\Helpers;

class Inflector 
{
    static public function camelize($word)
    {
        return str_replace(' ','',ucwords(preg_replace('/[^A-Z^a-z^0-9]+/',' ',$word)));
    }
    
    static public function toVariable($word)
    {
        $word = Inflector::camelize($word);
        return strtolower($word[0]).substr($word,1);
    }
}