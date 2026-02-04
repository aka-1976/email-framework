<?php

declare(strict_types=1);

namespace EmailFramework\Tests\Unit\Templates;

use EmailFramework\Templates\StringTemplate;
use EmailFramework\Templates\TemplatedEmail;
use PHPUnit\Framework\TestCase;

class TemplatedEmailTest extends TestCase
{
    public function testGetBody(): void
    {
        $template = new StringTemplate('Hello, {{ name }}!');
        $email = new TemplatedEmail('to@example.com', 'from@example.com', 'Subject', $template, ['name' => 'Test']);

        $this->assertSame('Hello, Test!', $email->getBody());
    }
}
