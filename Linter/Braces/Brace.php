<?php

declare(strict_types=1);

namespace Src\Linter\Braces;

final readonly class Brace
{
    public function __construct(private(set) string $char) {}

    public function isOpen(): bool
    {
        return array_key_exists($this->char, BraceTypes::provideTypes());
    }

    public function isValidOpenFor(self $brace): bool
    {
        return BraceTypes::provideTypes()[$this->char] === $brace->char;
    }
}
