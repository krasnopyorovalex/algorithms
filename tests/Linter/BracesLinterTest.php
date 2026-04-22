<?php

declare(strict_types=1);

namespace Src\Tests\Linter;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Src\Linter\Braces\BracesLinter;
use Src\Linter\Linter;

#[Group('linter')]
#[CoversClass(BracesLinter::class)]
class BracesLinterTest extends TestCase
{
    private Linter $linter;

    public function setUp(): void
    {
        $this->linter = new BracesLinter(new \SplStack());
    }

    #[DataProvider('bracesStringProvider')]
    public function test_valid_braces(bool $result, string $chars): void
    {
        $this->assertEquals($result, $this->linter->check($chars));
    }

    public static function bracesStringProvider(): array
    {
        return [
            [true, '{[()]}'],
            [false, '{[()]}{'],
            [false, '{'],
            [false, ']'],
            [true, ''],
            [false, '({())})'],
        ];
    }
}
