<?php

declare(strict_types=1);

namespace Src\DistributedLock\Redis;

final readonly class RedisLockPrefix
{
    private const string PREFIX = 'lock';

    public function __construct(private string $key)
    {
    }

    public function getKeyWithPrefix(): string
    {
        return sprintf('%s:%s', self::PREFIX, $this->key);
    }
}
