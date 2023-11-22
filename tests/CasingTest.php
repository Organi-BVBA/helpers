<?php

use Organi\Helpers\Constants\CaseStyle;
use Organi\Helpers\Formatters\Casing;

it('can\'t convert invalid type', function () {
    $converter = new Casing('invalid', CaseStyle::SPACES);
})->throws(\RuntimeException::class);

// if (CaseStyle::CAMEL === $this->from && CaseStyle::SPACES === $this->to) {
// if (CaseStyle::CAMEL === $this->from && CaseStyle::SNAKE === $this->to) {
// if (CaseStyle::CAMEL === $this->from && CaseStyle::KEBAB === $this->to) {
// if (CaseStyle::KEBAB === $this->from && CaseStyle::CAMEL === $this->to) {
// if (CaseStyle::PASCAL === $this->from && CaseStyle::SPACES === $this->to) {
// if (CaseStyle::PASCAL === $this->from && CaseStyle::SNAKE === $this->to) {
// if (CaseStyle::PASCAL === $this->from && CaseStyle::KEBAB === $this->to) {
// if (CaseStyle::SNAKE === $this->from && CaseStyle::KEBAB === $this->to) {


// From pascal
it('can convert pascal to spaces', function () {
    $value = 'CanConvertPascalToSpaces';

    $converter = new Casing(CaseStyle::PASCAL, CaseStyle::SPACES);
    $out = $converter->convert($value);

    expect($out)->toBe('can convert pascal to spaces');
});

it('can convert pascal to snake', function () {
    $value = 'CanConvertPascalToSpaces';

    $converter = new Casing(CaseStyle::PASCAL, CaseStyle::SNAKE);
    $out = $converter->convert($value);

    expect($out)->toBe('can_convert_pascal_to_spaces');
});

it('can convert pascal to kebab', function () {
    $value = 'CanConvertPascalToSpaces';

    $converter = new Casing(CaseStyle::PASCAL, CaseStyle::KEBAB);
    $out = $converter->convert($value);

    expect($out)->toBe('can-convert-pascal-to-spaces');
});

// From camel
it('can convert camel to spaces', function () {
    $value = 'canConvertCamelToSpaces';

    $converter = new Casing(CaseStyle::CAMEL, CaseStyle::SPACES);
    $out = $converter->convert($value);

    expect($out)->toBe('can convert camel to spaces');
});

it('can convert camel to snake', function () {
    $value = 'canConvertCamelToSpaces';

    $converter = new Casing(CaseStyle::CAMEL, CaseStyle::SNAKE);
    $out = $converter->convert($value);

    expect($out)->toBe('can_convert_camel_to_spaces');
});

it('can convert camel to kebab', function () {
    $value = 'canConvertCamelToSpaces';

    $converter = new Casing(CaseStyle::CAMEL, CaseStyle::KEBAB);
    $out = $converter->convert($value);

    expect($out)->toBe('can-convert-camel-to-spaces');
});

// from kebab
it('can convert kebab to camel', function () {
    $value = 'can-convert-camel-to-spaces';

    $converter = new Casing(CaseStyle::KEBAB, CaseStyle::CAMEL);
    $out = $converter->convert($value);

    expect($out)->toBe('canConvertCamelToSpaces');
});

// from spaces
it('can convert spaces to kebab', function () {
    $value = 'can convert space to kebab';

    $converter = new Casing(CaseStyle::SPACES, CaseStyle::KEBAB);
    $out = $converter->convert($value);

    expect($out)->toBe('can-convert-space-to-kebab');
});

// from snake
it('can convert snake to kebab', function () {
    $value = 'can_convert_snake_to_kebab';

    $converter = new Casing(CaseStyle::SNAKE, CaseStyle::KEBAB);
    $out = $converter->convert($value);

    expect($out)->toBe('can-convert-snake-to-kebab');
});
