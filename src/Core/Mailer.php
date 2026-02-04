<?php

declare(strict_types=1);

namespace EmailFramework\Core;

use EmailFramework\Transports\SymfonyMailerTransport;
use EmailFramework\Transports\Transport;
use Symfony\Component\Mailer\Mailer as SymfonyMailer;
use Symfony\Component\Mailer\Transport as SymfonyTransport;

class Mailer
{
    private Transport $transport;

    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    public static function fromDsn(string $dsn): self
    {
        $transport = new SymfonyMailerTransport(
            new SymfonyMailer(
                SymfonyTransport::fromDsn($dsn)
            )
        );

        return new self($transport);
    }



    public function send(Email $email): void
    {
        $this->transport->send($email);
    }
}
