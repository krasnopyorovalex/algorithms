<?php

declare(strict_types=1);

namespace Src\Arrays\Sort;

final class Quick
{
    public function __construct(private(set) array $arr) {}

    public function sort(int $leftIndex, int $rightIndex): void
    {
        if ($rightIndex - $leftIndex <= 0) {
            return;
        }

        $pivotIndex = $this->partition($leftIndex, $rightIndex);

        $this->sort($leftIndex, $pivotIndex - 1);
        $this->sort($pivotIndex + 1, $rightIndex);
    }

    public function partition(int $leftIndex, int $rightIndex): int
    {
        $pivotIndex = $rightIndex--;
        $pivot = $this->arr[$pivotIndex];

        while (true) {
            while ($this->arr[$leftIndex] < $pivot) {
                $leftIndex++;
            }

            while ($rightIndex >= 0 && $this->arr[$rightIndex] > $pivot) {
                $rightIndex--;
            }

            if ($leftIndex >= $rightIndex) {
                break;
            }

            [$this->arr[$leftIndex], $this->arr[$rightIndex]] = [$this->arr[$rightIndex], $this->arr[$leftIndex]];
            $leftIndex++;
        }

        [$this->arr[$leftIndex], $this->arr[$pivotIndex]] = [$this->arr[$pivotIndex], $this->arr[$leftIndex]];

        return $leftIndex;
    }
}
