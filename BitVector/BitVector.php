<?php

declare(strict_types=1);

namespace Src\BitVector;

use OutOfBoundsException;
use SplFixedArray;

final class BitVector
{
    private int $maxIndex;

    /**
     * @var SplFixedArray<int>
     */
    private SplFixedArray $vector;

    public function __construct(int $bits)
    {
        $this->maxIndex = $bits - 1;

        $shift = log(PHP_INT_SIZE * 8, 2);
        $size = (($this->maxIndex) >> $shift) + 1;

        $this->vector = new SplFixedArray($size);
    }

    public function setBit(int $index): void
    {
        $this->checkIndex($index);

        $row = $this->getRow($index);
        $col = $this->getCol($index);

        $mask = 1 << $col;

        $this->vector[$row] |= $mask;
    }

    public function unsetBit(int $index): void
    {
        $this->checkIndex($index);

        $row = $this->getRow($index);
        $col = $this->getCol($index);

        $mask = ~(1 << $col);

        $this->vector[$row] &= $mask;
    }

    public function inverseBit(int $index): void
    {
        $this->checkIndex($index);

        $row = $this->getRow($index);
        $col = $this->getCol($index);

        $mask = 1 << $col;

        $this->vector[$row] ^= $mask;
    }

    public function isSetBit(int $index): bool
    {
        $this->checkIndex($index);

        $row = $this->getRow($index);
        $col = $this->getCol($index);

        $mask = 1 << $col;

        $bit = $this->vector[$row] & $mask;

        return $bit !== 0;
    }

    public function getRow(int $index): int
    {
        return $index >> log(PHP_INT_SIZE * 8, 2);
    }

    public function getCol(int $index): int
    {
        return $index % (PHP_INT_SIZE * 8);
    }

    private function checkIndex(int $index): void
    {
        if ($index < 0 || $index > $this->maxIndex) {
            throw new OutOfBoundsException('Not enough index available');
        }
    }
}
