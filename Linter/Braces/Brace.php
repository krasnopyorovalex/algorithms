<?php

declare(strict_types=1);

namespace Src\Linter\Braces;

final readonly class Brace
{
    public function __construct(private(set) string $char) {}

    /**
     * @param array<int, string> $bracesMap
     */
    public function isOpen(array $bracesMap): bool
    {
        return array_key_exists($this->char, $bracesMap);
    }

    /**
     * @param string<non-empty-string> $char
     */
    public function isValidClose(string $char): bool
    {
        return $char === $this->char;
    }
}
