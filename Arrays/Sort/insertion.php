<?php

declare(strict_types=1);

function insertionSort(array $arr): array
{
    for ($i = 0, $iMax = count($arr) - 1; $i < $iMax; $i++) {
        $temp = $arr[$i + 1];
        $position = $i;

        while ($position >= 0) {
            if ($arr[$position] > $temp) {
                $arr[$position + 1] = $arr[$position];
                $position--;
            } else {
                break;
            }

            $arr[$position + 1] = $temp;
        }
    }

    return $arr;
}
