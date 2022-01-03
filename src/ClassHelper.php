<?php

namespace Organi\Helpers;

class ClassHelper
{
    public static function getBaseName(string $class): string
    {
        $parts = explode('\\', $class);

        return array_pop($parts);
    }
}
