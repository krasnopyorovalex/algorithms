<?php

declare(strict_types=1);

namespace Src\Linter\Braces;

final readonly class Brace
{
    private const array BRACES_MAP = [
        '{' => '}',
        '[' => ']',
        '(' => ')'
    ];

    public function __construct(private(set) string $char) {}

    public function isOpen(): bool
    {
        return array_key_exists($this->char, self::BRACES_MAP);
    }

    public function isValidOpenFor(self $brace): bool
    {
        return self::BRACES_MAP[$this->char] === $brace->char;
    }
}
