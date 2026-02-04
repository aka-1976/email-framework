<?php

declare(strict_types=1);

namespace EmailFramework\Tests\Unit\Queue;

use EmailFramework\Core\Email;
use EmailFramework\Queue\InMemoryQueue;
use PHPUnit\Framework\TestCase;

class InMemoryQueueTest extends TestCase
{
    public function testQueue(): void
    {
        $queue = new InMemoryQueue();
        $email = new Email('to@example.com', 'from@example.com', 'Subject', 'Body');

        $queue->queue($email);

        $this->assertCount(1, $queue->getQueue());
        $this->assertSame($email, $queue->getQueue()[0]);
    }
}
