<?php

declare(strict_types=1);

namespace Src\DistributedLock;

interface DistributedLock
{
    public function tryLock(string $lockKey, int $ttl): string;

    public function unLock(string $lockKey, string $lockId): int;
}
