<?php

declare(strict_types=1);

namespace EmailFramework\Templates;

class StringTemplate implements Template
{
    private string $template;

    public function __construct(string $template)
    {
        $this->template = $template;
    }

    public function render(array $data): string
    {
        return str_replace(
            array_map(fn($key) => "{{ $key }}", array_keys($data)),
            array_values($data),
            $this->template
        );
    }
}
