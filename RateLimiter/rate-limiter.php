<?php

declare(strict_types=1);

use Src\RateLimiter\Redis\RedisFixedWindowRateLimiter;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/** @var ContainerBuilder $container */
include __DIR__ . '/../index.php';

try {
    $rateLimiter = new RedisFixedWindowRateLimiter($container->get('redis.connection'));

    var_dump($rateLimiter->allow('client-tfR54hb', 2, 120));
} catch (Exception $e) {
    var_dump($e->getMessage());
}
