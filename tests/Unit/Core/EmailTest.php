<?php

declare(strict_types=1);

namespace EmailFramework\Tests\Unit\Core;

use PHPUnit\Framework\TestCase;
use EmailFramework\Core\Email;

class EmailTest extends TestCase
{
    public function testCanCreateEmail(): void
    {
        $email = (new Email())
            ->from('sender@example.com', 'Sender Name')
            ->to('recipient@example.com', 'Recipient Name')
            ->subject('Test Subject')
            ->text('Test body');
        
        $this->assertEquals('sender@example.com', $email->getFrom()->getEmail());
        $this->assertEquals('Sender Name', $email->getFrom()->getName());
        $this->assertEquals('Test Subject', $email->getSubject());
        $this->assertEquals('Test body', $email->getTextBody());
    }
    
    public function testInvalidEmailThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $email = new Email();
        $email->from('invalid-email');
    }
}