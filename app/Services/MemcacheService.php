<?php

namespace App\Services;

use App\Cache\AppMemcachedInterface;
use App\Cache\Enums\CacheKeys;
use Generator;

class MemcacheService implements MemcacheServiceInterface
{

    public function __construct(private AppMemcachedInterface $cached)
    {
        $this->cached->addServer('memcached',11211);
    }

    public function setValues(array $values): void
    {
        foreach ($values as $key=> $value)
        {
            $this->cached->set(CacheKeys::MEMCACHE_KEY_INT->value. $key, $value); //положили в кеш
        }
    }

    public function getValues(array $keys): Generator
    {
        foreach ($keys as $key)
        {
            yield $key => $this->cached->get(CacheKeys::MEMCACHE_KEY_INT->value. $key);
        }

    }
}
