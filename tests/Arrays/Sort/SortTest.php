<?php

declare(strict_types=1);

namespace Src\Tests\Arrays\Sort;

require __DIR__ . '/../../../Arrays/Sort/insertion.php';

use PHPUnit\Framework\TestCase;

class SortTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     * @test
     */
    public function insertion(array $expected, array $in): void
    {
        $this->assertEquals($expected, insertionSort($in));
    }

    public static function additionProvider(): array
    {
        return [
            [
                [-9, 0, 2, 6, 55, 80, 100],
                [2, 100, 0, -9, 55, 80, 6]
            ],
            [
                [0, 0, 0, 5],
                [0, 0, 0, 5]
            ],
            [
                [],
                []
            ]
        ];
    }
}
