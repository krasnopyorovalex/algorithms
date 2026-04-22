<?php

declare(strict_types=1);

namespace Src\Tests\Linter;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Src\Linter\Braces\Brace;

#[Group('linter')]
#[CoversClass(Brace::class)]
class BraceTest extends TestCase
{
    #[DataProvider('charsProvider')]
    public function test_is_valid_open_brace(bool $result, string $char): void
    {
        $this->assertEquals($result, new Brace($char)->isOpen());
    }

    #[DataProvider('charsOpenClosedProvider')]
    public function test_is_valid_close_brace(bool $result, string $open, string $close): void
    {
        $this->assertEquals($result, new Brace($open)->isValidOpenFor(new Brace($close)));
    }

    public static function charsProvider(): array
    {
        return [
            [true, '{'],
            [true, '['],
            [true, '('],
            [false, '}'],
            [false, ']'],
            [false, ')'],
        ];
    }

    public static function charsOpenClosedProvider(): array
    {
        return [
            [true, '{', '}'],
            [true, '[', ']'],
            [false, '(', '}'],
            [false, '[', '}'],
        ];
    }
}
