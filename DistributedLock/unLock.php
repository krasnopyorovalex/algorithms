<?php

declare(strict_types=1);

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\PsrLogMessageProcessor;
use Src\DistributedLock\Redis\RedisDistributedLock;
use Src\DistributedLock\Redis\RedisLockPrefix;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/** @var ContainerBuilder $container */
require __DIR__ . '/../index.php';

$key = $argv[1] ?? false;
$lockId = $argv[2] ?? false;

$logHandler = new StreamHandler(STDOUT);
$logHandler->pushProcessor(new PsrLogMessageProcessor());
$logger = new Logger('redis.dl', [$logHandler]);

try {
    $redisDistributedLock = new RedisDistributedLock($container->get('redis.connection'));

    if ($key && $lockId) {
        $result = $redisDistributedLock->unLock(
            lockKey: new RedisLockPrefix($key)->getKeyWithPrefix(),
            lockId: $lockId
        );

        $logger->info((string) $result);
    }
} catch (\Throwable $th) {
    $logger->error($th->getMessage(), [
        'exception' => $th
    ]);
}
