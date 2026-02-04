<?php

declare(strict_types=1);

namespace EmailFramework\Tests\Unit\Queue;

use EmailFramework\Core\Email;
use EmailFramework\Queue\Queue;
use EmailFramework\Queue\QueueableTransport;
use EmailFramework\Transports\Transport;
use PHPUnit\Framework\TestCase;

class QueueableTransportTest extends TestCase
{
    public function testSend(): void
    {
        $innerTransport = $this->createMock(Transport::class);
        $queue = $this->createMock(Queue::class);
        $transport = new QueueableTransport($innerTransport, $queue);

        $email = new Email('to@example.com', 'from@example.com', 'Subject', 'Body');

        $queue->expects($this->once())
            ->method('queue')
            ->with($email);

        $innerTransport->expects($this->never())
            ->method('send');

        $transport->send($email);
    }
}
