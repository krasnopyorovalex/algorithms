<?php

declare(strict_types=1);

use Src\RateLimiter\Redis\RedisFixedWindowRateLimiter;
use Src\RedisConnection;

include __DIR__ . '/../vendor/autoload.php';

$rateLimiter = new RedisFixedWindowRateLimiter(RedisConnection::connect());


//var_dump($rateLimiter->allow('client-tfR54hb', 2, 10));

function insertBtoA(int $a, int $b, int $start, int $end): int
{
    $maskL = (-1 << ($start + 1));
    $maskR = (1 << $end) - 1;
    $maskA = $maskL | $maskR;

    $a &= $maskA;

    $b <<= $end;
    $maskB = ((1 << ($start + 1)) - 1);
    $b &= $maskB;

    return $a | $b;
}

echo insertBtoA(285_689_642, 1_132_478_069, 16, 5), PHP_EOL;
