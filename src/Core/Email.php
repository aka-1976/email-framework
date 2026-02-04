<?php

declare(strict_types=1);

namespace EmailFramework\Core;

use EmailFramework\Templates\TemplateInterface;

class Email
{
    private ?Address $from = null;
    private ?Address $replyTo = null;
    private array $to = [];
    private array $cc = [];
    private array $bcc = [];
    private string $subject = '';
    private ?string $textBody = null;
    private ?string $htmlBody = null;
    private array $attachments = [];
    private array $headers = [];
    private array $metadata = [];
    private ?TemplateInterface $template = null;
    private array $templateData = [];

    public function from(string $email, ?string $name = null): self
    {
        $this->from = new Address($email, $name);
        return $this;
    }

    public function to(string $email, ?string $name = null): self
    {
        $this->to[] = new Address($email, $name);
        return $this;
    }

    public function subject(string $subject): self
    {
        $this->subject = $subject;
        return $this;
    }

    public function text(string $body): self
    {
        $this->textBody = $body;
        return $this;
    }

    public function html(string $body): self
    {
        $this->htmlBody = $body;
        return $this;
    }

    // ... other methods ...

    public function getFrom(): ?Address { return $this->from; }
    public function getTo(): array { return $this->to; }
    public function getSubject(): string { return $this->subject; }
    public function getTextBody(): ?string { return $this->textBody; }
    public function getHtmlBody(): ?string { return $this->htmlBody; }
}