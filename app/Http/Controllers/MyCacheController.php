<?php

namespace App\Http\Controllers;

use App\Cache\Enums\Cache;
use App\Cache\Enums\CachePort;
use Memcached;

class MyCacheController extends Controller
{
    public function index(){
        $memcached = new Memcached();
        $memcached->addServer(Cache::MEMCACHE->value, CachePort::MEMCACHE_PORT->value);

        $value = [
            'key1' => 123,
            'key2' => 'String',
            'key3' => [1,2,3]
        ];
    }
}
