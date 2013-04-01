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
    
    /**
     * Supply values for variable patterns in a string e.g. "This a string with a variable {dog} and this dog's name is {dogName}"
     * 
     * @param string $subject
     * @param array $values
     * @return string
     */
    static public function supplyPatternVariableValues($subject, array $values, array $knownVariables=array())
    {
        $tempSubject = $subject;
        \preg_match_all('/\{.*?\}/', $tempSubject, $matches);
        
        $checkKnownVariables = \count($knownVariables) > 0;
        
        foreach ($matches[0] as $_matched_pattern) {
            $variable = \preg_replace('/[\{\}]/', '', $_matched_pattern);
            
            // variable is not in the list of known variables for this pattern
            if ($checkKnownVariables && !\in_array($variable, $knownVariables)) {
                continue;
            }
            
            $value = \array_key_exists($variable, $values) ? $values[$variable] : '';
            $tempSubject = \preg_replace('/'.$_matched_pattern.'/', $value, $tempSubject);
        }
        
        // replace multiple spaces that might have been caused by replacing values
        $tempSubject = \preg_replace('/\s+/', ' ', $tempSubject);
    
        return $tempSubject;
    }
}