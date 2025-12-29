<?php

declare(strict_types=1);

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\PsrLogMessageProcessor;
use Src\DistributedLock\Redis\RedisConnection;
use Src\DistributedLock\Redis\RedisDistributedLock;
use Src\DistributedLock\Redis\RedisLockPrefix;

require __DIR__ . '/../vendor/autoload.php';

$logHandler = new StreamHandler(STDOUT);
$logHandler->pushProcessor(new PsrLogMessageProcessor());
$logger = new Logger('redis.dl', [$logHandler]);
$redisDistributedLock = new RedisDistributedLock(RedisConnection::connection());

$key = $argv[1] ?? 'test';
$ttl = $argv[2] ?? 600;

try {
    $lockKey = new RedisLockPrefix($key)->getKeyWithPrefix();
    $lockId = $redisDistributedLock->tryLock($lockKey, $ttl);

    $logger->info('Lock is set for key: {lockKey}, lock id: {lockId}', ['lockKey' => $lockKey, 'lockId' => $lockId]);
} catch (\Throwable $t) {
    $logger->error($t->getMessage(), ['exception' => $t]);
}
