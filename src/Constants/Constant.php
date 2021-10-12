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

    public static function exists(string $id): bool
    {
        $c = new ReflectionClass(static::class);

        return in_array($id, $c->getConstants());
    }

    public static function find(string $id): int
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

    public static function descriptions(): array
    {
        return [];
    }

    /**
     * @param int|string $id
     *
     * @return mixed
     */
    public static function description($id)
    {
        return Arr::get(static::descriptions(), $id);
    }
}
