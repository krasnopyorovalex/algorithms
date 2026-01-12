<?php

declare(strict_types=1);

namespace Src;

use Redis;

final class RedisConnection
{
    private static Redis $connection;

    public static function connect(): Redis
    {
        if (!isset(self::$connection)) {
            self::$connection = new Redis([
                'host' => 'redis',
                'port' => 6379,
            ]);
        }

        return self::$connection;
    }
}
