<?php

declare(strict_types=1);

namespace Src\RateLimiter;

interface RateLimiter
{
    public function allow(string $clientId, int $limit, int $windowSize): bool;
}
