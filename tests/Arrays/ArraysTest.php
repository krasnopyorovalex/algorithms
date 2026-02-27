<?php

declare(strict_types=1);

namespace Src\Tests\Arrays;

require __DIR__ . '/../../Arrays/get-unique-indexes-sum.php';
require __DIR__ . '/../../Arrays/remove-elements-equal-n.php';
require __DIR__ . '/../../Arrays/get-max-area.php';
require __DIR__ . '/../../Arrays/find-the-length-of-the-maximum-continuous-sequence-of-units.php';

use PHPUnit\Framework\TestCase;

class ArraysTest extends TestCase
{
    /** @test */
    public function is_unique_indexes_sum(): void
    {
        $this->assertEquals(
            [[2,6]],
            getUniqueIndexesSum([2, 6, 7, 3, 5, 7, 4], 11)
        );
    }

    /** @test */
    public function remove_unique_indexes_sum(): void
    {
        $this->assertEquals(
            5,
            removeElementsEqualN([1, 3, 5, 5, 5, 7, 5, 8, 7], 5)
        );
    }

    /** @test */
    public function get_max_area(): void
    {
        $this->assertEquals(
            24,
            getMaxArea([2, 6, 7, 3, 5, 7, 4])
        );
    }

    /** @test */
    public function find_max_sequence_of_units(): void
    {
        $this->assertEquals(
            5,
            findMaximumContinuousSequence([1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1])
        );
    }
}
