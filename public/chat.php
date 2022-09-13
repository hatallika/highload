<?php

use App\Components\MyChat;
use Ratchet\Server\IoServer;

//require 'vendor/autoload.php';
//require 'chat.php';
require __DIR__.'/../vendor/autoload.php';


$server = IoServer::factory(
        new MyChat(),
        8181
    );

$server->run();
