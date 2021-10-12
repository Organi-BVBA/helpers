<?php

namespace Organi\Helpers\Formatters;

class Bytes
{
    public static function formatDecimal(int $bytes, int $precision = 2): string
    {
        $units = [
            'B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB',
        ];

        $bytes = max($bytes, 0);
        $pow   = floor(($bytes ? log($bytes) : 0) / log(1000));
        $pow   = min($pow, count($units) - 1);

        $bytes /= pow(1000, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    public static function formatBinary(int $bytes, int $precision = 2): string
    {
        $units = [
            'B', 'kiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB',
        ];

        $bytes = max($bytes, 0);
        $pow   = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow   = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}
