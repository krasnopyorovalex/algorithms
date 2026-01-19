<?php

declare(strict_types=1);

namespace Src\Arrays;

final class CycleShift
{
    public function shift(array $array, int $n): array
    {
        $shift = $n % count($array);

        $array = $this->reverse($array, 0, count($array) - 1);
        $array = $this->reverse($array, 0, $shift - 1);

        return $this->reverse($array, $shift, count($array) - 1);
    }

    public function reverse(array $array, int $start, int $end): array
    {
        while ($start < $end) {
            [$array[$end], $array[$start]] = [$array[$start], $array[$end]];

            $start++;
            $end--;
        }

        return $array;
    }
}

$cycleShift = new CycleShift();

print_r($cycleShift->shift([1,2,3,4,5], 4));
