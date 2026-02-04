<?php

declare(strict_types=1);

namespace EmailFramework\Queue;

use EmailFramework\Core\Email;
use EmailFramework\Transports\Transport;

class QueueableTransport implements Transport
{
    private Transport $transport;
    private Queue $queue;

    public function __construct(Transport $transport, Queue $queue)
    {
        $this->transport = $transport;
        $this->queue = $queue;
    }

    public function send(Email $email): void
    {
        $this->queue->queue($email);
    }

    public function getInnerTransport(): Transport
    {
        return $this->transport;
    }
}
