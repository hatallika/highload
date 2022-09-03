<?php

namespace App\Http\Controllers;

use App\Cache\Enums\Cache;
use App\Cache\Enums\CachePort;
use Memcached;

class MyCacheController extends Controller
{
    public function index(): array
    {
        $memcached = new Memcached();
        $memcached->addServer(Cache::MEMCACHE->value, CachePort::MEMCACHE_PORT->value);


        $values = [
            'key1' => 123,
            'key2' => 'String',
            'key3' => [1,2,3]
        ];

        foreach ($values as $key => $value){
            $memcached->set($key,$value);
        }

        $keys = ['key1', 'key2', 'key3'];
        $getValuesFromMemcache = [];

        foreach ($keys as $key){
            $getValuesFromMemcache[] = $memcached->get($key);
        }

        return $getValuesFromMemcache;
    }
}
