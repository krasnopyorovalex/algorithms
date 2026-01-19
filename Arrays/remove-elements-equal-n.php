<?php

declare(strict_types=1);

/**
 * Дан заполненный массив целых чисел.
 * Нужно удалить из этого массива все значения, равные числу $n,
 * не пересоздавая новый массив в памяти.
 * Все не удалённые элементы должны быть сдвинуты влево друг к другу, не оставляя зазоров.
 * В конце нужно вернуть количество старых оставшихся элементов
 */
function removeElementsEqualN(array $list, int $n): int
{
    $l = 0;

    foreach ($list as $value) {
        if ($value === $n) {
            continue;
        }

        $list[$l] = $value;

        $l++;
    }

    return $l;
}

$list = [1, 3, 5, 5, 5, 7, 5, 8, 7];

echo removeElementsEqualN($list, 5), PHP_EOL;
