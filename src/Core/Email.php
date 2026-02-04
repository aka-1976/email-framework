<?php

declare(strict_types=1);

namespace EmailFramework\Core;

class Email
{
    private string $to;
    private string $from;
    private string $subject;
    private string $body;

    public function __construct(string $to, string $from, string $subject, string $body)
    {
        $this->to = $to;
        $this->from = $from;
        $this->subject = $subject;
        $this->body = $body;
    }

    public function getTo(): string
    {
        return $this->to;
    }

    public function getFrom(): string
    {
        return $this->from;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getBody(): string
    {
        return $this->body;
    }
}
