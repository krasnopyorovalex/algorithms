<?php

declare(strict_types=1);

namespace Src;

use Redis;

final readonly class RedisConnection
{
    public function __construct(private Redis $connection) {}

    public function getConnection(): Redis
    {
        return $this->connection;
    }
}
