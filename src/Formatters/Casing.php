<?php

namespace Organi\Helpers\Formatters;

use Organi\Helpers\Constants\CaseStyle;

class Casing
{
    protected string $from;

    protected string $to;

    public function __construct(string $from, string $to)
    {
        if (! CaseStyle::all()->contains($from)) {
            throw new \RuntimeException('Incorrect type');
        }

        if (! CaseStyle::all()->contains($to)) {
            throw new \RuntimeException('Incorrect type');
        }

        $this->from = $from;
        $this->to = $to;
    }

    public function convert(string $value): string
    {
        if (CaseStyle::CAMEL === $this->from && CaseStyle::SPACES === $this->to) {
            return $this->toSpaces($value);
        }

        if (CaseStyle::PASCAL === $this->from && CaseStyle::SPACES === $this->to) {
            return $this->toSpaces($value);
        }

        if (CaseStyle::CAMEL === $this->from && CaseStyle::SNAKE === $this->to) {
            return $this->toUnderscores($value);
        }

        if (CaseStyle::PASCAL === $this->from && CaseStyle::SNAKE === $this->to) {
            return $this->toUnderscores($value);
        }

        if (CaseStyle::KEBAB === $this->from && CaseStyle::CAMEL === $this->to) {
            return $this->kebabToCamel($value);
        }

        throw new \RuntimeException('Conversion not implemented yet');
    }

    protected function toSpaces(string $value): string
    {
        return $this->addSingleCharacter($value, ' ');
    }

    protected function toUnderscores(string $value): string
    {
        return $this->addSingleCharacter($value, '_');
    }

    private function addSingleCharacter(string $value, string $character): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', $character . '$0', $value));
    }

    protected function kebabToCamel(string $value): string
    {
        $arr = explode('-', $value);

        $arr = array_map(function ($key, $item) {
            return (0 === $key) ? $item : ucfirst($item);
        }, array_keys($arr), $arr);

        return implode('', $arr);
    }
}
