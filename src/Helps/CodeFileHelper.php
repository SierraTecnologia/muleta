<?php
namespace Muleta\Helps;


/**
 * Array helper.
 *
 * @todo nao era pra taa aqui
 */
class CodeFileHelper
{
    
    public static function getClassName($class)
    {
        $class = explode("\\", self::getFullClassName($class));
        return $class[count($class)-1];
    }
    
    public static function getFullClassName($class)
    {
        return get_class($class);
    }

}