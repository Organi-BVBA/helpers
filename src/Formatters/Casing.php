<?php

namespace Organi\Helpers\Formatters;

use Organi\Helpers\Constants\CaseStyle;

final class Casing
{
    private string $from;

    private string $to;

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
            return $this->addSingleCharacterBeforeCapitalLetter($value, ' ');
        }

        if (CaseStyle::PASCAL === $this->from && CaseStyle::SPACES === $this->to) {
            return $this->addSingleCharacterBeforeCapitalLetter($value, ' ');
        }

        if (CaseStyle::CAMEL === $this->from && CaseStyle::SNAKE === $this->to) {
            return $this->addSingleCharacterBeforeCapitalLetter($value, '_');
        }

        if (CaseStyle::PASCAL === $this->from && CaseStyle::SNAKE === $this->to) {
            return $this->addSingleCharacterBeforeCapitalLetter($value, '_');
        }

        if (CaseStyle::CAMEL === $this->from && CaseStyle::KEBAB === $this->to) {
            return $this->addSingleCharacterBeforeCapitalLetter($value, '-');
        }

        if (CaseStyle::PASCAL === $this->from && CaseStyle::KEBAB === $this->to) {
            return $this->addSingleCharacterBeforeCapitalLetter($value, '-');
        }

        if (CaseStyle::KEBAB === $this->from && CaseStyle::CAMEL === $this->to) {
            return $this->removeCharacterAndCapitalizeNextLetter($value, '-');
        }

        if (CaseStyle::SNAKE === $this->from && CaseStyle::KEBAB === $this->to) {
            return str_replace('_', '-', $value);
        }

        if (CaseStyle::SPACES === $this->from && CaseStyle::KEBAB === $this->to) {
            return str_replace(' ', '-', $value);
        }

        throw new \RuntimeException('Conversion not implemented yet');
    }

    private function removeCharacterAndCapitalizeNextLetter(string $value, string $character): string
    {
        while ($pos = strpos($value, $character)) {
            // Remove the '-'
            $value = substr_replace($value, '', $pos, 1);

            // Replace the character after the '-' with an uppercase
            $value[$pos] = chr(ord($value[$pos]) - 32);
        }

        return $value;
    }



    private function addSingleCharacterBeforeCapitalLetter(string $value, string $character): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', $character . '$0', $value));
    }
}
