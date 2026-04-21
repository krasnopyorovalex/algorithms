<?php

declare(strict_types=1);

namespace Src\Tests\Linter;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Src\Linter\Braces\BracesLinter;
use Src\Linter\Linter;

#[Group('linter')]
class BracesLinterTest extends TestCase
{
    private Linter $linter;

    public function setUp(): void
    {
        $this->linter = new BracesLinter(new \SplStack());
    }

    #[DataProvider('charsProvider')]
    public function test_valid_braces(bool $result, string $chars): void
    {
        $this->assertEquals($result, $this->linter->check($chars));
    }

    public static function charsProvider(): array
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
