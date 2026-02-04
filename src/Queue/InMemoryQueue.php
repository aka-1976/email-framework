<?php

declare(strict_types=1);

namespace EmailFramework\Queue;

use EmailFramework\Core\Email;

class InMemoryQueue implements Queue
{
    private array $queue = [];

    public function queue(Email $email): void
    {
        $this->queue[] = $email;
        echo "Email queued to in-memory queue.
";
    }

    public function getQueue(): array
    {
        return $this->queue;
    }
}
