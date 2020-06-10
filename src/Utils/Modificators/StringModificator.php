<?php

declare(strict_types=1);

namespace Muleta\Utils\Modificators;

use Log;
use ArgumentCountError;
use Symfony\Component\Inflector\Inflector;
use Illuminate\Muleta\Str;
use Cocur\Slugify\Slugify;

class StringModificator
{


    public static function plurarize($name)
    {
        // return Str::plural(Str::lower($name));
        return Str::plural($name);

        // $name = Inflector::pluralize($name);
        // if (is_array($name)) {
        //     $name = $name[count($name) - 1];
        // }
        // return $name;
    }
    public static function plurarizeAndLower($name)
    {
        return Str::lower(
            self::plurarize($name)
        );
    }

    public static function singularize($name)
    {
        return Str::singular($name);
        // $name = Inflector::singularize($name);
        // if (is_array($name)) {
        //     $name = $name[count($name) - 1];
        // }
        // return $name;
    }
    public static function singularizeAndLower($name)
    {
        return Str::lower(
            self::singularize($name)
        );
    }



    /**
     * 
     */

    public static function clean($word)
    {
        $remove = [
            '"'
        ];

        return $word = \str_replace($remove, '', $word);

        // return self::singularize($word);
    }
    
    public static function cleanCodeSlug($slug)
    {
        // $slugify = new Slugify();
        // $slug = $slugify->slugify($slug, '.'); // hello-world

        $slug = Str::kebab($slug);
        $slug = Str::slug($slug, '.');
        
        return $slug;
    }
    public static function convertSlugToName($slug)
    {
        return collect(explode('.', static::cleanCodeSlug($slug)))->map(
            function ($namePart) {
                return ucfirst($namePart);
            }
        )->implode(' ');
    }
}
