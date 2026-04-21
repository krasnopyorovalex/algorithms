<?php

declare(strict_types=1);

namespace Src\Tests\Arrays\Sort;

require __DIR__ . '/../../../Arrays/Sort/insertion.php';

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Src\Arrays\Sort\Quick;

#[Group('sort')]
class SortTest extends TestCase
{
    #[DataProvider('additionProvider')]
    public function test_insertion(array $expected, array $in): void
    {
        $this->assertEquals($expected, insertionSort($in));
    }

    #[DataProvider('additionProvider')]
    public function test_quick(array $expected, array $in): void
    {
        $sort = new Quick($in);
        $sort->sort(0, count($in) - 1);

        $this->assertEquals($expected, $sort->arr);
    }

    public static function additionProvider(): array
    {
        return [
            [
                [2, 5],
                [5, 2]
            ],
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
