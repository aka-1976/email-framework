<?php

declare(strict_types=1);

namespace EmailFramework\Templates;

interface Template
{
    public function render(array $data): string;
}
