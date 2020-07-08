<?php

declare(strict_types=1);

namespace Muleta\Utils\Modificators;

use Log;


class ArrayModificator
{
    public static function includeKeyFromAtribute($oldArray, $attributeFromArray)
    {
        $newArray = [];
        foreach ($oldArray as $column) {
            $newArray[$column[$attributeFromArray]] = $column;
        }
        return $newArray;
    }


    /**
     * Se nao for um array, faz virar um adicionando o indexe se quiser;
     */
    public static function convertToArrayWithIndex($arrayOrString, $index)
    {
        if (is_array($arrayOrString)) {
            return $arrayOrString;
        }
        return [
            $index => $arrayOrString
        ];
    }

    /**
     * Multi Explode
     *
     * @param array $delimiters
     * @param string $string
     * @return array
     */
    public static function multiExplode(array $delimiters, string $string): array
    {    
        return explode(
            $delimiters[0], 
            str_replace($delimiters, $delimiters[0], $string)
        );
    }
}
