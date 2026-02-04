<?php

declare(strict_types=1);

namespace EmailFramework\Transports;

use EmailFramework\Core\Email;
use EmailFramework\Core\Result;

class SmtpTransport implements TransportInterface
{
    public function send(Email $email): Result
    {
        // TODO: Implement send() method.
        return Result::success($this->getName(), 'Email sent via SMTP');
    }
    
    public function getName(): string { return 'smtp'; }
    public function getPriority(): int { return 100; }
    public function canSend(Email $email): bool { return !empty($email->getTo()); }
}