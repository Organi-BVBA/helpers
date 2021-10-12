<?php

use Organi\Helpers\Formatters\Bytes;

it('converts to kiB', function () {
    $value = 1024;

    $out = Bytes::formatBinary($value);

    expect($out)->toBe('1 kiB');
});

it('converts to MiB', function () {
    $value = pow(1024, 2);

    $out = Bytes::formatBinary($value);

    expect($out)->toBe('1 MiB');
});

it('converts to GiB', function () {
    $value = pow(1024, 3);

    $out = Bytes::formatBinary($value);

    expect($out)->toBe('1 GiB');
});

it('converts to TiB', function () {
    $value = pow(1024, 4);

    $out = Bytes::formatBinary($value);

    expect($out)->toBe('1 TiB');
});

it('converts to kB', function () {
    $value = 1000;

    $out = Bytes::formatDecimal($value);

    expect($out)->toBe('1 kB');
});

it('converts to MB', function () {
    $value = pow(1000, 2);

    $out = Bytes::formatDecimal($value);

    expect($out)->toBe('1 MB');
});

it('converts to GB', function () {
    $value = pow(1000, 3);

    $out = Bytes::formatDecimal($value);

    expect($out)->toBe('1 GB');
});

it('converts to TB', function () {
    $value = pow(1000, 4);

    $out = Bytes::formatDecimal($value);

    expect($out)->toBe('1 TB');
});
