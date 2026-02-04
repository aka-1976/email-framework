<?php

declare(strict_types=1);

namespace EmailFramework\Tests\Integration\Transports;

use EmailFramework\Core\Email;
use EmailFramework\Transports\SymfonyMailerTransport;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email as SymfonyEmail;

class SymfonyMailerTransportTest extends TestCase
{
    public function testSend(): void
    {
        $mailer = $this->createMock(MailerInterface::class);
        $transport = new SymfonyMailerTransport($mailer);

        $email = new Email('to@example.com', 'from@example.com', 'Subject', 'Body');

        $mailer->expects($this->once())
            ->method('send')
            ->with($this->callback(function (SymfonyEmail $symfonyEmail) {
                $this->assertSame('from@example.com', $symfonyEmail->getFrom()[0]->getAddress());
                $this->assertSame('to@example.com', $symfonyEmail->getTo()[0]->getAddress());
                $this->assertSame('Subject', $symfonyEmail->getSubject());
                $this->assertSame('Body', $symfonyEmail->getTextBody());
                return true;
            }));

        $transport->send($email);
    }
}
