<?php

declare(strict_types=1);

namespace EmailFramework\Templates;

use EmailFramework\Core\Email;

class TemplatedEmail extends Email
{
    private Template $template;
    private array $data;

    public function __construct(string $to, string $from, string $subject, Template $template, array $data)
    {
        parent::__construct($to, $from, $subject, '');
        $this->template = $template;
        $this->data = $data;
    }

    public function getBody(): string
    {
        return $this->template->render($this->data);
    }
}
