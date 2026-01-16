<?php

declare(strict_types=1);

namespace Src\RateLimiter\Redis;

use Src\RateLimiter\RateLimiter;
use Src\RedisConnection;

final readonly class RedisFixedWindowRateLimiter implements RateLimiter
{
    public function __construct(private RedisConnection $redis)
    {}

    public function allow(string $clientId, int $limit, int $windowSize): bool
    {
        $key = sprintf('rate:%s', $clientId);

        $countHits = $this->redis->getConnection()->incr($key);

        if ($countHits === 1) {
            $this->redis->getConnection()->setex($key, $windowSize, $countHits);
        }

        return $countHits <= $limit;
    }
}
