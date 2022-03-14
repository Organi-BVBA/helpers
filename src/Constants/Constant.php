<?php

namespace Organi\Helpers\Constants;

use ReflectionClass;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

abstract class Constant
{
    // Make constructor private so class cant be initiated
    private function __construct()
    {
    }

    /**
     * @param string | int $id
     */
    public static function exists($id): bool
    {
        $c = new ReflectionClass(static::class);

        return in_array($id, $c->getConstants());
    }

    /**
     * @param string | int $id
     */
    public static function find($id): int
    {
        $c = new ReflectionClass(static::class);

        $constants = array_flip($c->getConstants());

        return Arr::get($constants, $id);
    }

    public static function all(): Collection
    {
        $c = new ReflectionClass(static::class);

        return collect($c->getConstants());
    }

    /**
     * Pretty much the same as the description function
     * But this function falls back to the constant name
     * If no description is defined in the descriptions array.
     */
    public static function dictionary(): Collection
    {
        $c = new ReflectionClass(static::class);

        $descriptions = static::descriptions();

        $out = [];
        foreach ($c->getConstants() as $title => $value) {
            // Map each constant to a description
            // Or fall back on title if it's not available
            $out[$value] = Arr::get($descriptions, $value, $title);
        }

        return collect($out);
    }

    /**
     * Returns an array with descriptions.
     * The key of the array should be the value of the constant.
     */
    public static function descriptions(): array
    {
        return [];
    }

    /**
     * Return a description for a specific value.
     *
     * @param int|string $id
     *
     * @return mixed
     */
    public static function description($id)
    {
        return Arr::get(static::descriptions(), $id);
    }
}
