<?php

declare(strict_types=1);

use Src\BitVector\BitVector;

require __DIR__ . '/../vendor/autoload.php';

function outputDuplicates(array $numbers): void
{
    $bitVector = new BitVector(121);

    for ($i = 0, $iMax = count($numbers); $i < $iMax; $i++) {
        if ($bitVector->isSetBit($numbers[$i] - 1)) {
            echo $numbers[$i], PHP_EOL;
            continue;
        }

        $bitVector->setBit($numbers[$i] - 1);
    }
}

$numbers = [2, 4, 11, 44, 5, 8, 9, 5, 11, 4, 9, 1, 13, 100, 120, 120, 121];

outputDuplicates($numbers);
