<?php

namespace App\Cache;

interface AppRedisInterface extends CacheInterface
{

    public function connect(
//        $host,
//        $port = 6379,
//        $timeout = 0,
//        $reserved = null,
//        $retryInterval = 0,
//        $readTimeout = 0
        $host, $port = 6379, $timeout = 0, $retry_interval = 0
    );

    public function get($key);
}
