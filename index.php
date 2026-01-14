<?php

declare(strict_types=1);

use Src\RedisConnection;
use Symfony\Component\DependencyInjection\ContainerBuilder;

require __DIR__ . '/vendor/autoload.php';

$container = new ContainerBuilder();

$container
    ->register('redis.connection', RedisConnection::class)
    ->addArgument(
        new Redis([
            'host' => 'redis',
            'port' => 6379,
        ])
    );

