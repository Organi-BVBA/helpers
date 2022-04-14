<?php

use Organi\Helpers\Constants\CaseStyle;
use Organi\Helpers\Formatters\Casing;

it('can\'t convert invalid type', function () {
    $converter = new Casing('invalid', CaseStyle::SPACES);
})->throws(\RuntimeException::class);

it('can convert camel to spaces', function () {
    $value = 'canConvertCamelToSpaces';

    $converter = new Casing(CaseStyle::CAMEL, CaseStyle::SPACES);
    $out = $converter->convert($value);

    expect($out)->toBe('can convert camel to spaces');
});

it('can convert kebab to camel', function () {
    $value = 'can-convert-camel-to-spaces';

    $converter = new Casing(CaseStyle::KEBAB, CaseStyle::CAMEL);
    $out = $converter->convert($value);

    expect($out)->toBe('canConvertCamelToSpaces');
});
