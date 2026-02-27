<?php

declare(strict_types=1);

function findMaximumContinuousSequence(array $sequence): int
{
    if (count($sequence) < 1) {
        return 0;
    }

    $max = 0;
    $start = 0;
    $end = 0;

    while ($end < count($sequence)) {
        if ($sequence[$end] === 0) {
            $max = max($max, ($end - $start));
            $start = $end + 1;
        }

        $end++;
    }

    return max($max, $start - $end);
}
