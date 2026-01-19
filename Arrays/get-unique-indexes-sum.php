<?php

declare(strict_types=1);

/**
 * Дан отсортированный массив целых чисел от меньшего к большему.
 * Нужно вернуть массив, состоящий из массивов всех пар индексов элементов, которые в сумме дадут число $n.
 * Индексы в каждой паре должны быть уникальными.
 */

function getUniqueIndexesSum(array $list, int $n): array
{
    $result = [];

    $start = 0;
    $end = count($list) - 1;

    while ($start < $end) {
        $sum = $list[$start] + $list[$end];

        if ($sum === $n) {
            $result[] = [$start, $end];
            $start++;
            $end--;
        } elseif ($sum < $n) {
            $start++;
        } else {
            $end--;
        }

    }

    return $result;
}

print_r(
    getUniqueIndexesSum([2, 6, 7, 3, 5, 7, 4], 11)
);
