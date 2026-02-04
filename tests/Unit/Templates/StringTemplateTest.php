<?php

declare(strict_types=1);

namespace EmailFramework\Tests\Unit\Templates;

use EmailFramework\Templates\StringTemplate;
use PHPUnit\Framework\TestCase;

class StringTemplateTest extends TestCase
{
    public function testRender(): void
    {
        $template = new StringTemplate('Hello, {{ name }}! You are {{ age }} years old.');
        $rendered = $template->render(['name' => 'World', 'age' => 30]);

        $this->assertSame('Hello, World! You are 30 years old.', $rendered);
    }
}
