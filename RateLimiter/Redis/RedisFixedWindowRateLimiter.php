<?php

declare(strict_types=1);

namespace Src\RateLimiter\Redis;

use Redis;
use Src\RateLimiter\RateLimiter;

final readonly class RedisFixedWindowRateLimiter implements RateLimiter
{
    public function __construct(private Redis $redis)
    {

    }
    public function allow(string $clientId, int $limit, int $windowSize): bool
    {
        $key = sprintf('rate:%s', $clientId);

        $countHits = $this->redis->incr($key);

        if ($countHits === 1) {
            $this->redis->setex($key, $windowSize, $countHits);
        }

        return $countHits <= $limit;
    }
}
