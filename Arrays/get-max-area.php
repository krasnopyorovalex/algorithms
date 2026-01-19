<?php

declare(strict_types=1);

function getMaxArea(array $array): int
{
    $start = 0;
    $end = count($array) - 1;
    $max = 0;

    while ($start < $end) {
        $width = $end - $start;
        $height = min($array[$start], $array[$end]);

        $max = max($max, $width * $height);

        if ($array[$start] < $array[$end]) {
            $start++;
        } else {
            $end--;
        }
    }

    return $max;
}

echo getMaxArea([2, 6, 7, 3, 5, 7, 4]), PHP_EOL;
