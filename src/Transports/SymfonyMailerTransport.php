<?php

declare(strict_types=1);

namespace EmailFramework\Transports;

use EmailFramework\Core\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email as SymfonyEmail;

class SymfonyMailerTransport implements Transport
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function send(Email $email): void
    {
        $symfonyEmail = (new SymfonyEmail())
            ->from($email->getFrom())
            ->to($email->getTo())
            ->subject($email->getSubject())
            ->text($email->getBody());

        $this->mailer->send($symfonyEmail);
    }
}
