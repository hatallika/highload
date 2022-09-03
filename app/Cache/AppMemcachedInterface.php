<?php

namespace App\Cache;

interface AppMemcachedInterface
{
    public function addServer(string $host, int $port, int $weight = 0);
    public function set(string $key, mixed $value, int $expiration = 0);
    public function get(string $key, ?callable $cache_cb = null, int $get_flags = 0);
}
