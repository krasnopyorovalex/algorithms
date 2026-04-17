<?php

declare(strict_types=1);

namespace Src\Linter;

interface Linter
{
    public function check(string $braces): bool;
}
