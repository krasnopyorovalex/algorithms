<?php

declare(strict_types=1);

namespace Src\Tests\Arrays;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Src\Arrays\CycleShift;

#[CoversClass(CycleShift::class)]
class CycleShiftTest extends TestCase
{
    public function test_shift(): void
    {
        $cycleShift = new CycleShift();

        $result = $cycleShift->shift([1,2,3,4,5], 4);

        $this->assertEquals([2,3,4,5,1], $result);
    }
}
