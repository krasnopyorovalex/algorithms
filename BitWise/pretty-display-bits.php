<?php

declare(strict_types=1);

function prettyDisplayBits(int $number): string
{
    $pretty = '';
    $mask = 1 << (PHP_INT_SIZE * 8 - 1);

    for ($i = 1, $iMax = PHP_INT_SIZE * 8; $i <= $iMax; $i++) {
        $pretty .= $number & $mask ? '1' : '0';
        $number <<= 1;

        if ($i % 8 === 0) {
            $pretty .= ' ';
        }
    }

    return $pretty;
}

echo prettyDisplayBits(2), PHP_EOL;

/**
 * Example
 * 2  =>  00000000 00000000 00000000 00000000 00000000 00000000 00000000 00000010
 */
