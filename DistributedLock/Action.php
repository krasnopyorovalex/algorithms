<?php

declare(strict_types=1);

namespace Src\DistributedLock;

interface Action
{
    public function run(): mixed;

    public function equal(string $signature): bool;
}
