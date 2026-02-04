<?php

declare(strict_types=1);

namespace EmailFramework\Transports;

use EmailFramework\Core\Email;
use EmailFramework\Core\Result;

interface TransportInterface
{
    public function send(Email $email): Result;
    public function getName(): string;
    public function getPriority(): int;
    public function canSend(Email $email): bool;
}