<?php

declare(strict_types=1);

namespace EmailFramework;

use EmailFramework\Core\Email;
use EmailFramework\Core\Result;
use EmailFramework\Transports\TransportInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class Mailer
{
    private array $transports = [];
    private ?TransportInterface $defaultTransport = null;
    private LoggerInterface $logger;
    
    public function __construct(?LoggerInterface $logger = null)
    {
        $this->logger = $logger ?? new NullLogger();
    }
    
    public function addTransport(TransportInterface $transport): self
    {
        $this->transports[] = $transport;
        usort($this->transports, fn($a, $b) => $b->getPriority() <=> $a->getPriority());
        return $this;
    }
    
    public function send(Email $email, ?TransportInterface $transport = null): Result
    {
        $transport = $transport ?? $this->defaultTransport ?? $this->transports[0] ?? null;
        
        if (!$transport) {
            throw new \RuntimeException('No available transport found for email');
        }
        
        $this->logger->info('Sending email', [
            'transport' => $transport->getName(),
            'to' => array_map(fn($a) => $a->getEmail(), $email->getTo()),
            'subject' => $email->getSubject(),
        ]);
        
        return $transport->send($email);
    }
    
    public function createEmail(): Email
    {
        return new Email();
    }
}