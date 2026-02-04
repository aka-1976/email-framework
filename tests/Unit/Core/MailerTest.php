<?php

declare(strict_types=1);

namespace EmailFramework\Tests\Unit\Core;

use EmailFramework\Core\Email;
use EmailFramework\Core\Mailer;
use EmailFramework\Transports\Transport;
use PHPUnit\Framework\TestCase;

class MailerTest extends TestCase
{
    public function testSend(): void
    {
        $transport = $this->createMock(Transport::class);
        $mailer = new Mailer($transport);

        $email = new Email('to@example.com', 'from@example.com', 'Subject', 'Body');

        $transport->expects($this->once())
            ->method('send')
            ->with($email);

        $mailer->send($email);
    }

    public function testFromDsn(): void
    {
        // This is more of an integration test, but we can do a basic check here
        $mailer = Mailer::fromDsn('null://null');
        $this->assertInstanceOf(Mailer::class, $mailer);
    }
}
