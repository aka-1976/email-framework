<?php

declare(strict_types=1);

namespace EmailFramework\Queue;

use EmailFramework\Core\Email;

interface Queue
{
    public function queue(Email $email): void;
}
