<?php

namespace App\Components;

use Exception;
use Ratchet\ConnectionInterface;
use Ratchet\WebSocket\MessageComponentInterface;
use SplObjectStorage;

class MyChat implements MessageComponentInterface, \Ratchet\MessageComponentInterface
{

    protected $clients;

    public function __construct()
    {
        $this->clients = new SplObjectStorage();
    }

    function onOpen(ConnectionInterface $conn)
    {
        // Store the new connection to send messages to later
        $this->clients->attach($conn); //добавляем новый connection

        echo "New connection! ({$conn->resourceId})\n";

    }

    function onClose(ConnectionInterface $conn)
    {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";

    }

    function onError(ConnectionInterface $conn, Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();

    }

    public function onMessage(ConnectionInterface $conn, $msg)
    {
        $numRecv = count($this->clients) - 1; //количество клиентов
        //$numRecv = $this->clients->count(); //количество клиентов
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $conn->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        foreach ($this->clients as $client) {
            if ($conn !== $client) {
                // The sender is not the receiver, send to each client connected
                $client->send($msg);
            }
        }

    }
}
