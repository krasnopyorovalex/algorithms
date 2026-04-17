<?php

declare(strict_types=1);

namespace Src\Linter\Braces;

final readonly class Brace
{
    public function __construct(private(set) string $char) {}

    public function isOpen(array $bracesMap): bool
    {
        return array_key_exists($this->char, $bracesMap);
    }

    public function isValidClose(array $bracesMap, string $char): bool
    {
        return $bracesMap[$char] === $this->char;
    }
}
