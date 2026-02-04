<?php

declare(strict_types=1);

namespace EmailFramework\Tests\Unit\Core;

use EmailFramework\Core\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testEmailGetters(): void
    {
        $email = new Email('to@example.com', 'from@example.com', 'Subject', 'Body');

        $this->assertSame('to@example.com', $email->getTo());
        $this->assertSame('from@example.com', $email->getFrom());
        $this->assertSame('Subject', $email->getSubject());
        $this->assertSame('Body', $email->getBody());
    }
}
