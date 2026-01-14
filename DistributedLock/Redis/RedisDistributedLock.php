<?php

declare(strict_types=1);

namespace Src\DistributedLock\Redis;

use Ramsey\Uuid\Uuid;
use Src\DistributedLock\DistributedLock;
use Src\RedisConnection;

final readonly class RedisDistributedLock implements DistributedLock
{
    public function __construct(private RedisConnection $redis)
    {
    }

    public function tryLock(string $lockKey, int $ttl): string
    {
        $lockId = Uuid::uuid7()->toString();

        (bool) $isLocked = $this->redis->getConnection()->set($lockKey, $lockId, ["NX", "EX" => $ttl]);

        if ($isLocked) {
            return $lockId;
        }

        throw new \DomainException(sprintf('Resource %s is already locked', $lockKey));
    }

    public function unLock(string $lockKey, string $lockId): int
    {
        $luaCommand = <<<LUA
            if redis.call("get", KEYS[1]) == ARGV[1] then
                return redis.call("del", KEYS[1])
            else return 0 end
        LUA;

        return $this->redis->getConnection()->eval($luaCommand, [$lockKey, $lockId], 1);
    }
}
